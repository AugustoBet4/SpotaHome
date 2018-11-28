<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Multimedia extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_multimedias', 'uri', 'youtube',
    ];

    protected $table = "multimedia";
    protected $dates = ['deleted_at'];
    protected $primaryKey = "id_multimedia";

    public function propiedad(){
        return $this->belongsTo(Propiedad::class);
    }


}
