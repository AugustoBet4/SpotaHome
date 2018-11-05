<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'nombre', 'email', 'telefono', 'usuario', 'contraseña',
    ];
    /**
     * The attributeass that should be hidden for arrays.
     *


     */
    protected $hidden = [
        'contrasena',
    ];

    protected $dates = ['deleted_at'];
    protected $table = "empleado";
    protected $primaryKey  = "id_empleado";

}
