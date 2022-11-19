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

    $router->group(['prefix' => 'dosen'], function () use ($router) {
        $router->get('/', 'DosenController@index');
        $router->get('/jadwal-dosen-hari-ini', 'DosenController@JadwalDosenHariIni');
        $router->post('/', 'DosenController@store');
        $router->put('/{id}', 'DosenController@update');
        $router->delete('/{id}', 'DosenController@destroy');
    });

    $router->post('dosen/mengajar', 'AuthController@dosenMengajar');
    $router->get('user', ['middleware' => 'auth', 'uses' => 'AuthController@user']);
});
