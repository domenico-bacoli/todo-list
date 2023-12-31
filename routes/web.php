<?php

use App\Http\Controllers\Admin\CompletedController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TodoController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


//Le rotte di amministrazione devono avere il prefisso "admin/ o admin."
//il nome delle rotte inizia con "admin."
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function(){
    //rotte per la gestione dei todo completati
    Route::post('completed/{todo}', [CompletedController::class, 'index'])->name('completed.index');
    Route::post('completed/show/{todo}', [CompletedController::class, 'show'])->name('completed.show');

    //CRUD
    Route::resource('todos', TodoController::class)->parameters(['todos' => 'todo:slug']);

    // Route::get('/', [DashboardController::class, 'home']);
    Route::get('/', function() {
        return redirect()->action([TodoController::class, 'index']);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
