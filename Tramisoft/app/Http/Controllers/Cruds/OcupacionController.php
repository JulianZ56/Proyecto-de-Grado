<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Ocupacion;
use App\Solicitante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OcupacionController extends Controller
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
        $ocupaciones = Ocupacion::orderBy('id', 'asc')->paginate(5);
  
        return view('Cruds.Ocupacion.index',compact('ocupaciones'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.Ocupacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ocupacion::create($request->all());
   
        return redirect()->route('superuser.ocupacion-index')->with('success','Ocupacion Creada Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Ocupacion=Ocupacion::find($id);
        return view('Cruds.Ocupacion.show',compact('Ocupacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Ocupacion=Ocupacion::find($id);
        return view('Cruds.Ocupacion.edit',compact('Ocupacion'));
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
        Ocupacion::find($id)->update($request->all());
  
        return redirect()->route('superuser.ocupacion-index')
                        ->with('info','Ocupacion actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ocu)
    {
        $ocupacion =Ocupacion::where('id',$id_ocu)->firstOrFail();
        $solicitantes = DB::table('Solicitantes')->pluck('idOcupacion');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_ocu)"." perteneciente a la Ocupacion ".$ocupacion->nombre." esta siendo referenciado en uno o mas Solicitantes";
       
        foreach($solicitantes as $elemento){
         if ($elemento==$id_ocu)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.ocupacion-index')->with('advertencia',$resultado);
         }else{
             $ocupacion->delete();
         return redirect()->route('superuser.ocupacion-index')
                       ->with('danger','Ocupacion Eliminada Satisfactoriamente');  
         }
    }
}
