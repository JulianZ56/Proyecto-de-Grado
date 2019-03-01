<?php

namespace App\Http\Controllers\Tramites;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


use App\Dependencia;
use App\Empleado;
use App\Seguimiento;
use App\Respuestaseguimiento;
use App\Tramite;
use App\CatalogoTramite;
use App\Solicitante;
use App\Doc_Catalogo;
use App\Documentacion;
use DB;







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
       $tramites = Tramite::where('idSolicitante',$idE)->orderBy('id', 'DESC')->paginate(5);
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
        $Documento=Documentacion::where('idTramite',$id)->get();




        $encontrado=false;
            if($Tramite->idEmpleado == null){
               $encontrado=true;
        }

        return view('Cruds-solicitante.Tramites-Solicitante.show',compact('Tramite','Segui','Respuestas', 'encontrado','Documento'));

    }

    public function update2(Request $request, $id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');
      
        $chat = new Respuestaseguimiento;
        $chat->idSeguimiento=$crear;
        $chat->correo=auth()->user()->email;
        $chat->nombre=auth()->user()->nombreSolicitante;
        $chat->apellido= auth()->user()->apellido;
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
        
       
     
        $tramite = new Tramite;
        $tramite->idSolicitante =auth()->user()->id;
        $tramite->idEmpleado = null;
        $tramite->idCatalogoTramite=$request->get('idCatalogoTramite');
        $tramite->descripcionTramite=$request->input('descripcion');
        $tramite->save();

        



        $segumiento = new Seguimiento;
        $segumiento->idTramite = $tramite->id;
        $segumiento->EstadoTramite = "Sin Asignar";
        $segumiento->save(); 


 

        $Docu=$tramite->id;

    


        $nose= Tramite::where('tramites.id', $Docu)->value('idCatalogoTramite');
       $nose2= Doc_Catalogo::where('doc__catalogos.idCatalogoTramite', $nose)->get();

       

    return redirect()->route('solicitante.solicitante-Doc',compact('nose2','Docu'));
        
    }




    
public function Documento(){
        



      $variable= Tramite::where('tramites.idSolicitante', auth()->user()->id)->orderBy('id', 'DESC')->first();

      $Documento= Doc_Catalogo::where('doc__catalogos.idCatalogoTramite', $variable->idCatalogoTramite)->get();

      $num= CatalogoTramite::where('id',  $variable->idCatalogoTramite)->value('numeroDocumentos');


    return view('Cruds-solicitante.Crear-Tramite.DocumentosSol', compact('Documento','variable','num'));





    }


public function Document(Request $request, $id){
        

   
     $trami= Tramite::where('tramites.id', $id)->first();

     $num= CatalogoTramite::where('id',  $trami->idCatalogoTramite)->value('numeroDocumentos');




for ($i = 0; $i < $num; $i++) {

//"Documento$i"




        $Documen = new Documentacion;
        $Documen->idTramite = $id;
        $Documen->nombreDocumento = $request->file("Documento$i")->store('public');
        $Documen->save(); 




}

//if ($request->hasFlie('Documento0')) {
    

    //$file= $request->file('Documento0');
    //$name= $file->getClientOriginaName();
  //  return $request;
//}

//return $request->file('Documento0');

      
       $tramites = Tramite::where('idSolicitante',auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
       $empleados= Empleado::all();
       $segui= Seguimiento::all();

    return redirect()->route('solicitante.solicitante-index',compact('tramites', 'empleados', 'segui'))
        ->with('i', (request()->input('page', 1) - 1) * 5);


    }




}
