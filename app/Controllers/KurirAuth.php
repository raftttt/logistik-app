<?php

namespace App\Controllers;

use App\Models\KurirModel;

class KurirAuth extends BaseController
{
    public function doLogin()
    {
        $model = new KurirModel();

        $nama     = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        if (!$this->validate([
            'nama' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Nama dan password wajib diisi');
        }

        $kurir = $model->where('nama', $nama)->first();

        if (!$kurir) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }

        $isValidPassword = password_verify($password, $kurir['password']) || $password === $kurir['password'];

        if (!$isValidPassword) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set('kurir', $kurir);

        return redirect()->to('/kurir/dashboard');
    }


    public function logout()
    {
        session()->remove('kurir');
        return redirect()->to('/kurir/login');
    }
}
