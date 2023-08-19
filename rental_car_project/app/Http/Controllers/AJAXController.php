<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Visits;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AJAXController extends Controller
{
    public function getIncomeDuringThisMonth() {
        $income = Reservation::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('SUM(total) as total')
        )
            ->whereMonth('created_at', now()->month)
            ->where('status_id', 2)
            ->groupBy(DB::raw('DAY(created_at)'))->get();


       return response()->json(['object' => $income]);
    }

    public function getCarsStatistics() {
        $mostRentedCars = Reservation::select(
            DB::raw('car_id'),
            DB::raw('COUNT(*) as numberOfReservations')
            // where('status_id', 2)
        )->groupBy('car_id')->get();

        $cars = CarModel::all()->pluck('name')->toArray();

        foreach ($mostRentedCars as $car) {
            $voiture = Car::find($car->car_id);
            $statistics[$voiture->modele()] = $car->numberOfReservations;
        }

        $cars = array_fill_keys($cars, 0);

        foreach ($statistics as $key => $value){
            $cars[$key] = $value;
        }

        return response()->json(['cars' => $cars]);

    }



    public function getNumberOfVisits() {


        Visits::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->delete();

        $visits = Visits::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as max_views'))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('date')
            ->get();
        $views = array_fill(1, now()->dayOfWeek, 0);

        foreach ($visits as $visit) {
            $views[Carbon::createFromDate($visit->date)->dayOfWeek] = $visit->max_views;
        }

        return response()->json(['visits' => $views]);
    }

    public function getClientsStatistics() {

        $clients = User::select(
            DB::raw('COUNT(*) as clients'), DB::raw('DAY(created_at) as day')
        )->whereMonth('created_at', now()->month)
            ->where("role_id", 2)
            ->groupBy('day')
            ->get();



        return response()->json(['clients' => $clients]);
    }
}
