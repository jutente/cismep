<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $fillable  =  ['descricao','plutil','plnaoutil'];

    public function setPlutilAttribute($value)
    {
        $this->attributes['plutil'] = number_format($value, 2, '.', '');
       
    }

    public function setPlnaoutilAttribute($value)
    {
        $this->attributes['plnaoutil'] = number_format($value, 2, '.', '');
      
    }
}
