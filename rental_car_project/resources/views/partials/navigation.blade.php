{{-- Navigation --}}
<nav class="navbar _navbar">
    <div class="sub-header">
        <a href="{{ route('home') }}">
            <h6 class="brand__name">Auto Rent</h6>
        </a>
        @guest()
            <ul class="list">
                <li class="list-group-item list-item">
                    <a class="link-dark fs-6" href="{{ route("register") }}">S'inscrire</a>
                </li>
                <li class="list-group-item list-item">
                    <a class="link-dark fs-6" href="{{ route("login") }}">Se connecter</a>
                </li>
                <li class="list-group-item list-item">
                    <a class="link-dark fs-6" href="{{ route("messages.create") }}">Contactez-nous</a>
                </li>
                <li class="list-group-item list-item">
                    <a class="link-dark fs-6" href="{{ route('about') }}">À propos de nous</a>
                </li>
            </ul>
        @endguest
        @auth()
            <x-name-image :user="$user" />
        @endauth
        @guest()
            <img
                id="menu-icon"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#collapseList"
                src="{{ asset('images/icons8-menu.svg') }}"
                alt=""
            />
        @endguest
    </div>
    @guest()
        <ul
            class="list-group list-group-flush collapse w-100 shadow-sm d-lg-none"
            id="collapseList"
        >
            <li class="list-group-item list-item">
                <a class="link-dark fs-6" href="{{ route("register") }}">S'inscrire</a>
            </li>
            <li class="list-group-item list-item">
                <a class="link-dark fs-6" href="{{ route("login") }}">Se connecter</a>
            </li>
            <li class="list-group-item list-item">
                <a class="link-dark fs-6" href="{{ route("messages.create") }}">Contactez-nous</a>
            </li>
            <li class="list-group-item list-item">
                <a class="link-dark fs-6" href="{{ route('about') }}">À propos de nous</a>
            </li>
        </ul>
    @endguest
</nav>
