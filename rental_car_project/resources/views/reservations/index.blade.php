<x-main title="Tous les réservations" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des resérvations</h5>
            </div>
            <div class="reservations data-table">
                <table>
                    <thead>
                    <tr>
                        <th>véhicule</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            @php
                                $voiture = \App\Models\Car::find($reservation->car_id);
                                $client = \App\Models\User::find($reservation->client_id);
                            @endphp
                            <tr>
                                <td>
                                    <div class="car-image-container">
                                        @if($voiture->images() !== null)
                                            <img src="{{ asset('storage/' . $voiture->images()[1] )}}" alt=""/>
                                        @else
                                            <img src="{{ asset('storage/' . \App\Models\CarImage::getPathAttribute(null)) }}" alt=""/>
                                        @endif
                                    </div>
                                    {{ $voiture->marque() }} {{ $voiture->modele() }}
                                </td>
                                <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                <td>{{ $reservation->total }} DH </td>
                                <td>
                                    @switch($reservation->status_id)
                                        @case(1) <span class="badge rounded-pill badge-primary">en cours</span> @break
                                        @case(2) <span class="badge rounded-pill badge-success">Acceptée</span> @break
                                        @case(3) <span class="badge rounded-pill badge-danger">Refusée</span> @break
                                    @endswitch
                                </td>
                                <td>{{ $reservation->created_at }}</td>
                                <td>
                                    <a href="{{ route('reservations.show', $reservation->id) }}" style="font-size: 25px">
                                        <i class='bx bx-show'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </section>
    </div>
</x-main>
