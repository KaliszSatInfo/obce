<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Kontroler::load');

$routes->get('/index/(:num)', 'Kontroler::loadObecInfo/$1');
