<?php

namespace App\Controllers;

use App\Models\PengirimanModel;

class Tracking extends BaseController
{
    public function index()
    {
        return view('pengiriman/tracking');
    }

    public function cari()
    {
        $resi = $this->request->getPost('resi');

        $model = new PengirimanModel();
        $data['data'] = $model
            ->select('pengiriman.*, barang.nama_barang, kurir.nama as kurir')
            ->join('barang','barang.id = pengiriman.id_barang')
            ->join('kurir','kurir.id = pengiriman.id_kurir')
            ->where('resi',$resi)
            ->first();

        return view('pengiriman/tracking',$data);
    }
}
