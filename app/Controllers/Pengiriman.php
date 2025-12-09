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

        if (!$this->validate([
            'id_barang' => 'required|is_natural_no_zero',
            'id_kurir'  => 'required|is_natural_no_zero',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Barang dan kurir wajib dipilih');
        }

        $model = new PengirimanModel();
        $barangModel = new BarangModel();
        $kurirModel  = new KurirModel();

        $barang = $barangModel->find($this->request->getPost('id_barang'));
        $kurir  = $kurirModel->find($this->request->getPost('id_kurir'));

        if (!$barang || !$kurir) {
            return redirect()->back()->withInput()->with('error', 'Data barang atau kurir tidak valid');
        }

        // generate resi otomatis
        $resi = 'RESI-' . strtoupper(bin2hex(random_bytes(4)));

        // generate qr
        $qrPath = generateQR($resi);

        $model->insert([
            'id_barang' => $barang['id'],
            'id_kurir'  => $kurir['id'],
            'resi'      => $resi,
            'qr'        => $qrPath,
            'status'    => 'diproses'
        ]);

        return redirect()->to('/pengiriman')->with('success', 'Pengiriman baru berhasil dibuat');
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
