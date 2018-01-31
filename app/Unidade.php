<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['unidade'];

    public function setUnidadeAttribute($value)
    {
        $this->attributes['unidade'] = mb_strtoupper($value);
    }
}
