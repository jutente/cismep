<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagamento;
use App\Setor;
use App\Unidade;
use App\Parametro;
use App\Profissional;
use App\Competencia;


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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

        if (request()->has('parametro_id')){
            if (request('parametro_id') != ""){
                $pagamentos = $pagamentos->where('parametro_id', '=', request('parametro_id'));
            }
        }

        if (request()->has('ano')){
            if (request('ano') != ""){
                $pagamentos = $pagamentos->where('ano', '=', request('ano'));
            }
        }

        if (request()->has('mes')){
            if (request('mes') != ""){
                $pagamentos = $pagamentos->where('mes', '=', request('mes'));
            }
        }
     
     
        // ordenando
      $pagamentos = $pagamentos->orderby('id')->paginate(15);  
      
      $profissionals =  Profissional::orderBy('nome')->pluck('nome', 'id');
      $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
      $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
      $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id'); 
     
    
      return view('pagamento.index', compact('pagamentos', 'profissionals', 'unidades', 'setors', 'parametros')); 
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
      $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id');
      $competencias = Competencia::find(1); 
     // dd($competencias);
        
      
      return view('pagamento.create', compact('profissionals', 'unidades', 'setors', 'parametros','competencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $parametro = parametro::findOrFail($request->parametro_id);        
        
        $vutil = ($parametro->plutil * $request->numplutil)/12;

        $vnaoutil = ($parametro->plnaoutil* $request->numplnaoutil)/12;

        Pagamento::create($request->all() + ['valplutil' => $vutil, 'valplnaoutil' => $vnaoutil]);

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
        $pagamento = Pagamento::findOrFail($id);
        
           return view('pagamento.show', compact('pagamento'));
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
        
        $profissionals =  Profissional::orderBy('nome')->pluck('nome', 'id');        
        $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
        $setors = Setor::orderBy('setor')->pluck('setor', 'id'); 
        $parametros = Parametro::orderBy('descricao')->pluck('descricao', 'id');
        $competencias = Competencia::find(1); 
        
        return view('pagamento.edit', compact('pagamento', 'profissionals', 'unidades', 'setors', 'parametros','competencias'));
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
             
        $parametro = Parametro::findOrFail($request->parametro_id);    
        
        $setor  = Setor::findOrfail($request->setor_id);

        $unidade  = Unidade::findOrfail($request->unidade_id);

        $profissional  = Profissional::findOrfail($request->profissional_id);
          

        $pagamento->valplutil = ($parametro->plutil * $request->numplutil)/12;
        $pagamento->valplnaoutil = ($parametro->plnaoutil* $request->numplnaoutil)/12;

        $pagamento->parametro_id = $parametro->id;
        $pagamento->setor_id = $setor->id;
        $pagamento->unidade_id = $unidade->id;
        $pagamento->profissional_id = $profissional->id;

        $pagamento->dtpagamento =  $request->dtpagamento;
        $pagamento->ano = $request->ano;
        $pagamento->mes = $request->mes;

        $pagamento->save();
        
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
        Pagamento::findOrFail($id)->delete();
        
        Session::flash('deleted_pagamento', 'pagamento excluído com sucesso!');
        
        return redirect(route('pagamento.index'));
    }
}
