<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Client;
use App\Models\Fuel;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Password;
use App\Models\Reservation;
use App\Models\User;
use App\Policies\CarBrandPolicy;
use App\Policies\CarModelPolicy;
use App\Policies\CarPolicy;
use App\Policies\ClientPolicy;
use App\Policies\FuelPolicy;
use App\Policies\MessagePolicy;
use App\Policies\NotificationPolicy;
use App\Policies\PasswordPolicy;
use App\Policies\ReservationPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Car::class => CarPolicy::class,
        Reservation::class => ReservationPolicy::class,
        Notification::class => NotificationPolicy::class,
        Message::class => MessagePolicy::class,
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
        CarBrand::class => CarBrandPolicy::class,
        CarModel::class => CarModelPolicy::class,
        Fuel::class => FuelPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
