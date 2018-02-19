<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['numplutil','numplnaoutil','valplutil','valplnaoutil','profissional_id','unidade_id','setor_id','parametro_id','dtpagamento'];

    public function profissional()
    {
        return $this->belongsTo('App\Profissional');
    }

    public function unidade()
    {
        return $this->belongsTo('App\Unidade');
    }

    public function setor()
    {
        return $this->belongsTo('App\Setor');
    }

    public function parametro()
    {
        return $this->belongsTo('App\Parametro');
    }
}
