<x-master title="compte active">
    <section class="login-register-container">
        <img src="{{ asset('images/agadir.jpg') }}" alt="" class="bg-image">
        <div class="container">
            <div
                class="card  w-75 m-auto p-5 d-flex flex-column flex-nowrap justify-content-center align-items-center gap-4"
                style="font-family: 'Poppins', sans-serif;"
            >
                <h3>Compte déja Activé</h3>
                <img src="{{ asset('images/icons8-email.svg') }}" alt="" />
                <h5>Bonjour <span class="text-uppercase" style="color:#ff734f;">{{ $user->first_name }}</span></h5>
                <p style="text-align: center;">
                    votre email a ete deja verifie. <br />
                    S'il vous plait utilisez le lien ci dessous pour se
                    connecter a votre compte
                </p>
                <a
                    href="{{ route('login') }}"
                    role="button"
                    style="background-color: #ff734f; text-decoration: none;"
                    class="link-light py-3 px-4"
                >Se connecter a votre compte</a
                >
            </div>
        </div>
    </section>
</x-master>

