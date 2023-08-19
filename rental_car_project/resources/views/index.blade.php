<x-master title="Home" :user="$user">
    <div class="container-fluid main-container p-0">
        <section class="index-container shadow-5-soft">
            <img src="{{ asset('images/agadir.jpg') }}" alt="" class="bg-image-index">
            <div class="p-4 d-flex flex-column justify-content-center align-items-center">
                <h1 class="title">Louez une voiture<span class="colored-title">en quelques clics</span></h1>
                <h4 class="h4 subtitle">Déverrouillez-la 24h/24 avec l'appli et partez !</h4>
                @auth()
                    <a href="{{ route('users.index') }}" role="button" class="btn__search">Louer une voiture</a>
                @endauth
                @guest()
                    <a href="{{ route('navigate') }}" role="button" class="btn__search">Louer une voiture</a>
                @endguest
            </div>
        </section>
        <section class="section2-container p-0">
            <h4 class="h4 section-heading">Vos marques préférées</h4>
            <div class="marques_container mb-5">
               @foreach($marques as $marque)
                    <div class="d-flex  flex-nowrap gap-3 align-items-center">
                        <div class="img__marque shadow-sm">
                            <img src="{{ asset('storage/' . $marque->logo) }}" alt="" >
                        </div>
                        <span class="fw-semibold fs-5">{{ $marque->name }}</span>
                    </div>
               @endforeach
            </div>
            <h4 class="h4 section-heading">Des voitures adaptées à vos besoins</h4>
            <div class="row g-2 mb-5 justify-content-evenly">
                <div class="col-6 car-container">
                    <div class="card rounded-4">
                        <img
                            src="{{ asset('images/citadine.jpg') }}"
                            class="card-img-top "
                            alt=""
                        />
                        <div class="card-body py-3">
                            <h6 class="h6 text-center text-capitalize text-nowrap my-1 text-muted text-capitalize">citadine</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 car-container">
                    <div class="card rounded-4">
                        <img
                            src="{{ asset('images/utilitaire.jpg') }}"
                            class="card-img-top"
                            alt=""
                        />
                        <div class="card-body py-3">
                            <h6 class="h6 text-center text-capitalize text-nowrap my-1 text-muted text-capitalize">utilitaire</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 car-container">
                    <div class="card rounded-4">
                        <img
                            src="{{ asset('images/monospace.jpg') }}"
                            class="card-img-top"
                            alt=""
                        />
                        <div class="card-body py-3">
                            <h6 class="h6 text-center text-capitalize text-nowrap my-1 text-muted text-capitalize">monospace</h6>
                        </div>
                    </div>
                </div>
                <div class="col-6 car-container">
                    <div class="card rounded-4">
                        <img
                            src="{{ asset('images/suv.jpg') }}"
                            class="card-img-top"
                            alt=""
                        />
                        <div class="card-body py-3">
                            <h6 class="h6 text-center text-uppercase my-1 text-muted text-uppercase">suv</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section3-container bg-dark">
            <div class="image-container">
                <img src="{{ asset('images/getaround-usp-hero.jpg') }}" alt=""/>
            </div>
            <div class="text-container">
                <h3 class="h3 fs-3">
                    Voici la nouvelle manière de
                    <span class="colored-title">louer une voiture</span>
                </h3>
                <p class="lead fs-6">
                    Choisissez parmi des milliers de voitures
                    disponibles auprès de particuliers et professionnels
                    près de chez vous.
                </p>
                <div class="part my-4">
                    <img
                        class="my-3"
                        src="{{ asset('images/icons8-smile.svg') }}"
                        alt=""
                    />
                    <div>
                        <h3 class="h3 fs-5 my-3">
                            Des prix par heure ou par jour
                        </h3>
                        <p class="lead fs-6">
                            Vous
                            pouvez même ajouter des conducteurs
                            additionnels sans frais supplémentaires.
                        </p>
                    </div>
                </div>
                <div class="part my-4">
                    <img
                        class="my-3"
                        src="{{ asset('images/icons8-time.svg') }}"
                        alt=""
                    />
                    <div>
                        <h3 class="h3 fs-5 my-3">
                            Pas d’agence, pas d’attente
                        </h3>
                        <p class="lead fs-6">
                            Réservez une voiture près de chez vous
                            instantanément, même à la dernière minute.
                            Pas de file d’attente. Pas de paperasse.
                        </p>
                    </div>
                </div>
                <div class="part my-4">
                    <img
                        class="my-3"
                        src="{{ asset('images/icons8-car.svg') }}"
                        alt=""
                    />
                    <div>
                        <h3 class="h3 fs-5 my-3">
                            Déverrouillez la voiture avec l’application
                        </h3>
                        <p class="lead fs-6">
                            Notre technologie sécurisée AutoRent
                            Connect vous permet d’effectuer l’inspection
                            de la voiture à l’aide de l’application. La
                            voiture s’ouvre. Les clés sont à
                            l’intérieur. Et c’est parti !
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div
                class="row mt-5 px-5 d-flex align-items-center justify-content-evenly row-gap-5"
            >
                <div class="col-12 text-center">
                    <h3 class="h3">
                        Comment louer une voiture chez
                        <span class="fst-italic" style="color: #f86642">Auto Rent</span>?
                    </h3>
                </div>
                <div
                    class="col-12 col-md-3 p-0 d-flex flex-column align-items-center justify-content-center"
                >
                    <div class="cercle-1 shadow-5-soft mb-5">
                        <div
                            class="cercle-11 border bg-light m-0"
                        >
                            <img src="{{ asset('images/icons8-choose.svg') }}" alt="">
                        </div>
                    </div>
                    <h5 class="h5 text-center">
                        Sélectionnez le véhicule de votre choix
                    </h5>
                    <p class="lead text-center fs-6 m-0 px-5 p-md-0">
                        Choisissez la voiture qui correspond le mieux à vos besoins et à votre style, puis cliquez sur réserver.
                    </p>
                </div>
                <div
                    class="col-12 col-md-3 p-0 d-flex flex-column align-items-center justify-content-center"
                >
                    <h5 class="h5 text-center">Signez le contrat et effectuez le paiement en espèces</h5>
                    <p class="lead text-center fs-6 m-0 px-5 p-md-0">
                        Vous recevrez une confirmation de réservation par e-mail.
                        Cette confirmation inclura le contrat contenant les détails de votre location.
                    </p>
                    <div
                        class="cercle-1 shadow-5-soft mb-5 mt-md-5 mb-md-0 reverse-order"
                    >
                        <div
                            class="cercle-11 border bg-light m-0 p-3"
                        >
                            <img src="{{ asset('images/icons8-contract.svg') }}" alt="" >
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-md-3 p-0 d-flex flex-column align-items-center justify-content-center"
                >
                    <div class="cercle-1 shadow-5-soft mb-5">
                        <div
                            class="cercle-11 border bg-light m-0 p-3"
                        >
                            <img src="{{ asset('images/icons8-lease.svg') }}" alt="" >
                        </div>
                    </div>
                    <h5 class="h5 text-center">Prenez vos clés et conduisez en toute liberté</h5>
                    <p class="lead text-center fs-6 m-0 px-5 p-md-0">
                        Après avoir finalisé le processus de location et pris possession de votre véhicule chez Auto Rent.
                        Vous êtes prêt à entamer votre voyage en toute liberté, à explorer les routes et les horizons à votre propre rythme.
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-master>
