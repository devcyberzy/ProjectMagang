<?php

namespace App\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\ModelSurat;
use App\Models\ModelDatapeg;

class Surat extends BaseController
{
    protected $ModelSurat;
    protected $ModelDatapeg;

    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ModelSurat = new ModelSurat();
        $this->ModelDatapeg = new ModelDatapeg();
    }
    public function index()
    {
        $data = [
            'judul' => 'Surat Perintah',
            'subjudul' => '',
            'menu' => 'surat',
            'submenu' => '',
            'surat' => $this->ModelSurat->AllData(),
            'datapegawai' => $this->ModelDatapeg->AllData(),

        ];

        // Tampilkan form dengan data
        return view('surat_form', $data);
    }



    public function generate()
    {
        $id_pegawai = $this->request->getPost('id_pegawai');
        $dasar = $this->request->getPost('dasar');
        $untuk = $this->request->getPost('untuk');

        // Ambil data pegawai berdasarkan id_pegawai
        $pegawaiModel = new \App\Models\ModelDatapeg();
        $pegawai = $pegawaiModel->find($id_pegawai);

        // Load template dan isi placeholder
        $templateProcessor = new TemplateProcessor('public/templates/surat_template.docx');
        $templateProcessor->setValue('nama', $pegawai['nama']);
        $templateProcessor->setValue('bagian', $pegawai['bagian']);
        $templateProcessor->setValue('dasar', $dasar);
        $templateProcessor->setValue('untuk', $untuk);

        // Simpan file yang telah diisi
        $outputFile = 'public/outputs/surat_' . time() . '.docx';
        $templateProcessor->saveAs($outputFile);

        return redirect()->to(base_url($outputFile));
    }
}
