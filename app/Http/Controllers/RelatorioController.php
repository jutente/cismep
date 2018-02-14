<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setor;
use App\Unidade;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class RelatorioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
     
      $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
      $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
     
      
      return view('relatorio.relatorio', compact('unidades', 'setors'));
    }
}
