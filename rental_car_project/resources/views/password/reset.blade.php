<x-master title="reinstaller le mot de passe">
    <section class="index-container">

        <div class="container">
            <div class="card w-50 mx-auto">
                <div class="card-header border-0">
                    <h6 class="brand__name mb-3">Auto Rent</h6>
                    <span class="lead">Veuillez entrer un nouveau mot de passe</span>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('password.reset', $user->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <div class="form-outline">
                                <input
                                    type="password"
                                    id="newPassword"
                                    class="form-control"
                                    name="new_password"
                                />
                                <label class="form-label" for="newPassword"
                                >Nouveau mot de passe</label>
                            </div>
                            @error('new_password') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input
                                type="password"
                                id="newPasswordConf"
                                class="form-control"
                                name="new_password_confirmation"
                            />
                            <label class="form-label" for="newPasswordConf">Confirmer mot de passe</label>
                        </div>
                        <input type="password" name="current_password" value="{{ $user->password }}" hidden />

                        <!-- Submit button -->
                        <button
                            type="submit"
                            class="btn validBtn btn-block shadow-0 mb-4"
                        >
                            confirmer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-master>
