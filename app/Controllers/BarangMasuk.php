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

        if (!$this->validate([
            'id_barang' => 'required|is_natural_no_zero',
            'jumlah'    => 'required|is_natural_no_zero',
            'supplier'  => 'permit_empty|string',
            'keterangan'=> 'permit_empty|string',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Isi data barang dan jumlah dengan benar');
        }

        $barangModel = new BarangModel();
        $barang      = $barangModel->find($this->request->getPost('id_barang'));

        if (!$barang) {
            return redirect()->back()->withInput()->with('error', 'Barang tidak ditemukan');
        }

        $jumlahMasuk = (int) $this->request->getPost('jumlah');

        $db = \Config\Database::connect();
        $db->transStart();

        $model = new BarangMasukModel();
        $model->save([
            'id_barang'     => $barang['id'],
            'jumlah_masuk'  => $jumlahMasuk,
            'tanggal'       => date('Y-m-d'),
            'supplier'      => $this->request->getPost('supplier'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        $barangModel->update($barang['id'], [
            'stok' => $barang['stok'] + $jumlahMasuk,
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data barang masuk');
        }

        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil disimpan');
    }
}
