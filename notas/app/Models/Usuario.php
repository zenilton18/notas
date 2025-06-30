<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    public function notas()
    {
        return $this->hasMany(Nota::class,  'id_usuario');
    }
}
