<?php

namespace Routes;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable('./config/env/'); // -> config de el enviroment
$dotenv->load();
$routes = new \Bramus\Router\Router();

$routes->mount('/workrefence/', function() use ($routes) {
    $routes->get('/', 'app\Controllers\work_reference_Controller@getWorkReference');
    $routes->post('/add', 'app\Controllers\work_reference_Controller@PostWorkReferences');
    $routes->post('/delete', 'app\Controllers\work_reference_Controller@DeleteWorkReferences');
    
});


/* $routes->get ('/qwerty/', function(){
    echo "b";
});

$routes->get ('/a/q', function(){
    echo "baaaa11";
});
 */
$routes->run();
?>