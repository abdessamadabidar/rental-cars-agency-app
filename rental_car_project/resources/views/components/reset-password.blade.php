<div class="modal top fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel"
     aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content text-center">
            <div class="modal-header h5 text-white  justify-content-center" style="background-color: #ff734f">
                Réinitialiser votre mot de passe
            </div>
            <div class="modal-body px-5">
                <p class="py-2">
                    Entrer votre adresse e-mail pour confirmer ls réinitialisation de votre mot de passe
                </p>
                <form method="post" action="{{ route('password.confirm') }}" >
                    @csrf
                    <div class="form-outline">
                        <input type="email" id="typeEmail" name="email" class="form-control my-3" />
                        <label class="form-label" for="typeEmail">Adresse e-mail</label>
                    </div>
                    <button type="submit" class="btn w-100 text-white shadow-none" style="background-color: #ff734f">Réinitialiser votre mot de passe</button>
                </form>
                <div class="d-flex justify-content-around mt-4">
                    <a class="text-muted" href="{{ route('login') }}">se connecter</a>
                    <a class="text-muted" href="{{ route('register') }}">s'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>
