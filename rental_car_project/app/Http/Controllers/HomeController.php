<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\Visits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{



    public function index()
    {

        if( Auth::check() && url()->previous() === route("login")) {
            Visits::create(['counter' => 1]);
        }

        $user = Auth::user();
        return view('index', compact( 'user'));
    }
}
