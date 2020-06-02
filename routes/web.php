<?php

use Illuminate\Support\Facades\Route;
use App\Project;
use App\Activity;
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/projects', 'ProjectController@index');
    Route::get('/projects/create', 'ProjectController@create');
    Route::get('/projects/{project}', 'ProjectController@show');
    Route::get('/projects/{project}/edit', 'ProjectController@edit');
    Route::patch('/projects/{project}', 'ProjectController@update');
    Route::post('/projects', 'ProjectController@store');
    Route::delete('/projects/{project}', 'ProjectController@destroy');


    Route::post('/projects/{project}/invitations', 'ProjectInvitationsController@store');
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();


