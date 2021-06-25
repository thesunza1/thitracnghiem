<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adddulieuController;
use App\Http\Controllers\StaffsController;
use App\Http\Controllers\QuestionsController;
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
    return view('welcome');
});
//adddulieucontroller
Route::get('/themlevel',[adddulieuController::class, 'themlevel']);

Route::get('/thembranch',[adddulieuController::class, 'thembranch']);

Route::get('/themstaff',[adddulieuController::class, 'themstaff']);

Route::get('/themtheme',[adddulieuController::class, 'themtheme']);

Route::get('/themqr',[adddulieuController::class, 'themqr']);

//staffscontroller

//questioncontroll

