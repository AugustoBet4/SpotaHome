<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'email', 'telefono', 'usuario', 'contrasena',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena',
    ];

    protected $table = "empleado";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_empleado';

    public function verificacion_propiedad(){
        return $this->hasMany(Verificacion_Propiedad::class);
    }

    public function TS(){
        return $this->hasMany(TS::class);
    }

}
