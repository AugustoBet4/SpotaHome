<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Valoracion_Dueno_Inquilino extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'puntuacion', 'comentario', 'id_inquilino', 'id_propiedad',
    ];

    protected $table = "valoracion_dueno_inquilino";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_valoracion_dueno_inquilino";

    public function dueno(){
        return $this->belongsTo(Dueno::class);
    }

    public function inquilino(){
        return $this->belongsTo(Inquilino::class);
    }
}
