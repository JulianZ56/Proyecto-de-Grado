<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Nacionalidad;
use App\Departamento;
use App\Ciudad;
use App\Comuna;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
{
    public function byDepartamento($id){

        return Departamento::where('idNacionalidad', $id)->get();
    }
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
        $ciudades = Ciudad::orderBy('id', 'asc')->paginate(5);
        $departamentos= Departamento::all();
  
        return view('Cruds.Ciudad.index',compact('ciudades', 'departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
        $departamentos= Departamento::all();
        $nacionalidades= Nacionalidad::all();

        return view('Cruds.Ciudad.create', compact('departamentos','nacionalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        Ciudad::create($request->all());
   
        return redirect()->route('superuser.ciudad-index')->with('success','Ciudad Creada Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Ciudad=Ciudad::find($id);
        $departamentos= Departamento::all();
        return view('Cruds.Ciudad.show',compact('Ciudad','departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Ciudad=Ciudad::find($id);    
        $departamentos= Departamento::all();
        $nacionalidades= Nacionalidad::all();
        return view('Cruds.Ciudad.edit',compact('Ciudad','departamentos','nacionalidades'));
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
        Ciudad::find($id)->update($request->all());
  
        return redirect()->route('superuser.ciudad-index')
                        ->with('info','Ciudad actualizada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_c)
    {
        $ciudad =Ciudad::where('id',$id_c)->firstOrFail();
        $comunas = DB::table('Comunas')->pluck('idCiudad');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_c)"." perteneciente a la Ciudad ".$ciudad->nombre." esta siendo referenciado en una o mas Comunas";
       
        foreach($comunas as $elemento){
         if ($elemento==$id_c)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.ciudad-index')->with('advertencia',$resultado);
         }else{
            $ciudad->delete();  
         return redirect()->route('superuser.ciudad-index')
                       ->with('danger','Ciudad Eliminada Satisfactoriamente');  
         } 
    }
}
