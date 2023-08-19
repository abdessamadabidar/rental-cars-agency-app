<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'modele_id',
        'matricule',
        'puissance',
        'kilometrage',
        'couleur',
        'nbr_de_places',
        'prix',
        'boite_vitesse',
    ];


    public function marque() {
        return DB::table('marques')->where('id', function ($query)
        { $query->select('brand_id')->from('modeles')->where('id', $this->modele_id);})->value('name');
    }

    public function modele() {
        return DB::table('modeles')->where('id', $this->modele_id)->value('name');
    }

    public function images() {
        $images = DB::table('car_images')->where('car_id', $this->id)->pluck('path');
        if ($images->isEmpty()) return null;
        return $images;
    }
}
