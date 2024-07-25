<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ParticipantsController;

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

Route::get('upload', function(){
	return view('upload');
});

Route::get('/Analytics', function () {
    return view('Analytics');
});

//Route::post('upload', [App\Http\Controllers\ExcelController::class, 'import'])->name('upload');
//Route::post('/upload', 'UploadController@upload')->name('upload');

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

Route::get('schools/create', [App\Http\Controllers\SchoolController::class, 'create'])->name('schools.create');
//Route::post('/schools', 'SchoolController@store')->name('Schools.store');
Route::post('/schools', [App\Http\Controllers\SchoolController::class, 'store'])->name('Schools.store');
//Route::post('schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('/schools', [App\Http\Controllers\SchoolController::class, 'displaySchoolDetails'])->name('schools.display');
Route::get('/schools/display-representatives', [App\Http\Controllers\SchoolController::class, 'displayRepDetails'])->name('schools.display-representatives');

Route::get('representatives/create', [RepresentativeController::class, 'create'])->name('representatives.create');
Route::get('/representatives/create', 'App\Http\Controllers\RepresentativeController@create')->name('representatives.create');
//Route::post('/representatives', 'RepresentativeController@store')->name('Representatives.store');
Route::post('representatives', [RepresentativeController::class, 'store'])->name('representatives.store');
Route::get('/representatives', [App\Http\Controllers\RepresentativeController::class, 'displayRepresentativeDetails'])->name('Representatives.display');

Route::get('challenges/create', [App\Http\Controllers\ChallengeController::class, 'create'])->name('challenges.create');
Route::post('/challenges', [App\Http\Controllers\ChallengeController::class, 'store'])->name('challenges.store');
//Route::post('challenges/upload-questions', [App\Http\Controllers\QuestionsController::class, 'uploadQuestions'])->name('upload.questions');

Route::get('/participants', [App\Http\Controllers\ParticipantsController::class, 'displayParticipantDetails'])->name('participants.display');

//Route::post('/import', 'ExcelController@import')->name('upload.questions');

//Route::post('/challenges', 'QuestionsController@uploadQuestions')->name('upload.questions');
Route::post('challenges/upload-questions', [App\Http\Controllers\QuestionsController::class, 'uploadQuestions'])->name('upload.questions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

