<?php

namespace Routes;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./config/env/'); // -> config de el enviroment
$dotenv->load();
$routes = new \Bramus\Router\Router();

/* $routes->mount('/workrefence',function(){
    $routes->get('/','app\Controllers\work_reference_Controller@getWorkReference');
    /* $router->get('/id','App\Http\Controllers\ClienteController@getOneById');
    $router->post('/add','App\Http\Controllers\ClienteController@addOneCliente');
    $router->get('/load','App\Http\Controllers\ClienteController@getClienteByCedula'); 
}); */

/* $routes->mount('/workrefence', function() use ($routes) {
    $routes->get('/', 'app\Controllers\work_reference_Controller@getWorkReference');
    // ... otras rutas
}); */


$routes->get ('/about', function(){
    echo "b";
});

$routes ->run();
?>