<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\PaginationServiceProvider;

class Khipu extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_khipus',
    ];
    public function id_pagos(){

        return $this->hasOne('App\Pagos');

    }

    protected $table="khipu";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_khipu";

    public function pagos(){
        return $this->belongsTo(Pagos::class);
    }

}
