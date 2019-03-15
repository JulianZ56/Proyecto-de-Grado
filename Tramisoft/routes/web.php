<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Registro', 'RegistroUsuarioController@index')->name('Registro-Usuario');
Route::get('/loguin', 'RegistroUsuarioController@inicio')->name('inicio-usuario');


Route::get ('/Registro/editar/departamento/{id}' , 'RegistroUsuarioController@byDepartamento')->name('Registro.departa-xd');
Route::get ('/Registro/editar/ciudad/{id}' , 'RegistroUsuarioController@byCiudad')->name('Registro.ciudad-xd');
Route::get ('/Registro/editar/comuna/{id}' , 'RegistroUsuarioController@byComuna')->name('Registro.comuna-xd');
Route::get ('/Registro/editar/barrio/{id}' , 'RegistroUsuarioController@byBarrio')->name('Registro.bariro-xd');
Route::post('/Registro/validar', 'RegistroUsuarioController@store')->name('Guardar-Usuario');

//---------------login general-----------------
Route::get('login', 'login\LoginController@showLoginForm')->name('login.general');
Route::post('login', 'login\LoginController@login')->name('login.entrar');


Route::prefix('empleado')->group(function(){

	Route::get('/login' , 'login\EmpleadoLoginController@showLoginForm')->name('empleado.login'); 
	Route::post('/login' , 'login\EmpleadoLoginController@login')->name('empleado.entrar.login');
	Route::get('/' , 'controladorEmpleado\EmpleadoControlador@index')->name('empleado.inicio.login');
	Route::post('/logout' , 'login\EmpleadoLoginController@logout')->name('empleado.salir.login');


	
	 Route::get ('/tramites/ver-Documentos/{id}' , 'Tramites\EmpleadoTramitesController@showDuc')->name('empleado.empleado-ver-Doc');//Ver
	    Route::get ('/tramites/descargar/{id}' , 'Tramites\EmpleadoTramitesController@descarga')->name('empleado.empleado-ver-descargar');//

	// -------------Ver Mis tramites----------------
	Route::get ('/tramites' , 'Tramites\EmpleadoTramitesController@index')->name('empleado.empleado-index');//Inicio
	Route::get ('/tramites/ver/{id}' , 'Tramites\EmpleadoTramitesController@show')->name('empleado.empleado-ver');//Ver
	Route::get ('/tramites/editar/{id}' , 'Tramites\EmpleadoTramitesController@edit')->name('empleado.empleado-editar');//Edit
	Route::post ('/tramites/actualizar/{id}' , 'Tramites\EmpleadoTramitesController@update')->name('empleado.empleado-actualizar');//Update 
   Route::get ('/tramites/Observaciones/{id}' , 'Tramites\EmpleadoTramitesController@showObservaviones')->name('empleado.empleado-Observaciones');//Edit
	
	Route::post ('/tramites/actualizar-chat/{id}' , 'Tramites\EmpleadoTramitesController@update2')->name('empleado.empleado-actualizar-chat');//

});
Route::prefix('solicitante')->group(function(){

	Route::get('/login' , 'login\SolicitanteLoginController@showLoginForm')->name('solicitante.login'); 
	Route::post('/login' , 'login\SolicitanteLoginController@login')->name('solicitante.entrar.login');
	Route::get('/' , 'controladorSolicitante\SolicitanteControlador@index')->name('solicitante.inicio.login');
	Route::post('/logout' , 'login\SolicitanteLoginController@logout')->name('solicitante.salir.login');

	// -------------Ver Tramites----------------
    Route::get ('/solicitante' , 'Tramites\SolicitanteTramiteController@index')->name('solicitante.solicitante-index');//Inicio    
	Route::get ('/solicitante/ver/{id}' , 'Tramites\SolicitanteTramiteController@show')->name('solicitante.solicitante-ver');//Ver
	Route::get ('/solicitante/editar/{id}' , 'Tramites\SolicitanteTramiteController@edit')->name('solicitante.solicitante-editar');//Edit
	Route::post ('/solicitante/actualizar/{id}' , 'Tramites\SolicitanteTramiteController@update')->name('solicitante.solicitante-actualizar');//Update 
	Route::post ('/solicitante/actualizar-chat/{id}' , 'Tramites\SolicitanteTramiteController@update2')->name('solicitante.solicitante-actualizar-chat');


    Route::get ('/solicitante/ver-Documentos/{id}' , 'Tramites\SolicitanteTramiteController@showDuc')->name('solicitante.solicitante-ver-Doc');//Ver
    Route::get ('/solicitante/descargar/{id}' , 'Tramites\SolicitanteTramiteController@descarga')->name('solicitante.solicitante-ver-descargar');//


	// ------- Crear Tramite ------
	Route::get ('/CrearSolicitud' , 'Tramites\SolicitanteTramiteController@inicio_CrearTramite')->name('solicitante.crearsolicitud-index');//Inicio
	Route::post ('/CrearSolicitud/validacion' , 'Tramites\SolicitanteTramiteController@validacion')->name('solicitante.creartramite-validar');//Store
Route::get ('/solicitante/CrearSolicitud/Documento' , 'Tramites\SolicitanteTramiteController@Documento')->name('solicitante.solicitante-Doc');
Route::post ('/solicitante/CrearDocumento/{id}' , 'Tramites\SolicitanteTramiteController@Document')->name('solicitante.Sol-Documento');
	Route::get ('/CrearSolicitud/crear/{id}' , 'Tramites\SolicitanteTramiteController@byDependencia')->name('solicitante.filtro-xd');
});

