<?php

namespace Routes;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable('./config/env/'); // -> config de el enviroment
$dotenv->load();
$routes = new \Bramus\Router\Router();

$routes->mount('/workrefence', function() use ($routes) {
    echo"wr";
    $routes->get('/', 'app\Controllers\work_reference_Controller@GetWorkReference');
    $routes->post('/add', 'app\Controllers\work_reference_Controller@PostWorkReferences');
    $routes->delete('/delete', 'app\Controllers\work_reference_Controller@DeleteWorkReferences');
    
});

$routes->mount('/personalref', function() use ($routes) {
    $routes->get('/', 'app\Controllers\personal_ref_Controller@GetPersonalRef');
    $routes->post('/add', 'app\Controllers\personal_ref_Controller@PostPersonalRef');
    $routes->put('/{id}', 'app\Controllers\personal_ref_Controller@PutPersonalRef');
    $routes->delete('/{id}', 'app\Controllers\personal_ref_Controller@DeletePersonalRef');

});

$routes->mount('/workinginfo', function() use ($routes) {
    $routes->get('/', 'app\Controllers\personal_ref_Controller@GetPersonalRef');
    $routes->post('/add', 'app\Controllers\personal_ref_Controller@PostPersonalRef');
    $routes->put('/{id}', 'app\Controllers\personal_ref_Controller@PutPersonalRef');
    $routes->delete('/{id}', 'app\Controllers\personal_ref_Controller@DeletePersonalRef');

});


$routes->post ('/', function(){
    echo "b";
});

/* 
$routes->get ('/a/q', function(){
    echo "baaaa11";
});
 */
$routes->run();
?>