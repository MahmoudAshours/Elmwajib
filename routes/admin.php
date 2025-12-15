<?php

use App\Http\Controllers\Admin\BackupDownloadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Messages;
use Illuminate\Support\Facades\Route;

/* Dashboard Route */
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('backup/{filename}/{download_name}/download', BackupDownloadController::class)->name('backup.download');

/* Subject Routes */
Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], static function () {
    Route::get('', [SubjectController::class, 'index'])->name('index');
    Route::get('form/{subject?}', [SubjectController::class, 'form'])->name('form');
    Route::post('store/{subject?}', [SubjectController::class, 'store'])->name('store');
    Route::get('delete/{subject}', [SubjectController::class, 'delete'])->name('delete');
});

/* Topic Routes */
Route::group(['prefix' => 'topics', 'as' => 'topics.'], static function () {
    Route::get('', [TopicController::class, 'index'])->name('index');
    Route::get('form/{topic?}', [TopicController::class, 'form'])->name('form');
    Route::post('store/{topic?}', [TopicController::class, 'store'])->name('store');
    Route::get('delete/{topic}', [TopicController::class, 'delete'])->name('delete');
});

/* Lesson Routes */
Route::group(['prefix' => 'lessons', 'as' => 'lessons.'], static function () {
    Route::get('', [LessonController::class, 'index'])->name('index');
    Route::get('form/{lesson?}', [LessonController::class, 'form'])->name('form');
    Route::post('store/{lesson?}', [LessonController::class, 'store'])->name('store');
    Route::get('delete/{lesson}', [LessonController::class, 'delete'])->name('delete');
    Route::post('images/upload', [LessonController::class, 'uploadImages'])->name('images.upload');
});

/* Question Routes */
Route::group(['prefix' => 'questions', 'as' => 'questions.'], static function () {
    Route::get('', [QuestionController::class, 'index'])->name('index');
    Route::get('form', [QuestionController::class, 'form'])->name('add');
    Route::get('form/{question}', [QuestionController::class, 'form'])->name('edit');
    Route::post('store/{question?}', [QuestionController::class, 'store'])->name('store');
    Route::get('delete/{question}', [QuestionController::class, 'delete'])->name('delete');
});

/* User Routes */
Route::group(['prefix' => 'users', 'as' => 'users.'], static function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('form/{user?}', [UserController::class, 'form'])->name('form');
    Route::post('store/{user?}', [UserController::class, 'store'])->name('store');
    Route::get('delete/{user}', [UserController::class, 'delete'])->name('delete');
});

/* Sponsor Routes */
Route::group(['prefix' => 'sponsors', 'as' => 'sponsors.'], static function () {
    Route::get('', [SponsorController::class, 'index'])->name('index');
    Route::get('form/{sponsor?}', [SponsorController::class, 'form'])->name('form');
    Route::post('store/{sponsor?}', [SponsorController::class, 'store'])->name('store');
    Route::get('delete/{sponsor}', [SponsorController::class, 'delete'])->name('delete');
});

/* Message */
Route::get('messages', Messages::class)->name('messages.index');
