<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\Nacionalidad;
use App\Departamento;
use App\Ciudad;
use App\Comuna;
use App\Barrio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{

    public function byCiudad($id){

        return Ciudad::where('idDepartamento', $id)->get();
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
        $comunas = Comuna::orderBy('id', 'asc')->paginate(5);
        $ciudades= Ciudad::all();
  
        return view('Cruds.Comuna.index',compact('comunas', 'ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades= Ciudad::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos= Departamento::all();

        return view('Cruds.Comuna.create', compact('ciudades','nacionalidades','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comuna::create($request->all());
   
        return redirect()->route('superuser.comuna-index')->with('success','Comuna Creada Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Comuna=Comuna::find($id);
        $ciudades= Ciudad::all();
        return view('Cruds.Comuna.show',compact('Comuna','ciudades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Comuna=Comuna::find($id);    
        $ciudades= Ciudad::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos= Departamento::all();
        return view('Cruds.Comuna.edit',compact('Comuna','ciudades','nacionalidades','departamentos'));
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
        Comuna::find($id)->update($request->all());
  
        return redirect()->route('superuser.comuna-index')
                        ->with('info','Comuna actualizada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_co)
    {
        $comuna =Comuna::where('id',$id_co)->firstOrFail();
        $barrios = DB::table('Barrios')->pluck('idComuna');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_co)"." perteneciente a la Comuna ".$comuna->nombre." esta siendo referenciada en uno o mas Barrios";
       
        foreach($barrios as $elemento){
         if ($elemento==$id_co)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.comuna-index')->with('advertencia',$resultado);
         }else{
             
            $comuna->delete(); 
         return redirect()->route('superuser.comuna-index')
                       ->with('danger','Comuna Eliminada Satisfactoriamente');  
         }           
    }
}
