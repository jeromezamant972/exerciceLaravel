<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
    Route::get('/', [TaskController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
    Route::post('/ajouter', [TaskController::class,'store'])->name('ajouter');
    // mettre route::post('/supprimer/{id}',[controler::class,'method'])
    Route::post('/supprimer ,{id}', [TaskController::class,'destroy'])->name('supprimer');
    Route::get('/update', [TaskController::class,'update'])->name('tasks.edit');
    // mettre la route du dashboard avec sa methode , rajouter le middleware et aprés lle / mettre le name
    Route::get('/dashboard',[TaskController::class,'dashboardTache'])->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
