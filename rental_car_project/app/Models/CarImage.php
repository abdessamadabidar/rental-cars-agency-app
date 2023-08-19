<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;


    protected $fillable = ['path', 'car_id'];

    public static function getPathAttribute($value)
    {
        return $value ?? "cars/default_image.png";
    }

}
