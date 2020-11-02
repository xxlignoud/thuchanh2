<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ChallengeController;




Route::get('/', function () {
    return view('welcome');
});
//dang nhap
Route::get('login', [LoginController::class,'GetLogin'])->name('login');
Route::post('postlogin',[LoginController::class,'dangnhap']);

Route::get('student', [LoginController::class,'student'])->name('student')->middleware('auth','student');
Route::get('teacher', [LoginController::class,'teacher'])->name('teacher')->middleware('auth','teacher');
//xu ly hien thi users
Route::resource('users', UserController::class);

// xu ly message
Route::delete('message/{message}',[MessagesController::class,'destroy']);
Route::resource('messages', MessagesController::class);

Route::get('/messages', [MessagesController::class,'show'])->name('messages')->middleware('auth');
Route::post('message/store', [MessagesController::class,'sendMessage']);
// xu ly bai tap
Route::resource('assignments', AssignmentController::class);
Route::resource('submissions', SubmissionController::class);
Route::get('download/{filename}',[SubmissionController::class,'download']);
// challenge
Route::resource('challenges', ChallengeController::class);

Route::post('challenge-submit', [ChallengeController::class,'submit']);
Route::get('download/{filename}', [ChallengeController::class,'download']);
