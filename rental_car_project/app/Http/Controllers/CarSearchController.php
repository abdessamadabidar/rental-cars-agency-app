<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\Fuel;
use Illuminate\Http\Request;

class CarSearchController extends Controller
{
    public function index() {
        $voitures = Car::all();
        $marques = CarBrand::all();
        $carburants = Fuel::all();
        return view('search', compact('voitures', 'marques', 'carburants'));
    }

}
