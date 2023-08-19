{{-- Employee-Sidebar --}}
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="{{ route('users.index') }}" class="nav__link nav__logo">
                <span class="auto-rent">Auto Rent</span>
            </a>
            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Menu</h3>

                    <a href="{{ route('users.index', $user->id) }}" class="nav__link">
                        <i class="bx bx-home nav__icon"></i>
                        <span class="nav__name">Home</span>
                    </a>

                    <a href="{{ route('users.show', $user->id) }}" class="nav__link">
                        <i class="bx bx-user nav__icon"></i>
                        <span class="nav__name">Profile</span>
                    </a>

                    <a href="{{ route('password.edit', $user->id) }}" class="nav__link">
                        <i class="bx bx-cog nav__icon"></i>
                        <span class="nav__name">Changer mot de passe</span>
                    </a>

                    <a href="{{ route('users.notifications', $user->id) }}" class="nav__link">
                        <i class="bx bx-bell nav__icon"></i>
                        @if($user->getUnreadNotificationsNumber() > 0)
                            <span class="badge badge__nav rounded-pill badge-notification bg-danger">{{ $user->getUnreadNotificationsNumber() }}</span>
                        @endif
                        <span class="nav__name">Notifications</span>
                    </a>

                    <a href="{{ route('messages.index') }}" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">messages</span>
                    </a>

                </div>

                <div class="nav__items">
                    <h3 class="nav__subtitle">Agence</h3>

                    <div class="nav__dropdown">
                        <a href="{{ route('notifications.index') }}" class="nav__link">
                            <i class="bx bx-bell nav__icon"></i>
                            <span class="nav__name">Notifications</span>
                            <i
                                class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                            ></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="{{ route('notifications.create') }}" class="nav__dropdown-item">Ajouter notification</a>
                                <a href="{{ route('notifications.index') }}" class="nav__dropdown-item">Consulter les notifications</a>
                            </div>
                        </div>
                    </div>

                    <div class="nav__dropdown">
                        <a href="{{ route('voitures.index') }}" class="nav__link">
                            <i class="bx bx-car nav__icon"></i>
                            <span class="nav__name">Voitures</span>
                            <i
                                class="bx bx-chevron-down nav__icon nav__dropdown-icon"
                            ></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="{{ route('voitures.create') }}" class="nav__dropdown-item">Ajouter voiture</a>
                                <a href="{{ route('voitures.index') }}" class="nav__dropdown-item">Consulter les Voitures</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav__dropdown">
                        <a href="{{ route('marques.index') }}" class="nav__link">
                            <i class="bx bx-purchase-tag-alt nav__icon"></i>
                            <span class="nav__name">Marques</span>
                            <i class="bx bx-chevron-down nav__icon nav__dropdown-icon"></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="{{ route('marques.create') }}" class="nav__dropdown-item">Ajouter marque</a>
                                <a href="{{ route('marques.index') }}" class="nav__dropdown-item">Consulter les marques</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav__dropdown">
                        <a href="{{ route('modeles.index') }}" class="nav__link">
                            <i class="bx bx-cog nav__icon"></i>
                            <span class="nav__name">Modeles</span>
                            <i class="bx bx-chevron-down nav__icon nav__dropdown-icon"></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="{{ route('modeles.create') }}" class="nav__dropdown-item">Ajouter modele</a>
                                <a href="{{ route('modeles.index') }}" class="nav__dropdown-item">Consulter les modeles</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav__dropdown">
                        <a href="{{ route('carburants.index') }}" class="nav__link">
                            <i class="bx bx-gas-pump nav__icon"></i>
                            <span class="nav__name">Carburants</span>
                            <i class="bx bx-chevron-down nav__icon nav__dropdown-icon"></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="{{ route('carburants.create') }}" class="nav__dropdown-item">Ajouter carburant</a>
                                <a href="{{ route('carburants.index') }}" class="nav__dropdown-item">Consulter les carburant</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('reservations.index') }}" class="nav__link">
                        <i class="bx bx-line-chart nav__icon"></i>
                        <span class="nav__name">Reservations</span>
                    </a>

                    <a href="{{ route('clients.index') }}" class="nav__link">
                        <i class="bx bx-male-female nav__icon"></i>
                        <span class="nav__name">Clients</span>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('disconnect') }}" class="nav__link nav__logout">
            <i class="bx bx-log-out nav__icon"></i>
            <span class="nav__name">déconnecter</span>
        </a>
    </nav>
</div>
