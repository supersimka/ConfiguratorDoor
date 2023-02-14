<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));
$routes->add('get_params', new Route(constant('URL_SUBFOLDER') . '/get_params/{id}', array('controller' => 'PageController', 'method'=>'showParamsValue'), array('id' => '[0-9]+')));
$routes->add('set_params', new Route(constant('URL_SUBFOLDER') . '/set_params/{id}', array('controller' => 'PageController', 'method'=>'setParamsValue'), array('id' => '[0-9]+')));
