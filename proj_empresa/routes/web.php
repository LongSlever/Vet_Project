<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\VetController;
use App\Models\Vet;

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

Route::get('/pet/edit/{id}', [PetController::class,'edit']);

Route::post('/pet/{id}',[PetController::class,'update']);

Route::get('pet/delete/{id}', [PetController::class,'destroy']);

// procedures

Route::get('/procedure', [ProcedureController::class,'index']);

Route::get('/procedure/new', [ProcedureController::class,'create']);

Route::post('/procedure',[ProcedureController::class,'store']);

Route::get('/procedure/edit/{id}', [ProcedureController::class,'edit']);

Route::post('/procedure/{id}',[ProcedureController::class,'update']);

Route::get('/procedure/delete/{id}', [ProcedureController::class,'destroy']);


// veterinarios

Route::get('/vet', [VetController::class,'index']);

Route::get('/vet/new', [VetController::class,'create']);

Route::post('/vet',[VetController::class,'store']);

Route::get('/vet/edit/{id}',[VetController::class, 'edit']);

Route::post('/vet/{id}',[VetController::class,'update']);

Route::get('/vet/delete/{id}', [VetController::class,'destroy']);
