<?php
require('../_assets/ffdf/fpdf.php');


$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru

$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(190, 7, 'LAPORAN BARANG', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'PERSEDIAAN MINISO UYYEE', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(70, 6, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(85, 6, 'Keterangan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Stok', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

include '../_config/config.php';

$barang = mysqli_query($con, "SELECT * FROM barang");
while ($row = mysqli_fetch_array($barang)) {
    $pdf->Cell(70, 6, $row['nama'], 1, 0, 'C');
    $pdf->Cell(85, 6, $row['keterangan'], 1, 0, 'C');
    $pdf->Cell(35, 6, $row['stock'], 1, 1, 'C');
}

$pdf->Output();
