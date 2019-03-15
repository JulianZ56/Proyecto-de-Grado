<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Dependencia;
use App\CatalogoTramite;
use App\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DependenciaController extends Controller
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
           $dependencias = Dependencia::orderBy('id', 'asc')->paginate(5);
  
        return view('Cruds.Dependencia.index',compact('dependencias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.Dependencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dependencia::create($request->all());
   
        return redirect()->route('superuser.dependencia-index')->with('success','Dependencia Creada Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                $Dependencia=Dependencia::find($id);
        return view('Cruds.Dependencia.show',compact('Dependencia'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Dependencia=Dependencia::find($id);
        return view('Cruds.Dependencia.edit',compact('Dependencia'));
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
        Dependencia::find($id)->update($request->all());
  
        return redirect()->route('superuser.dependencia-index')
                        ->with('info','Dependencia actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id2)
    {
       $depend =Dependencia::where('id',$id2)->firstOrFail();
        $empleados = DB::table('empleados')->pluck('idDependencia');
        $catalogos = DB::table('catalogo_tramites')->pluck('idDependencia');


        $encontrado=false;
        $encontrado2=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id2)"." perteneciente a la Dependencia ".$depend->nombreDependecia." esta siendo referenciado en un Catálogo y en un Empleado";
        $resultado2= "Es imposible destruir el registro puesto que el Identificador: "."($id2)"." perteneciente a la Dependencia esta siendo referenciado en un Catálogo de Tramite";
        $resultado3= "Es imposible destruir el registro puesto que el Identificador: "."($id2)"." perteneciente a la Dependencia esta siendo referenciado en un Empleado";
       
        foreach($empleados as $elemento){
         if ($elemento==$id2)
           $encontrado=true;
        }
        foreach($catalogos as $elemento2){
            if ($elemento2==$id2)
              $encontrado2=true;
         }

        if ($encontrado and $encontrado2){ 
           return redirect()->route('superuser.dependencia-index')->with('advertencia',$resultado);
        }else if($encontrado2){
            return redirect()->route('superuser.dependencia-index')->with('advertencia',$resultado2);
        }else if($encontrado){
            return redirect()->route('superuser.dependencia-index')->with('advertencia',$resultado3);
        }else{
            $depend->delete(); 
         return redirect()->route('superuser.dependencia-index')
                       ->with('danger','Dependencia Eliminada Satisfactoriamente');  
         } 
    }
}