Route::prefix('empleadojefe')->group(function(){
	
	//------------------Empleado Jefe------------------------
	Route::get('/', 'controladorEmpleadoJefe\EmpleadoJefeControlador@index')->name('empleadojefe.inicio.login');
	Route::post('/logout' , 'login\EmpleadoJefe@logout')->name('empleadojefe.salir.login');


	 Route::get ('/tramites/ver-Documentos/{id}' , 'Tramites\EmpleadoJefeTramiteController@showDuc')->name('empleadojefe.empleadojefe-ver-Doc');//Ver
	    Route::get ('/tramites/descargar/{id}' , 'Tramites\EmpleadoJefeTramiteController@descarga')->name('empleadojefe.empleadojefe-ver-descargar');//

	// -------------Tramites Finalizados----------------
	Route::get ('/tramites/Finalizados' , 'Tramites\EmpleadoJefeTramiteController@index')->name('empleadojefe.empleadojefe-index');//Inicio
	Route::get ('/tramites/Ver-Finalizados/{id}' , 'Tramites\EmpleadoJefeTramiteController@show')->name('empleadojefe.empleadojefe-ver-Finalizados');//Ver

	// -------------Tramites Pendientes---------------- 
	Route::get ('/tramites/pendiente' , 'Tramites\EmpleadoJefeTramiteController@inicio_Pendientes')->name('empleadojefe.empleadojefe-index-pendiente');//Inicio
    Route::get ('/tramites/Ver-Pendiente/{id}' , 'Tramites\EmpleadoJefeTramiteController@mostrar_Pendientes')->name('empleadojefe.empleadojefe-ver-Pendiente');//Ver
	
	//   -s-------------Tramites en Proceso o Revision---------------- 
	Route::get ('/tramites/Proceso' , 'Tramites\EmpleadoJefeTramiteController@inicio_Proceso_Revision')->name('empleadojefe.empleadojefe-index-Proceso');//Inicio
    Route::get ('/tramites/Ver-Proceso/{id}' , 'Tramites\EmpleadoJefeTramiteController@mostrar_Proceso_Revision')->name('empleadojefe.empleadojefe-ver-Proceso');//Ver
	
	// -------------Tramites Rechazados---------------- //
	Route::get ('/tramites/Rechazados' , 'Tramites\EmpleadoJefeTramiteController@inicio_Rechazado')->name('empleadojefe.empleadojefe-index-Rechazados');//Inicio
    Route::get ('/tramites/Ver-Rechazados/{id}' , 'Tramites\EmpleadoJefeTramiteController@mostrar_Rechazado')->name('empleadojefe.empleadojefe-ver-Rechazados');//Ver
	
	// ------------- Asignar---------------- //
	Route::get ('/tramites/Asignar/{id}' , 'Tramites\EmpleadoJefeTramiteController@asignar')->name('empleadojefe.asignar-empleados');//Inicio
	Route::post ('/tramites/Asignar/validacion/{id}' , 'Tramites\EmpleadoJefeTramiteController@asignar_empleado')->name('empleadojefe.validar-empleados');//Ver
	
	// -------------Re Asignar---------------- //
	Route::get ('/tramites/Re-asignar/{id}' , 'Tramites\EmpleadoJefeTramiteController@reasignar')->name('empleadojefe.reasignar-empleados');//Inicio
	Route::post ('/tramites/Re-asignar/validacion/{id}' , 'Tramites\EmpleadoJefeTramiteController@reasignar_empleado')->name('empleadojefe.revalidar-empleados');//Ver
	
    Route::get ('/tramites/Observaciones/{id}' , 'Tramites\EmpleadoJefeTramiteController@showObservaviones')->name('empleadojefe.empleadojefe-Observaciones');
	

});

