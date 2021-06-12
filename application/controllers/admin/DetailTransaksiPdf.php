<?php
Class DetailTransaksiPdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'UNIVERSITAS SUMATERA UTARA',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'FAKULTAS ILMU KOMPUTER DAN TEKNOLOGI INFORMASI',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(190,7,'SISTEM INFORMASI SUMBANGAN ALUMNI TEKNOLOGI INFORMASI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Bukti Transaksi Sumbangan',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Nama',1,0);
        $pdf->Cell(85,6,'NIM',1,0);
        $pdf->Cell(27,6,'Jenis Sumbangan',1,0);
        $pdf->Cell(25,6,'Jumlah',1,1);

        $pdf->SetFont('Arial','',10);

        $kas_masuk = $this->db->get('kas_masuk')->result();
        foreach ($kas_masuk as $row){
            $pdf->Cell(20,6,$row->no_kwitansi,1,0);
            $pdf->Cell(85,6,$row->tanggal,1,0);
            $pdf->Cell(27,6,$row->jlh_uang,1,0);
            $pdf->Cell(25,6,$row->keterangan,1,1); 
        }

        $pdf->Output();
    }
}