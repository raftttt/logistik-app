<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $userModel = new UserModel();
        $username  = $this->request->getPost('username');
        $password  = $this->request->getPost('password');

        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi');
        }

        $user = $userModel->where('username', $username)->first();

        $isValidPassword = $user && (
            password_verify($password, $user['password']) ||
            $user['password'] === $password
        );

        if ($isValidPassword) {
            session()->regenerate();
            session()->set('logged_in', true);
            session()->set('username', $user['username']);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
