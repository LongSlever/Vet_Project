<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VetController;
use App\Models\Client;
use App\Models\Consultation;
use App\Models\Vet;
use Illuminate\Contracts\Pagination\Paginator;

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

Route::get('/',[HomeController::class, 'index']);

// auth
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('user-access')->name('logout');
});

// clients
Route::get('/client',[ClientController::class, 'index']);

Route::get('/client/new',[ClientController::class, 'create']);

Route::post('/client',[ClientController::class, 'store']);

Route::get('/client/edit/{id}',[ClientController::class, 'edit']);

Route::post('/client/{id}',[ClientController::class,'update']);

Route::get('/client/delete/{id}', [ClientController::class,'destroy']);

Route::middleware('user-access')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');


});
Route::get('/client/profile', [ClientController::class,'profile']);

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


Route::get('/consultation', [ConsultationController::class,'index']);


Route::get('/consultation/new', [ConsultationController::class,'create']);

Route::post('/consultation', [ConsultationController::class,'store']);

Route::get('/consultation/delete/{id}', [ConsultationController::class,'destroy']);

Route::get('/consultation/show/{id}', [ConsultationController::class,'show']);


//report


Route::get('/report', [ReportController::class,'index']);

Route::post('/report/show', [ReportController::class,'show']);
