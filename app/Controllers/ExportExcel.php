<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExportExcel extends BaseController
{
    protected $ModelTandaTerima;

    public function ExportExcel()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $data = $this->ModelTandaTerima->LaporanPeriode($tanggal_awal, $tanggal_akhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header kolom
        $sheet->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NAMA')
            ->setCellValue('C1', 'JABATAN/GOL')
            ->setCellValue('D1', 'SATUAN')
            ->setCellValue('E1', 'VOL')
            ->setCellValue('F1', 'JUMLAH')
            ->setCellValue('G1', 'PPH21')
            ->setCellValue('H1', 'JUMLAH SETELAH PAJAK');

        // Mengisi data dari database
        $row = 2;
        $no = 1;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $row, $no++)
                ->setCellValue('B' . $row, $value['nama_peg'])
                ->setCellValue('C' . $row, $value['nama_jab'] . '/' . $value['nama_gol'])
                ->setCellValue('D' . $row, $value['satuan'])
                ->setCellValue('E' . $row, $value['vol'])
                ->setCellValue('F' . $row, $value['jml'])
                ->setCellValue('G' . $row, $value['pph'])
                ->setCellValue('H' . $row, $value['jml_setelah_pajak']);
            $row++;
        }

        // Menyiapkan file Excel untuk diunduh
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan_Tanda_Terima_' . date('Ymd') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
