<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelTandaTerima;
use app\Controllers\Jabatan;
use App\Models\ModelDatapeg;
use App\Models\ModelJabatan;
use App\Models\ModelGolongan;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

use Dompdf\Dompdf;
use Dompdf\Options;

class TandaTerima extends BaseController
{
    protected $ModelTandaTerima;
    protected $ModelDatapeg;
    protected $ModelJabatan;
    protected $ModelGolongan;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ModelTandaTerima = new ModelTandaTerima();
        $this->ModelDatapeg = new ModelDatapeg();
        $this->ModelJabatan = new ModelJabatan();
        $this->ModelGolongan = new ModelGolongan();
    }
    public function index()
    {
        $tantrim = $this->ModelTandaTerima->AllData();
        foreach ($tantrim as &$tt) {
            $tt['tgl'] = date('d-m-Y', strtotime($tt['tgl']));
        }
        $data = [
            'judul' => 'Tanda Terima',
            'subjudul' => 'penerima',
            'menu' => 'tandaterima',
            'submenu' => 'penerima',
            'tandaterima' => $tantrim,
            'jabatan' => $this->ModelJabatan->AllData(),
            'datapegawai' => $this->ModelDatapeg->AllData(),
            'golongan' => $this->ModelGolongan->AllData(),
        ];
        return view('tandaterima/tandaterima', $data);
    }

    public function InsertData()
    {
        $satuan = str_replace(",", "", $this->request->getPost('satuan'));
        $jml = str_replace(",", "", $this->request->getPost('jml'));
        $pph = str_replace(",", "", $this->request->getPost('pph'));
        $jml_setelah_pajak = str_replace(",", "", $this->request->getPost('jml_setelah_pajak'));

        $data = [
            'id_peg' => $this->request->getPost('id_peg'),
            'id_jab' => $this->request->getPost('id_jab'),
            'id_gol' => $this->request->getPost('id_gol'),
            'satuan' => $satuan,
            'vol' => $this->request->getPost('vol'),
            'jml' => $jml,
            'pph' => $pph,
            'jml_setelah_pajak' => $jml_setelah_pajak,
            'tgl' => $this->request->getPost('tgl'),
        ];

        $this->ModelTandaTerima->InsertData($data);
        session()->setFlashdata('pesan', 'Data has been added successfully !!');
        return redirect()->to('TandaTerima');
    }

    public function UpdateData($id_tandaterima)
    {
        $data = [
            'id_tandaterima' => $id_tandaterima,
            'id_peg' => $this->request->getPost('id_peg'),
            'id_jab' => $this->request->getPost('id_jab'),
            'id_gol' => $this->request->getPost('id_gol'),
            'satuan' => str_replace(",", "", $this->request->getPost('satuan')),
            'vol' => $this->request->getPost('vol'),
            'jml' => str_replace(",", "", $this->request->getPost('jml')),
            'pph' => str_replace(",", "", $this->request->getPost('pph')),
            'jml_setelah_pajak' => str_replace(",", "", $this->request->getPost('jml_setelah_pajak')),
            'tgl' => $this->request->getPost('tgl'),
        ];

        $this->ModelTandaTerima->UpdateData($data);
        session()->setFlashdata('pesan', 'Data has been updated successfully!');
        return redirect()->to('TandaTerima');
    }

    public function DeleteData($id_tandaterima)
    {
        $this->ModelTandaTerima->DeleteData($id_tandaterima);
        session()->setFlashdata('pesan', 'Data has been deleted successfully!');
        return redirect()->to('TandaTerima');
    }

    public function LaporanTandaTerima()
    {
        $data = [
            'judul' => 'TandaTerima',
            'subjudul' => 'Laporan Tanda Terima',
            'menu' => 'TandaTerima',
            'submenu' => 'laporan-tandaterima',
        ];
        return view('tandaterima/laporan_tandaterima', $data);
    }

    public function FilterLaporan()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        // Ambil data laporan berdasarkan periode
        $tandaterima = $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir);

        // Cek apakah data kosong
        if (empty($tandaterima)) {
            // Jika data kosong, kirim pesan peringatan dengan SweetAlert
            return redirect()->back()->with('error', 'Tidak ada data tanda terima pada periode yang dipilih.');
        }

        // Jika data tidak kosong, kirimkan data ke view
        $data = [
            'judul' => 'Tanda Terima',
            'subjudul' => 'Laporan Tanda Terima',
            'menu' => 'tandaterima',
            'submenu' => 'laporan-tandaterima',
            'tandaterima' => $tandaterima,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ];

        return view('tandaterima/laporan', $data);
    }



    // public function PrintLaporan()
    // {
    //     $tanggal_awal = $this->request->getPost('tanggal_awal');
    //     $tanggal_akhir = $this->request->getPost('tanggal_akhir');

    //     $data = [
    //         'judul' => 'Cetak Laporan Tanda Terima',
    //         'subjudul' => 'Laporan Tanda Terima',
    //         'tandaterima' => $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir),
    //     ];

    //     return view('tandaterima/laporan_pdf', $data);
    // }

    // public function PrintLaporan()
    // {
    //     $tanggal_awal = $this->request->getPost('tanggal_awal');
    //     $tanggal_akhir = $this->request->getPost('tanggal_akhir');

    //     // Menyiapkan data untuk tampilan
    //     $data = [
    //         'judul' => 'Cetak Laporan Tanda Terima',
    //         'subjudul' => 'Laporan Tanda Terima',
    //         'tandaterima' => $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir),
    //         'tanggal_awal' => $tanggal_awal,  // Pastikan variabel tanggal_awal dikirimkan
    //         'tanggal_akhir' => $tanggal_akhir, // Pastikan variabel tanggal_akhir dikirimkan
    //     ];

    //     return view('tandaterima/print_laporan', $data);
    // }


    public function ExportPDF()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $data['tandaterima'] = $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir);
        $data['judul'] = 'DAFTAR PENERIMAAN LEMBUR BULAN FEBRUARI 2023';

        // Load view sebagai HTML string
        $html = view('tandaterima/laporan_pdf', $data);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Set orientasi ke landscape
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output file ke browser untuk didownload
        $dompdf->stream("Laporan_Tanda_Terima.pdf", array("Attachment" => false));
        exit;
    }

    public function PrintTandaTerima()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $data = [
            'judul' => 'Laporan Tanda Terima',
            'tandaterima' => $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir),
            'page' => 'tandaterima/print_laporan'
        ];
        return view('template_laporan', $data);
    }
}
