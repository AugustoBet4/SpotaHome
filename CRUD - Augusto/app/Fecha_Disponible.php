<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fecha_Disponible extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_inicio', 'fecha_fin','id_propiedades'
    ];

    protected $dates = ['deleted_at'];
    protected $table = "fecha_disponibles";
    protected $primaryKey  = "id_fecha_disponibles";
}
