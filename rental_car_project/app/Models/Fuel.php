<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "carburants";
    protected $fillable = ['type'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
