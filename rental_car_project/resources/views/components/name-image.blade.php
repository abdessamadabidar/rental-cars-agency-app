<div class="d-flex align-items-center gap-2">
    <span>{{$user->first_name}} {{$user->last_name}}</span>
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
                <a class="dropdown-item dropdown__link" href="{{ route('users.index', $user->id) }}">
                    <i class="bx bx-user nav__icon"></i>
                    <span>Mon compte</span>
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
</div>
