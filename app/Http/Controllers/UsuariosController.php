<?php

namespace App\Http\Controllers;


// Importo los facades de las clases a usar
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Este método muestra la vista de todos los usuarios. Para ello, primero recupero los usuarios y los guardo en $usuarios, y paso esta variable a la vista
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('index', compact('usuarios'));
    }

    /**
     * Este método simplemente devuelve la vista para crear usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Este método se encarga de guardar el usuario a crear. Primero valido la información enviada por el cliente y si todo sale bien se crea el usuario, y sólo después se regresa al usuario a la págian anterior con un mensaje de éxito
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        return back()->with('msg_success', 'Usuario creado correctamente');
    }



    /**
     * Este método se encarga de mostrar la vista que muestra info del usuario seleccionado
     * @param  User usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('show', compact('usuario'));
    }
    
    
    
    /**
     * Este método se encarga de mostrar la vista donde se edita al usuario seleccionado
     *
     * @param  User usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('edit', compact('usuario'));
    }
    
    /**
     * Este método se encarga de actualizar en la base de datos la información enviada por el cliente. Primero valido la información enviada, luego actualizo en base de datos y finalmente redirijo al usuario a la pantalla anterior con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $this->validate($request, [
            'name' => 'required'
            ]);
        $usuario->update($request->all());
        return back()->with('msg_success', 'Usuario actualizado correctamente');
    }
    
    /**
     * Este método se encarga de eliminar de la base de datos al usuario seleccionado.
     *
     * @param  User usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return back()->with('msg_success', 'Usuario borrado correctamente');
    }

}
