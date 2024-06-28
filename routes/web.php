<?php

use App\Http\Controllers\ProfileController;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('gestion');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gestion', [App\Http\Controllers\ModuleController::class, 'gestion'])->name('gestion');
Route::post('/gestion/init-turnos', [App\Http\Controllers\ModuleController::class, 'initTurns'])->name('init-turnos');
Route::post('/gestion/actualizar-turnos', [App\Http\Controllers\ModuleController::class, 'updateTurns'])->name('actualizar-turnos');
Route::get('/turnos', [App\Http\Controllers\ModuleController::class, 'getTurns'])->name('turnos.get');

Route::get('/home', function () {
    // Obtener el registro de módulos desde la base de datos
    $turns = Module::first();

    // Pasar los datos a la vista 'home'
    return view('home', compact('turns'));
})->name('home');

require __DIR__ . '/auth.php';
