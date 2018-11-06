<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caracteristica extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_caracteristicas', 'amueblado', 'estanteria', 'armario', 'ventana','calefaccion','patio','aire_acondicionado','deposito',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    protected $table = "caracteristicas";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_caracteristicas";

    public function propiedad(){
        return $this->belongsToMany(Propiedad::class);
    }
}
