<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Propiedad extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion', 'ciudad', 'latitud', 'longitud', 'descripcion', 'costo',
    ];

    public function duenos(){
        return $this->hasMany('App\Duenos');
    }

    public function fecha_disponible(){
        return $this->hasMany('App\Fecha_Disponible');
    }

    protected $table = "propiedades";
}
