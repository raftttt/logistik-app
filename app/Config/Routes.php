<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/tambah', 'Kategori::tambah');
$routes->post('/kategori/simpan', 'Kategori::simpan');
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('/kategori/hapus/(:num)', 'Kategori::hapus/$1');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/login', 'Auth::loginProcess');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/barang', 'Barang::index');
$routes->get('/dashboard', 'Dashboard::index');





