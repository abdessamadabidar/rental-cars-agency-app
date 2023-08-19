<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuelRequest;
use App\Models\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FuelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        Gate::authorize('viewAny', Fuel::class);
        $user = Auth::user();
        $carburants = Fuel::all();
        return view('carburants.index', compact('user', 'carburants'));
    }

    public function create() {
        Gate::authorize('create', Fuel::class);
        $user = Auth::user();
        return view('carburants.create', compact('user'));
    }

    public function store(FuelRequest $fuelRequest) {
        Fuel::create($fuelRequest->validated());
        return to_route('carburants.index')->with('success', $fuelRequest->validated('type') . ' à été ajouté avec succès');
    }

    public function edit(Fuel $carburant) {
        Gate::authorize('edit', Fuel::class);
        $user = Auth::user();
        return view('carburants.edit', compact('user', 'carburant'));
    }

    public function update(FuelRequest $fuelRequest, Fuel $carburant) {
        $updatedFormFields = $fuelRequest->validated();
        $carburant->fill($updatedFormFields)->save();
        return to_route('carburants.index')->with('success', 'carburant à été modifié avec succès');
    }

    public function destroy(Fuel $carburant) {
        Gate::authorize('delete', Fuel::class);
        $carburant->delete();
        return to_route('carburants.index')->with('success',  $carburant->type . ' à été supprimé avec succès');
    }
}
