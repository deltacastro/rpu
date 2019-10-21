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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // ADMINISTRADOR DE USUARIO
    Route::group(['prefix' => 'usuarios', 'middleware' => ['auth']], function () {
        Route::get('/', 'Admin\UsersController@index')
                ->middleware('role_or_permission:user-list');
    });
    // ADMINISTRADOR DE ROLES
    Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function () {
        Route::get('/', 'Admin\RolesController@index')
                ->middleware('role_or_permission:role-list');
    });
    // ADMINISTRADOR DE PERMISOS
    Route::group(['prefix' => 'permisos', 'middleware' => ['auth']], function () {
        Route::get('/', 'Admin\PermisosController@index')
                ->middleware('role_or_permission:permission-list');
        Route::get('{permiso}/editar', 'Admin\PermisosController@edit')
                ->middleware('role_or_permission:permission-edit')
                ->name('admin.permisos.edit');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
