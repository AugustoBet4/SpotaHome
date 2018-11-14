<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'consulta', 'id_inquilino', 'id_dueno', 'id_propiedad', 'estado'
    ];

    protected $table = "consultas";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_consultas";

    public function dueno(){
        return $this->belongsTo(Dueno::class);
    }

    public function inquilino(){
        return $this->belongsTo(Inquilino::class);
    }

    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }
}
