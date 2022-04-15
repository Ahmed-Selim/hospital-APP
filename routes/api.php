<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAPI;
use App\Models\User;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('doctors', DoctorController::class);

Route::post('register', [AuthAPI::class, 'register']);
Route::post('login', [AuthAPI::class, 'login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthAPI::class, 'logout']);
    Route::get('user', function(Request $request){
        return $request->user();
    });
    
    Route::post('/patients/create', [PatientController::class, 'store']);
    Route::get('/patients/{patient}', [PatientController::class, 'show']);
    Route::put('/patients/{patient}/edit', [PatientController::class, 'update']);
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy']);

    Route::get('/appointments/all', [AppointmentController::class, 'index']);
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);
    Route::put('/appointments/{appointment}/edit', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']);
    Route::post('/appointments/create', [AppointmentController::class, 'store']);
    
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
