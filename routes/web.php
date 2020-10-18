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
    // return $router->app->version();
    $response = '
        <div align="center">
            <h1>Rest Api dengan '.$router->app->version().'</h1>
            <h2><pre>Created By Diamsyah M Dida</pre></h2>
        </div>
    ';
    return $response;
});

$router->group(['middleware' => 'auth'], function ($router) {
    $router->get('/product', 'ProductController@index');
    $router->get('/product/{id}', 'ProductController@show');
    $router->post('/product/save', 'ProductController@store');
    $router->post('/product/{id}/update', 'ProductController@update');
    $router->post('/product/{id}/delete', 'ProductController@destroy');
});

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
