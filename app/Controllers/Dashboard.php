<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\PengirimanModel;


class Dashboard extends BaseController
{
    public function index()
    {
        $this->cekLogin(); // proteksi login

        $barangModel   = new BarangModel();
        $kategoriModel = new KategoriModel();
        $pengiriman = new PengirimanModel();

        $data['jumlah_pengiriman'] = $pengiriman->countAllResults();
        $data['jumlah_barang']   = $barangModel->countAll();
        $data['jumlah_kategori'] = $kategoriModel->countAll();

        $data['stok_terbanyak'] = $barangModel
            ->select('nama_barang, stok')
            ->orderBy('stok', 'DESC')
            ->first();

        $data['stok_terminim'] = $barangModel
            ->select('nama_barang, stok')
            ->orderBy('stok', 'ASC')
            ->first();

        return view('dashboard/index', $data);
    }
}
