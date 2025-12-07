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

        $pengirimanModel = new PengirimanModel();
        $data['pengiriman'] = $pengirimanModel
            ->select('pengiriman.*, barang.nama_barang, kurir.nama as nama_kurir')
            ->join('barang', 'barang.id = pengiriman.id_barang')
            ->join('kurir', 'kurir.id = pengiriman.id_kurir')
            ->findAll();

        return view('pengiriman/index', $data);
    }

    public function tambah()
    {
        $barang = new BarangModel();
        $kurir  = new KurirModel();

        $data['barang'] = $barang->findAll();
        $data['kurir']  = $kurir->findAll();

        return view('pengiriman/tambah', $data);
    }

    public function simpan()
    {
        $pengiriman = new PengirimanModel();
        
        $pengiriman->save([
            'id_barang' => $this->request->getPost('id_barang'),
            'id_kurir'  => $this->request->getPost('id_kurir'),
            'tanggal'   => date('Y-m-d'),
            'status'    => 'PICKUP',
        ]);

        return redirect()->to('/pengiriman');
    }

    public function updateStatus($id)
    {
        $pengiriman = new PengirimanModel();

        $pengiriman->update($id, [
            'status'  => $this->request->getPost('status'),
            'catatan' => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/pengiriman');
    }
}
