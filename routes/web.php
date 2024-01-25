<?php

use App\Http\Controllers\MatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

Route::get('/createTeams', function () {return view('createTeams');});
Route::post('/posts', TeamsController::class .'@store')->name('team.store');
Route::get('/showTeams', [TeamsController::class, 'show']);
Route::put('/updateTeam/{team}', TeamsController::class .'@update')->name('team.update'); //update
Route::get('/team/{team}/edit', TeamsController::class .'@edit')->name('team.edit');



Route::get('/showMatch', function () {return view('createMatch');});
Route::post('/match', MatchesController::class .'@store')->name('match.store');
Route::get('/createMatch', MatchesController::class .'@showMatchTeams')->name('match.get');// trae los equipos
Route::get('/getMatches', MatchesController::class .'@show')->name('allMatches.get');// trae los equipos







require __DIR__.'/auth.php';
