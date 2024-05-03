<?php

namespace App\Livewire;

use Livewire\Component;

class OpcionesPerfil extends Component
{
    protected $listeners = ['datosGuardados'];
    public $name;
    public $role;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->role = auth()->user()->role;
    }

    public function datosGuardados()
    {
        $this->mount();
    }
    
    public function render()
    {
        return view('livewire.opciones-perfil');
    }
}
