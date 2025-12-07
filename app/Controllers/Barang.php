<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;

class Barang extends BaseController
{
    public function update($id)
    {
    $barangModel = new BarangModel();
    $barang = $barangModel->find($id);

    $data = [
        'nama_barang' => $this->request->getPost('nama_barang'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'harga'       => $this->request->getPost('harga'),
        'stok'        => $this->request->getPost('stok'),
    ];

    // handle foto jika upload baru
    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $namaBaru = $foto->getRandomName();
        $foto->move('uploads', $namaBaru);
        $data['foto'] = $namaBaru;
    }

    $barangModel->update($id, $data);

    return redirect()->to('/barang');
    }

    public function index()
    {
        $barang = new BarangModel();
        $kategori = new KategoriModel();

        $data['barang'] = $barang
            ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.id_kategori', 'left')
            ->findAll();

        return view('barang/index', $data);
    }

    public function tambah()
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('barang/tambah', $data);
    }

    public function simpan()
    {
        $barang = new BarangModel();
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads', $namaFoto);

        $barang->insert([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/barang');
    }
    public function edit($id)
    {
    $barang = new BarangModel();
    $kategori = new KategoriModel();

    $data['barang'] = $barang->find($id);
    $data['kategori'] = $kategori->findAll();

    return view('barang/edit', $data);
    }

}
