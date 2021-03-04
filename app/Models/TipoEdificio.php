<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEdificio extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    protected $table = "tipos_edificios";

    public function obra(){
        return $this->hasMany(Obra::class, "building_type");
    }
}
