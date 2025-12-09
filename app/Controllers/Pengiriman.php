<?php

namespace App\Controllers;

use App\Models\PengirimanModel;
use App\Models\BarangModel;
use App\Models\KurirModel;

class Pengiriman extends BaseController
{
    public function index()
    {
        $this->cekLogin();

        $model               = new PengirimanModel();
        $data['title']       = "Kelola Pengiriman";
        $data['pengiriman'] = $model->getPengirimanFull();

        return view('pengiriman/index', $data);
    }


    public function tambah()
    {
        $this->cekLogin();

        $barang = new BarangModel();
        $kurir = new KurirModel();

        $data['barang'] = $barang->findAll();
        $data['kurir']  = $kurir->findAll();

        return view('pengiriman/tambah', $data);
    }

    public function simpan()
    {
        $this->cekLogin();

        helper('qr');

        $model = new PengirimanModel();

        // generate resi otomatis
        $resi = 'RESI-' . time() . rand(10, 99);

        // generate qr
        $qrPath = generateQR($resi);

        $model->insert([
            'id_barang' => $this->request->getPost('id_barang'),
            'id_kurir'  => $this->request->getPost('id_kurir'),
            'resi'      => $resi,
            'qr'        => $qrPath,
            'status'    => 'diproses'
        ]);

        return redirect()->to('/pengiriman');
    }


    public function ubahStatus($id)
    {
        $this->cekLogin();

        $model  = new PengirimanModel();
        $status = $this->request->getPost('status');

        $model->update($id, ['status' => $status]);

        return redirect()->to('/pengiriman');
    }
}
