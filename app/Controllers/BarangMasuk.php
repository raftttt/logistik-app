<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;

class BarangMasuk extends BaseController
{
    public function index()
    {
        $this->cekLogin();

        $barangMasukModel = new BarangMasukModel();
        $keyword          = $this->request->getGet('search');

        if ($keyword) {
            $data['masuk'] = $barangMasukModel
                ->select('barang_masuk.*, barang.nama_barang')
                ->join('barang', 'barang.id = barang_masuk.id_barang')
                ->groupStart()
                ->like('barang.nama_barang', $keyword)
                ->orLike('supplier', $keyword)
                ->groupEnd()
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        } else {
            $data['masuk'] = $barangMasukModel
                ->select('barang_masuk.*, barang.nama_barang')
                ->join('barang', 'barang.id = barang_masuk.id_barang')
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        return view('barang_masuk/index', $data);
    }



    public function tambah()
    {
        $this->cekLogin();
        $barang = new BarangModel();
        $data['barang'] = $barang->findAll();

        return view('barang_masuk/tambah', $data);
    }

    public function simpan()
    {
        $this->cekLogin();

        $model = new BarangMasukModel();

        $model->save([
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah_masuk' => $this->request->getPost('jumlah'),
            'tanggal' => date('Y-m-d'),
            'supplier' => $this->request->getPost('supplier'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        // update stok barang
        $barangModel = new BarangModel();
        $barang = $barangModel->find($this->request->getPost('id_barang'));
        $barangModel->update($barang['id'], [
            'stok' => $barang['stok'] + $this->request->getPost('jumlah')
        ]);

        return redirect()->to('/barangmasuk');
    }
}
