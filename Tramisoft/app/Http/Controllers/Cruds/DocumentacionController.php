<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Documentacion;
use App\CatalogoTramite;
use App\Dependencia;
use App\Doc_Catalogo;
use App\Tramite;




class DocumentacionController extends Controller
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


     $TramitesD = DB::table('dependencias','doc__catalogos','catalogo_tramites')
           ->join('catalogo_tramites', 'dependencias.id', '=', 'catalogo_tramites.idDependencia')
           ->join('doc__catalogos', 'catalogo_tramites.id', '=', 'doc__catalogos.idCatalogoTramite')
           ->select('dependencias.nombreDependecia','catalogo_tramites.nombreCatalogo','doc__catalogos.*')
           ->orderBy('dependencias.id', 'asc')
           ->paginate(5);
    

  
       // return view('Cruds.Documentacion.index');

  return view('Cruds.Documentacion.index',compact('TramitesD'))
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
         $catalogo= CatalogoTramite::all();
        return view('Cruds.Documentacion.create', compact('dependencias'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

        $documetacion=Doc_Catalogo::find($id);

        return view('Cruds.Documentacion.edit',compact('documetacion'));

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
       //echo $id;

      // echo $request->nombreDoc;



         $documetacion=Doc_Catalogo::where('id',$id)->get()->first();

      //   echo $documetacion->idCatalogoTramite;


           Doc_Catalogo::find($id)->update([
           'idCatalogoTramite' => $documetacion->idCatalogoTramite,
           'nombreDoc' => $request['nombreDoc'],
       ]);

        return redirect()->route('superuser.documentacion-index')
                       ->with('info','Documento actualizado Satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_doc)
    {
        $doc_catalogo =Doc_Catalogo::where('idCatalogoTramite',$id_doc)->firstOrFail();
        $tramites = DB::table('Tramites')->pluck('idCatalogoTramite');

       

        $encontrado=false;

        $resultado= "Es imposible destruir el registro puesto que el Identificador: "."($id_doc)"." ya que esta siendo referenciado en una o mas Tramites";
       
        foreach($tramites as $elemento){
         if ($elemento==$id_doc)
           $encontrado=true;
        }

        if ($encontrado){ 
           return redirect()->route('superuser.documentacion-index')->with('advertencia',$resultado);
         }else{
            $doc_catalogo->delete();  
         return redirect()->route('superuser.documentacion-index')
                       ->with('danger','Documento Eliminado Satisfactoriamente');  
         }
         
    }
}
