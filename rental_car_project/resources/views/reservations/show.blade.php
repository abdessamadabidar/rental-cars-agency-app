<x-main title="reservation detail" :user="$user">
    <div class="container mt-3">
        <div class="d-flex flex-nowrap justify-content-between align-items-center bg-light p-2 px-3 rounded-4 mb-3">
            <div class="car-infos__header">
                <i class="bx bx-info-circle nav__icon"></i>
                <p class="m-0">Les informations de la réservation</p>
            </div>
           <div class="d-flex flex-nowrap align-items-center">
               @can('download', $reservation)
                   <a href="{{ route('reservations.contrat', $reservation->id) }}" class="d-flex align-items-center gap-1" style="font-size: 20px">
                       <span style="font-size: 14px !important;">Télécharger</span>
                       <i class='bx bxs-file-pdf nav__icon'></i>
                   </a>
               @endcan
               <form method="post" action="{{ route('reservations.destroy', $reservation->id) }}">
                   @method('DELETE')
                   @csrf
                   <button type="submit" class="border-0 bg-transparent text-danger shadow-0 d-flex align-items-center gap-1" style="font-size: 20px">
                       <span style="font-size: 14px !important;">Supprimer</span>
                       <i class='bx bx-trash'></i>
                   </button>
               </form>
           </div>
        </div>
        <div
            id="carouselExampleControls"
            class="carousel slide border rounded-4"
            data-mdb-ride="carousel"
        >
            <div class="carousel-inner con">
                @if(empty($photos))
                    <div class="carousel-item h-100 active d-flex align-items-center">
                        <img
                            src="{{ asset('storage/' . \App\Models\CarImage::getPathAttribute(null)) }}"
                            class="d-block w-100 rounded-4"
                            style="width: 50%; height: 50%; object-fit: contain"
                            alt=""
                        />
                    </div>
                @else
                    @foreach($photos as $image => $active)
                        @if($active)
                            <div class="carousel-item h-100 active">
                                <img
                                    src="{{ asset('storage/' . $image) }}"
                                    class="d-block w-100 rounded-4"
                                    alt=""
                                />
                            </div>
                        @else
                            <div class="carousel-item h-100">
                                <img
                                    src="{{ asset('storage/' . $image) }}"
                                    class="d-block w-100 rounded-4"
                                    alt=""
                                />
                            </div>
                        @endif
                    @endforeach
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-mdb-target="#carouselExampleControls"
                        data-mdb-slide="prev"
                    >
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-mdb-target="#carouselExampleControls"
                        data-mdb-slide="next"
                    >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
        </div>

        <div class="car-infos mt-4">
            <div class="car-infos__body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="border rounded mb-2" style="height: 200px;">
                            <img src="{{ asset('storage/' . $reservation->permis_recto) }}" class="w-100 h-100" style="object-fit: fill;" alt="">
                        </div>
                        <div class="text-muted text-center">carte permis de conduire - recto</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="border rounded mb-2" style="height: 200px;">
                            <img src="{{ asset('storage/' . $reservation->permis_verso) }}" class="w-100 h-100" style="object-fit: fill;" alt="">
                        </div>
                        <div class="text-muted text-center">carte permis de conduire - recto</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Marque :</h6>
                            <p class="m-0">{{ $voiture->marque() }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Modele :</h6>
                            <p class="m-0">{{ $voiture->modele() }}</p>
                        </div>
                    </div>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Matricule :</h6>
                    <p class="m-0">{{ $voiture->matricule }}</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Client :</h6>
                    <p class="m-0">{{ $client->first_name }} {{ $client->last_name }}</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Date Début :</h6>
                            <p class="m-0">{{ \Carbon\Carbon::createFromDate($reservation->date_debut)->toDateString() }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Heure Début :</h6>
                            <p class="m-0">{{ \Carbon\Carbon::createFromDate($reservation->date_debut)->toTimeString() }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Date Fin :</h6>
                            <p class="m-0">{{ \Carbon\Carbon::createFromDate($reservation->date_fin)->toDateString() }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Heure Fin :</h6>
                            <p class="m-0">{{ \Carbon\Carbon::createFromDate($reservation->date_fin)->toTimeString() }}</p>
                        </div>
                    </div>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Total :</h6>
                    <p class="m-0"> {{ $reservation->total }} <span class="fw-semibold">MAD</span> </p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Status :</h6>
                    <p class="m-0">
                        @switch($reservation->status_id)
                            @case(1) <span class="badge rounded-pill badge-primary">en cours</span> @break
                            @case(2) <span class="badge rounded-pill badge-success">Acceptée</span> @break
                            @case(3) <span class="badge rounded-pill badge-danger">Refusée</span> @break
                        @endswitch
                    </p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Durée Expirée :</h6>
                    <p class="m-0">
                        @if($reservation->status_id === 2)
                            @if($reservation->isExpired) Expirée @else en cours @endif
                        @else ---- @endif
                    </p>
                </div>
                <div class="info">
                    <h6 class="h6 m-0">Date de réservation :</h6>
                    <p class="m-0">{{ $reservation->created_at }}</p>
                </div>
            </div>
            <div class="car-infos__footer">
                @switch($reservation->status_id)
                    @case(1)
                        <a href="{{ route('reservations.accept', $reservation->id) }}" role="button" class="btn btn-success shadow-0 d-block d-md-inline">Accepter</a>
                        <a href="{{ route('reservations.reject', $reservation->id) }}" role="button" class="btn btn-danger shadow-0 text-white shadow-0 d-block d-md-inline">Refuser</a>
                        @break
                    @case(2)
                        <div class="d-flex flex-nowrap align-items-center gap-2">
                            <img src="{{ asset('images/icons8-ok.svg') }}" alt="" width="30px" height="30px">
                            Acceptée
                        </div>
                        @break
                    @case(3)
                        <div class="d-flex flex-nowrap align-items-center gap-2">
                            <img src="{{ asset('images/icons8-rejected.svg') }}" alt="" width="30px" height="30px">
                            Refusée
                        </div>
                        @break
                @endswitch
            </div>
        </div>
    </div>
</x-main>
