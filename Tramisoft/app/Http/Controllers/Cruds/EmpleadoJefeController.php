<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\EmpleadoJefe;
use App\Empleado;
use App\Dependencia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoJefeController extends Controller
{
    public function byEmpleado($id){

        return Empleado::where('idDependencia', $id)->get();
    }
    
    public function __construct()
    {
    	$this->middleware('auth:superuser');
    }
    /*
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadoj = EmpleadoJefe::orderBy('id', 'asc')->paginate(5);
        $empleados= Empleado::all();
  
        return view('Cruds.EmpleadoJefe.index',compact('empleadoj', 'empleados'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados= Empleado::all();
        $dependencias = Dependencia::all();
        return view('Cruds.EmpleadoJefe.create', compact('empleados','dependencias'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idDependencia=$request->input('idDependencia');
        $idEmpleado=$request->input('idEmpleado');

        $TramitesD = DB::table('dependencias','empleados','empleado_jefes')
        ->join('empleados', 'dependencias.id', '=', 'empleados.idDependencia')
        ->join('empleado_jefes', 'empleados.id', '=', 'empleado_jefes.idEmpleado')
        ->select('empleado_jefes.idEmpleado')
        ->where('dependencias.id',$idDependencia)
        ->value('idEmpleado'); 

        if($TramitesD == $idEmpleado){
            $resultado2= "Es imposible asignar el empleado: ".""." a Empleado Jefe pues ya existe uno en la dependencia";
            return redirect()->route('superuser.empleadojefe-crear')->with('danger',$resultado2);    
        }else
            
        if($TramitesD == NULL){

            $request->validate(['idEmpleado' => 'required',]);

            EmpleadoJefe::create($request->all());
            return redirect()->route('superuser.empleadojefe-index')->with('success','Empleado Jefe Creado Satisfactoriamente!'); 
                  
        }else

        if($TramitesD != $idEmpleado){
  
            $resultado3= "Es imposible";
            return redirect()->route('superuser.empleadojefe-crear')->with('danger',$resultado3); 
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
        $EmpleadoJefe=EmpleadoJefe::find($id);
        $empleados= Empleado::all();
        return view('Cruds.EmpleadoJefe.show',compact('EmpleadoJefe','empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EmpleadoJefe=EmpleadoJefe::find($id);
        $empleados= Empleado::all();
        return view('Cruds.EmpleadoJefe.edit',compact('EmpleadoJefe','empleados'));
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
        $request->validate([
            'idEmpleado'=> 'required',
        ]);

        EmpleadoJefe::find($id)->update($request->all());
      
  
        return redirect()->route('superuser.empleadojefe-index')
                        ->with('info','Empleado Jefe actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_em)
    {
        $empleadojefe =EmpleadoJefe::where('id',$id_em)->firstOrFail();       
        $empleadojefe->delete();
  
        return redirect()->route('superuser.empleadojefe-index')
                        ->with('danger','Empleado Jefe Eliminado Satisfactoriamente');
    }
}
