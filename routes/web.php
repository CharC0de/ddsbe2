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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users', ['uses' => 'UserController@getUsers']);
});
$router->get('/users', ['uses' => 'UserController@getUsers']);
$router->get('/users', 'UserController@index');
$router->post('/users', 'UserController@add'); // create new user record
$router->get('/users/{id}', 'UserController@show'); // get user by id
$router->put('/users/{id}', 'UserController@update'); // update user record
$router->patch('/users/{id}', 'UserController@update'); // update user record
$router->delete('/users/{id}', 'UserController@delete'); // delete record

$router->get('/jobs', ['uses' => 'UserJobController@index']);
$router->get('/jobs', 'UserJobController@index');
$router->post('/jobs', 'UserJobController@add'); // create new job record
$router->get('/jobs/{id}', 'UserJobController@show'); // get job by id
$router->put('/jobs/{id}', 'UserJobController@update'); // update job record
$router->patch('/jobs/{id}', 'UserJobController@update'); // update job record
$router->delete('/jobs/{id}', 'UserJobController@delete'); // delete record