<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pagos extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monto', 'comision',
    ];

    public function id_factura_detalles(){

        return $this->hasOne('App\Factura_Detalle');

    }
    public function id_khipus(){

        return $this->hasOne('App\Khipu');

    }

}
