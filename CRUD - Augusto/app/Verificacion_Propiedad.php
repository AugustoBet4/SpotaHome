<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Verificacion_Propiedad extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_verificacion_propiedades',
    ];
    public function id_propiedad(){

        return $this->hasOne('App\Propiedad');

    }
    public function id_empleado(){

        return $this->hasMany('App\Empleado');

    }
protected $table="verificacion_propiedades";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];*/
}
