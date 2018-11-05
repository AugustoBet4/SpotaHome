<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Inquilino extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Problemas con el id
    protected $primaryKey = 'id_inquilinos';
    //pa que no se elimine jeje
    protected $dates = ['deleted_at'];
    protected $table = "inquilinos";

    //ya lo normalillo del modelo
    protected $fillable = [
        'id_inquilinos', 'nombre', 'email', 'telefono', 'fecha_nacimiento','genero','nacionalidad','usuario', 'contraseña'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña',
    ];
}
