<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Dueno extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'email', 'telefono', 'fecha_nacimiento','genero','nacionalidad','usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena',
    ];

    protected $table = "dueno";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_dueno';

    public function propiedad(){
        return $this->hasMany(Propiedad::class);
    }

    public function valoracion_dueno_inquilino(){
        return $this->hasMany(Valoracion_Dueno_Inquilino::class);
    }

}
