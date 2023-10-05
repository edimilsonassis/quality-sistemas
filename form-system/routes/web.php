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

$router->get('/', 'AppController@index');
$router->get('/cadastros', 'AppController@list');
$router->get('/cadastros/{id}', 'AppController@show');
$router->get('/cadastros/{id}/dependentes', 'AppController@dependents');
$router->get('/novo', 'AppController@new');

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/peoples', 'api\PeoplesController@list');
    $router->post('/peoples', 'api\PeoplesController@store');
    $router->delete('/peoples', 'api\PeoplesController@delete');

    $router->post('/peoples/{id}', 'api\PeoplesController@update');
    $router->put('/peoples/{id}/status', 'api\PeoplesController@updateStatus');

    $router->get('/peoples/{pid}/dependents', 'api\PeoplesDependentsController@list');
    $router->post('/peoples/{pid}/dependents', 'api\PeoplesDependentsController@store');
    $router->delete('/peoples/{pid}/dependents/{id}', 'api\PeoplesDependentsController@delete');
});
