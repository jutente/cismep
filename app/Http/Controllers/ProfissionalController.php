<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profissional;
use App\Unidade;
use App\Setor;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class ProfissionalController extends Controller
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
       $profs = new Profissional;

        // filtros
        if (request()->has('nome')){
            $profs = $profs->where('nome', 'like', '%' . request('nome') . '%');
        }

        $profs = $profs->orderby('nome')->paginate(15);

        return view('profissional.index',compact('profs')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::orderBy('unidade')->pluck('unidade', 'id');
        $setors = Setor::orderBy('setor')->pluck('setor', 'id');

        return view('profissional.create', compact('unidades','setors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Profissional::create($request->all());

        Session::flash('create_profissional', 'Profissional cadastrado com sucesso!');

        return redirect(route('profissional.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profissional = profissional::findOrFail($id);
        
           return view('profissional.show', compact('profissional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profissional = Profissional::findOrFail($id);       
        
        return view('profissional.edit', compact('profissional'));
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
        $profissional = Profissional::findOrFail($id);
            
        $profissional->update($request->all());
        
        Session::flash('edited_profissional', 'profissional alterado com sucesso!');

        return redirect(route('profissional.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profissional::findOrFail($id)->delete();
        
        Session::flash('deleted_profissional', 'profissional excluído com sucesso!');
        
        return redirect(route('profissional.index'));
    }
}
