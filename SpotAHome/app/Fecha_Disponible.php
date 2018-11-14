<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fecha_Disponible extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_inicio', 'fecha_fin',
    ];

    protected $table = "fecha_disponibilidad";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_fecha_disponibilidad";

    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }
}
