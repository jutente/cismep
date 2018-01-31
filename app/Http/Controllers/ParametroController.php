<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Parametro;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class ParametroController extends Controller
{
    public function index()
    {
        $parametros = new Parametro;

        if (request()->has('descricao')){
            $parametros = $parametros->where('descricao', 'like', '%' . request('descricao') . '%');
        }

        $parametros = $parametros->orderby('descricao')->get();

        return view('parametro.index',compact('parametros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        parametro::create($request->all());

        Session::flash('create_parametro', 'parametro cadastrado com sucesso!');

        return redirect(route('parametro.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametro = parametro::findOrFail($id);
        
           return view('parametro.show', compact('parametro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametro = parametro::findOrFail($id);       
        
        return view('parametro.edit', compact('parametro'));
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
        $parametro = parametro::findOrFail($id);
            
        $parametro->update($request->all());
        
        Session::flash('edited_parametro', 'parametro alterado com sucesso!');

        return redirect(route('parametro.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        parametro::findOrFail($id)->delete();
        
        Session::flash('deleted_parametro', 'parametro excluído com sucesso!');
        
        return redirect(route('parametro.index'));
    }
}
