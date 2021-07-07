<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adddulieuController;
use App\Http\Controllers\ContestsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\StaffsController;
use App\Http\Controllers\ExamsController;

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

// Route::get('/', function () {
//     return view('contests/home');
// });
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

Route::get('/', [App\Http\Controllers\ContestsController::class, 'index'])->name('home');


// Route::get('/test02',[QuestionsController::class,'test02'] );
// route::get('/teststaff',[StaffsController::class,'index']);

//Quesion
Route::get('/questions', [QuestionsController::class, 'index'])->name('questions');
Route::get('/question/detail/{id}', [QuestionsController::class, 'detail'])->name('question.detail');
Route::get('/question/edit/{id}', [QuestionsController::class, 'edit'])->name('question.edit');
Route::post('/question/update', [QuestionsController::class, 'update']);
Route::get('/question/add', [QuestionsController::class, 'add'])->name('question.add');
Route::post('/question/create', [QuestionsController::class, 'create']);

//Add more answer
Route::post('/answer/add/{id}', [ReliesController::class, 'add']);
//Change correct answer
Route::post('/answer/is_correct/{id}', [ReliesController::class, 'is_correct']);
// delete answer
Route::post('/answer/delete/{id}', [ReliesController::class, 'delete']);

//Contest
Route::get('/contests', [ContestsController::class, 'index'])->name('contests');
Route::get('/contest/add', [ContestsController::class, 'add'])->name('contest.add');
Route::post('/contest/create', [ContestsController::class, 'create'])->name('contest.create');
Route::get('/contest/edit/{id}', [ContestsController::class, 'edit'])->name('contest.edit');
Route::post('/contest/update/{id}', [ContestsController::class, 'update'])->name('contest.update');
Route::post('/contest/delete/{id}', [ContestsController::class, 'delete'])->name('contest.delete');
Route::get('/contest/detail/{id}', [ContestsController::class, 'detail'])->name('contest.detail');

// Exam
Route::post('/contest/detail/{id}/exam/add',[ExamsController::class, 'add'])->name('exam.add');

