<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagamento;
use App\Setor;
use App\Unidade;
use App\Profissional;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamentos = new Pagamento;
           
       
        // filtros
        if (request()->has('profissional_id')){
            $pagamentos = $pagamentos->where('profissional_id', '=', request('profissional_id'));
        }

          if (request()->has('unidade_id')){
            if (request('unidade_id') != ""){
                $pagamentos = $pagamentos->where('unidade_id', '=', request('unidade_id'));
            }
        }

     if (request()->has('setor_id')){
            if (request('setor_id') != ""){
                $pagamentos = $pagamentos->where('setor_id', '=', request('setor_id'));
            }
        }
     
        // ordenando
      $pagamentos = $pagamentos->orderby('profissional_id')->get();  
      $profissionals =  Profissional::orderBy('nome')->pluck('nome', 'id');
      $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
      $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 

        return view('pagamento.index', compact('pagamentos', 'profissionals', 'unidades', 'setors')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profissionals =  Profissional::orderBy('nome')->pluck('nome', 'id');
        $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
        $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 

        return view('pagamento.create', compact('profissionals', 'unidades', 'setors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
