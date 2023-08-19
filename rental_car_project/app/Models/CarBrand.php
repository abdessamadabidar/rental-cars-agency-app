<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "marques";
    protected $fillable = ['name', 'logo'];

    public function getRouteKeyName()
    {
        return 'id';

    }

    public function getLogoAttribute($value)
    {
        return $value ?? "brands/default_image.png";
    }

}
