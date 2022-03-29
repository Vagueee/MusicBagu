<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MusicController;


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
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/music/create', function () {
    return view('create');
})->middleware(['auth'])->name('create');

Route::resource('Music', MusicController::class);

Route::get('/dashboard',[MusicController::class, 'index']);

Route::post('/dashboard', [MusicController::class, 'store']);

Route::get('/music/create',[MusicController::class, 'create']);

Route::put('/dashboard/{id}',[MusicController::class, 'update']);

Route::get('/music/{id}/edit',[MusicController::class, 'edit']);

Route::get('/music/{id}/detail',[MusicController::class, 'show']);

Route::delete('/music/{id}',[MusicController::class, 'destroy']);

require __DIR__.'/auth.php';
