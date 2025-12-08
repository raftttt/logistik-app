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
$routes->get('/barangmasuk', 'BarangMasuk::index');
$routes->get('/barangmasuk/tambah', 'BarangMasuk::tambah');
$routes->post('/barangmasuk/simpan', 'BarangMasuk::simpan');
$routes->get('/barangkeluar', 'BarangKeluar::index');
$routes->get('/barangkeluar/tambah', 'BarangKeluar::tambah');
$routes->post('/barangkeluar/simpan', 'BarangKeluar::simpan');
$routes->get('/barangkeluar/status/(:num)/(:alpha)', 'BarangKeluar::ubahStatus/$1/$2');
$routes->get('/barang/scan/(:num)', 'Barang::scan/$1');
$routes->get('/qrtest', 'TestQR::index');
$routes->get('/barang/detail/(:num)', 'Barang::detail/$1');
$routes->get('/kurir', 'Kurir::index');
$routes->get('/kurir/tambah', 'Kurir::tambah');
$routes->post('/kurir/simpan', 'Kurir::simpan');
$routes->get('/kurir/hapus/(:num)', 'Kurir::hapus/$1');
$routes->group('barang', function($routes){
    $routes->get('/', 'Barang::index');        
    $routes->get('tambah', 'Barang::tambah');  
    $routes->post('simpan', 'Barang::simpan'); // <- sesuaikan dgn controller kamu

    $routes->get('edit/(:num)', 'Barang::edit/$1');
    $routes->post('update/(:num)', 'Barang::update/$1');

    $routes->get('detail/(:num)', 'Barang::detail/$1');

    $routes->get('hapus/(:num)', 'Barang::hapus/$1'); // kamu belum buat hapus(), harus bikin
});
$routes->get('/pengiriman', 'Pengiriman::index');
$routes->get('/pengiriman/tambah', 'Pengiriman::tambah');
$routes->post('/pengiriman/simpan', 'Pengiriman::simpan');
$routes->post('/pengiriman/status/(:num)', 'Pengiriman::ubahStatus/$1');
$routes->get('/tracking', 'Tracking::index');
$routes->post('/tracking/cari', 'Tracking::cari');






