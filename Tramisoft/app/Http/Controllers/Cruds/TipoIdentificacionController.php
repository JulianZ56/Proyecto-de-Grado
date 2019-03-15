<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\TipoIdentificacion;
use App\Solicitante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoIdentificacionController extends Controller
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
        $tipos = TipoIdentificacion::orderBy('id', 'asc')->paginate(5);
  
        return view('Cruds.TipoIdentificacion.index',compact('tipos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.TipoIdentificacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoIdentificacion::create($request->all());
   
        return redirect()->route('superuser.tipoidentificacion-index')->with('success','Tipo Identificacion Creada Satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TipoIdentificacion=TipoIdentificacion::find($id);
        return view('Cruds.TipoIdentificacion.show',compact('TipoIdentificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TipoIdentificacion=TipoIdentificacion::find($id);
        return view('Cruds.TipoIdentificacion.edit',compact('TipoIdentificacion'));
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
        TipoIdentificacion::find($id)->update($request->all());
  
        return redirect()->route('superuser.tipoidentificacion-index')
                        ->with('info','Tipo Identificacion actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ti)
    {
        $tipoid =TipoIdentificacion::where('id',$id_ti)->firstOrFail();
        $solicitantes = DB::table('Solicitantes')->pluck('idIdentificacion');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_ti)"." perteneciente al Tipo de Identificacion ".$tipoid->nombreIdentificacion." esta siendo referenciado en uno o mas Solicitantes";
       
        foreach($solicitantes as $elemento){
         if ($elemento==$id_ti)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.tipoidentificacion-index')->with('advertencia',$resultado);
         }else{
            $tipoid->delete();
         return redirect()->route('superuser.tipoidentificacion-index')
                       ->with('danger','Tipo de Identificaion Eliminada Satisfactoriamente');  
         }
    }
}
