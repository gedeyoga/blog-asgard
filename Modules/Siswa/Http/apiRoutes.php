<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/siswa', 'middleware' => ['api.token', 'auth.admin']], function (Router $router) {
    //Kategori
    $router->get('kategori', [
        'as' => 'api.siswa.kategori.index',
        'uses' => 'KategoriController@index',
        'middleware' => 'can:kategori.kategories.index'
    ]);
    $router->get('kategori/create', [
        'as' => 'api.siswa.kategori.create',
        'uses' => 'KategoriController@create',
        'middleware' => 'can:kategori.kategories.create'
    ]);
    $router->post('kategori', [
        'as' => 'api.siswa.kategori.store',
        'uses' => 'KategoriController@store',
        'middleware' => 'can:kategori.kategories.create'
    ]);
    $router->get('kategori/{kategori}/edit', [
        'as' => 'api.siswa.kategori.edit',
        'uses' => 'KategoriController@edit',
        'middleware' => 'can:kategori.kategories.edit'
    ]);
    $router->post('kategori/update', [
        'as' => 'api.siswa.kategori.update',
        'uses' => 'KategoriController@update',
        'middleware' => 'can:kategori.kategories.edit'
    ]);
    $router->post('kategori/delete', [
        'as' => 'api.siswa.kategori.destroy',
        'uses' => 'KategoriController@destroy',
        'middleware' => 'can:kategori.kategories.destroy'
    ]);

    $router->post('kategori/find', [
        'as' => 'api.siswa.kategori.find',
        'uses' => 'KategoriController@find',
        'middleware' => 'can:kategori.kategories.edit'
    ]);
});
