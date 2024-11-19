<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJabatan;

class Jabatan extends BaseController
{
    protected $ModelJabatan;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ModelJabatan = new ModelJabatan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jabatan',
            'menu' => 'masterdata',
            'submenu' => 'jabatan',
            'jabatan' => $this->ModelJabatan->AllData(),
        ];
        return view('jabatan/jabatan', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_jab' => [

                'label' => 'Nama Jabatan',
                'rules' => 'is_unique[jabatan.nama_jab]',
                'errors' => [
                    'is_unique' => 'Nama {field} sudah ada, Masukkan Nama Jabatan lain'
                ]
            ]

        ])) {

            $data = [
                'nama_jab' => $this->request->getPost('nama_jab'),
            ];
            $this->ModelJabatan->InsertData($data);
            session()->setFlashdata('pesan', 'Data has been added successfully !!');
            return redirect()->to('Jabatan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Jabatan'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_jab)
    {
        if ($this->validate([
            'nama_jab' => [

                'label' => 'Nama Jabatan',
                'rules' => 'is_unique[jabatan.nama_jab]',
                'errors' => [
                    'is_unique' => 'Nama {field} sudah ada, Masukkan Nama Jabatan lain'
                ]
            ]

        ])) {

            $data = [
                'id_jab' =>  $id_jab,
                'nama_jab' => $this->request->getPost('nama_jab'),
            ];
            $this->ModelJabatan->UpdateData($data);
            session()->setFlashdata('pesan', 'Data has been successfully changed !!');
            return redirect()->to('Jabatan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Jabatan'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteData($id_jab)
    {
        $data = [
            'id_jab' => $id_jab,
        ];
        $this->ModelJabatan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data has been successfully deleted !!');
        return redirect()->to('Jabatan');
    }
}
