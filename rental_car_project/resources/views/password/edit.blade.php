<x-main title="Changer mot de passe" :user="$user">
    <div class="container">
        <section class="mt-3">
            @include('partials.error-alert')
            <div class="card testimonial-card shadow-0">
                <div class="alert alert-info">
                    <h6 class="small fw-semibold">Veuillez sécuriser votre compte</h6>
                    <ul class="list-group-flush m-0">
                        <li class="list-item m-0 p-0"><p class="small m-0 p-0">Vous allez recevoir un email de confirmation</p></li>
                        <li class="list-item m-0 p-0"><p class="small m-0 p-0">Veuillez confirmer votre modification cliquant sur le lien</p></li>
                        <li class="list-item m-0 p-0"><p class="small m-0 p-0">Photo doit être claire et ne dépasse pas 10MO</p></li>
                    </ul>
                </div>
                <div class="card-body px-md-5" style="height: 60vh">
                    <form method="post" action="{{ route('password.update', $user->id) }}" class="d-flex flex-column justify-content-between row-gap-4 h-100">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="form-outline ">
                                    <input
                                        type="password"
                                        id="currentPassword"
                                        class="form-control form-control-lg"
                                        name="current_password"
                                    />
                                    <label class="form-label" for="currentPassword">Mot de passe</label>
                                </div>
                                @error('current_password') <x-validation-error message="{{ $message }}" /> @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-outline">
                                    <input
                                        type="password"
                                        id="newPassword"
                                        class="form-control form-control-lg"
                                        name="new_password"
                                    />
                                    <label class="form-label" for="newPassword">Nouveau mot de passe</label>
                                </div>
                                @error('new_password') <x-validation-error message="{{ $message }}" /> @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-outline mb-4">
                                    <input
                                        type="password"
                                        id="ConfNewPassword"
                                        class="form-control form-control-lg"
                                        name="new_password_confirmation"
                                    />
                                    <label class="form-label" for="ConfNewPassword">Confirmer nouveau mot de passe</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="text-end">
                                <a href="{{ route('users.index') }}" role="button" class="btn annulerBtn shadow-0">Annuler</a>
                                <button type="submit" class="btn validBtn shadow-0">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-main>
