<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Valoracion_Inquilino_Propiedad extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'puntuacion', 'comentario',
    ];

    protected $table = "valoracion_inquilino_propiedad";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_valoracion_inquilino_propiedad";

    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }

    public function inquilino(){
        return $this->belongsTo(Inquilino::class);
    }
}
