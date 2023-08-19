<x-master title="About" :user="$user">
    <div class="container-fluid p-0 d-flex flex-column flex-nowrap">
        <section class="vh-50 shadow-5-soft">
            <div class="row h-100">
                <div
                    class="col-12 col-md-6 mt-4 px-md-4 d-flex flex-column flex-nowrap align-items-center justify-content-center"
                >
                    <h2 class="h2 qui-somme-nous mb-2">
                        Qui sommes-nous ?
                    </h2>
                    <p class="lead text-center px-3 fs-5">
                        Nous sommes Auto Rent, l'endroit où vous pouvez louer de super voitures. Nous avons différentes voitures, des moins chères aux plus chouettes. C'est simple de réserver en ligne et nous sommes là si vous avez des questions. Notre équipe veut s'assurer que vous êtes content à chaque fois que vous conduisez avec nous. On est là pour vous rendre la vie plus facile quand vous avez besoin d'une voiture.
                    </p>
                </div>
                <div
                    class="col-12 col-md-6 d-flex align-items-center justify-content-center"
                >
                    <div class="about-img-container">
                        <img
                            class="w-100"
                            src="images/business-3d-confused-businessman-with-a-phone-asks-what.png"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <div class="row py-4 d-flex justify-content-evenly">
                <div
                    class="col-12 col-md-2 d-flex flex-column align-items-center justify-content-center flex-nowrap mb-5"
                >
                    <h3 class="h3 fs-3 fw-semibold">+20k</h3>
                    <span class="fs-6 text-center">Clients</span>
                </div>
                <div
                    class="col-12 col-md-2 d-flex flex-column align-items-center justify-content-center flex-nowrap mb-5"
                >
                    <h3 class="h3 fs-3 fw-semibold">+65k</h3>
                    <span class="fs-6 text-center">Locations</span>
                </div>
                <div
                    class="col-12 col-md-2 d-flex flex-column align-items-center justify-content-center flex-nowrap mb-5"
                >
                    <h3 class="h3 fs-3 fw-semibold">+1500</h3>
                    <span class="fs-6 text-center">Voitures</span>
                </div>
                <div
                    class="col-12 col-md-2 d-flex flex-column align-items-center justify-content-center flex-nowrap mb-5"
                >
                    <h3 class="h3 fs-3 fw-semibold">24h/24</h3>
                    <span class="fs-6 text-center"
                    >Assistance client</span
                    >
                </div>
            </div>
        </section>

        <section class="border-top border-bottom">
            <div class="row p-0 m-0 w-100">
                <div
                    class="col-12 col-md-6 p-0 d-flex flex-column align-items-center"
                >
                    <div class="phone-1 shadow-5-soft mb-5">
                        <div
                            class="phone-11 border border-top-0 bg-light"
                        >
                            <img
                                class="w-100 h-100 object-fit-cover"
                                src="{{ asset('images/license.jpg') }}"
                                alt=""
                            />
                        </div>
                    </div>
                    <div class="txt px-5">
                        <h4 class="fw-semibold text-nowrap">
                            Pas de rencontre ? Pas de soucis
                        </h4>
                        <p class="lead fs-6 m-0">
                            Pas besoin de vous rencontrer en personne,
                            et vos données sont bien protégées avec nous.
                        </p>
                    </div>
                </div>
                <span class="line my-5 d-md-none"></span>
                <div
                    class="col-12 col-md-6 p-0 d-flex flex-column align-items-center"
                >
                    <div class="txt mt-md-5 px-5">
                        <h4 class="fw-semibold text-nowrap">
                            Obtenez votre contrat
                        </h4>
                        <p class="lead fs-6 m-0">
                            Nous pouvons vous fournir votre contrat de location apres que la reservation est acceptée.
                            Veuillez nous fournir vos informations correctes.
                        </p>
                    </div>
                    <div
                        class="phone-1 shadow-5-soft mt-5 fa-rotate-180"
                    >
                        <div
                            class="phone-11 border border-top-0 bg-light"
                        >
                            <img
                                class="w-100 h-100 object-fit-cover fa-rotate-180"
                                src="{{ asset('images/contract.jpg') }}"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5 px-md-5 px-4">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div
                                class="d-flex justify-content-center mb-4"
                                style="width: 100px; height: 100px; margin: auto"
                            >
                                <img
                                    src="{{ asset('images/peter-jones.jpeg') }}"
                                    class="rounded-circle shadow-1-strong"
                                    style="width:100%; height: 100%; object-fit: cover"
                                    alt=""
                                />
                            </div>
                            <h5 class="font-weight-bold">Adam Smith</h5>

                            <ul
                                class="list-unstyled d-flex justify-content-center"
                            >
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star-half' style="color: #ff734f"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i
                                >Super service de location ! Voiture propre et en parfait état. Réservation facile en ligne. Je recommande !
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div
                                class="d-flex justify-content-center mb-4"
                                style="width: 100px; height: 100px; margin: auto"
                            >
                                <img
                                    src="{{ asset('images/anna-johnson.jpeg') }}"
                                    class="rounded-circle shadow-1-strong"
                                    style="width:100%; height: 100%; object-fit: cover"
                                    alt=""
                                />
                            </div>
                            <h5 class="font-weight-bold">
                                Marie Robert
                            </h5>

                            <ul
                                class="list-unstyled d-flex justify-content-center"
                            >
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i
                                >Expérience géniale avec Auto Rent. Voiture livrée à temps, personnel amical et tarifs compétitifs. À refaire !
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div
                                class="d-flex justify-content-center mb-4"
                                style="width: 100px; height: 100px; margin: auto"
                            >
                                <img
                                    src="{{ asset('images/bill-anderson.jpeg') }}"
                                    class="rounded-circle shadow-1-strong"
                                    style="width:100%; height: 100%; object-fit: cover"
                                    alt=""
                                />
                            </div>
                            <h5 class="font-weight-bold">
                                kylian Dubois
                            </h5>

                            <ul
                                class="list-unstyled d-flex justify-content-center"
                            >
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bxs-star' style="color: #ff734f"></i>
                                </li>
                                <li>
                                    <i class='bx bx-star' style="color: #ff734f"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>
                                Location sans tracas. Voiture confortable pour notre voyage en famille. Merci à l'équipe d'Auto Rent !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-master>
