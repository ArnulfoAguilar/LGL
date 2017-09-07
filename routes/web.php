<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
   
	// Rutas de producto
	Route::name('productoLista')->get('/producto','ProductoController@ProductoLista');
	Route::name('productoNuevo')->get('/producto/nuevo','ProductoController@ProductoNuevo');	
	Route::name('productoNuevoPost')->post('/producto/nuevo','ProductoController@ProductoNuevoPost');
	// Route::name('productoVer')->get('/producto/{id}','ProductoController@ProductoVer');
	Route::name('productoEditar')->get('/producto/{id}/editar','ProductoController@ProductoEditar');
	Route::name('productoEditarPut')->put('/producto/{id}','ProductoController@ProductoEditarPut');
	Route::name('productoEliminar')->delete('/producto/{id}','ProductoController@ProductoEliminar');

	// Rutas de proveedores
	Route::name('proveedorLista')->get('/proveedor','ProveedorController@ProveedorLista');
	Route::name('proveedorNuevo')->get('/proveedor/nuevo','ProveedorController@ProveedorNuevo');	
	Route::name('proveedorNuevoPost')->post('/proveedor/nuevo','ProveedorController@ProveedorNuevoPost');
	// Route::name('proveedorVer')->get('/proveedor/{id}','ProveedorController@ProveedorVer');
	Route::name('proveedorEditar')->get('/proveedor/{id}/editar','ProveedorController@ProveedorEditar');
	Route::name('proveedorEditarPut')->put('/proveedor/{id}','ProveedorController@ProveedorEditarPut');
	Route::name('proveedorEliminar')->delete('/proveedor/{id}','ProveedorController@ProveedorEliminar');

	// Inventario
	Route::name('inventarioGeneral')->get('/inventario/','InventarioController@Inventario');
	Route::name('kardexProducto')->get('/kardex/{id}','InventarioController@KardexProducto');

	// Movimientos
	Route::name('entradaIndividual')->get('/entradaInvividual/','MovimientoController@EntradaIndividual');
	Route::name('entradaProductos')->get('/entradaProductos/','MovimientoController@EntradaProductos');
	Route::name('salidaProductos')->get('/salidaProductos/','MovimientoController@SalidaProductos');

	// Gestion de Usuarios
	Route::name('usuarioLista')->get('/usuario/','UsuarioController@UsuarioLista');	
	Route::name('usuarioNuevo')->get('/usuario/nuevo','UsuarioController@UsuarioNuevo');
	Route::name('usuarioNuevoPost')->post('/usuario/nuevo','UsuarioController@UsuarioNuevoPost');
	Route::name('usuarioEditar')->get('/usuario/{id}/editar','UsuarioController@UsuarioEditar');
	Route::name('usuarioEditarPassPut')->put('/usuario/{id}/pass','UsuarioController@UsuarioEditarPassPut');
	Route::name('usuarioEditarPut')->put('/usuario/{id}','UsuarioController@UsuarioEditarPut');
	Route::name('usuarioEliminar')->delete('/usuario/{id}','UsuarioController@UsuarioEliminar');

	// Formulas
	Route::name('formulaLista')->get('/formula/','FormulaController@FormulaLista');	
	Route::name('formulaNueva')->get('/formula/nueva','FormulaController@FormulaNueva');

});
