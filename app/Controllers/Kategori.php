<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('kategori/index', $data);
    }

    public function tambah()
    {
        return view('kategori/tambah');
    }

    public function simpan()
    {
        $kategori = new KategoriModel();
        $kategori->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->find($id);
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $kategori = new KategoriModel();
        $kategori->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);
        return redirect()->to('/kategori');
    }

    public function hapus($id)
    {
        $kategori = new KategoriModel();
        $kategori->delete($id);
        return redirect()->to('/kategori');
    }
}
