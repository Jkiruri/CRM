<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
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
Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index');
    Route::get('/companies/create', 'create');
});
route::delete('http://127.0.0.1:8000/api/companies/{id}',[CompanyController::class,'delete_company']);
Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'index');
    Route::get('/contacts/create', 'create');
});