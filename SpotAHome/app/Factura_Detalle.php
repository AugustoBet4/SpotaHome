<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura_Detalle extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_factura_detalles',
    ];

    protected $table="factura_detalle";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_factura_detalle";

    public function factura_cabecera(){
        return $this->belongsTo(Factura_Cabecera::class);
    }

    public function comision(){
        return $this->belongsTo(Comision::class);
    }

    public function pagos(){
        return $this->hasOne(Pagos::class);
    }


}
