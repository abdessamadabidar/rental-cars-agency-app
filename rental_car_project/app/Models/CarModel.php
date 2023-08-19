<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class CarModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "modeles";
    protected $fillable = ['name', 'brand_id'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
