<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TesterController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/home', [HomeController::class, "index"]);
Route::get("/redirect", [HomeController::class, "redirect"]);
Route::get('/add-dev', [AdminController::class, 'addDeveloper']);
Route::get('/viewallusers', [AdminController::class, 'viewAllUsers']);
Route::post('/maketester/{id}', [AdminController::class, 'makeTester']);
Route::post('/makedeveloper/{id}', [AdminController::class, 'makeDeveloper']);
Route::post('/makeadmin/{id}', [AdminController::class, 'makeAdmin']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteUser']);
Route::get('/reporterror', [TesterController::class, 'reportErrorView']);
Route::post('/reporterroraction', [TesterController::class, 'reportErrorAction']);
Route::get('/viewallreportederrors', [AdminController::class, 'viewAllReportedErrors']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
