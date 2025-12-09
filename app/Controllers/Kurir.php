<?php

namespace App\Controllers;


use App\Models\PengirimanModel;
use App\Models\KurirModel;

class Kurir extends BaseController
{
    public function index()
    {
        $this->cekLogin();

        $model = new KurirModel();
        $data['kurir'] = $model->findAll();

        return view('kurir/index', $data);
    }

    public function tambah()
    {
        $this->cekLogin();

        return view('kurir/tambah');
    }

    public function simpan()
    {
        $this->cekLogin();

        $model = new KurirModel();

        $model->insert([
            'nama'   => $this->request->getPost('nama'),
            'kontak' => $this->request->getPost('kontak'),
            'status' => 'aktif'
        ]);

        return redirect()->to('/kurir');
    }

    public function hapus($id)
    {
        $this->cekLogin();

        $model = new KurirModel();
        $model->delete($id);

        return redirect()->to('/kurir');
    }

    public function dashboard()
    {
        if (!session()->get('kurir')) {
            return redirect()->to('/kurir/login');
        }

        $kurir = session()->get('kurir');

        $model = new PengirimanModel();
        $data['pengiriman'] = $model
            ->where('id_kurir', $kurir['id'])
            ->findAll();

        return view('kurir/dashboard', $data);
    }

    public function update($id)
    {
        if (!session()->get('kurir')) {
            return redirect()->to('/kurir/login');
        }

        $model               = new \App\Models\PengirimanModel();
        $data['pengiriman'] = $model->find($id);

        return view('kurir/update', $data);
    }

    public function save($id)
    {
        $model = new \App\Models\PengirimanModel();

        $status = $this->request->getPost('status');

        $model->update($id, ['status' => $status]);

        return redirect()->to('/kurir/dashboard')->with('success', 'Status diperbarui');
    }

}


