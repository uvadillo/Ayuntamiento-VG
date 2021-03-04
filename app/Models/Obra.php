<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
        "updated_at",
        "start_date",
        "end_date",
        "created_at",
        "updated_at"
    ];

    public function solicitante(){
        return $this->belongsTo(User::class, "requestor_id");
    }

    public function tipo_edificio(){
        return $this->belongsTo(TipoEdificio::class, "building_type");
    }

    public function tipo_obra(){
        return $this->belongsTo(TipoObra::class, "construction_type");
    }

    public function trabajador(){
        return $this->belongsTo(User::class, "worker_id");
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
