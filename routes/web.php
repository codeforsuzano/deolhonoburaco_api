<?php

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
    return $router->app->version();
});

$router->post('login', 'UsersController@authenticate');
$router->post('newuser', 'UsersController@newuser');

$router->group(['prefix' => 'buraco'], function ($router) {
    $router->get('/', 'BuracoController@index');
    $router->post('/', 'BuracoController@store');
});
