<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Empleado;
use App\Dependencia;
use App\EmpleadoJefe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
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
        $empleados = Empleado::orderBy('id', 'asc')->paginate(5);
        $dependencias= Dependencia::all();
  
        return view('Cruds.Empleado.index',compact('empleados', 'dependencias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias= Dependencia::all();
        return view('Cruds.Empleado.create', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->input('email');

        $solicitante = DB::table('Solicitantes')->pluck('email');
        $superuser = DB::table('Super_users')->pluck('email');
        $empleado = DB::table('Empleados')->pluck('email');
                
        $encontrado=false;
        $encontrado2=false;
        $encontrado3=false;
         
        $resultado= "Es imposible crear el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Solicitante";
        $resultado2= "Es imposible crear el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Administrador";
        $resultado3= "Es imposible crear el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Empleado";
              
                      
        foreach($solicitante as $elemento){
         if ($elemento==$email)
              $encontrado=true;
            }
        foreach($superuser as $elemento2){
            if ($elemento2==$email)
              $encontrado2=true;
            }
        foreach($empleado as $elemento3){
            if ($elemento3==$email)
                $encontrado3=true;
            } 

        if ($encontrado){ 
           return redirect()->route('superuser.empleados-crear')->with('danger',$resultado);
        }else if($encontrado2){
            return redirect()->route('superuser.empleados-crear')->with('danger',$resultado2);
        }else if($encontrado3){
            return redirect()->route('superuser.empleados-crear')->with('danger',$resultado3);
        }else{

            $empleado = new Empleado;
            $empleado->idDependencia = $request->input('idDependencia');
            $empleado->nombreEmp=$request->input('nombreEmp');
            $empleado->apellidoEmp=$request->input('apellidoEmp');
            $empleado->identificacion=$request->input('identificacion');
            $empleado->telefonoEmp=$request->input('telefonoEmp');
            $empleado->cargoEmp=$request->input('cargoEmp');
            $empleado->email=$request->input('email');
            $empleado->password = bcrypt($request->input('password'));
            $empleado->save();
    
            return redirect()->route('superuser.empleados-index')->with('success','Empleado Creado Satisfactoriamente!');       
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Empleado=Empleado::find($id);
        $Dependencias= Dependencia::all();
        return view('Cruds.Empleado.show',compact('Empleado','Dependencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Empleado=Empleado::find($id);    
        $dependencias= Dependencia::all();
        
        return view('Cruds.Empleado.edit',compact('Empleado','dependencias'));
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
        
        Empleado::find($id)->update([
            'idDependencia' => $request['idDependencia'],
            'nombreEmp' => $request['nombreEmp'],
            'apellidoEmp'=> $request['apellidoEmp'],
            'cargoEmp'=> $request['cargoEmp'],
        ]);

        return redirect()->route('superuser.empleados-index')
                        ->with('info','Empleado actualizado Satisfactoriamente');
    }

    public function editpass(Request $request,$id)
    {

        $request->validate([
            'password' => 'required',
        ]);

        Empleado::find($id)->update([
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()->route('superuser.empleados-index')
                        ->with('info','Contraseña actualizada Satisfactoriamente');
        
    }
    public function updatepass(Request $request, $id){

        $request->validate([
            'password' => 'required',
        ]);

        Empleado::find($id)->update([
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()->route('superuser.empleados-index')
                        ->with('info','Contraseña actualizada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_em)
    {
        $empleados =Empleado::where('id',$id_em)->firstOrFail();
        $empleadojefe = DB::table('empleado_jefes')->pluck('idEmpleado');
        $tramites = DB::table('Tramites')->pluck('idEmpleado');
                
        $encontrado=false;
        $encontrado2=false;
         
        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_em)"." perteneciente al Empleado ".$empleados->nombreEmp." esta siendo referenciado en un Empleado Jefe y en un Tramite";
        $resultado2= "Es imposible destruir el registro puesto que el Identificador: "."($id_em)"." perteneciente al Empleado ".$empleados->nombreEmp." esta siendo referenciado en un Empleado Jefe";
        $resultado3= "Es imposible destruir el registro puesto que el Identificador: "."($id_em)"." perteneciente al Empleado ".$empleados->nombreEmp." esta siendo referenciado en un Tramite";
              
                      
        foreach($empleadojefe as $elemento){
         if ($elemento==$id_em)
              $encontrado=true;
            }
        foreach($tramites as $elemento2){
            if ($elemento2==$id_em)
              $encontrado2=true;
            }  

        if ($encontrado and $encontrado2){ 
           return redirect()->route('superuser.empleados-index')->with('advertencia',$resultado);
        }else if($encontrado2){
            return redirect()->route('superuser.empleados-index')->with('advertencia',$resultado3);
        }else if($encontrado){
            return redirect()->route('superuser.empleados-index')->with('advertencia',$resultado2);
        }else{
            $empleados->delete(); 
         return redirect()->route('superuser.empleados-index')
                       ->with('danger','Empleado Eliminada Satisfactoriamente');  
         } 
    }
}
