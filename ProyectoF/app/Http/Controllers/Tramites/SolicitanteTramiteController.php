<?php

namespace App\Http\Controllers\Tramites;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Dependencia;
use App\Empleado;
use App\Seguimiento;
use App\Respuestaseguimiento;
use App\Tramite;
use App\CatalogoTramite;
use App\Solicitante;

class SolicitanteTramiteController extends Controller
{

    public function byDependencia($id){

        return CatalogoTramite::where('idDependencia', $id)->get();
    }

    public function __construct()
    {
        $this->middleware('auth:solicitante');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       $idE=auth()->user()->id;
       $tramites = Tramite::where('idSolicitante',$idE)->orderBy('id', 'asc')->paginate(5);
       $empleados= Empleado::all();
       $segui= Seguimiento::all();
  
        return view('Cruds-solicitante.Tramites-Solicitante.index',compact('tramites', 'empleados', 'segui'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    
    public function show($id){
   
        $crear=Seguimiento::where('idTramite',$id)->value('id');
        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        $encontrado=false;
            if($Tramite->idEmpleado == null){
                $encontrado=true;
        }

        return view('Cruds-solicitante.Tramites-Solicitante.show',compact('Tramite','Segui','Respuestas', 'encontrado'));

    }

    public function update2(Request $request, $id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');
        $idS=auth()->user()->email;
        $idN=auth()->user()->nombreSolicitante;
        $idE=auth()->user()->apellido;

        $chat = new Respuestaseguimiento;
        $chat->idSeguimiento=$crear;
        $chat->correo=$idS;
        $chat->nombre=$idN;
        $chat->apellido= $idE;
        $chat->comentario=$request->input('comentario');
        $chat->save();

        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->orderBy('id', 'DESC')->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        return redirect()->route('solicitante.solicitante-ver',compact('Tramite','Segui','Respuestas'));

    }

    public function inicio_CrearTramite(){

        $idE=auth()->user()->id;
        $dependencias= Dependencia::all();
        $catalogo= CatalogoTramite::all();

        return view('Cruds-solicitante.Crear-Tramite.index', compact('dependencias', 'catalogo'));
    }

    public function validacion(Request $request){
        
        $idE=auth()->user()->id;
     
        $tramite = new Tramite;
        $tramite->idSolicitante =$idE;
        $tramite->idEmpleado = null;
        $tramite->idCatalogoTramite=$request->get('idCatalogoTramite');
        $tramite->descripcionTramite=$request->input('descripcion');
        $tramite->save();

        $segumiento = new Seguimiento;
        $segumiento->idTramite = $tramite->id;
        $segumiento->EstadoTramite = "Sin Asignar";
        $segumiento->save(); 

        return redirect()->route('solicitante.crearsolicitud-index')->with('success','Tramite Creado Satisfactoriamente!');
        
    }

}
