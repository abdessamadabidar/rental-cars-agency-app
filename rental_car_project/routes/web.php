<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/about", [\App\Http\Controllers\AboutController::class, "index"])->name("about");
Route::get("/login", [\App\Http\Controllers\LoginController::class, "index"])->name("login")->middleware('guest');
Route::post("/login", [\App\Http\Controllers\LoginController::class, "connect"])->name("connect")->middleware('guest');
Route::get("/logout", [\App\Http\Controllers\LoginController::class, "disconnect"])->name("disconnect")->middleware('auth');
Route::get("/register", [\App\Http\Controllers\RegisterController::class, "index"])->name("register");
Route::post("/create", [\App\Http\Controllers\RegisterController::class, "create"])->name("create_user");


// cars
Route::resource("voitures", \App\Http\Controllers\CarController::class);


// users
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('/verify_email/{hash}', [\App\Http\Controllers\UserController::class, "verify"]);

// password
Route::resource('password', \App\Http\Controllers\PasswordController::class)->middleware('auth');
Route::post('password/confirm', [\App\Http\Controllers\PasswordController::class, "confirm"])->name("password.confirm");
Route::get('/reset_password/{hash}', [\App\Http\Controllers\PasswordController::class, "decrypt"]);
Route::get('/password/change/{user}', [\App\Http\Controllers\PasswordController::class, "change"])->name("password.change");
Route::put('/password/reset/{user}', [\App\Http\Controllers\PasswordController::class, "reset"])->name("password.reset");


// notifications
Route::resource('notifications', \App\Http\Controllers\NotificationController::class);
Route::get('/users/notifications/{user}', [\App\Http\Controllers\UserController::class, 'getNotifications'])->name('users.notifications');
Route::get('/users/messages/{user}', [\App\Http\Controllers\UserController::class, "getMessages"])->name('client.messages');


// car brands
Route::resource('marques', \App\Http\Controllers\CarBrandController::class);

// car models
Route::resource('modeles', \App\Http\Controllers\CarModelController::class);

// fuels
Route::resource('carburants', \App\Http\Controllers\FuelController::class);

// clients
Route::resource('clients', App\Http\Controllers\ClientController::class);
Route::get('users/{client}/reservations', [\App\Http\Controllers\ClientController::class, "getReservations"])->name("clients.reservations");

// reservations
Route::resource('reservations', \App\Http\Controllers\ReservationController::class)->except('create')->middleware('auth');
Route::get('/reservations/create/{car}', [\App\Http\Controllers\ReservationController::class, "create"])->name('reservations.create');
Route::get('/reservations/accept/{reservation}', [\App\Http\Controllers\ReservationController::class, "accept"])->name('reservations.accept');
Route::get('/reservations/reject/{reservation}', [\App\Http\Controllers\ReservationController::class, "reject"])->name('reservations.reject');
Route::get('/reservations/contrat/{reservation}', [\App\Http\Controllers\ReservationController::class, "download"])->name('reservations.contrat');

// search
Route::get('/search', [\App\Http\Controllers\CarSearchController::class, 'index'])->name('navigate');

// messages
Route::resource('messages', \App\Http\Controllers\MessageController::class);

Route::get("/income_during_this_month", [\App\Http\Controllers\AJAXController::class, 'getIncomeDuringThisMonth']);
Route::get("/most_rented_cars", [\App\Http\Controllers\AJAXController::class, 'getCarsStatistics']);
Route::get("/number_of_visits_this_week", [\App\Http\Controllers\AJAXController::class, 'getNumberOfVisits']);
Route::get("/number_of_registered_today", [\App\Http\Controllers\AJAXController::class, 'getClientsStatistics']);
