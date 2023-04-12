<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Languages;
use App\Http\Livewire\Comments;
use App\Http\Livewire\Proverbs;

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
});
//Route::get('/main/{id}', [Languages\Languages::class,'mount'])->name('home.page');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/languages', Languages\Languages::class);
    Route::get('/language/{code}/proverbs/{id}', Proverbs\ProverbShow::class);
    Route::get('/proverbs/{language}/{id}',Comments\Comments::class)->name('proverbs');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
