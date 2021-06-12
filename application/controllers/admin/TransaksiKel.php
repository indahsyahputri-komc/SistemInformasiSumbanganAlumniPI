<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiKel extends  MY_Controller {

    public function __construct(){

        parent ::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

		$this->load->model('TransaksiModelKel');
	}

	public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal = $_GET['tanggal'];

                $ket = 'Data Kas Keluar Tanggal '.date('d-m-y', strtotime($tanggal));
                $url_cetak = 'admin/TransaksiKel/cetak?filter=1&tanggal='.$tanggal;
                $kas_keluar = $this->TransaksiModelKel->view_by_date($tanggal); // Panggil fungsi view_by_date yang ada di TransaksiModelKel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Kas Keluar Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/TransaksiKel/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $kas_keluar = $this->TransaksiModelKel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModelKel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kas Keluar Tahun '.$tahun;
                $url_cetak = 'admin/TransaksiKel/cetak?filter=3&tahun='.$tahun;
                $kas_keluar = $this->TransaksiModelKel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModelKel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kas Keluar';
            $url_cetak = 'admin/TransaksiKel/cetak';
            $kas_keluar = $this->TransaksiModelKel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModelKel
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['kas_keluar'] = $kas_keluar;
        $data['option_tahun'] = $this->TransaksiModelKel->option_tahun();
        $this->template->load('layout/template','admin/kas_keluar/viewkel',$data);
		// $this->load->view('viewkel', $data);
	}

	public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal = $_GET['tanggal'];

                $ket = 'Data Kas Keluar Tanggal '.date('d-m-y', strtotime($tanggal));
                $kas_keluar = $this->TransaksiModelKel->view_by_date($tanggal); // Panggil fungsi view_by_date yang ada di TransaksiModelKel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Kas Keluar Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $kas_keluar = $this->TransaksiModelKel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModelKel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Kas Keluar Tahun '.$tahun;
                $kas_keluar = $this->TransaksiModelKel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModelKel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Kas Keluar';
            $url_cetak = 'admin/TransaksiKel/cetak';
            $kas_keluar = $this->TransaksiModelKel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModelKel
        }
         $site = $this->Konfigurasi_model->listing();
        $data['title'] = $site['nama_website'] ; 
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['kas_keluar'] = $kas_keluar;
        $data['option_tahun'] = $this->TransaksiModelKel->option_tahun();
        $this->template->load('layout/template','admin/kas_keluar/viewkel',$data);

		ob_start();
		$this->load->view('admin/kas_keluar/printkel', $data);
		$html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Kas Keluar.pdf', 'D');
	}
}
