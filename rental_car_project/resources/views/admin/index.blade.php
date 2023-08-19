<x-main title="{{$user->first_name}} {{$user->last_name}}" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bxs-pie-chart-alt-2 nav__icon"></i>
                <h5 class="h5 m-0">Statistiques</h5>
            </div>
            <div class="statistics">
                <div class="statistics__element">
                    <div class="img--container">
                        <img src="{{ asset('images/icons8-total-sales.svg') }}" alt="" />
                    </div>
                    <div class="txt--container">
                        <h6>Revenu total <span>/ mois</span></h6>
                        <span>{{ $statistics['totalIncomePerMonth'] }} MAD</span>
                    </div>
                </div>
                <div class="statistics__element">
                    <div class="img--container">
                        <img src="{{ asset('images/icons8-car2.svg') }}" alt="" />
                    </div>
                    <div class="txt--container">
                        <h6>Voitures</h6>
                        <span>{{ $statistics['numberOfCars'] }}</span>
                    </div>
                </div>
                <div class="statistics__element">
                    <div class="img--container">
                        <img src="{{ asset('images/icons8-money.svg') }}" alt="" />
                    </div>
                    <div class="txt--container">
                        <h6>Revenu total <span>/ jour</span></h6>
                        <span>{{ $statistics['totalIncomePerDay']}} MAD</span>
                    </div>
                </div>
                <div class="statistics__element">
                    <div class="img--container">
                        <img src="{{ asset('images/icons8-reserve.svg') }}" alt="" />
                    </div>
                    <div class="txt--container">
                        <h6>Réservations</h6>
                        <span>{{ $statistics['numberOfReservations'] }}</span>
                    </div>
                </div>
                <div class="statistics__element">
                    <div class="img--container">
                        <img src="{{ asset('images/icons8-customers.svg') }}" alt="" />
                    </div>
                    <div class="txt--container">
                        <h6>Clients</h6>
                        <span>{{ $statistics['numberOfClients'] }}</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bxs-bar-chart-alt-2 nav__icon"></i>
                <h5 class="h5 m-0">Analyses</h5>
            </div>
            <div class="row g-2">
                <div class="col-12 col-lg-6">
                    <div class="analyse__reservations mb-4">
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="analyse__reservations mb-4">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="analyse__reservations mb-4">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="analyse__reservations">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-refresh nav__icon"></i>
                <h5 class="h5 m-0">Actualités</h5>
            </div>
            <div class="px-2">
                @if($actualities->isEmpty())
                    <div class="text-muted small text-center">Aucune actualité</div>
                @endif
                <ul class="list-group list-group-light">
                    @foreach($actualities as $actualitie)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $actualitie['title'] }}
                            <span class="small">{{$actualitie['created_at']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
    <x-total-income-this-month  />
    <x-registered-clients-this-month />
    <x-most-reserved-cars-this-month />
    <x-website-visits />

</x-main>