Route::prefix('superuser')->group(function(){

	Route::get('/login' , 'login\SuperUserLoginController@showLoginForm')->name('superuser.login'); 
	Route::post('/login' , 'login\SuperUserLoginController@login')->name('superuser.entrar.login');
	Route::get('/' , 'controladorSuperUser\SuperUserController@index')->name('superuser.inicio.login');
	Route::post('/logout' , 'login\SuperUserLoginController@logout')->name('superuser.salir.login');

	// -------------Crud Nacionalidad----------------
	Route::get ('/nacionalidad' , 'Cruds\NacionalidadController@index')->name('superuser.nacionalidad-index');//Inicio
	Route::get ('/nacionalidad/crear' , 'Cruds\NacionalidadController@create')->name('superuser.nacionalidad-crear');//Create
	Route::post ('/nacionalidad/validacion' , 'Cruds\NacionalidadController@store')->name('superuser.nacionalidad-validar');//Store
	Route::get ('/nacionalidad/{id}' , 'Cruds\NacionalidadController@destroy')->name('superuser.nacionalidad-eliminar');//Destroy
	Route::get ('/nacionalidad/ver/{id}' , 'Cruds\NacionalidadController@show')->name('superuser.nacionalidad-ver');//Ver
	Route::get ('/nacionalidad/editar/{id}' , 'Cruds\NacionalidadController@edit')->name('superuser.nacionalidad-editar');//Edit
	Route::post ('/nacionalidad/actualizar/{id}' , 'Cruds\NacionalidadController@update')->name('superuser.nacionalidad-actualizar');//Update 

	// -------------Crud Departamento----------------
	Route::get ('/departamento' , 'Cruds\DepartamentoController@index')->name('superuser.departamento-index');//Inicio
	Route::get ('/departamento/crear' , 'Cruds\DepartamentoController@create')->name('superuser.departamento-crear');//Create	
	Route::post ('/departamento/validacion' , 'Cruds\DepartamentoController@store')->name('superuser.departamento-validar');//Store
	Route::get ('/departamento/{id}' , 'Cruds\DepartamentoController@destroy')->name('superuser.departamento-eliminar');//Destroy
	Route::get ('/departamento/ver/{id}' , 'Cruds\DepartamentoController@show')->name('superuser.departamento-ver');//Ver
	Route::get ('/departamento/editar/{id}' , 'Cruds\DepartamentoController@edit')->name('superuser.departamento-editar');//Edit
	Route::post ('/departamento/actualizar/{id}' , 'Cruds\DepartamentoController@update')->name('superuser.departamento-actualizar');//Update 

	// -------------Crud Ciudad----------------
	Route::get ('/ciudad' , 'Cruds\CiudadController@index')->name('superuser.ciudad-index');//Inicio
	Route::get ('/ciudad/crear' , 'Cruds\CiudadController@create')->name('superuser.ciudad-crear');//Create	
	Route::post ('/ciudad/validacion' , 'Cruds\CiudadController@store')->name('superuser.ciudad-validar');//Store
	Route::get ('/ciudad/{id}' , 'Cruds\CiudadController@destroy')->name('superuser.ciudad-eliminar');//Destroy
	Route::get ('/ciudad/ver/{id}' , 'Cruds\CiudadController@show')->name('superuser.ciudad-ver');//Ver
	Route::get ('/ciudad/editar/{id}' , 'Cruds\CiudadController@edit')->name('superuser.ciudad-editar');//Edit
	Route::get ('/ciudad/editar/departamentos/{id}' , 'Cruds\CiudadController@byDepartamento')->name('superuser.ciudad-xd');
	Route::post ('/ciudad/actualizar/{id}' , 'Cruds\CiudadController@update')->name('superuser.ciudad-actualizar');//Update 

	// -------------Crud Comuna----------------
	Route::get ('/comuna' , 'Cruds\ComunaController@index')->name('superuser.comuna-index');//Inicio
	Route::get ('/comuna/crear' , 'Cruds\ComunaController@create')->name('superuser.comuna-crear');//Create	
	Route::post ('/comuna/validacion' , 'Cruds\ComunaController@store')->name('superuser.comuna-validar');//Store
	Route::get ('/comuna/{id}' , 'Cruds\ComunaController@destroy')->name('superuser.comuna-eliminar');//Destroy
	Route::get ('/comuna/ver/{id}' , 'Cruds\ComunaController@show')->name('superuser.comuna-ver');//Ver
	Route::get ('/comuna/editar/{id}' , 'Cruds\ComunaController@edit')->name('superuser.comuna-editar');//Edit
	Route::get ('/comuna/editar/ciudades/{id}' , 'Cruds\ComunaController@byCiudad')->name('superuser.comuna-xd');
	Route::post ('/comuna/actualizar/{id}' , 'Cruds\ComunaController@update')->name('superuser.comuna-actualizar');//Update 

	// -------------Crud Barrio----------------
	Route::get ('/barrio' , 'Cruds\BarrioController@index')->name('superuser.barrio-index');//Inicio
	Route::get ('/barrio/crear' , 'Cruds\BarrioController@create')->name('superuser.barrio-crear');//Create	
	Route::post ('/barrio/validacion' , 'Cruds\BarrioController@store')->name('superuser.barrio-validar');//Store
	Route::get ('/barrio/{id}' , 'Cruds\BarrioController@destroy')->name('superuser.barrio-eliminar');//Destroy
	Route::get ('/barrio/ver/{id}' , 'Cruds\BarrioController@show')->name('superuser.barrio-ver');//Ver
	Route::get ('/barrio/editar/{id}' , 'Cruds\BarrioController@edit')->name('superuser.barrio-editar');//Edit
	Route::get ('/barrio/editar/comunas/{id}' , 'Cruds\BarrioController@byComuna')->name('superuser.barrio-xd');
	Route::post ('/barrio/actualizar/{id}' , 'Cruds\BarrioController@update')->name('superuser.barrio-actualizar');//Update 

	// -------------Crud Ocupacion----------------
	Route::get ('/ocupacion' , 'Cruds\OcupacionController@index')->name('superuser.ocupacion-index');//Inicio
	Route::get ('/ocupacion/crear' , 'Cruds\OcupacionController@create')->name('superuser.ocupacion-crear');//Create
	Route::post ('/ocupacion/validacion' , 'Cruds\OcupacionController@store')->name('superuser.ocupacion-validar');//Store
	Route::get ('/ocupacion/{id}' , 'Cruds\OcupacionController@destroy')->name('superuser.ocupacion-eliminar');//Destroy
	Route::get ('/ocupacion/ver/{id}' , 'Cruds\OcupacionController@show')->name('superuser.ocupacion-ver');//Ver
	Route::get ('/ocupacion/editar/{id}' , 'Cruds\OcupacionController@edit')->name('superuser.ocupacion-editar');//Edit
	Route::post ('/ocupacion/actualizar/{id}' , 'Cruds\OcupacionController@update')->name('superuser.ocupacion-actualizar');//Update

	// -------------Crud TipoIdentificacion----------------
	Route::get ('/tipoidentificacion' , 'Cruds\TipoIdentificacionController@index')->name('superuser.tipoidentificacion-index');//Inicio
	Route::get ('/tipoidentificacion/crear' , 'Cruds\TipoIdentificacionController@create')->name('superuser.tipoidentificacion-crear');//Create
	Route::post ('/tipoidentificacion/validacion' , 'Cruds\TipoIdentificacionController@store')->name('superuser.tipoidentificacion-validar');//Store
	Route::get ('/tipoidentificacion/{id}' , 'Cruds\TipoIdentificacionController@destroy')->name('superuser.tipoidentificacion-eliminar');//Destroy
	Route::get ('/tipoidentificacion/ver/{id}' , 'Cruds\TipoIdentificacionController@show')->name('superuser.tipoidentificacion-ver');//Ver
	Route::get ('/tipoidentificacion/editar/{id}' , 'Cruds\TipoIdentificacionController@edit')->name('superuser.tipoidentificacion-editar');//Edit
	Route::post ('/tipoidentificacion/actualizar/{id}' , 'Cruds\TipoIdentificacionController@update')->name('superuser.tipoidentificacion-actualizar');//Update

	// -------------Crud Dependencia----------------
	Route::get ('/dependencia' , 'Cruds\DependenciaController@index')->name('superuser.dependencia-index');//Inicio	
	Route::get ('/dependencia/crear' , 'Cruds\DependenciaController@create')->name('superuser.dependencia-crear');//Create
	Route::post ('/dependencia/validacion' , 'Cruds\DependenciaController@store')->name('superuser.dependencia-validar');//Store
	Route::get ('/dependencia/{id}' , 'Cruds\DependenciaController@destroy')->name('superuser.dependencia-eliminar');//Destroy
	Route::get ('/dependencia/ver/{id}' , 'Cruds\DependenciaController@show')->name('superuser.dependencia-ver');//Ver
	Route::get ('/dependencia/editar/{id}' , 'Cruds\DependenciaController@edit')->name('superuser.dependencia-editar');//Edit
	Route::post ('/dependencia/actualizar/{id}' , 'Cruds\DependenciaController@update')->name('superuser.dependencia-actualizar');//Update 

	// -------------Crud Catalogo tramite----------------
	Route::get ('/catalogotramite' , 'Cruds\CatalogoTramiteController@index')->name('superuser.catalogotramite-index');//Inicio
	Route::get ('/catalogotramite/crear' , 'Cruds\CatalogoTramiteController@create')->name('superuser.catalogotramite-crear');//Create
	Route::post ('/catalogotramite/validacion' , 'Cruds\CatalogoTramiteController@store')->name('superuser.catalogotramite-validar');//
	Route::post ('/catalogotramite/Documentos/{id}' , 'Cruds\CatalogoTramiteController@store2')->name('superuser.catalogotramite-validar2');//Store
    Route::get ('/catalogotramite/{id}' , 'Cruds\CatalogoTramiteController@destroy')->name('superuser.catalogotramite-eliminar');//Destroy
	Route::get ('/catalogotramite/ver/{id}' , 'Cruds\CatalogoTramiteController@show')->name('superuser.catalogotramite-ver');//Ver
	Route::get ('/catalogotramite/editar/{id}' , 'Cruds\CatalogoTramiteController@edit')->name('superuser.catalogotramite-editar');//Edit
	Route::post ('/catalogotramite/actualizar/{id}' , 'Cruds\CatalogoTramiteController@update')->name('superuser.catalogotramite-actualizar');//Update 	



	// -------------Crud Admin----------------
	Route::get ('/admin' , 'Cruds\AdminController@index')->name('superuser.admin-index');//Inicio
	Route::get ('/admin/crear' , 'Cruds\AdminController@create')->name('superuser.admin-crear');//Create
	Route::post ('/admin/validacion' , 'Cruds\AdminController@store')->name('superuser.admin-validar');//Store
    Route::get ('/admin/{id}' , 'Cruds\AdminController@destroy')->name('superuser.admin-eliminar');//Destroy
	Route::get ('/admin/editar/{id}' , 'Cruds\AdminController@edit')->name('superuser.admin-editar');//Edit
	Route::post ('/admin/actualizar/{id}' , 'Cruds\AdminController@update')->name('superuser.admin-actualizar');//Update 
	Route::post ('/admin/editar/password/{id}' , 'Cruds\AdminController@editpass')->name('superuser.admin-editarpass');//Edit

	// -------------Crud Empleado----------------
	Route::get ('/empleados' , 'Cruds\EmpleadoController@index')->name('superuser.empleados-index');//Inicio
	Route::get ('/empleados/crear' , 'Cruds\EmpleadoController@create')->name('superuser.empleados-crear');//Create
	Route::post ('/empleados/validacion' , 'Cruds\EmpleadoController@store')->name('superuser.empleados-validar');//Store
    Route::get ('/empleados/{id}' , 'Cruds\EmpleadoController@destroy')->name('superuser.empleados-eliminar');//Destroy
	Route::get ('/empleados/ver/{id}' , 'Cruds\EmpleadoController@show')->name('superuser.empleados-ver');//Ver
	Route::get ('/empleados/editar/{id}' , 'Cruds\EmpleadoController@edit')->name('superuser.empleados-editar');//Edit
	Route::post ('/empleados/actualizar/{id}' , 'Cruds\EmpleadoController@update')->name('superuser.empleados-actualizar');//Update 
	Route::post ('/empleados/editar/password/{id}' , 'Cruds\EmpleadoController@editpass')->name('superuser.empleados-editarpass');//Edit

	// -------------Crud EmpleadoJefe----------------
	Route::get ('/empleadojefe' , 'Cruds\EmpleadoJefeController@index')->name('superuser.empleadojefe-index');//Inicio
	Route::get ('/empleadojefe/crear' , 'Cruds\EmpleadoJefeController@create')->name('superuser.empleadojefe-crear');//Create
	Route::get ('/empleadojefe/crear/filtro/{id}' , 'Cruds\EmpleadoJefeController@byEmpleado')->name('superuser.empleadojefe-xd');
	Route::post ('/empleadojefe/validacion' , 'Cruds\EmpleadoJefeController@store')->name('superuser.empleadojefe-validar');//Store
    Route::get ('/empleadojefe/{id}' , 'Cruds\EmpleadoJefeController@destroy')->name('superuser.empleadojefe-eliminar');//Destroy
	Route::get ('/empleadojefe/ver/{id}' , 'Cruds\EmpleadoJefeController@show')->name('superuser.empleadojefe-ver');//Ver
	Route::get ('/empleadojefe/editar/{id}' , 'Cruds\EmpleadoJefeController@edit')->name('superuser.empleadojefe-editar');//Edit
	Route::post ('/empleadojefe/actualizar/{id}' , 'Cruds\EmpleadoJefeController@update')->name('superuser.empleadojefe-actualizar');//Update 	

	// -------------Crud Solicitante----------------
	Route::get ('/solicitantes' , 'Cruds\SolicitantesController@index')->name('superuser.solicitantes-index');//Inicio
	Route::get ('/solicitantes/crear' , 'Cruds\SolicitantesController@create')->name('superuser.solicitantes-crear');//Create
	Route::post ('/solicitantes/validacion' , 'Cruds\SolicitantesController@store')->name('superuser.solicitantes-validar');//Store
    Route::get ('/solicitantes/{id}' , 'Cruds\SolicitantesController@destroy')->name('superuser.solicitantes-eliminar');//Destroy
	Route::get ('/solicitantes/editar/{id}' , 'Cruds\SolicitantesController@edit')->name('superuser.solicitantes-editar');//Edit
	Route::get ('/solicitantes/editar/barrio/{id}' , 'Cruds\SolicitantesController@byBarrio')->name('superuser.solicitantes-xd');//Edit
	Route::get ('/solicitantes/ver/{id}' , 'Cruds\SolicitantesController@show')->name('superuser.solicitantes-ver');//Ver
	Route::post ('/solicitantes/actualizar/{id}' , 'Cruds\SolicitantesController@update')->name('superuser.solicitantes-actualizar');//Update 
	Route::post ('/solicitantes/editar/password/{id}' , 'Cruds\SolicitantesController@editpass')->name('superuser.solicitantes-editarpass');//Edit

	// -------------Crud Tramite----------------
	Route::get ('/tramites' , 'Cruds\TramitesController@index')->name('superuser.tramites-index');//Inicio
	Route::get ('/tramites/crear' , 'Cruds\TramitesController@create')->name('superuser.tramites-crear');//Create
	Route::get ('/tramites/editar/catalogos/{id}' , 'Cruds\TramitesController@byCatalogo')->name('superuser.tramites-xd');
	Route::get ('/tramites/editar/empleados/{id}' , 'Cruds\TramitesController@byEmpleado')->name('superuser.tramites-xd2');
	Route::post ('/tramites/validacion' , 'Cruds\TramitesController@store')->name('superuser.tramites-validar');//Store
    Route::get ('/tramites/{id}' , 'Cruds\TramitesController@destroy')->name('superuser.tramites-eliminar');//Destroy
	Route::get ('/tramites/ver/{id}' , 'Cruds\TramitesController@show')->name('superuser.tramites-ver');//Ver
	Route::get ('/tramites/editar/{id}' , 'Cruds\TramitesController@edit')->name('superuser.tramites-editar');//Edit
	Route::post ('/tramites/actualizar/{id}' , 'Cruds\TramitesController@update')->name('superuser.tramites-actualizar');//Update 	

		// -------------Crud Documentacion----------------

    Route::get ('/documentacion' , 'Cruds\DocumentacionController@index')->name('superuser.documentacion-index');//Inicio
     Route::get ('/documentacion/crear' , 'Cruds\DocumentacionController@create')->name('superuser.documentacion-crear');//Create


	
});
