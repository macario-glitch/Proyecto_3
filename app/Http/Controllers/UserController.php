<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin');
        $users = User::select('id', 'name', 'email', 'email_verified_at', 'password', 'role', 'created_at', 'updated_at')->orderBy('id', 'asc')->orderBy('updated_at', 'asc')->get();
        return view("usuario.usuario_index", compact('users'));
    }

    public function destroy($usuario_id)
    {
        $this->authorize('isAdmin');
        $usuario = User::find($usuario_id);
        $usuario->delete();
        session()->flash('success');
        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function edit($usuario_id)
    {
        $this->authorize('isAdmin');
        $usuario = User::find($usuario_id);
        return view("usuario.usuario_edit", compact('usuario'));
    }

    public function update(Request $request, $usuario)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'name' => 'required|string|min:2|max:255|regex:/^[a-zA-Z\s.\']*$/',
            'email' => 'required|string|email',
        ], [
            'name.regex' => 'El campo nombre NO es correcto, procura solo admitir Mayúsculas y minúsculas, puntos y comillas simples.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
        ]);

        $usuario = User::find($usuario);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->role = $request->input('role');
        $usuario->save();

        session()->flash('success', 'El usuario se ha modificado correctamente');
        return redirect()->route("user.index");
    }
}
