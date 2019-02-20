<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\CatalogoTramite;
use App\Solicitante;
use App\Empleado;
use App\Dependencia;
use App\Tramite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramitesController extends Controller
{
    public function byCatalogo($id){

        return CatalogoTramite::where('idDependencia', $id)->get();
    }
    public function byEmpleado($id){

        return Empleado::where('idDependencia', $id)->get();
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
        $tramites = Tramite::orderBy('id', 'asc')->paginate(5);
        $catalogos= CatalogoTramite::all();

        return view('Cruds.Tramite.index',compact('tramites', 'catalogos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitantes= Solicitante::all();
        $catalogos= CatalogoTramite::all();
        $empleados= Empleado::all();
        $dependencias= Dependencia::all();
        return view('Cruds.Tramite.create', compact('solicitantes','catalogos','empleados','dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tramite::create($request->all());
   
        return redirect()->route('superuser.tramites-index')->with('success','Tramite Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tramite=Tramite::find($id);
        $Dependencias= Dependencia::all();

        $encontrado=false;
            if($Tramite->idEmpleado == null){
                $encontrado=true;
            }
        return view('Cruds.Tramite.show',compact('Tramite','Dependencias','encontrado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tramite=Tramite::find($id);
        $solicitantes= Solicitante::all();   
        $catalogos= CatalogoTramite::all();
        $empleados= Empleado::all();
        $dependencias= Dependencia::all();

        $encontrado=false;
            if($Tramite->idEmpleado == null){
                $encontrado=true;
            }
        return view('Cruds.Tramite.edit', compact('Tramite','solicitantes','catalogos','empleados','dependencias','encontrado'));
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
        Tramite::find($id)->update($request->all());
  
        return redirect()->route('superuser.tramites-index')
                        ->with('info','Tramite actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tr)
    {
        $tramites =Tramite::where('id',$id_tr)->firstOrFail();
        $seguimiento = DB::table('Seguimientos')->pluck('idTramite');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_tr)"." perteneciente al Tramite se le esta realizando un Seguimiento";
       
        foreach($seguimiento as $elemento){
         if ($elemento==$id_tr)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.tramites-index')->with('advertencia',$resultado);
         }else{
            $tramites->delete();
         return redirect()->route('superuser.tramites-index')
                       ->with('danger','Tramite Eliminado Satisfactoriamente');  
         }
    }
}
