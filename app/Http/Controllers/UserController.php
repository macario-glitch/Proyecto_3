<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'email_verified_at', 'password', 'role', 'profile_photo_path', 'created_at', 'updated_at')->orderBy('id', 'asc')->orderBy('updated_at', 'asc')->get();
        return view("usuario.usuario_index", compact('users'));
    }

    public function destroy($usuario_id)
    {
        $usuario = User::find($usuario_id);
        $usuario->delete();
        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function edit($usuario_id)
    {
        $usuario = User::find($usuario_id);
        return view("usuario.usuario_edit", compact('usuario'));
    }

    public function update(Request $request, $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|string|email|max:255',
        ]);

        $usuario = User::find($usuario);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->save();

        return redirect()->route("user.index");
    }
}
