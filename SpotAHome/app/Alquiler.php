<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alquiler extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_alquiler', 'fecha_inicio', 'fecha_fin', 'id_propiedad', 'id_inquilino', 'updated_at'
    ];

    protected $table = "alquiler";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_alquiler";

    public function inquilino(){
        return $this->belongsTo(Inquilino::class);
    }

    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }

    public function pagos(){
        return $this->hasMany(Pagos::class);
    }

}
