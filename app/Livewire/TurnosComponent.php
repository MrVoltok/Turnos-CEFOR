<?php

namespace App\Livewire;

use App\Models\Module;
use Livewire\Component;

class TurnosComponent extends Component
{
    public $modulo1;
    public $modulo2;
    public $modulo3;

    protected $listeners = ['turnsUpdated' => 'refreshTurns'];

    public function mount()
    {
        $this->refreshTurns();
    }

    public function refreshTurns()
    {
        $turns = Module::first();
        $this->modulo1 = $turns->modulo1;
        $this->modulo2 = $turns->modulo2;
        $this->modulo3 = $turns->modulo3;
    }

    public function render()
    {
        return view('livewire.turnos-component');
    }
}
