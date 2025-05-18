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
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->post('create_user', 'Dashboard::create_user');
    $routes->get('edit_user/(:num)', 'Dashboard::edit_user/$1');
    $routes->post('update_user', 'Dashboard::update_user');
    $routes->post('delete_user/(:num)', 'Dashboard::delete_user/$1');
    $routes->post('create_book', 'Dashboard::create_book');
    $routes->get('edit_book/(:num)', 'Dashboard::edit_book/$1');
    $routes->post('update_book', 'Dashboard::update_book');
    $routes->post('delete_book/(:num)', 'Dashboard::delete_book/$1');
});