<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagamento;
use App\Setor;
use App\Unidade;
use App\pagamento;
use App\Parametro;

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
        if (request()->has('pagamento_id')){
            $pagamentos = $pagamentos->where('pagamento_id', '=', request('pagamento_id'));
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
      $pagamentos = $pagamentos->orderby('pagamento_id')->get();  
      
      $pagamentos =  pagamento::orderBy('nome')->pluck('nome', 'id');
      $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
      $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
      $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id'); 
    
      return view('pagamento.index', compact('pagamentos', 'pagamentos', 'unidades', 'setors', 'parametros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagamentos =  pagamento::orderBy('nome')->pluck('nome', 'id');
        $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
        $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
        $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id'); 

        return view('pagamento.create', compact('pagamentos', 'unidades', 'setors', 'parametros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Pagamento::create($request->all() + ['valplutil' => $vl]);

        Session::flash('create_pagamento', 'pagamento cadastrado com sucesso!');

        return redirect(route('pagamento.index'));
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
        $pagamento = Pagamento::findOrFail($id);     
        
        $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
        $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
        $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id');
        
        return view('pagamento.edit', compact('pagamento', 'unidades', 'setors', 'parametros'));
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
        $pagamento = Pagamento::findOrFail($id);
            
        $pagamento->update($request->all());
        
        Session::flash('edited_pagamento', 'pagamento alterado com sucesso!');

        return redirect(route('pagamento.edit', $id));
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
