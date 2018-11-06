<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura_Cabecera extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','fecha','codigo_control','nit','autorizacion',
    ];

    protected $table="factura_cabecera";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_factura_cabecera";

    public function factura_detalle(){
        return $this->hasMany(Factura_Detalle::class);
    }


}
