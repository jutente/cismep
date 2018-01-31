<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unidade;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = new Unidade;

        if (request()->has('unidade')){
            $unidades = $unidades->where('unidade', 'like', '%' . request('unidade') . '%');
        }

        $unidades = $unidades->orderby('unidade')->get();

        return view('unidade.index',compact('unidades')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unidade::create($request->all());

        Session::flash('create_unidade', 'unidade cadastrado com sucesso!');

        return redirect(route('unidade.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidade = unidade::findOrFail($id);
        
           return view('unidade.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidade = unidade::findOrFail($id);       
        
        return view('unidade.edit', compact('unidade'));
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
        $unidade = unidade::findOrFail($id);
            
        $unidade->update($request->all());
        
        Session::flash('edited_unidade', 'unidade alterado com sucesso!');

        return redirect(route('unidade.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unidade::findOrFail($id)->delete();
        
        Session::flash('deleted_unidade', 'unidade excluído com sucesso!');
        
        return redirect(route('unidade.index'));
    }
}