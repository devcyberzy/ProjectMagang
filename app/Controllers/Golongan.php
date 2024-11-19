<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelGolongan;

class Golongan extends BaseController
{
    protected $ModelGolongan;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ModelGolongan = new ModelGolongan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Golongan',
            'menu' => 'masterdata',
            'submenu' => 'golongan',
            'golongan' => $this->ModelGolongan->AllData(),
        ];
        return view('golongan/golongan', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_gol' => [

                'label' => 'Nama Golongan',
                'rules' => 'is_unique[golongan.nama_gol]',
                'errors' => [
                    'is_unique' => 'Nama {field} sudah ada, Masukkan Nama Golongan lain'
                ]
            ]

        ])) {

            $data = [
                'nama_gol' => $this->request->getPost('nama_gol'),
            ];
            $this->ModelGolongan->InsertData($data);
            session()->setFlashdata('pesan', 'Data has been added successfully !!');
            return redirect()->to('Golongan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Golongan'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_gol)
    {
        if ($this->validate([
            'nama_gol' => [

                'label' => 'Nama Golongan',
                'rules' => 'is_unique[golongan.nama_gol]',
                'errors' => [
                    'is_unique' => 'Nama {field} sudah ada, Masukkan Nama Golongan lain'
                ]
            ]

        ])) {

            $data = [
                'id_gol' =>  $id_gol,
                'nama_gol' => $this->request->getPost('nama_gol'),
            ];
            $this->ModelGolongan->UpdateData($data);
            session()->setFlashdata('pesan', 'Data has been successfully changed !!');
            return redirect()->to('Golongan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Golongan'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteData($id_jab)
    {
        $data = [
            'id_jab' => $id_jab,
        ];
        $this->ModelGolongan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data has been successfully deleted !!');
        return redirect()->to('Golongan');
    }
}
