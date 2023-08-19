<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarBrandRequest;
use App\Models\CarBrand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CarBrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        Gate::authorize('viewAny', CarBrand::class);
        $user = Auth::user();
        $marques = CarBrand::all();
        return view('marques.index', compact('user', 'marques'));
    }

    public function create() {
        Gate::authorize('create', CarBrand::class);
        $user = Auth::user();
        return view('marques.create', compact('user'));
    }

    public function store(CarBrandRequest $carBrandRequest) {
        $validatedFormFields = $carBrandRequest->validated();
        if ($carBrandRequest->hasFile('logo')) {
            $validatedFormFields['logo'] = $carBrandRequest->file('logo')->store('brands', 'public');
        }
        CarBrand::create($validatedFormFields);
        return to_route('marques.index')->with('success', $validatedFormFields['name'] . ' à été ajoutée avec succès');
    }

    public function edit(CarBrand $marque) {
        Gate::authorize('edit', CarBrand::class);
        $user = Auth::user();
        return view('marques.edit', compact('user', 'marque'));
    }

    public function update(CarBrandRequest $carBrandRequest, CarBrand $carBrand) {
        $updatedFormFields = $carBrandRequest->validated();
        if($carBrandRequest->hasFile('logo')) {
            $updatedFormFields['logo'] = $carBrandRequest->file('logo')->store('brands', 'public');
        }
        $carBrand->fill($updatedFormFields)->save();
        return to_route('marques.index')->with('success', $updatedFormFields['name'] . ' à été ajoutée avec succès');
    }

    public function destroy(CarBrand $marque) {
        Gate::authorize('delete', CarBrand::class);
        $marque->delete();
        return to_route('marques.index')->with('success', $marque->name . ' à été supprimée avec succès');
    }



}
