<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarModelRequest;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CarModelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {

        Gate::authorize('viewAny', CarModel::class);
        $user = Auth::user();
        $modeles = CarModel::all();
        foreach ($modeles as $modele) {
            $modele['brand'] = DB::table('marques')->where('id', $modele->brand_id)->value('name');
        }
        return view('modeles.index', compact('user', 'modeles'));
    }

    public function create() {
        Gate::authorize('create', CarModel::class);
        $user = Auth::user();
        $marques = CarBrand::all();
        return view('modeles.create', compact('user', 'marques'));
    }

    public function store(CarModelRequest $carModelRequest) {
        $fields = $carModelRequest->validated();
        $validatedFormFields['name'] = $fields['name'];
        $validatedFormFields['brand_id'] = DB::table('marques')->where('name', $fields['brand'])->value('id');
        CarModel::create($validatedFormFields);
        return to_route('modeles.index')->with('success', $validatedFormFields['name'] . ' à été ajoutée avec succès');
    }

    public function edit(CarModel $modele) {
        Gate::authorize('edit', CarModel::class);
        $user = Auth::user();
        $marques = CarBrand::all();
        $modele['brand'] = DB::table('marques')->where('id', $modele->id)->value('name');
        return view('modeles.edit', compact('user', 'modele', 'marques'));
    }

    public function update(CarModelRequest $carModelRequest, CarModel $modele) {
        $requestFields = $carModelRequest->validated();
        $updatedFormFields['name'] = $requestFields['name'];
        $updatedFormFields['brand_id'] = DB::table('marques')->where('name', $requestFields['brand'])->value('id');
        $modele->fill($updatedFormFields)->save();
        return to_route('modeles.index')->with('success', 'Le modèle '.  $modele->name . ' à été modifié avec succès');
    }

    public function destroy(CarModel $modele) {
        Gate::authorize('delete', CarModel::class);
        $modele->delete();
        return to_route('modeles.index')->with('success',  $modele->name . ' à été supprimé avec succès');
    }
}
