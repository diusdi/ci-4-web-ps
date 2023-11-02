<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\C_pelanggan;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', [C_pelanggan::class, 'index']);
$routes->get('/tambah', [C_pelanggan::class, 'create']); // Add this line
$routes->post('/pelanggan/tambah', [C_pelanggan::class, 'store']);
$routes->get('pelanggan/(:any)/edit', [C_pelanggan::class, 'edit']);
$routes->post('pelanggan/(:any)/update', [C_pelanggan::class, 'update']);
$routes->get('pelanggan/(:any)/delete', [C_pelanggan::class, 'delete']);
