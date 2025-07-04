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
        $dataRestrict = $modules->restrict;

        $disabledModules = json_decode($dataRestrict, true);

        return view('gestion', ['modules' => $modules, 'disabledModules' => $disabledModules]);
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
        $module4 = 0;

        $turns = Module::first();
        $turns->global = $global;
        $turns->modulo1 = $module1;
        $turns->modulo2 = $module2;
        $turns->modulo3 = $module3;
        $turns->modulo4 = $module4;

        $turns->save();

        return redirect()->back();
    }

    public function updateTurns(Request $request)
    {
        // Obtener el módulo específico desde la solicitud
        $global = $request->global + 1;

        $modulo = $request->modulo;
        $modulos = ['modulo1', 'modulo2', 'modulo3', 'modulo4'];

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

    public function restrictModules(Request $request)
    {
        $data = $request->all();

        $restricted = array_keys(array_filter($data, function ($value, $key) {
            return $value === 'off' && strpos($key, 'modulo') === 0;
        }, ARRAY_FILTER_USE_BOTH));

        $moduleTable = Module::first();
        $moduleTable->restrict = $restricted;

        $moduleTable->save();

        return redirect()->back();
    }
}
