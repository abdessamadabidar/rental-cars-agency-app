<x-master title="Login" xmlns="http://www.w3.org/1999/html">
    <section class="index-container">
        <div class="container  py-5">
            <div class="row d-flex justify-content-center align-items-center px-2">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-flex align-items-center">
                                <img
                                    src="{{ asset('images/login.svg') }}"
                                    alt="login form"
                                    class="ms-2"
                                    style="border-radius: 1rem 0 0 1rem;"
                                />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('connect') }}" method="post">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #f86642"></i>
                                            <span class="h1 auto-rent">Auto Rent</span>
                                        </div>
                                        <h5 class="lead mb-3 pb-3" style="letter-spacing: 1px"> Veuillez s'authentifier à votre compte</h5>
                                        <div class="mb-4">
                                            <div class="form-outline">
                                                <input
                                                    type="email"
                                                    id="email"
                                                    class="form-control form-control-lg"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                />
                                                <label class="form-label" for="email">Addresse email</label>
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
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-color btn-lg btn-block text-white" type="submit">Se connecter</button>
                                        </div>
                                    </form>
                                    <button
                                        class="btn small text-muted text-center w-100 shadow-0"
                                        type="button"
                                        data-mdb-toggle="modal"
                                        data-mdb-target="#resetPasswordModal">
                                        Oublier mot de passe ?
                                    </button>
                                    <x-reset-password />
                                    <p class="small mt-4 pb-lg-2 text-muted">
                                        Avez-vous un compte ?
                                        <a href="{{ route("register") }}">S'inscrire ici</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>
