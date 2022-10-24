<?php

use App\Http\Controllers\DeveloperController;
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
Route::get('/view-all-users', [AdminController::class, 'viewAllUsers']);
Route::post('/make-tester/{id}', [AdminController::class, 'makeTester']);
Route::post('/make-developer/{id}', [AdminController::class, 'makeDeveloper']);
Route::post('/make-admin/{id}', [AdminController::class, 'makeAdmin']);
Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser']);
Route::get('/report-error', [TesterController::class, 'reportErrorView']);
Route::post('/report-error-action', [TesterController::class, 'reportErrorAction']);
Route::get('/view-all-reported-errors', [AdminController::class, 'viewAllReportedErrors']);
Route::get('/assign-error/{id}', [AdminController::class, 'assignErrorView']);
Route::post('/assign-error-action/{id}', [AdminController::class, 'assignErrorAction']);
Route::get('/view-all-assigned-errors', [AdminController::class, 'viewAllAssignedErrors']);
Route::get('/edit-assigned-error/{id}', [AdminController::class, 'editAssignedErrorView']);
Route::post('/edit-assigned-error-action/{id}', [AdminController::class, 'editAssignedErrorAction']);
Route::get('/dev-view-all-assigned-errors', [DeveloperController::class, 'viewAllAssignedErrors']);
Route::get('/view-my-errors', [DeveloperController::class, 'viewMyAssignedErrors']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
