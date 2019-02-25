<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Solicitante;
use App\Ocupacion;
use App\TipoIdentificacion;
use App\Nacionalidad;
use App\Departamento;
use App\Ciudad;
use App\Comuna;
use App\Barrio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SolicitantesController extends Controller
{

    public function byBarrio($id){
        return Barrio::where('idComuna', $id)->get();
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
        $solicitantes = Solicitante::orderBy('id', 'asc')->paginate(5);
        $barrios= Barrio::all();
        $ocupaciones=Ocupacion::all();
        $tipoidentificaciones= TipoIdentificacion::all();
  
        return view('Cruds.Solicitante.index',compact('solicitantes','barrios','ocupaciones','tipoidentificaciones'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Solicitantes = Solicitante::all();        
        $ocupaciones=Ocupacion::all();
        $tipoidentificaciones= TipoIdentificacion::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos=Departamento::all();
        $ciudades= Ciudad::all();
        $comunas=Comuna::all();
        $barrios= Barrio::all();
        
        return view('Cruds.Solicitante.create', compact('Solicitantes','ocupaciones','tipoidentificaciones','nacionalidades','departamentos','ciudades','comunas','barrios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitante = new Solicitante;
        $solicitante->idIdentificacion = $request->input('idIdentificacion');
        $solicitante->idOcupacion=$request->input('idOcupacion');
        $solicitante->idBarrio=$request->input('idBarrio');
        $solicitante->nombreSolicitante=$request->input('nombreSolicitante');
        $solicitante->apellido=$request->input('apellido');
        $solicitante->tipoPersona=$request->input('tipoPersona');
        $solicitante->numeroIdentificacion=$request->input('numeroIdentificacion');
        $solicitante->celular=$request->input('celular');
        $solicitante->telefono=$request->input('telefono');
        $solicitante->estrato=$request->input('estrato');
        $solicitante->vivienda=$request->input('vivienda');
        $solicitante->genero=$request->input('genero');
        $solicitante->estadoCivil=$request->input('estadoCivil');
        $solicitante->eps=$request->input('eps');
        $solicitante->email=$request->input('email');
        $solicitante->password = bcrypt($request->input('password'));
        $solicitante->save();
   
        return redirect()->route('superuser.solicitantes-index')->with('success','Solicitante Creado Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Solicitante=Solicitante::find($id);
        return view('Cruds.Solicitante.show',compact('Solicitante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Solicitante=Solicitante::find($id); 
        $ocupaciones=Ocupacion::all();
        $tipoidentificaciones= TipoIdentificacion::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos=Departamento::all();
        $ciudades= Ciudad::all();
        $comunas=Comuna::all();
        $barrios= Barrio::all();   
        
        return view('Cruds.Solicitante.edit',compact('Solicitante','ocupaciones','tipoidentificaciones','nacionalidades','departamentos','ciudades','comunas','barrios'));
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
        Solicitante::find($id)->update($request->all());

        return redirect()->route('superuser.solicitantes-index')
                        ->with('info','Solicitante actualizado Satisfactoriamente');
    }

    public function editpass(Request $request,$id)
    {

        $request->validate([
            'password' => 'required',
        ]);

        Solicitante::find($id)->update([
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()->route('superuser.solicitantes-index')
                        ->with('info','Contraseña actualizada Satisfactoriamente');
        
    }
    public function updatepass(Request $request, $id){

        $request->validate([
            'password' => 'required',
        ]);

        Solicitante::find($id)->update([
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()->route('superuser.solicitantes-index')
                        ->with('info','Contraseña actualizada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_so)
    {
        $solicitante =Solicitante::where('id',$id_so)->firstOrFail();
        $tramite = DB::table('Tramites')->pluck('idSolicitante');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_so)"." perteneciente al Solicitante esta siendo referenciado en uno o mas Tramites";
       
        foreach($tramite as $elemento){
         if ($elemento==$id_so)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.solicitantes-index')->with('advertencia',$resultado);
         }else{
             $solicitante->delete();
         return redirect()->route('superuser.solicitantes-index')
                       ->with('danger','Solicitante Eliminado Satisfactoriamente');  
         }
    }
}
