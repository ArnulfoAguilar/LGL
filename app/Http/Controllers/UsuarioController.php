<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsuarioNuevoRequest;
use App\Http\Requests\UsuarioEditarRequest;

class UsuarioController extends Controller
{
    // Esta función devuelve la vista de la lista de usuarios 
	public function UsuarioLista()
	{
		$usuarios = User::all();
		return view('usuario.usuarioLista')->with(['usuarios' => $usuarios]);
	}

	public function UsuarioNuevo()
	{
		return view('usuario.usuarioNuevo');
	}

	public function UsuarioNuevoPost(UsuarioNuevoRequest $request)
	{
		User::create([
			'name'=> $request->input('name'),
	    	'lastname' => $request->input('lastname'),
	   		'email' => $request->input('email'),
	    	'password' => bcrypt($request->input('password')),
	    	'username' => $request->input('username'),
	    	'telefono'=>$request->input('telefono'),
	    	'rol' => $request->input('rol'),
			]);
		session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El usuario fue agregado!');
		return redirect()->route('usuarioLista');
	}

	public function UsuarioEditar(Request $request)
	{
		$usuario = User::find($request->id);
		return view('usuario.usuarioEditar')->with(['usuario' => $usuario]);
	}

	public function UsuarioEditarPut(UsuarioEditarRequest $request)
	{
		return 'algo';
	}

	public function UsuarioEditarPassPut(Request $request)
	{
		$usuario = User::find($request->id);
		$usuario->password = bcrypt($request->input('password'));
		$usuario->save();
		session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El password del usuario fue actualizado!');
    	return redirect()->route('usuarioLista');
	}	

}