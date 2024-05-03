<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\QuejasMailable;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        return view('emails.quejas_index', compact('usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required|min:10|max:255',
        ]);

        Mail::to('pasteleria@support.com')
            ->send(new QuejasMailable($request->all()));
        
        session()->flash('success', 'El correo se ha enviado correctamente.');
        return redirect()->route('quejas.index');
    }
}
