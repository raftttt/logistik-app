<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;

class Barang extends BaseController
{
    public function index()
    {
        $this->cekLogin();

        $barangModel = new BarangModel();
        $keyword     = $this->request->getGet('keyword');

        // Jika pencarian
        if ($keyword) {
            $data['barang'] = $barangModel
                ->select('barang.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id = barang.id_kategori')
                ->like('barang.nama_barang', $keyword)
                ->orLike('kategori.nama_kategori', $keyword)
                ->findAll();
        } else {
            $data['barang'] = $barangModel->getBarangWithKategori();
        }

        return view('barang/index', $data);
    }

    public function tambah()
    {
        $this->cekLogin();

        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();

        return view('barang/tambah', $data);
    }


    public function simpan()
    {
        $barang = new BarangModel();

        // upload foto
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        }

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
        $this->cekLogin();

        $barangModel = new BarangModel();
        $kategoriModel = new KategoriModel();

        $data['barang']   = $barangModel->find($id);
        $data['kategori'] = $kategoriModel->findAll();

        if (!$data['barang']) {
            return view('barang/notfound');
        }

        return view('barang/edit', $data);
    }


    public function update($id)
    {
        $this->cekLogin();

        $barangModel = new BarangModel();
        $barang = $barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/barang');
        }

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga'       => $this->request->getPost('harga'),
            'stok'        => $this->request->getPost('stok'),
        ];

        // upload foto baru jika ada
        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaBaru = $foto->getRandomName();
            $foto->move('uploads', $namaBaru);

            // hapus foto lama
            if ($barang['foto'] && file_exists('uploads/' . $barang['foto'])) {
                unlink('uploads/' . $barang['foto']);
            }

            $data['foto'] = $namaBaru;
        }

        $barangModel->update($id, $data);
        return redirect()->to('/barang');
    }


    public function hapus($id)
    {
        $this->cekLogin();

        $barangModel = new BarangModel();
        $barang = $barangModel->find($id);

        if ($barang && $barang['foto'] && file_exists('uploads/' . $barang['foto'])) {
            unlink('uploads/' . $barang['foto']);
        }

        $barangModel->delete($id);

        return redirect()->to('/barang');
    }


    public function detail($id)
    {
        $this->cekLogin();

        $barangModel = new BarangModel();
        $data['barang'] = $barangModel->find($id);

        if (!$data['barang']) {
            return view('barang/notfound');
        }

        return view('barang/detail', $data);
    }
}
