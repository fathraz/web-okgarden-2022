<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\GardenerController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DesignerController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login_form');
Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');

// Route Area Gardener
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {

    Route::get('/gardener', [GardenerController::class, 'index'])->name('dashboard_gardener');
    Route::get('/gardener_projects', [GardenerController::class, 'show_projects'])->name('manage_project');
    Route::post('/add/project', [GardenerController::class, 'add_project']);
    Route::post('/project/destroy/{id}', [GardenerController::class, 'destroy_project']);
    Route::post('/project/update/{id}', [GardenerController::class, 'update_project']);

});

// Route Area Designer
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {

   Route::get('/designer', [DesignerController::class, 'index'])->name('dashboard_designer');
   Route::get('/designer_projects', [DesignerController::class, 'show_projects']);
   Route::post('/designer/add/project', [DesignerController::class, 'add_project']);
   Route::post('/designer/project/destroy/{id}', [DesignerController::class, 'destroy_project']);
   Route::post('/designer/project/update/{id}', [DesignerController::class, 'update_project']);

});

// Route Area User
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {

   Route::get('/', [UserController::class, 'index'])->name('dashboard_user');
   Route::get('/projects', [UserController::class, 'show_projects'])->name('read_project');

});


Route::group(['middleware' => ['auth']], function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout_action');

});
