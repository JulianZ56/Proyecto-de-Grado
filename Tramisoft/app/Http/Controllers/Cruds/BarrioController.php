<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Nacionalidad;
use App\Departamento;
use App\Ciudad;
use App\Comuna;
use App\Barrio;
use App\Solicitante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarrioController extends Controller
{
    public function byComuna($id){

        return Comuna::where('idCiudad', $id)->get();
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
        $barrios = Barrio::orderBy('id', 'asc')->paginate(5);
        $comunas= Comuna::all();
  
        return view('Cruds.Barrio.index',compact('barrios', 'comunas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas= Comuna::all();
        $ciudades= Ciudad::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos= Departamento::all();
        $barrios=Barrio::all();
        return view('Cruds.Barrio.create', compact('comunas','ciudades','nacionalidades','departamentos','barrios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barrio::create($request->all());
   
        return redirect()->route('superuser.barrio-index')->with('success','Barrio Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Barrio=Barrio::find($id);
        $comunas= Comuna::all();
        return view('Cruds.Barrio.show',compact('Barrio','comunas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Barrio=Barrio::find($id);    
        $comunas= Comuna::all();
        $ciudades= Comuna::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos= Departamento::all();
        $barrios=Barrio::all();
        return view('Cruds.Barrio.edit',compact('Barrio','comunas', 'ciudades','nacionalidades','departamentos','barrios'));
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
        Barrio::find($id)->update($request->all());
  
        return redirect()->route('superuser.barrio-index')
                        ->with('info','Barrio actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ba)
    {
        $barrio =Barrio::where('id',$id_ba)->firstOrFail();
        $solicitantes = DB::table('Solicitantes')->pluck('idBarrio');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_ba)"." perteneciente al Barrio ".$barrio->nombre." esta siendo referenciado en uno o mas Solicitantes";
       
        foreach($solicitantes as $elemento){
         if ($elemento==$id_ba)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.barrio-index')->with('advertencia',$resultado);
         }else{
            $barrio->delete();
         return redirect()->route('superuser.barrio-index')
                       ->with('danger','Barrio Eliminado Satisfactoriamente');  
         }
    }
}
