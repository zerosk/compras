<?php

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

Auth::routes(['verify' => true]);


Route::get('/', function(){
    return view('welcome');
});

Route::get('home', function(){
    return view('home');
})->middleware('auth');

//Backoffice
Route::group(['middleware'=> ['auth'], 'as' => 'backoffice.'], function(){

    Route::get('admin','AdminController@show')->name('admin.show');

 
    Route::resource('user', 'UserController');
    Route::get('user_import','UserController@import')->name('user.import');
    Route::post('user_make_import', 'UserController@make_import')->name('user.make_import');
    Route::get('user/{user}/assing_role', 'UserController@assing_role')->name('user.assing_role');
    Route::post('user/{user}/role_assignment','UserController@role_assignment')->name('user.role_assignment');
    Route::get('user/{user}/assing_permission', 'UserController@assing_permission')->name('user.assing_permission');
    Route::post('user/{user}/permission_assigment', 'UserController@permission_assignment')->name('user.permission_assingment');
    
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});
