<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

class ModuleController extends Controller
{

    public function gestion()
    {
        $modules = Module::first();

        return view('gestion', ['modules' => $modules]);
    }

    public function initTurns(Request $request)
    {
        // dd($request->all());
        if ($request->numeroInicial != 0) {
            $global = $request->numeroInicial - 1;
        } else {
            $global = 0;
        }
        $module1 = 0;
        $module2 = 0;
        $module3 = 0;

        $turns = Module::first();
        $turns->global = $global;
        $turns->modulo1 = $module1;
        $turns->modulo2 = $module2;
        $turns->modulo3 = $module3;

        $turns->save();

        return redirect()->back();
    }

    public function updateTurns(Request $request)
    {
        // Obtener el módulo específico desde la solicitud
        $global = $request->global + 1;

        $modulo = $request->modulo;
        $modulos = ['modulo1', 'modulo2', 'modulo3'];

        // Validar que el módulo enviado es uno de los esperados (modulo1, modulo2, modulo3)
        if (!in_array($modulo, $modulos)) {
            abort(400, 'Módulo no válido');
        }

        // Obtener el registro de módulos desde la base de datos
        $turns = Module::first();

        // Incrementar el turno del módulo específico
        $turns->{$modulo} = $global;
        $turns->global = $global;

        // Guardar los cambios en la base de datos
        $turns->save();

        // Emitir un evento de Livewire para actualizar el componente
        // Livewire::emit('turnsUpdated');

        return redirect()->back();
    }

    public function getTurns()
    {
        $turns = Module::first();
        return response()->json($turns);
    }
}
