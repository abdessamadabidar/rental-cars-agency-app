<x-master title="Register">
    <section class="login-register-container">
        <img src="{{ asset('images/agadir.jpg') }}" alt="" class="bg-image ">
        <div class="container py-5 px-3 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #f86642"></i>
                                <span class="h1 auto-rent">Auto Rent</span>
                            </div>
                            <h5 class="lead mb-3 pb-3 text-center" style="letter-spacing: 1px">Merci de créer un compte</h5>
                            <form method="post" action="{{ route('create_user') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input
                                                type="text"
                                                id="firstName"
                                                class="form-control form-control-lg"
                                                name="first_name"
                                                value="{{ old('first_name') }}"
                                            />
                                            <label class="form-label" for="firstName">Prénom</label>
                                        </div>
                                        @error('first_name') <x-validation-error message="{{ $message }}" /> @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input
                                                type="text"
                                                id="lastName"
                                                class="form-control form-control-lg"
                                                name="last_name"
                                                value="{{ old('last_name') }}"
                                            />
                                            <label class="form-label" for="lastName">Nom</label>
                                        </div>
                                        @error('last_name') <x-validation-error message="{{ $message }}" /> @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="text"
                                            id="lastName"
                                            class="form-control form-control-lg"
                                            name="cin"
                                            value="{{ old('cin') }}"
                                        />
                                        <label class="form-label" for="lastName">CIN</label>
                                    </div>
                                    @error('cin') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="email"
                                            id="emailAddress"
                                            class="form-control form-control-lg"
                                            name="email"
                                            value="{{ old('email') }}"
                                        />
                                        <label class="form-label" for="emailAddress">Email</label>
                                    </div>
                                    @error('email') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control form-control-lg"
                                            name="password"
                                        />
                                        <label class="form-label" for="password">Mot de passe</label>
                                    </div>
                                    @error('password') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="password"
                                            id="passwordConfirmation"
                                            class="form-control form-control-lg"
                                            name="password_confirmation"
                                        />
                                        <label class="form-label" for="passwordConfirmation">Confirmer mot de passe</label>
                                    </div>
                                    @error('password_confirmation') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="tel"
                                            id="phoneNumber"
                                            class="form-control form-control-lg"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                        />
                                        <label class="form-label" for="phoneNumber">Téléphone</label>
                                    </div>
                                    @error('phone') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input
                                            type="text"
                                            id="adresse"
                                            class="form-control form-control-lg"
                                            name="address"
                                            value="{{ old('address') }}"
                                        />
                                        <label class="form-label" for="adresse">Adresse</label>
                                    </div>
                                    @error('address') <x-validation-error message="{{ $message }}" /> @enderror
                                </div>
                                <div class="pt-1">
                                    <button class="btn btn-color btn-lg btn-block text-white" type="submit">S'inscrire</button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <p class="small text-muted m-0 text-center">Avez-vous déjà un compte ? <a href="{{ route("login") }}">se connecter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>
