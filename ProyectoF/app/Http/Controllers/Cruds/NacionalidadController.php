<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Nacionalidad;
use App\Departamento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NacionalidadController extends Controller
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
        $nacionalidades = Nacionalidad::orderBy('id', 'asc')->paginate(5);
  
        return view('Cruds.Nacionalidad.index',compact('nacionalidades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.Nacionalidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Nacionalidad::create($request->all());
   
        return redirect()->route('superuser.nacionalidad-index')->with('success','Nacionalidad Creada Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Nacionalidad=Nacionalidad::find($id);
        return view('Cruds.Nacionalidad.show',compact('Nacionalidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Nacionalidad=Nacionalidad::find($id);
        return view('Cruds.Nacionalidad.edit',compact('Nacionalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Nacionalidad::find($id)->update($request->all());
  
        return redirect()->route('superuser.nacionalidad-index')
                        ->with('info','Nacionalidad actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id2)
    {
        $nacion =Nacionalidad::where('id',$id2)->firstOrFail();
        $departamentos = DB::table('Departamentos')->pluck('idNacionalidad');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id2)"." perteneciente a la Nacionalidad ".$nacion->nombre." esta siendo referenciado en uno o mas Departamentos";
       
        foreach($departamentos as $elemento){
         if ($elemento==$id2)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.nacionalidad-index')->with('advertencia',$resultado);
         }else{
              $nacion->delete();
         return redirect()->route('superuser.nacionalidad-index')
                       ->with('danger','Nacionalidad Eliminada Satisfactoriamente');  
         }
    }
}
