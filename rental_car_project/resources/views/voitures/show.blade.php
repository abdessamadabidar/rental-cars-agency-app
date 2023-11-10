<x-main title="{{ $voiture->marque() }} {{ $voiture->modele() }}"  :user="$user">
    <div class="container mt-3">
        <div class="d-flex flex-nowrap justify-content-between align-items-center bg-light p-2 px-3 rounded-4 mb-3">
            <div class="car-infos__header">
                <i class="bx bx-info-circle nav__icon"></i>
                <p class="m-0">Les informations de la voiture</p>
            </div>
            <div class="d-flex flex-nowrap align-items-center gap-2">
                @can('edit', \App\Models\Car::class)
                    <a href="{{ route('voitures.edit', $voiture->id) }}" class="d-flex align-items-center gap-1" style="font-size: 20px" >
                        <span style="font-size: 14px !important;">Modifier</span>
                        <i class='bx bx-edit'></i>
                    </a>
                @endcan
                @can('delete', \App\Models\Car::class)
                    <form method="post" action="{{ route('voitures.destroy', $voiture->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="border-0 bg-transparent text-danger shadow-0 d-flex align-items-center gap-1" style="font-size: 20px">
                            <span style="font-size: 14px !important;">Supprimer</span>
                            <i class='bx bx-trash'></i>
                        </button>
                    </form>
                @endcan
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
        <div class="car-infos mt-5">
            <div class="car-infos__body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Marque :</h6>
                            <p class="m-0">{{ $voiture->marque($voiture->modele_id) }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="info border-bottom">
                            <h6 class="h6 m-0">Modele :</h6>
                            <p class="m-0">{{ $voiture->modele($voiture->modele_id) }}</p>
                        </div>
                    </div>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Matricule :</h6>
                    <p class="m-0">{{ $voiture->matricule }}</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Puissance :</h6>
                    <p class="m-0">{{ $voiture->puissance }}CV</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Kilométrage :</h6>
                    <p class="m-0">{{ $voiture->kilometrage }} KM</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Couleur :</h6>
                    <p class="m-0">{{ $voiture->couleur }}</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Nombre de places :</h6>
                    <p class="m-0">{{ $voiture->nbr_de_places }}</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Prix :<span class="small fw-light"> /jour</span></h6>
                    <p class="m-0"> {{ $voiture->prix }} <span class="fw-semibold">MAD</span></p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Boite Vitesse :</h6>
                    <p class="m-0">{{ $voiture->boite_vitesse }}</p>
                </div>
                <div class="info border-bottom">
                    <h6 class="h6 m-0">Louée :</h6>
                    @if($voiture->isRented) <p class="m-0 text-danger">Oui</p> @else <p class="m-0 text-success">Non</p> @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
