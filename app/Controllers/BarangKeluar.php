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
        $keyword           = $this->request->getGet('search');

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
        $this->cekLogin();

        if (!$this->validate([
            'id_barang' => 'required|is_natural_no_zero',
            'jumlah'    => 'required|is_natural_no_zero',
            'penerima'  => 'required|string',
            'kurir'     => 'required|string',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Lengkapi data barang keluar terlebih dahulu');
        }

        $barangModel = new BarangModel();
        $barang      = $barangModel->find($this->request->getPost('id_barang'));

        if (!$barang) {
            return redirect()->back()->withInput()->with('error', 'Barang tidak ditemukan');
        }

        $jumlahKeluar = (int) $this->request->getPost('jumlah');

        if ($jumlahKeluar > (int) $barang['stok']) {
            return redirect()->back()->withInput()->with('error', 'Stok tidak mencukupi');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $model = new BarangKeluarModel();
        $model->save([
            'id_barang'     => $barang['id'],
            'jumlah_keluar' => $jumlahKeluar,
            'tanggal'       => date('Y-m-d'),
            'penerima'      => $this->request->getPost('penerima'),
            'kurir'         => $this->request->getPost('kurir'),
            'status'        => 'diproses'
        ]);

        $barangModel->update($barang['id'], [
            'stok' => $barang['stok'] - $jumlahKeluar
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data barang keluar');
        }

        return redirect()->to('/barangkeluar')->with('success', 'Barang keluar berhasil disimpan');
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
