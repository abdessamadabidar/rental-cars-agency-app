<x-master title="Contact" :user="$user">
    @auth()
    <div class="container-fluid vh-100">
        <div class="row px-4 py-5 p-md-5">
            <div class="col-12 col-md-5 mb-5 mt-0">
                <div class="contact">
                    <div class="d-flex flex-nowrap column-gap-3 align-items-center">
                        <h4 class="h4 text-uppercase fw-bold">contact</h4>
                        <div class="border-bottom w-100"></div>
                    </div>
                    <div class="part">
                        <img src="{{ asset('images/icons8-location.svg') }}" alt="" />
                        <div>
                            <h5 class="h5 fs-5 mb-2 text-capitalize">adresse</h5>
                            <p class="lead m-0 fs-6">
                                Ctre Ait Youssef Ou Ali 32003
                                Al-houceima
                            </p>
                        </div>
                    </div>
                    <div class="part">
                        <img src="{{ asset('images/icons8-whatsapp.svg') }}" alt="" />
                        <div>
                            <h5 class="h5 fs-5 mb-2 text-capitalize">whatsapp</h5>
                            <p class="lead m-0 fs-6">+212 6 08 32 44 77</p>
                        </div>
                    </div>
                    <div class="part">
                        <img src="{{ asset('images/icons8-phone.svg') }}" alt="" />
                        <div>
                            <h5 class="h5 fs-5 mb-2 text-capitalize">agence</h5>
                            <p class="lead m-0 fs-6">
                                +212 6 08 05 81 84 / +212 5 24 36 74 72
                            </p>
                        </div>
                    </div>
                    <div class="part">
                        <img src="{{ asset('images/icons8-mail.svg') }}" alt="" />
                        <div>
                            <h5 class="h5 fs-5 mb-2 text-capitalize">email</h5>
                            <p class="lead m-0 fs-6">abdessamad.abidar@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 px-md-4">
                <div class="contact">
                    <div class="d-flex flex-nowrap column-gap-3 align-items-center">
                        <h4 class="h4 text-uppercase fw-bold text-nowrap">contactez-nous</h4>
                        <div class="border-bottom w-100"></div>
                    </div>
                    <div>
                        <form method="post" action="{{ route('messages.store') }}">
                            @csrf
                            <!-- Subject input -->
                            <div class="mb-4">
                                <div class="form-outline">
                                    <input
                                        type="text"
                                        id="subject"
                                        class="form-control"
                                        name="subject"
                                        value="{{ old('subject') }}"
                                    />
                                    <label class="form-label" for="subject">Sujet</label>
                                </div>
                                @error('subject') <x-validation-error message="{{ $message }}" /> @enderror
                            </div>


                            <!-- Message input -->
                            <div class="mb-4">
                                <div class="form-outline">
                                    <textarea class="form-control" id="message" name="content" rows="4">{{ old('content') }}</textarea>
                                    <label class="form-label" for="message">Message</label>
                                </div>
                                @error('content') <x-validation-error message="{{ $message }}" /> @enderror
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn validBtn btn-block mb-4">envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @guest()
        <div class="vh-100 d-flex justify-content-center align-items-center bg-white">
            <div class="d-flex flex-column align-items-center">
                <p>Veuillez vous connecter pour nous contacter</p>
                <a href="{{ route("login") }}" role="btn" class="btn shadow-sm mb-3 btn-color text-white">Se connecter</a>
                <p class="text-muted">
                    Si vous n'avez pas un compte
                    <a href="{{ route("register") }}" class="link">s'inscrire</a>
                </p>
            </div>
        </div>
    @endguest

</x-master>
