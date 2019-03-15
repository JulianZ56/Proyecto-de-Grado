<?php

namespace App\Http\Controllers\Tramites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Empleado;
use App\Seguimiento;
use App\Respuestaseguimiento;
use App\Tramite;
use App\Observacion;
use App\CatalogoTramite;
use App\Documentacion;
use Storage;
use DB;
use App\Dependencia;



class EmpleadoTramitesController extends Controller
{
    

     public function __construct()
    {
        $this->middleware('auth:empleado');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $idE=auth()->user()->id;
        $tramites = Tramite::where('idEmpleado',$idE)->orderBy('id', 'asc')->paginate(5);
        $empleados= Empleado::all();
        $segui= Seguimiento::all();

        return view('Cruds-empleado.Tramites.index',compact('tramites', 'empleados', 'segui'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function show($id){

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


        return view('Cruds-empleado.Tramites.show',compact('Tramite','Segui','Respuestas','observar','encontrado'));

    }

        public function showDuc($id){
   
     $Documento=Documentacion::where('idTramite',$id)->get();


 return view('Cruds-empleado.Tramites.showDoc',compact('Documento'));

}


public function descarga($id)
    {
        

     $Documento=Documentacion::where('id',$id)->value('nombreDocumento');


      return  Storage::disk('archivos')->download($Documento);


    }

    public function edit($id){
       
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('EstadoTramite');

        return view('Cruds-empleado.Tramites.edit',compact('Tramite','Segui','Respuestas'));
    }


    public function showObservaviones($id){

         $Tramite=Tramite::find($id);
         $Segui=Seguimiento::where('idTramite',$id)->first();
         $Observa=Observacion::where('idSeguimiento',$Segui->id)->orderBy('id', 'des')->paginate(5);

       return view('Cruds-empleado.Tramites.observaciones',compact('Observa')) ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    
    public function update(Request $request, $id){
        
        $Tramite=Tramite::find($id);
        
        $vali=$request->input("validacionEtapa");

        $user = Seguimiento::where('idTramite',$id)->first();
        $user->EstadoTramite = $vali;
        $user->save();

        $Obser = new Observacion;
        $Obser->idSeguimiento=$user->id;
        $Obser->EstadoActual=$vali;
        $Obser->Observacion=$request->input('Observacion');
        $Obser->save();

        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$id)->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->first();

        return redirect()->route('empleado.empleado-ver',compact('Tramite','Segui','Respuestas'))->with('info','El estado a sido actualizada Satisfactoriamente');
        
    }

    public function update2(Request $request, $id){

        $crear=Seguimiento::where('idTramite',$id)->value('id');

        $idS=auth()->user()->email;
        $idN=auth()->user()->nombreEmp;
        $idA=auth()->user()->apellidoEmp;
    
        $chat = new Respuestaseguimiento;
        $chat->idSeguimiento=$crear;
        $chat->correo=$idS;
        $chat->nombre=$idN;
        $chat->apellido= $idA;
        $chat->comentario=$request->input('comentario');
        $chat->save();

        

        $Respuestas=Respuestaseguimiento::where('idSeguimiento',$crear)->orderBy('id', 'DESC')->get();
        $Tramite=Tramite::find($id);
        $Segui=Seguimiento::where('idTramite',$id)->value('id');
        $Observa=Observacion::where('idSeguimiento',$Segui)->get();

        $ObUlt=$Observa->last();


        return redirect()->route('empleado.empleado-ver',compact('Tramite','Segui','Respuestas','ObUlt'))->with('info','bueno');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
