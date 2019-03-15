<?php

namespace App\Http\Controllers;

use App\Solicitante;
use App\Ocupacion;
use App\TipoIdentificacion;
use App\Nacionalidad;
use App\Departamento;
use App\Ciudad;
use App\Comuna;
use App\Barrio;

use Illuminate\Http\Request;

class RegistroUsuarioController extends Controller
{

    public function byDepartamento($id){

        return Departamento::where('idNacionalidad', $id)->get();
        
    }
    public function byCiudad($id){

        return Ciudad::where('idDepartamento', $id)->get();
    }
    public function byComuna($id){

        return Comuna::where('idCiudad', $id)->get();
    }
    public function byBarrio($id){

        return Barrio::where('idComuna', $id)->get();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrios= Barrio::all();
        $ocupaciones=Ocupacion::all();
        $tipoidentificaciones= TipoIdentificacion::all();
        $nacionalidades= Nacionalidad::all();
        $departamentos=Departamento::all();
        $ciudades= Ciudad::all();
        $comunas=Comuna::all();
        $barrios= Barrio::all();

        return view('Cruds-solicitante.registro', compact('barrios','ocupaciones','tipoidentificaciones','nacionalidades','departamentos','ciudades','comunas','barrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        
        return view('login.superuser-login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitante = new Solicitante;
        $solicitante->idIdentificacion = $request->input('idIdentificacion');
        $solicitante->idOcupacion=$request->input('idOcupacion');
        $solicitante->idBarrio=$request->input('idBarrio');
        $solicitante->nombreSolicitante=$request->input('nombreSolicitante');
        $solicitante->apellido=$request->input('apellido');
        $solicitante->tipoPersona=$request->input('tipoPersona');
        $solicitante->numeroIdentificacion=$request->input('numeroIdentificacion');
        $solicitante->celular=$request->input('celular');
        $solicitante->telefono=$request->input('telefono');
        $solicitante->estrato=$request->input('estrato');
        $solicitante->vivienda=$request->input('vivienda');
        $solicitante->genero=$request->input('genero');
        $solicitante->estadoCivil=$request->input('estadoCivil');
        $solicitante->eps=$request->input('eps');
        $solicitante->email=$request->input('email');
        $solicitante->password = bcrypt($request->input('password'));
        $solicitante->save();

        return redirect()->route('Registro-Usuario')->with('success','Solicitante Creado Satisfactoriamente.');

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
        //
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
        //
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
