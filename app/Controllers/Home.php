<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Home extends BaseController
{
    protected $ModelUser;
    public $helpers = ['form'];

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('login/login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !',
                ]
            ],
        ])) {
            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password')); // Disarankan ganti ke password_hash

            // Cek login berdasarkan email dan password (tidak melibatkan level)
            $cek_login = $this->ModelUser->LoginUser($email, $password);

            if ($cek_login) {
                // Set sesi tanpa melibatkan level
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);

                // Redirect ke halaman dashboard (atau halaman lain yang diinginkan)
                return redirect()->to(base_url('Dashboard'));
            } else {
                // Jika gagal login
                session()->setFlashdata('gagal', 'E-Mail atau Password Salah');
                return redirect()->to(base_url('Home'));
            }
        } else {
            // Jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function LogOut()
    {
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout');
        return redirect()->to(base_url('Home'));
    }
}
