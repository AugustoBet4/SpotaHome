<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagos extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monto', 'comision',
    ];

    protected $table="pagos";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_pagos";

    public function factura_detalle(){
        return $this->belongsTo(Factura_Detalle::class);
    }

    public function khipu(){
        return $this->hasOne(Khipu::class);
    }

    public function alquiler(){
        return $this->belongsTo(Alquiler::class);
    }

}
