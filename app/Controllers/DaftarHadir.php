<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDaftarHadir;
use App\Models\ModelDatapeg;
use App\Models\ModelJabatan;

class DaftarHadir extends BaseController
{
    protected $ModelDatapeg;
    protected $ModelJabatan;
    protected $ModelDaftarHadir;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->ModelDatapeg = new ModelDatapeg();
        $this->ModelJabatan = new ModelJabatan();
        $this->ModelDaftarHadir = new ModelDaftarHadir();
    }

    public function index()
    {
        // Mengambil data dari model
        $dataDaftarHadir = $this->ModelDaftarHadir->AllData();

        // Memformat jam dan tanggal
        foreach ($dataDaftarHadir as &$item) {
            // Format jam (HH:MM)
            $item['jam_mulai'] = date('H:i', strtotime($item['jam_mulai']));
            $item['jam_selesai'] = date('H:i', strtotime($item['jam_selesai']));

            // Format tanggal (dd-mm-yyyy)
            $item['tgl'] = date('d-m-Y', strtotime($item['tgl']));
        }

        $data = [
            'judul' => 'Kehadiran',
            'subjudul' => 'Daftar Hadir',
            'menu' => 'kehadiran',
            'submenu' => 'daftarhadir',
            'daftarhadir' => $dataDaftarHadir,
            'jabatan' => $this->ModelJabatan->AllData(),
            'datapegawai' => $this->ModelDatapeg->AllData(),
        ];

        return view('daftarhadir/daftarhadir', $data);
    }

    public function InsertData()
    {
        $data = [
            'id_peg' => $this->request->getPost('id_peg'),
            'id_jab' => $this->request->getPost('id_jab'),
            'tgl' => $this->request->getPost('tgl'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
        ];

        $this->ModelDaftarHadir->InsertData($data);
        session()->setFlashdata('pesan', 'Data has been added successfully !!');
        return redirect()->to('DaftarHadir');
    }

    public function UpdateData($id_daftar)
    {
        $data = [
            'id_daftar' => $id_daftar,
            'id_peg' => $this->request->getPost('id_peg'),
            'id_jab' => $this->request->getPost('id_jab'),
            'tgl' => $this->request->getPost('tgl'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
        ];

        $this->ModelDaftarHadir->UpdateData($data);
        session()->setFlashdata('pesan', 'Data has been successfully changed !!');
        return redirect()->to('DaftarHadir');
    }

    public function DeleteData($id_daftar)
    {
        $data = [
            'id_daftar' => $id_daftar,
        ];
        $this->ModelDaftarHadir->DeleteData($data);
        session()->setFlashdata('pesan', 'Data has been successfully deleted !!');
        return redirect()->to('DaftarHadir');
    }

    // View laporan daftar hadir
    public function LaporanDaftarHadir()
    {
        $data = [
            'judul' => 'Kehadiran',
            'subjudul' => 'Laporan Daftar Hadir',
            'menu' => 'kehadiran',
            'submenu' => 'laporan-daftarhadir',
        ];
        return view('daftarhadir/laporan_daftarhadir', $data);
    }

    // Melihat data laporan berdasarkan rentang tanggal
    public function ViewLaporanDaftarHadir()
    {
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');

        // Debugging: log untuk memeriksa format tanggal yang diterima
        log_message('info', 'Start Date: ' . $start_date);
        log_message('info', 'End Date: ' . $end_date);

        if (empty($start_date) || empty($end_date)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tanggal awal dan akhir harus diisi!'
            ]);
        }

        $dataLaporan = $this->ModelDaftarHadir->getByDateRange($start_date, $end_date);

        if (empty($dataLaporan)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada data ditemukan pada rentang tanggal tersebut.'
            ]);
        }

        $data = [
            'daftarhadir' => $dataLaporan,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $this->response->setJSON([
            'status' => 'success',
            'data' => view('daftarhadir/tabel_laporan', $data)
        ]);
    }



    // Fungsi untuk mencetak laporan
    public function PrintLaporanDaftarHadir($start_date, $end_date)
    {
        $dataLaporan = $this->ModelDaftarHadir->getByDateRange($start_date, $end_date);

        $data = [
            'daftarhadir' => $dataLaporan,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        return view('daftarhadir/print_laporan', $data);
    }
}
