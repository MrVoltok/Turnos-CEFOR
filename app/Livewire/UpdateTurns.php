<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Module;

class UpdateTurns extends Component
{
    public $modulo1;
    public $modulo2;
    public $modulo3;
    public $global;

    public function mount()
    {
        $modules = Module::first();
        $this->modulo1 = $modules->modulo1;
        $this->modulo2 = $modules->modulo2;
        $this->modulo3 = $modules->modulo3;
        $this->global = $modules->global;
    }

    public function updateTurns($modulo)
    {
        $this->global += 1;
        $this->$modulo = $this->global;

        $turns = Module::first();
        $turns->$modulo = $this->$modulo;
        $turns->global = $this->global;
        $turns->save();

        // Emitir un evento para actualizar la vista en tiempo real
        $this->emit('turnsUpdated');
    }

    public function render()
    {
        return view('livewire.update-turns');
    }
}
