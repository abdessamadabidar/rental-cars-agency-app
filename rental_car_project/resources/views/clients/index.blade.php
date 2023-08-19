<x-main title="{{$user->first_name}} {{$user->last_name}}" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des clients</h5>
            </div>
            <div class="px-4">
                <ul class="list-group list-group-light">
                    @foreach($clients as $client)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . \App\Models\Client::getImageAttribute($client->image)) }}" alt="" style="width: 40px; height: 40px; object-fit: cover"
                                     class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-semibold m-0">{{$client->first_name}} {{$client->last_name}}</p>
                                    <p class="text-muted mb-0 small">{{$client->email}}</p>
                                </div>
                            </div>
                            <a class="stretched-link" href="{{ route('clients.show', $client->id) }}" role="button"></a>
                            <a class="btn btn-link btn-rounded btn-sm" style="z-index: 99" href="{{ route('clients.show', $client->id) }}" role="button">voir</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</x-main>
