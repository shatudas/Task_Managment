<?php

use Illuminate\Support\Facades\Route;

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






Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
	Route::get('/', function () {
    return view('auth/login');
});


Route::group(['middleware' => 'auth'],function(){
 //-------user---------//
	Route::prefix('user')->group(function()
	{
		Route::get('/view','Backend\UserController@view')->name('user.view');
		Route::get('/add','Backend\UserController@add')->name('user.add');
		Route::post('/store','Backend\UserController@store')->name('user.store');
		Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
		Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
		Route::get('/delete/{id}','Backend\UserController@delete')->name('user.delete');
		Route::get('/active/{id}','Backend\UserController@active')->name('user.active');
		Route::get('/inacative/{id}','Backend\UserController@inacative')->name('user.inacative');
	});


	




});


