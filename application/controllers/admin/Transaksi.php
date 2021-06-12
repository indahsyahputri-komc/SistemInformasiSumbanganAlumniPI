<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends  MY_Controller {

    public function __construct(){

        parent ::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

		$this->load->model('TransaksiModel');
	}

	public function awal($id){

        $id = $this->uri->segment(4);

        $data = array(

            'title'     => 'Detail Transaksi',
            'data_kas_masuk' => $this->TransaksiModel->view_all($id),
            'ket'       => 'Cetak Bukti Transaksi'

        );

        
            $ket = 'Semua Data Kas Masuk';
            $url_cetak = 'admin/transaksi/cetak';
            $kas_masuk = $this->TransaksiModel->view_all($id); // Panggil fungsi view_all yang ada di TransaksiModel
        
        $site = $this->Konfigurasi_model->listing();
        $judul = 'Laporan | ';
        $data['title'] = $site['nama_website'] ; 
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['kas_masuk'] = $kas_masuk;
        // $data['option_tahun'] = $this->TransaksiModel->option_tahun();
        $this->template->load('layout/template','admin/kas_masuk/view',$data);
		// $this->load->view('view', $data);
	}

	public function cetak($id){

        $id = $this->uri->segment(4);
        
            $ket = 'Semua Data Kas Keluar';
            $kas_masuk = $this->TransaksiModel->view_all($id); // Panggil fungsi view_all yang ada di TransaksiModel
        // }

        $data['ket'] = $ket;
        $data['kas_masuk'] = $kas_masuk;

		ob_start();
		$this->load->view('admin/kas_masuk/print', $data);
		$html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('L','A5','fr', true, 'UTF-8', array(20, 15, 15, 15), false);
		$pdf->WriteHTML($html);
		$pdf->Output('Bukti Transaksi.pdf');
	}
}
