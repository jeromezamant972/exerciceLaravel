<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class,'index']);
Route::get('/ajouter', [TaskController::class,'store'])->name('ajouter');
Route::get('/supprimer', [TaskController::class,'destroy'])->name('supprimer');
Route::get('/update', [TaskController::class,'update'])->name('update');
