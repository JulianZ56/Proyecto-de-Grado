<?php

namespace App\Http\Controllers\Tramites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Empleado;
use App\Seguimiento;
use App\Respuestaseguimiento;
use App\Tramite;
use App\Dependencia;
use App\CatalogoTramite;
use App\Observacion;

use DB;


class EmpleadoJefeTramiteController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth:empleadojefe');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $idE=auth()->user()->idDependencia;
       $empleados= Empleado::all();
        $segui= Seguimiento::all();

        $TramitesD = DB::table('dependencias','tramites','solicitantes','seguimientos')
           ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
           ->join('tramites', 'catalogo_tramites.id', '=', 'tramites.idCatalogoTramite')
           ->join('solicitantes', 'tramites.idSolicitante', '=', 'solicitantes.id')
           ->join('seguimientos', 'tramites.id', '=', 'seguimientos.idTramite')
           ->select('tramites.*','catalogo_tramites.nombreCatalogo','catalogo_tramites.descripcionCatalogo','dependencias.nombreDependecia','solicitantes.nombreSolicitante','solicitantes.apellido')
           ->where('dependencias.id',$idE)
           ->where('seguimientos.EstadoTramite','Finalizado')
           ->orderBy('dependencias.id', 'asc')
           ->paginate(5); 
    
       
   return view('Cruds-EmpleadoJefe.Finalizados.index',compact('TramitesD', 'empleados', 'segui'))
     ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function inicio_Pendientes(){

        $idE=auth()->user()->idDependencia;
        $empleados= Empleado::all();
         $segui= Seguimiento::all();
 
         $TramitesD = DB::table('dependencias','tramites','solicitantes','seguimientos')
            ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
            ->join('tramites', 'catalogo_tramites.id', '=', 'tramites.idCatalogoTramite')
            ->join('solicitantes', 'tramites.idSolicitante', '=', 'solicitantes.id')
            ->join('seguimientos', 'tramites.id', '=', 'seguimientos.idTramite')
            ->select('tramites.*','catalogo_tramites.nombreCatalogo','catalogo_tramites.descripcionCatalogo','dependencias.nombreDependecia','solicitantes.nombreSolicitante','solicitantes.apellido')
            ->where('dependencias.id',$idE)
            ->where('seguimientos.EstadoTramite','Pendiente')
            ->orderBy('dependencias.id', 'asc')
            ->paginate(5); 
     
        
        return view('Cruds-EmpleadoJefe.Pendiente.index',compact('TramitesD', 'empleados', 'segui'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function mostrar_Pendientes($id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');
        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        $encontrado=false;
            if($Tramite->idEmpleado == null){
                $encontrado=true;
            }

        return view('Cruds-EmpleadoJefe.Pendiente.show',compact('Tramite','Segui','Respuestas','encontrado'));
    }

    public function inicio_Proceso_Revision(){

        $idE=auth()->user()->idDependencia;
        $empleados= Empleado::all();
        $segui= Seguimiento::all();

        $TramitesD = DB::table('dependencias','tramites','solicitantes','seguimientos')
           ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
           ->join('tramites', 'catalogo_tramites.id', '=', 'tramites.idCatalogoTramite')
           ->join('solicitantes', 'tramites.idSolicitante', '=', 'solicitantes.id')
           ->join('seguimientos', 'tramites.id', '=', 'seguimientos.idTramite')
           ->select('tramites.*','catalogo_tramites.nombreCatalogo','catalogo_tramites.descripcionCatalogo','dependencias.nombreDependecia','solicitantes.nombreSolicitante','solicitantes.apellido')
           ->where('dependencias.id',$idE)
           ->where('seguimientos.EstadoTramite','Proceso')
           ->orwhere('seguimientos.EstadoTramite','Revicion')
           ->orderBy('dependencias.id', 'asc')
           ->paginate(5); 
    
       
        return view('Cruds-EmpleadoJefe.Proceso-Revision.index',compact('TramitesD', 'empleados', 'segui'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function mostrar_Proceso_Revision($id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');
        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        return view('Cruds-EmpleadoJefe.Proceso-Revision.show',compact('Tramite','Segui','Respuestas'));
    }

    public function inicio_Rechazado(){

        $idE=auth()->user()->idDependencia;
        $empleados= Empleado::all();
        $segui= Seguimiento::all();

        $TramitesD = DB::table('dependencias','tramites','solicitantes','seguimientos')
           ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
           ->join('tramites', 'catalogo_tramites.id', '=', 'tramites.idCatalogoTramite')
           ->join('solicitantes', 'tramites.idSolicitante', '=', 'solicitantes.id')
           ->join('seguimientos', 'tramites.id', '=', 'seguimientos.idTramite')
           ->select('tramites.*','catalogo_tramites.nombreCatalogo','catalogo_tramites.descripcionCatalogo','dependencias.nombreDependecia','solicitantes.nombreSolicitante','solicitantes.apellido')
           ->where('dependencias.id',$idE)
           ->where('seguimientos.EstadoTramite','Rechazado')
           ->orderBy('dependencias.id', 'asc')
           ->paginate(5); 
    
        return view('Cruds-EmpleadoJefe.Rechazados.index',compact('TramitesD', 'empleados', 'segui'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function mostrar_Rechazado($id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');
        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        return view('Cruds-EmpleadoJefe.Rechazados.show',compact('Tramite','Segui','Respuestas'));
    }

    public function asignar($id){

        $idE=auth()->user()->idDependencia;
        $idjefe=auth()->user()->id;
        $Tramite=Tramite::find($id);

        $EmpleadosD = DB::table('empleados','dependencias')
           ->join('dependencias', 'dependencias.id', '=', 'empleados.idDependencia')
           ->select('empleados.*')
           ->where('dependencias.id',$idE)
           ->where('empleados.id','<>', $idjefe)
           ->orderBy('empleados.nombreEmp', 'asc')
           ->paginate(5); 

        return view('Cruds-EmpleadoJefe.Asignar.index',compact('idE','Tramite','EmpleadosD'));
    }

    public function Asignar_empleado(Request $request, $id){

        Tramite::find($id)->update([
            'idEmpleado' => $request['idEmpleado'],
        ]);

        Seguimiento::where('idTramite',$id)->update([
            'EstadoTramite' => 'Revicion',
        ]);

        $idE=auth()->user()->idDependencia;
        $empleados= Empleado::all();
        $segui= Seguimiento::all();

        $TramitesD = DB::table('dependencias','tramites','solicitantes','seguimientos')
           ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
           ->join('tramites', 'catalogo_tramites.id', '=', 'tramites.idCatalogoTramite')
           ->join('solicitantes', 'tramites.idSolicitante', '=', 'solicitantes.id')
           ->join('seguimientos', 'tramites.id', '=', 'seguimientos.idTramite')
           ->select('tramites.*','catalogo_tramites.nombreCatalogo','catalogo_tramites.descripcionCatalogo','dependencias.nombreDependecia','solicitantes.nombreSolicitante','solicitantes.apellido')
           ->where('dependencias.id',$idE)
           ->where('seguimientos.EstadoTramite','Proceso')
           ->orwhere('seguimientos.EstadoTramite','Revicion')
           ->orderBy('dependencias.id', 'asc')
           ->paginate(5); 
    
       
        return view('Cruds-EmpleadoJefe.Proceso-Revision.index',compact('TramitesD', 'empleados', 'segui'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     $crear=Seguimiento::where('idTramite',$id)->value('id');

        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->first();
        $Observa=Observacion::where('idSeguimiento',$Segui->id)->get();

        $observar=$Observa->last();

         $encontrado=false;
         
            if($observar == null){
                $encontrado=true;
            }


        return view('Cruds-EmpleadoJefe.Finalizados.show',compact('Tramite','Segui','Respuestas','observar','encontrado'));



    }

       public function showObservaviones($id){

         $Tramite=Tramite::find($id);
         $Segui=Seguimiento::where('idTramite',$id)->first();
         $Observa=Observacion::where('idSeguimiento',$Segui->id)->orderBy('id', 'des')->paginate(5);

       return view('Cruds-empleadojefe.Tramites.observaciones',compact('Observa')) ->with('i', (request()->input('page', 1) - 1) * 5);;
    }


    public function destroy($id)
    {
        //
    }
}
