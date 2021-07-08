<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adddulieuController;
use App\Http\Controllers\ContestsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\StaffsController;

use App\Http\Controllers\BranchsController;


use App\Http\Controllers\ExamsController;


use App\Http\Controllers\ReliesController;
use Doctrine\DBAL\Schema\Index;

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
// Route::get('/themlevel',[adddulieuController::class, 'themlevel']);
// Route::get('/themrl',[adddulieuController::class, 'themrl']);

// Route::get('/thembranch',[adddulieuController::class, 'thembranch']);

// Route::get('/themstaff',[adddulieuController::class, 'themstaff']);

// Route::get('/themtheme',[adddulieuController::class, 'themtheme']);

// Route::get('/themqr',[adddulieuController::class, 'themqr']);

//staffscontroller

//questioncontroll


Auth::routes([
    'reset' => false,
    'register' => false,

]);

// route::get('/teststaff',[StaffsController::class,'index']);

//Quesion




Route::post('/question/update', [QuestionsController::class, 'update'])->name('question.update');

Route::post('/question/create', [QuestionsController::class, 'create'])->name('question.create');

Route::get('/questions', [QuestionsController::class, 'index'])->name('questions');
Route::get('/question/detail/{id}', [QuestionsController::class, 'detail'])->name('question.detail');
Route::get('/question/edit/{id}', [QuestionsController::class, 'edit'])->name('question.edit');

Route::get('/question/add', [QuestionsController::class, 'add'])->name('question.add');



//Add more answer
Route::post('/answer/add/{id}', [ReliesController::class, 'add']);
//Change correct answer
Route::post('/answer/is_correct/{id}', [ReliesController::class, 'is_correct']);
// delete answer
Route::post('/answer/delete/{id}', [ReliesController::class, 'delete']);


//staff
Route::get('/staffs',[StaffsController::class, 'index'])->name('staff.index');
Route::get('/staffs/show/{id}',[StaffsController::class, 'show'])->name('staff.show');
Route::post('/staffs/update',[StaffsController::class,'update'])->name('staff.update');
Route::post('/staffs/delete',[StaffsController::class,'drop'])->name('staff.drop');
Route::post('/staffs/create',[StaffsController::class,'storge'])->name('staff.create');
//staff
Route::get('/branchs',[BranchsController::class, 'index'])->name('branch.index');
Route::get('/branchs/show/{id}',[BranchsController::class, 'show'])->name('branch.show');
Route::post('/branchs/update',[BranchsController::class,'update'])->name('branch.update');
Route::post('/branchs/delete',[BranchsController::class,'drop'])->name('branch.drop');
Route::post('/branchs/create',[BranchsController::class,'storge'])->name('branch.create');
//contest
Route::get('/home',[ContestsController::class,'home'])->name('home');
Route::redirect('/', '/home' ); //redirect from / to /home when login in web



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


