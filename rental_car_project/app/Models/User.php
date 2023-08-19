<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'cin',
        'email',
        'password',
        'phone',
        'address',
        'role_id',
        'image',
        'email_verified_at'
    ];

    public static function getRole()
    {
        if (Auth::check()) {
            return DB::table('roles')->where('id', Auth::user()->role_id)->value('role');
        }
        return null;
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public static function getImageAttribute($value)
    {
        return $value ?? "Users/default_image.png";
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function getUnreadNotificationsNumber() : int
    {
        return Notification::where('isRead', false)->where('user_id', $this->id)->count();
    }

    public static function clients() {
        return User::where('role_id', function ($query) {
            $query->select('id')->from('roles')->where('role', "client");
        })->get();
    }

    public function isAdmin() {
        if ($this->role_id) {
            return Role::where("id", $this->role_id)->value("role") === "admin";
        }
        return false;

    }

    public function isClient() {
        if ($this->role_id) {
            return Role::where("id", $this->role_id)->value("role") === "client";
        }
        return false;
    }

    public function reservations() {
        return Reservation::where("client_id", $this->id)->get();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
