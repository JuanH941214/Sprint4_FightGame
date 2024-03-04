<?php

use App\Http\Controllers\MatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


use App\Models\Teams;
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
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

//login
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/signUp', [UserController::class, 'signUpview'])->name('signUp');
Route::post('/signUp', [UserController::class, 'create'])->name('registrar');


//
Route::middleware('auth')->get('/createTeams', function () {
    $userId = Auth::id();
    return view('createTeams', ['userId' => $userId]);
});
//Route::get('/createTeams', function () {return view('createTeams');});
Route::post('/posts', TeamsController::class .'@store')->name('team.store');
Route::get('/showTeams', [TeamsController::class, 'show'])->name('teams.show');
Route::put('/updateTeam/{team}', TeamsController::class .'@update')->name('team.update'); //update
Route::get('/team/{team}/edit', TeamsController::class .'@edit')->name('team.edit');
Route::delete('/delete/team/{id}', [TeamsController::class, 'destroy'])->name('delete');



Route::get('/showMatch', function () {return view('createMatch');});
Route::post('/match', MatchesController::class .'@store')->name('match.store');
Route::get('/createMatch', MatchesController::class .'@showMatchTeams')->name('match.get');// trae los equipos
Route::get('/getMatches', MatchesController::class .'@show')->name('allMatches.get');// trae los equipos
Route::get('/fight/{id}', MatchesController::class .'@showMatch')->name('fight.get');// empieza la pelea trae el id del match y los luchadores
Route::post('/fight', MatchesController::class .'@determineWinner')->name('winner.get');// empieza la pelea trae el id del match y los luchadores
Route::delete('/delete/{id}', MatchesController::class .'@destroy')->name('delete.match');// empieza la pelea trae el id del match y los luchadores









require __DIR__.'/auth.php';
