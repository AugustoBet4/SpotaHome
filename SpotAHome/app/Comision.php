<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Comision extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_comisiones', 'porcentaje',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_TS', 'ts_usuario',
    ];

    protected $table = "comision";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_comision";

    public function factura_detalle(){
        return $this->hasMany(Factura_Detalle::class);
    }
}
