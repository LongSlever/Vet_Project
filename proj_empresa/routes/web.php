<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;

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
    return view('index');
});

// clients
Route::get('/client',[ClientController::class, 'index']);

Route::get('/client/new',[ClientController::class, 'create']);

Route::post('/client',[ClientController::class, 'store']);

Route::get('/client/edit/{id}',[ClientController::class, 'edit']);

Route::post('/client/{id}',[ClientController::class,'update']);

Route::get('/client/delete/{id}', [ClientController::class,'destroy']);

// pets

Route::get('/pet', [PetController::class,'index']);

Route::get('/pet/new', [PetController::class,'create']);

Route::post('/pet',[PetController::class,'store']);
