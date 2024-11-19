<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDatapeg;
use App\Models\ModelJabatan;
use App\Models\ModelGolongan;

class Datapeg extends BaseController
{
    protected $ModelDatapeg;
    protected $ModelJabatan;
    protected $ModelGolongan;

    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ModelDatapeg = new ModelDatapeg();
        $this->ModelJabatan = new ModelJabatan();
        $this->ModelGolongan = new ModelGolongan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Data Pegawai',
            'menu' => 'masterdata',
            'submenu' => 'datapegawai',
            'datapegawai' => $this->ModelDatapeg->AllData(),
            'jabatan' => $this->ModelJabatan->AllData(),
            'golongan' => $this->ModelGolongan->AllData(),

        ];
        return view('datapeg/datapeg', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'is_unique[data_pegawai.nip]',
                'errors' => [
                    'is_unique' => '{field} sudah ada, Masukkah NIP lain'
                ]
            ]
        ])) {
            $data = [
                'nama_peg' => $this->request->getPost('nama_peg'),
                'nip' => $this->request->getPost('nip'),
                'id_gol' => $this->request->getPost('id_gol'),
                'id_jab' => $this->request->getPost('id_jab'),
                'unit_kerja' => $this->request->getPost('unit_kerja'),
            ];
            $this->ModelDatapeg->InsertData($data);
            session()->setFlashdata('pesan', 'Data has been added successfully !!');
            return redirect()->to('Datapeg');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Datapeg'))->withInput('validation', \Config\Services::validation());
        }
    }



    public function UpdateData($id_peg)
    {
        // Debugging untuk memeriksa data yang diterima
        // dd($this->request->getPost());

        // Mengambil data dari input
        $data = [
            'id_peg' => $id_peg,
            'nama_peg' => $this->request->getPost('nama_peg'),
            'nip' => $this->request->getPost('nip'),
            'id_gol' => $this->request->getPost('id_gol'),
            'id_jab' => $this->request->getPost('id_jab'),
            'unit_kerja' => $this->request->getPost('unit_kerja'),
        ];

        // Panggil metode untuk memperbarui data
        $this->ModelDatapeg->UpdateData($data);

        session()->setFlashdata('pesan', 'Data has been successfully changed !!');
        return redirect()->to('Datapeg');
    }

    public function DeleteData($id_peg)
    {
        $data = [
            'id_peg' => $id_peg,
        ];
        $this->ModelDatapeg->DeleteData($data);
        session()->setFlashdata('pesan', 'Data has been successfully deleted !!');
        return redirect()->to('Datapeg');
    }

    public function PrintDatapeg()
    {
        $data = [
            'judul' => 'Daftar Pegawai',
            'datapegawai' => $this->ModelDatapeg->AllData(),
            'page' => 'datapeg/print_datapeg'
        ];
        return view('template_laporan', $data);
    }
}
