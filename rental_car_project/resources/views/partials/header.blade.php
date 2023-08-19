{{-- HEADER --}}
<div class="header__container">
    <div class="img-notif gap-1">
        <div class="dropdown">
            <a
                role="button"
                id="dropdownMenuLink"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
            >
                <div class="rounded-circle" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/' . $user->image) }}" alt="" class="w-100 h-100 rounded-circle" style="object-fit: cover;"/>
                </div>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item dropdown__link" href="{{ route('users.show', $user->id) }}">
                        <i class="bx bx-user nav__icon"></i>
                        <span>Mon profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item dropdown__link" href="{{ route('password.edit', $user->id) }}">
                        <i class="bx bx-cog nav__icon"></i>
                        <span>Changer mot de passe</span>
                    </a>
                </li>
                <li class="">
                    <a class="dropdown-item dropdown__link" href="{{ route('disconnect') }}">
                        <i class="bx bx-log-out nav__icon"></i>
                        <span>Se déconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <a role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <span class="header__notification--icon">
                    <i class="bx bx-bell nav__icon bx-m"></i>
                    @if($user->getUnreadNotificationsNumber() > 0)
                        <span class="badge badge__header bg-danger badge-dot"></span>
                    @endif
                </span>
            </a>
            <ul class="dropdown-menu dropdown__notification">
                <li>
                    <div class="dropdown__notif-header">Notifications</div>
                </li>
                <li>
                    <a class="dropdown-item dropdown__link" href="{{ route('users.notifications', $user->id) }}">
                        <i class="bx bx-chevrons-right"></i>
                        <span class="small"
                        >Lire les notifications</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="header__search">
        <input
            type="search"
            placeholder="Search"
            class="header__input"
        />
        <i class="bx bx-search header__icon"></i>
    </div>

    <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
    </div>
</div>
