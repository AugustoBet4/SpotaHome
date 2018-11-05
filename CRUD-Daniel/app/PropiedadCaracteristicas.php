<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PropiedadCaracteristicas extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_propiedad_caracteristicas',
    ];

    public function propiedad()
    {
        return $this->hasMany('App\Propiedad');
    }
    public function caracteristicas()
    {
        return $this->hasMany('App\Caracteristicas');
    }
}
