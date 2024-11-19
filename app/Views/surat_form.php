<?php
// Include FPDF library
include('fpdf/fpdf.php');

// Buat objek FPDF
$pdf = new FPDF();

// Tambahkan halaman baru
$pdf->AddPage();

// Set font untuk judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(200, 10, 'Judul Dokumen PDF', 0, 1, 'C');

// Set font untuk konten
$pdf->SetFont('Arial', '', 12);

// Tambahkan teks
$pdf->Ln(10); // Jarak vertikal
$pdf->MultiCell(0, 10, 'Ini adalah contoh paragraf dalam file PDF. Anda bisa menambahkan lebih banyak teks di sini. ' .
'Ini adalah contoh penggunaan FPDF untuk menghasilkan dokumen PDF secara dinamis menggunakan PHP. ' .
'Anda juga bisa menambahkan gambar, tabel, dan elemen lain sesuai kebutuhan.');

$pdf->Ln(5); // Jarak setelah paragraf

// Menambahkan teks lain
$pdf->Cell(0, 10, 'Contoh teks di bawah ini.', 0, 1);

// Menambahkan garis horizontal
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

// Teks lainnya setelah garis
$pdf->Ln(10); // Jarak vertikal
$pdf->Cell(0, 10, 'Teks setelah garis horizontal.', 0, 1);

// Output PDF
$pdf->Output('I', 'contoh_dokumen.pdf');
?>