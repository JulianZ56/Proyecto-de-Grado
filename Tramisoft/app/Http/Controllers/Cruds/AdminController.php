<?php

namespace App\Http\Controllers\Cruds;
use App\Http\Controllers\Controller;

use App\SuperUser;
use App\Solicitante;
use App\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $superusers = SuperUser::orderBy('id', 'asc')->paginate(5);
  
        return view('Cruds.Admin.index',compact('superusers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cruds.Admin.create');
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
           return redirect()->route('superuser.admin-crear')->with('danger',$resultado);
        }else if($encontrado2){
            return redirect()->route('superuser.admin-crear')->with('danger',$resultado2);
        }else if($encontrado3){
            return redirect()->route('superuser.admin-crear')->with('danger',$resultado3);
        }else{

            $superuser = new SuperUser;
            $superuser->email=$request->input('email');
            $superuser->password= bcrypt($request->input('password'));
            $superuser->save();
    
            return redirect()->route('superuser.admin-index')->with('success','Administrador Creado Satisfactoriamente!');
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
        $SuperUser=SuperUser::find($id);
       return view('Cruds.Admin.edit',compact('SuperUser'));
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
        $email=$request->input('email');

        $solicitante = DB::table('Solicitantes')->pluck('email');
        $superuser = DB::table('Super_users')->pluck('email');
        $empleado = DB::table('Empleados')->pluck('email');
                
        $encontrado=false;
        $encontrado2=false;
        $encontrado3=false;
         
        $resultado= "Es imposible actualizar el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Solicitante";
        $resultado2= "Es imposible actualizar el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Admin";
        $resultado3= "Es imposible actualizar el registro puesto que el email: "."'$email'"." ya esta siendo utilizado en un Empleado";
              
                      
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
           return redirect()->back()->with('danger',$resultado);
        }else if($encontrado2){
            return redirect()->back()->with('danger',$resultado2);
        }else if($encontrado3){
            return redirect()->back()->with('danger',$resultado3);
        }else{

            SuperUser::find($id)->update([
                        'email'=> $request['email'],
                    ]);

            return redirect()->route('superuser.admin-index')
                                    ->with('info','Administrador actualizado Satisfactoriamente');
        }    
    }
    public function editpass(Request $request,$id)
    {

        SuperUser::find($id)->update([
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()->route('superuser.admin-index')
                        ->with('info','Contraseña actualizada Satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_su)
    {
        $superusers =SuperUser::where('id',$id_su)->firstOrFail();
        
        $superusers->delete();
  
        return redirect()->route('superuser.admin-index')
                        ->with('danger','Administrador Eliminado Satisfactoriamente');
    }
}
