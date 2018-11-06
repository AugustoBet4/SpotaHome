<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condicion extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_condicion', 'mascotas_permitidas', 'apto_fumadores', 'apto_parejas', 'solo_estudiantes','solo_mujeres','solo_hombres',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    protected $table = "condicion";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_condiciones";

    public function propiedad(){
        return $this->belongsToMany(Propiedad::class);
    }
}
