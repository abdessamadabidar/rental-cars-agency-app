<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarImageRequest;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarImage;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAll', Car::class);
        $user = Auth::user();
        $voitures = Car::all();
        return view('voitures.index', compact('user', 'voitures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Car::class);
        $user = Auth::user();
        $modeles = CarModel::all();
        $marques = CarBrand::all();
        return view("voitures.create", compact('user', 'marques', 'modeles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $carRequest, CarImageRequest $carImageRequest)
    {
         $validatedFormFields = $carRequest->validated();
         $validatedFormFields['modele_id'] = DB::table('modeles')->where('name', $validatedFormFields['modele'])->value('id');
         data_forget($validatedFormFields, 'modele');
         $car_id = Car::create($validatedFormFields)->id;

        if($carImageRequest->hasFile('images')) {
            $uploadedImages = $carImageRequest->file('images');
            foreach ($uploadedImages as $uploadedImage) {
                $image = $uploadedImage->store('cars', 'public');
                CarImage::create(['path' => $image, 'car_id' => $car_id]);
            }
        }

         return to_route('voitures.index')->with('success', 'La voiture a ete ajoute avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(Car $voiture)
    {
        $user = Auth::user();
        $images =  $voiture->images();
        $photos = [];
        if ($images !== null) {
            $i = 0;
            foreach ($images as $image) {
                $photos[$image] = !(boolean)$i++;
            }
        }

        return view('voitures.show', compact('user', 'voiture', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $voiture)
    {
        Gate::authorize('edit', Car::class);
        $user = Auth::user();
        $modeles = CarModel::all();
        $marques = CarBrand::all();
        return view('voitures.edit', compact('user', 'voiture', 'marques', 'modeles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $carRequest, CarImageRequest $carImageRequest, Car $voiture, CarImage $carImage)
    {
        $updateddFormFields = $carRequest->validated();
        $updateddFormFields['modele_id'] = DB::table('modeles')->where('name', $updateddFormFields['modele'])->value('id');
        data_forget($updateddFormFields, 'modele');
        $voiture->fill($updateddFormFields)->save();
        if($carImageRequest->hasFile('images')){
            DB::table('car_images')->where('car_id', $voiture->id)->truncate();
            $uploadedImages = $carImageRequest->file('images');
            foreach ($uploadedImages as $uploadedImage) {
                $imagePath = $uploadedImage->store('cars', 'public');
                CarImage::create(['path' => $imagePath, 'car_id' => $voiture->id]);
            }
        }
        return to_route('voitures.index')->with('success', 'La voiture a été ajoutée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $voiture)
    {
        Gate::authorize('delete', Car::class);
        $voiture->delete();
        return to_route('voitures.index')->with('success', 'La voiture a été supprimé avec succès');
    }
}
