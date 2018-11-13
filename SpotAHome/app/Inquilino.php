<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Inquilino extends Authenticatable
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
        'contraseña',
    ];

    protected $table = "inquilino";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_inquilino";

    public function getAuthPassword() {
        return $this->contraseña;
    }

    public function valoracion_dueno_inquilino(){
        return $this->hasMany(Valoracion_Dueno_Inquilino::class);
    }

    public function alquiler(){
        return $this->hasMany(Alquiler::class);
    }

    public function inquilino_favorito(){
        return $this->belongsToMany(Propiedad::class);
    }

    public function valoracion_inquilino_propiedad(){
        return $this->hasMany(Valoracion_Inquilino_Propiedad::class);
    }

    public function consulta(){
        return $this->hasMany(Consulta::class);
    }

}
