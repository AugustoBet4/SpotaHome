<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Factura_Detalle extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_factura_detalles',
    ];
    public function id_factura_cabecera(){

        return $this->hasMany('App\Factura_Cabecera');

    }
    public function id_comision(){

        return $this->hasMany('App\Comision');

    }
    public function id_pagos(){

        return $this->hasOne('App\Pagos');

    }
    protected $table="factura_detalles";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/
}
