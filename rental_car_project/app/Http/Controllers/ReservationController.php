<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Mail\ReservationMail;
use App\Models\Car;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\User;
use App\Policies\ReservationPolicy;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ReservationController extends Controller
{

    public function index() {
        Gate::authorize('viewAny', Reservation::class);
        $user = Auth::user();
        $reservations = Reservation::all();


        // durée expirée logique
        foreach ($reservations as $reservation) {
            if ($reservation->status_id === 2) {
                $date_fin = Carbon::createFromTimestamp($reservation->date_fin);
                if(Carbon::now()->greaterThanOrEqualTo($date_fin)) {
                    $reservation->fill(['isExpired' => true])->save();
                    Car::where('id', $reservation->car_id)->update(['isRented' => false]);

                }
            }

        }

        return view('reservations.index', compact('user', 'reservations'));
    }

    public function show(Reservation $reservation) {

        Gate::authorize('view', $reservation);
        $user = Auth::user();
        $voiture = Car::find($reservation->car_id);
        $client = User::find($reservation->client_id);
        $images =  $voiture->images();
        $photos = [];
        if ($images !== null) {
            $i = 0;
            foreach ($images as $image) {
                $photos[$image] = !(boolean)$i++;
            }
        }
        return view('reservations.show', compact('user', 'reservation', 'photos', 'voiture', 'client'));
    }

    public function create(Car $car) {

        $user = Auth::user();
        $voiture = $car;

        if (Auth::check()) {
            return view('reservations.create', compact('user', 'voiture'));
        }

        return Redirect::to(route('login', ['car_id' => $car->id]));


    }

    public function store(ReservationRequest $reservationRequest) {
        $date_debut = $reservationRequest->input('date_debut') . ' ' . $reservationRequest->input('heure_debut');
        $date_fin = $reservationRequest->input('date_fin') . ' ' . $reservationRequest->input('heure_fin');

        $date_debut = Carbon::createFromFormat("Y-m-d H:i", $date_debut);
        $date_fin = Carbon::createFromFormat('Y-m-d H:i', $date_fin);

        if ($date_debut->lt($date_fin) && $date_debut->gte(now())) {
            $voiture = Car::findOrFail($reservationRequest->input('car_id'));
            $rent_interval = $date_debut->diffAsCarbonInterval($date_fin);
            $newReservation['total'] = $rent_interval->d * $voiture->prix + $rent_interval->h * $voiture->prix / 24;
            $newReservation['car_id'] = $reservationRequest->input('car_id');
            $newReservation['client_id'] = $reservationRequest->input('client_id');
            $newReservation['date_debut'] = $date_debut;
            $newReservation['date_fin'] = $date_fin;
            $newReservation['permis_recto'] = $reservationRequest->file('permis_recto')->store('reservations', 'public');
            $newReservation['permis_verso'] = $reservationRequest->file('permis_verso')->store('reservations', 'public');
            $newReservation['status_id'] = 1;
            Reservation::create($newReservation);
            $client = User::find($reservationRequest->input('client_id'));
            $notifyAdmin = new Notification(['title' => 'une nouvelle réservation realisée', 'content' => 'une nouvelle réservation à été créée par le client  ' . $client->first_name . ' ' . $client->last_name, 'user_id' => 1,]);
            $notifyClient = new Notification(['title' => 'Réservation enregistrée', 'content' => 'Monsieur ' . $client->first_name . ' ' . $client->last_name . ' votre réservation à bient été realisée. La réservation est en train de traitement.', 'user_id' => $client->id]);
            $notifyClient->send();
            $notifyAdmin->send();
            return to_route('clients.reservations', $client->id)->with('votre réservation a bien été enregistrée');
        }
        return back()->withErrors(['error' => 'Les données saisies sont incorrectes'])->withInput();
    }

    public function accept(Reservation $reservation) {


        $client = User::find($reservation->client_id);
        $admin = User::where('role_id', 1)->first();
        $voiture = Car::find($reservation->car_id);

        $reservation->fill(['status_id' => 2])->save();
        Car::where('id', $reservation->car_id)->update(['isRented' => true]);
        return back()->with('success', 'réservation acceptée');
    }

    public function reject(Reservation $reservation) {
        $reservation->fill(['status_id' => 3])->save();
        return back()->with('success', 'réservation rejetée');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'La réservation a ete supprimée avec succès');
    }

    public function download(Reservation $reservation) {
        Gate::authorize('download', $reservation);
        $client = User::find($reservation->client_id);
        $admin = User::where('role_id', 1)->first();
        $voiture = Car::find($reservation->car_id);
        view()->share(compact('reservation','client', 'admin', 'voiture'));
        $contrat = Pdf::loadView('reservations.contrat', $client->toArray());

        return $contrat->download(Str::random(50).'.pdf');

    }


}
