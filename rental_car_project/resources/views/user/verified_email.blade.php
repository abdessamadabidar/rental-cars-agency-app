<x-master title="compte active">
    <section class="index-container">
        <div class="container">
            <div
                class="card  w-75 m-auto p-5 d-flex flex-column flex-nowrap justify-content-center align-items-center gap-4"
                style="font-family: 'Poppins', sans-serif;"
            >
                <h3>Compte Activé</h3>
                <img src="{{ asset('images/icons8-email.svg') }}" alt="" />
                <h5>Bonjour <span class="text-uppercase" style="color:#ff734f;">{{ $user->first_name }}</span></h5>
                <p style="text-align: center;">
                    Merci, votre email a été verifié, votre compte maintenant
                    est active. <br />
                    S'il vous plait utilisez le lien ci-dessous pour se
                    connecter à votre compte
                </p>
                <a
                    href="{{ route('login') }}"
                    role="button"
                    style="background-color: #ff734f; text-decoration: none;"
                    class="link-light py-3 px-4"
                >Se connecter à votre compte</a
                >
            </div>
        </div>
    </section>
</x-master>

