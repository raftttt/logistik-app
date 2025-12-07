<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangKeluarModel;

class BarangKeluar extends BaseController
{
    public function index()
    {
    $this->cekLogin();

    $barangKeluarModel = new BarangKeluarModel();

    $keyword = $this->request->getGet('search');

    if ($keyword) {
        $data['keluar'] = $barangKeluarModel
            ->select('barang_keluar.*, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.id_barang')
            ->groupStart()
                ->like('barang.nama_barang', $keyword)
                ->orLike('kurir', $keyword)
                ->orLike('penerima', $keyword)
            ->groupEnd()
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    } else {
        $data['keluar'] = $barangKeluarModel
            ->select('barang_keluar.*, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.id_barang')
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    return view('barang_keluar/index', $data);
    }


    public function tambah()
    {
        $this->cekLogin();
        $barang = new BarangModel();
        $data['barang'] = $barang->findAll();

        return view('barang_keluar/tambah', $data);
    }

    public function simpan()
    {
        $model = new BarangKeluarModel();

        $model->save([
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah_keluar' => $this->request->getPost('jumlah'),
            'tanggal' => date('Y-m-d'),
            'penerima' => $this->request->getPost('penerima'),
            'kurir' => $this->request->getPost('kurir'),
            'status' => 'diproses'
        ]);

        // update stok barang
        $barangModel = new BarangModel();
        $barang = $barangModel->find($this->request->getPost('id_barang'));
        $barangModel->update($barang['id'], [
            'stok' => $barang['stok'] - $this->request->getPost('jumlah')
        ]);

        return redirect()->to('/barangkeluar');
    }

   public function ubahStatus($id, $status)
    {
    $this->cekLogin();

    $allowed = ['diproses', 'dikirim', 'diterima'];
    if (!in_array($status, $allowed)) {
        return redirect()->back();
    }

    $model = new BarangKeluarModel();
    $model->update($id, ['status' => $status]);

    return redirect()->to('/barangkeluar');
    }

}
