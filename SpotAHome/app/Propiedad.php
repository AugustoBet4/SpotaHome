<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\AssignOp\Mul;

class Propiedad extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion', 'ciudad', 'zona', 'latitud', 'longitud', 'descripcion', 'costo', 'id_dueno', 'estadia_max'
    ];

    protected $table = "propiedad";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_propiedad";

    public function condiciones(){
        return $this->belongsToMany(Condicion::class);
    }

    public function fecha_disponibilidad(){
        return $this->hasMany(Fecha_Disponible::class);
    }

    public function dueno(){
        return $this->belongsTo(Dueno::class);
    }

    public function inquilino_favorito(){
        return $this->belongsToMany(Inquilino::class);
    }

    public function valoracion_inquilino_propiedad(){
        return $this->hasMany(Valoracion_Inquilino_Propiedad::class);
    }

    public function multimedia(){
        return $this->hasMany(Multimedia::class);

    }

    public function caracteristicas(){
        return $this->belongsToMany(Caracteristica::class);
    }

    public function alquiler(){
        return $this->hasMany(Alquiler::class);
    }

    public function verificacion_propiedad(){
        return $this->hasOne(Verificacion_Propiedad::class);
    }

    public function consulta(){
        return $this->hasMany(Consulta::class);
    }
}
