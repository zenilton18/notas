<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function notas()
    {
        return $this->hasMany(Nota::class,  'id_usuario');
    }
}
