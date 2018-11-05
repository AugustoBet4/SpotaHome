<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Inquilino_Favorito extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_inquilinos_favoritos',
    ];
    public function id_propiedad(){

        return $this->hasMany('App\Propiedad');

    }
    public function id_inquilino(){

        return $this->hasMany('App\Inquilino');

    }
protected $table="inquilinos_favoritos";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];*/
}
