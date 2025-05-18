<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// all user can acces it
$routes->get('/', 'Home::index');

// only non-authenticated user can access it 
$routes->get('/login', 'Login::index', ['filter' => 'noauth']);
$routes->post('/login/process', 'Login::process', ['filter' => 'noauth']);

// only authenticated user can access it
$routes->get('/logout', 'Login::logout', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);