<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\ModuleController;
use App\Models\Module;
use App\Models\Video;
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

Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');
// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gestion', [ModuleController::class, 'gestion'])->name('gestion');
Route::post('/gestion/init-turnos', [ModuleController::class, 'initTurns'])->name('init-turnos');
Route::post('/gestion/actualizar-turnos', [ModuleController::class, 'updateTurns'])->name('actualizar-turnos');
Route::get('/turnos', [ModuleController::class, 'getTurns'])->name('turnos.get');
Route::post('/turnos/restrict', [ModuleController::class, 'restrictModules'])->name('modules.restrict');

Route::get('/home', [ScreenController::class, 'showScreen'])->name('home');

Route::post('/dashboard/avisos/nuevo', [MessageController::class, 'store'])->name('message.add');
Route::put('/dashboard/avisos/nuevo/{message}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/dashboard/avisos/nuevo/{message}', [MessageController::class, 'delete'])->name('message.delete');

Route::put('/dashboard/screen', [ScreenController::class, 'selectView'])->name('selectView');

// ROUTES FOR MEDIA
Route::post('/dashboard/imagen/nuevo', [MediaController::class, 'storeImage'])->name('image.add');
Route::delete('/dashboard/imagen/{image}', [MediaController::class, 'deleteImage'])->name('image.delete');
Route::post('/dashboard/video/nuevo', [MediaController::class, 'storeVideo'])->name('video.add');
Route::delete('/dashboard/video/{video}', [MediaController::class, 'deleteVideo'])->name('video.delete');
Route::post('/dashboard/transmision/nuevo', [MediaController::class, 'storeIframe'])->name('iframe.add');

Route::get('/test', function () {
    return view('test', ['videos' => Video::all()]);
});

require __DIR__ . '/auth.php';
