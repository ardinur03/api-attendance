<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "<h1>This is a " . ucfirst($router->app->environment()) . " server 🚀 </h1>" . "<p>Version: " . $router->app->version() . "</p>"
        .  "<p>© Team PKM | 2022</p>";
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('login', 'AuthController@login');
        $router->post('register', 'AuthController@register');
        $router->post('logout', 'AuthController@logout');
        $router->post('refresh', 'AuthController@refresh');
        $router->post('me', 'AuthController@me');
    });

    $router->group(['middleware'=>'auth.jwt', 'prefix' => 'dosen'], function () use ($router) {
        $router->get('/', 'DosenController@index');
        $router->get('/jadwal-dosen-hari-ini', 'DosenController@JadwalDosenHariIni');
        // $router->post('/', 'DosenController@store');
        // $router->put('/{id}', 'DosenController@update');
        // $router->delete('/{id}', 'DosenController@destroy');
    });

    $router->group(['middleware'=>'auth.jwt', 'prefix' => 'jadwal'], function () use ($router) {
        $router->get('show/{kode}', 'JadwalController@show');
    });

    $router->group(['middleware'=>'auth.jwt', 'prefix' => 'mahasiswa'], function () use ($router) {
        $router->get('list/{kelas}', 'MahasiswaController@list');
    });

    // $router->post('dosen/mengajar', 'AuthController@dosenMengajar');
    $router->get('me', ['middleware' => 'auth.jwt', 'uses' => 'AuthController@me']);
});
