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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('operations', ['uses' => 'OperationController@showAllOperations']);

    $router->get('operations/{id}', ['uses' => 'OperationController@showOneOperation']);

    $router->post('operations', ['uses' => 'OperationController@create']);

    $router->delete('operations/{id}', ['uses' => 'OperationController@delete']);

    $router->put('operations/{id}', ['uses' => 'OperationController@update']);

    $router->get('clients', ['uses' => 'ClientController@showAllClients']);

    $router->get('clients/{id}/operations', ['uses' => 'ClientController@showAllOperations']);
});
