<?php

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DownloadController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LessonController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\SubjectController;
use App\Http\Controllers\Front\TopicController;
use App\Http\Livewire\Front\LessonQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Home Route */
Route::get('/' , [ HomeController::class , 'home' ])->name('home');

/*About Faz*/
Route::view('about-faz' , 'front.pages.about-faz')->name('about_faz');

/*About Book*/
Route::view('about-book' , 'front.pages.about-book')->name('about_book');

/*Contact Us*/
Route::name('contact.')->group(function () {
    Route::get('contact-us' , [ ContactController::class , 'form' ])->name('form');
    Route::post('contact-us' , [ ContactController::class , 'store' ])->name('store');
    Route::get('contact-us/reload-captcha' , [ ContactController::class , "reloadCaptcha" ])->name('reload-captcha');
});

/* Download Book Routes */
Route::get('books/download' , [ HomeController::class , 'downloadBooks' ])->name('download');
Route::get('download/{type}' , DownloadController::class)->name('download_book');

/* Subject Routes */
Route::group([ 'prefix' => 'subjects' , 'as' => 'subjects.' ] , static function () {
    Route::get('' , [ SubjectController::class , 'index' ])->name('index');
    Route::get('{subject}' , [ SubjectController::class , 'show' ])->name('show');
});

/* Topic Routes */
Route::group([ 'prefix' => 'topics' , 'as' => 'topics.' ] , static function () {
    Route::get('{topic}' , [ TopicController::class , 'show' ])->name('show');
    Route::get('{topic}/certificate/download' , [
        TopicController::class , 'downloadCertificate'
    ])->name('certificate.download');
});

/* Lesson Routes */
Route::group([ 'prefix' => 'lessons/{lesson}' , 'as' => 'lessons.' ] , static function () {
    Route::get('' , [ LessonController::class , 'show' ])->name('show');
    Route::get('content/{next?}' , [ LessonController::class , 'content' ])->name('content');
    Route::get('quiz' , LessonQuiz::class)->name('quiz');
    Route::get('download' , [ LessonController::class , 'download' ])->name('download');
});

/* Profile Routes */
Route::group([ 'prefix' => 'profile' , 'as' => 'users.' ] , static function () {
    Route::get('' , [ ProfileController::class , 'profile' ])->name('profile');
    Route::get('account' , [ ProfileController::class , 'account' ])->name('account');
    Route::post('update-profile' , [ ProfileController::class , 'updateProfile' ])->name('update_profile');
    Route::post('update-password' , [ ProfileController::class , 'updatePassword' ])->name('update_password');
    Route::get('certificates' , [ ProfileController::class , 'certificates' ])->name('certificates');
    Route::get('download-certificate/{certificate}' , [
        ProfileController::class , 'downloadCertificate'
    ])->name('certificates_download');
});

Route::view("search/results" , 'front.pages.search-results')->name('search.results');
Route::get("search/lessons" , [ HomeController::class , 'getSearchResults' ])->name("search.lessons");
