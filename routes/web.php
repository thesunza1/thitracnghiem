<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adddulieuController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\StaffsController;
use App\Models\Questions;

use App\Http\Controllers\ReliesController;
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


Auth::routes([
    'reset' => false,
    'register' => false,

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test02',[QuestionsController::class,'test02'] );
route::get('/teststaff',[StaffsController::class,'index']);

//Quesion
Route::get('/questions', [QuestionsController::class, 'index']);
Route::get('/question/detail/{id}', [QuestionsController::class, 'detail']);
Route::get('/question/edit/{id}', [QuestionsController::class, 'edit']);
Route::post('/question/update', [QuestionsController::class, 'update']);
Route::get('/question/add', [QuestionsController::class, 'add']);
Route::post('/question/create', [QuestionsController::class, 'create']);

//Add more answer
Route::post('/answer/add/{id}', [ReliesController::class, 'add']);
//Change correct answer
Route::post('/answer/is_correct/{id}', [ReliesController::class, 'is_correct']);
// delete answer
Route::post('/answer/delete/{id}', [ReliesController::class, 'delete']);

