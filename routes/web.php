<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\BenevolatController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/matchs/planning', [GameController::class, 'planning'])->name('gamesPlanning');
Route::get('/matchs/planning/result/{idGame}', [GameController::class, 'planningFinishGame'])->name('finishGame');
Route::post('/matchs/planning/result', [GameController::class, 'planningFinishGamePOST'])->name('finishGamePOST');

Route::get('/matchs/result', [ResultController::class, 'result'])->name('gamesResult');

Route::get('/messages/list', [MessageController::class, 'liste'])->name('listeMessages');
Route::get('/events/list', [EvenementController::class, 'liste'])->name('listeEvents');

Route::get('/benevolat/list', [BenevolatController::class, 'liste'])->middleware(['auth'])->name('listeBenes');

Route::get('/team/list', [TeamController::class, 'liste'])->name('listeEquipe');

require __DIR__ . '/auth.php';
