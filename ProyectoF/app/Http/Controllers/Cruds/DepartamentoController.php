<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Departamento;
use App\Nacionalidad;
use App\Ciudad;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:superuser');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::orderBy('id', 'asc')->paginate(5);
        $nacionalidades= Nacionalidad::all();
  
        return view('Cruds.Departamento.index',compact('departamentos', 'nacionalidades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidades= Nacionalidad::all();
        return view('Cruds.Departamento.create', compact('nacionalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Departamento::create($request->all());
   
        return redirect()->route('superuser.departamento-index')->with('success','Departamento Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento
     * @param  \App\Nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Departamento=Departamento::find($id);
        $nacionalidades= Nacionalidad::all();
        return view('Cruds.Departamento.show',compact('Departamento','nacionalidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Departamento=Departamento::find($id);
        $nacionalidades= Nacionalidad::all();
        return view('Cruds.Departamento.edit',compact('Departamento','nacionalidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
        Departamento::find($id)->update($request->all());
  
        return redirect()->route('superuser.departamento-index')
                        ->with('info','Departamento actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dep)
    {
        $departamento =Departamento::where('id',$id_dep)->firstOrFail();
        $ciudades = DB::table('ciudads')->pluck('idDepartamento');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_dep)"." perteneciente al Departamento ".$departamento->nombre." esta siendo referenciado en una o mas Ciudades";
       
        foreach($ciudades as $elemento){
         if ($elemento==$id_dep)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.departamento-index')->with('advertencia',$resultado);
         }else{
             $departamento->delete();  
         return redirect()->route('superuser.departamento-index')
                       ->with('danger','Departamento Eliminado Satisfactoriamente');  
         } 
    }
}
