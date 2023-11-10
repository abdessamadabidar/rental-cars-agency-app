{{-- Client-Sidebar --}}
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="{{ route('home') }}" class="nav__link nav__logo">
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

                    <a href="{{ route('clients.reservations', $user->id) }}" class="nav__link">
                        <i class="bx bx-time-five nav__icon"></i>
                        <span class="nav__name">Réservations</span>
                    </a>

                    <a href="{{ route('client.messages', $user->id) }}" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">messages</span>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('disconnect') }}" class="nav__link nav__logout">
            <i class="bx bx-log-out nav__icon"></i>
            <span class="nav__name">Se déconnecter</span>
        </a>
    </nav>
</div>
