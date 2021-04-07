<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/mahasiswa'], function (Router $router) {
    $router->bind('mahasiswa', function ($id) {
        return app('Modules\Mahasiswa\Repositories\MahasiswaRepository')->find($id);
    });
    $router->get('mahasiswas', [
        'as' => 'admin.mahasiswa.mahasiswa.index',
        'uses' => 'MahasiswaController@index',
        'middleware' => 'can:mahasiswa.mahasiswas.index'
    ]);
    $router->get('mahasiswas/create', [
        'as' => 'admin.mahasiswa.mahasiswa.create',
        'uses' => 'MahasiswaController@create',
        'middleware' => 'can:mahasiswa.mahasiswas.create'
    ]);
    $router->post('mahasiswas', [
        'as' => 'admin.mahasiswa.mahasiswa.store',
        'uses' => 'MahasiswaController@store',
        'middleware' => 'can:mahasiswa.mahasiswas.create'
    ]);
    $router->get('mahasiswas/{mahasiswa}/edit', [
        'as' => 'admin.mahasiswa.mahasiswa.edit',
        'uses' => 'MahasiswaController@edit',
        'middleware' => 'can:mahasiswa.mahasiswas.edit'
    ]);
    $router->put('mahasiswas/{mahasiswa}', [
        'as' => 'admin.mahasiswa.mahasiswa.update',
        'uses' => 'MahasiswaController@update',
        'middleware' => 'can:mahasiswa.mahasiswas.edit'
    ]);
    $router->delete('mahasiswas/{mahasiswa}', [
        'as' => 'admin.mahasiswa.mahasiswa.destroy',
        'uses' => 'MahasiswaController@destroy',
        'middleware' => 'can:mahasiswa.mahasiswas.destroy'
    ]);
// append

});
