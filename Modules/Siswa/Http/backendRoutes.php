<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/siswa'], function (Router $router) {
    $router->bind('siswa', function ($id) {
        return app('Modules\Siswa\Repositories\SiswaRepository')->find($id);
    });
    $router->get('siswas', [
        'as' => 'admin.siswa.siswa.index',
        'uses' => 'SiswaController@index',
        'middleware' => 'can:siswa.siswas.index'
    ]);
    $router->get('siswas/create', [
        'as' => 'admin.siswa.siswa.create',
        'uses' => 'SiswaController@create',
        'middleware' => 'can:siswa.siswas.create'
    ]);
    $router->post('siswas', [
        'as' => 'admin.siswa.siswa.store',
        'uses' => 'SiswaController@store',
        'middleware' => 'can:siswa.siswas.create'
    ]);
    $router->get('siswas/{siswa}/edit', [
        'as' => 'admin.siswa.siswa.edit',
        'uses' => 'SiswaController@edit',
        'middleware' => 'can:siswa.siswas.edit'
    ]);
    $router->put('siswas/{siswa}', [
        'as' => 'admin.siswa.siswa.update',
        'uses' => 'SiswaController@update',
        'middleware' => 'can:siswa.siswas.edit'
    ]);
    $router->delete('siswas/{siswa}', [
        'as' => 'admin.siswa.siswa.destroy',
        'uses' => 'SiswaController@destroy',
        'middleware' => 'can:siswa.siswas.destroy'
    ]);

    // Jurusan

    $router->get('jurusans', [
        'as' => 'admin.siswa.jurusan.index',
        'uses' => 'JurusanController@index',
        'middleware' => 'can:jurusan.jurusans.index'
    ]);
    $router->get('jurusans/create', [
        'as' => 'admin.siswa.jurusan.create',
        'uses' => 'JurusanController@create',
        'middleware' => 'can:jurusan.jurusans.create'
    ]);
    $router->post('jurusans', [
        'as' => 'admin.siswa.jurusan.store',
        'uses' => 'JurusanController@store',
        'middleware' => 'can:jurusan.jurusans.create'
    ]);
    $router->get('jurusans/{jurusan}/edit', [
        'as' => 'admin.siswa.jurusan.edit',
        'uses' => 'JurusanController@edit',
        'middleware' => 'can:jurusan.jurusans.edit'
    ]);
    $router->put('jurusans/{jurusan}', [
        'as' => 'admin.siswa.jurusan.update',
        'uses' => 'JurusanController@update',
        'middleware' => 'can:jurusan.jurusans.edit'
    ]);
    $router->delete('jurusans/{jurusan}', [
        'as' => 'admin.siswa.jurusan.destroy',
        'uses' => 'JurusanController@destroy',
        'middleware' => 'can:jurusan.jurusans.destroy'
    ]);

    //Test
    $router->get('test/', [
        'as' => 'admin.siswa.test.index',
        'uses' => 'TestController@index',
        'middleware' => 'can:test.tests.index'
    ]);

    //Kategori
    $router->get('kategori/', [
        'as' => 'admin.siswa.kategori.index',
        'uses' => 'KategoriController@index',
        'middleware' => 'can:kategori.kategories.index'
    ]);
    $router->get('kategori/create', [
        'as' => 'admin.siswa.kategori.create',
        'uses' => 'KategoriController@create',
        'middleware' => 'can:kategori.kategories.create'
    ]);
    $router->post('kategori', [
        'as' => 'admin.siswa.kategori.store',
        'uses' => 'KategoriController@store',
        'middleware' => 'can:kategori.kategories.create'
    ]);
    $router->get('kategori/{kategori}/edit', [
        'as' => 'admin.siswa.kategori.edit',
        'uses' => 'KategoriController@edit',
        'middleware' => 'can:kategori.kategories.edit'
    ]);
    $router->put('kategori/{kategori}', [
        'as' => 'admin.siswa.kategori.update',
        'uses' => 'KategoriController@update',
        'middleware' => 'can:kategori.kategories.edit'
    ]);
    $router->delete('kategori/{kategori}', [
        'as' => 'admin.siswa.kategori.destroy',
        'uses' => 'KategoriController@destroy',
        'middleware' => 'can:kategori.kategories.destroy'
    ]);
// append

});
