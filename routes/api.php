<?php

namespace Routes;

$routes = new \Bramus\Router\Router();

$routes->get ('/', function(){
    echo "aaaaaaaaaaaaaaa";
});

$routes->get ('/about', function(){
    echo "b";
});

$routes ->run();
?>