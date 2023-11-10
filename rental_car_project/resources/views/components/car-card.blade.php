<div class="col-12 col-md-4">
    <div class="card border shadow-0">
        <div id="carousel_{{ $voiture->id }}" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-inner" style="height: 200px;">
                @if(empty($images))
                    <div class="carousel-item active h-100 w-100">
                        <img
                            src="{{ asset('storage/' . \App\Models\CarImage::getPathAttribute(null))}}"
                            class="d-block w-100 h-100" style="object-fit: cover"
                            alt=""
                        />
                    </div>
                @else
                    @foreach($images as $image => $isActive)
                        @if($isActive)
                            <div class="carousel-item active h-100 w-100">
                                <img
                                    src="{{ asset('storage/' . $image) }}"
                                    class="d-block w-100 h-100" style="object-fit: cover"
                                    alt=""
                                />
                            </div>
                        @else
                            <div class="carousel-item h-100 w-100">
                                <img
                                    src="{{ asset('storage/' . $image) }}"
                                    class="d-block w-100 h-100" style="object-fit: cover"
                                    alt=""
                                />
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <button
                class="carousel-control-prev"
                data-mdb-target="#carousel_{{ $voiture->id }}"
                type="button"
                data-mdb-slide="prev"
                style="z-index: 999"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                data-mdb-target="#carousel_{{ $voiture->id }}"
                type="button"
                data-mdb-slide="next"
                style="z-index: 999"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-body">
            <div class="d-flex border-bottom pb-4 flex-nowrap justify-content-between align-items-center">
                <div>
                    <h5 class="h5 card-title fw-semibold m-0 text-nowrap">{{ $voiture->marque()}} {{ $voiture->modele() }}</h5>
                    <span class="small">
                        <img
                            class="me-2"
                            src="{{ asset('images/icons8-star.svg') }}"
                            alt=""
                        />4.2 (23)
                    </span>
                </div>
                <div class="p-3 border rounded-3">
                    <p class="h5 fw-semibold m-0 text-nowrap">{{ $voiture->prix }} DH</p>
                    <span class="small d-block text-center">par heure</span>
                </div>
            </div>
            <div class="d-flex flex-nowrap justify-content-end align-items-center gap-3 mt-4">
                <span role="button" class="pointer-event" style="z-index: 99">
                   <a href="{{ route('voitures.show', $voiture->id) }}" role="button" class="btn btn-secondary d-flex align-items-center gap-1">
                       <i class="bx bx-show" style="font-size: 18px"></i>
                       voir
                   </a>
                </span>
                @if($voiture->isRented)
                    <a
                        href="{{ route('reservations.create', $voiture->id) }}"
                        class="btn btn-light disabled rounded shadow-0 text-nowrap"
                        style="z-index: 999"
                    >
                        <img src="{{ asset('images/icons8-power.svg') }}" alt=""/>
                        Réservée
                    </a>
                @else
                    <a
                        href="{{ route('reservations.create', $voiture->id) }}"
                        class="btn rounded shadow-0 text-white text-nowrap"
                        style="background-color: #f86642; z-index: 99"
                    >
                        <img src="{{ asset('images/icons8-power.svg') }}" alt=""/>
                        Réserver
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
