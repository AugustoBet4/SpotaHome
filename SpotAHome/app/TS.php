<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TS extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idTS','fecha'
    ];

    protected $table = "TS";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_TS';

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
