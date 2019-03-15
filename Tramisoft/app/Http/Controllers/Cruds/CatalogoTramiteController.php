<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\CatalogoTramite;
use App\Dependencia;
use App\Tramite;

use App\Doc_Catalogo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogoTramiteController extends Controller
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
        $catalogotramites = CatalogoTramite::orderBy('id', 'asc')->paginate(5);
        $dependencias= Dependencia::all();
  
        return view('Cruds.CatalogoTramite.index',compact('catalogotramites', 'dependencias'))
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
        return view('Cruds.catalogoTramite.create', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $catalogo1 = new CatalogoTramite;
        $catalogo1->idDependencia = $request->input('idDependencia');
        $catalogo1->nombreCatalogo = $request->input('nombreCatalogo');
        $catalogo1->numeroDocumentos= $request->input('numeroDocumentos');
        $catalogo1->descripcionCatalogo= $request->input('descripcionCatalogo');
        $catalogo1->save();

           $numero=$catalogo1;

        return view('Cruds.catalogotramite.createD',compact('numero'));


  }

   public function store2(Request $request,$id)
    {

    $cata = CatalogoTramite::where('id', $id)->value('numeroDocumentos');

 for($i=1;$i<= $cata;$i++){
  
        $Doc = new Doc_Catalogo;
        $Doc->idCatalogoTramite = $id;
        $Doc->nombreDoc =$request->input("Documento$i");
       $Doc->save();

}
 return redirect()->route('superuser.documentacion-index')
                       ->with('info','catalogo agregado Satisfactoriamente');

  }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $Catalogotramites=CatalogoTramite::find($id);
        $Dependencias= Dependencia::all();
        return view('Cruds.catalogotramite.show',compact('Catalogotramites','Dependencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $Catalogotramites=CatalogoTramite::find($id);    
        $Dependencias= Dependencia::all();
        return view('Cruds.catalogotramite.edit',compact('Catalogotramites','Dependencias'));
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
        CatalogoTramite::find($id)->update($request->all());
  
        return redirect()->route('superuser.catalogotramite-index')
                        ->with('info','catalogo actualizada Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ca)
    {
        $catalogotramites =CatalogoTramite::where('id',$id_ca)->firstOrFail();
        $tramites = DB::table('Tramites')->pluck('idCatalogoTramite');


        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_ca)"." perteneciente al Catálogo ".$catalogotramites->nombre." esta siendo referenciado en uno o mas Tramites";
       
        foreach($tramites as $elemento){
         if ($elemento==$id_ca)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.catalogotramite-index')->with('advertencia',$resultado);
         }else{
            $catalogotramites->delete();
         return redirect()->route('superuser.catalogotramite-index')
                       ->with('danger','Catálogo Eliminado Satisfactoriamente');  
         }
    }
}
