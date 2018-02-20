<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
   protected $fillable = ['ano', 'mes'];

   public function setMesAttribute($value)
    {
        $this->attributes['mes'] = mb_strtoupper($value);
    }
}
