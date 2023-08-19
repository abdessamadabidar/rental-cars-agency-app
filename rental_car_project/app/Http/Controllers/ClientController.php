<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Client::class);
        $user = Auth::user();
        $clients = User::clients();
        return view('clients.index', compact('user', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        Gate::authorize('view', Client::class);
        $user = Auth::user();
        return view('clients.show', compact('user', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        Gate::authorize('edit', Client::class);
        $user = Auth::user();
        return view('clients.edit', compact('user', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $profileRequest, Client $client)
    {
        $updatedFormFields = $profileRequest->validated();
        if ($profileRequest->hasFile('image'))
        {
            $updatedFormFields['image'] = $profileRequest->file('image')->store('Users', 'public');
        }
        $client->fill($updatedFormFields)->save();
        return to_route('clients.index')->with('success', 'votre profile a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('success', 'votre compte a été supprimé avec succès ');
    }

    public function getReservations(Client $client) {
        Gate::authorize('viewReservations', $client);
        $reservations = $client->reservations();
        return view('client.reservations', ['user' => $client, 'reservations' => $reservations]);
    }
}
