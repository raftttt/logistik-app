<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/tambah', 'Barang::tambah');
$routes->post('/barang/simpan', 'Barang::simpan');

