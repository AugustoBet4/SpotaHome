<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alquiler extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_alquiler', 'fecha_inicio', 'fecha_fin',
    ];
    public function id_pagos(){

        return $this->hasMany('App\Pagos');

    }

}
