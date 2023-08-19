<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "reservations";

    protected $fillable = [
        'date_debut',
        'date_fin',
        'permis_recto',
        'permis_verso',
        'total',
        'isExpired',
        'status_id',
        'car_id',
        'client_id',
    ];
}
