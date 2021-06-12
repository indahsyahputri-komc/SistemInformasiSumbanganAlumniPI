<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaskeluar extends  MY_Controller {

    public function __construct(){

        parent ::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }

        //load model
        $this->load->model('m_keluar'); 
        $this->load->library('pagination'); 

    }
    public function view_kas_keluar()
    {
        $total = $this->m_keluar->total_rows('kas_keluar');
        $config['base_url']   = base_url('member/kaskeluar/view_kas_keluar/');
        $config['total_rows'] = $total;
        $config['per_page']   = 10;

        /*config*/
        // tag pagination bootstrap
        $config['full_tag_open']    = "<ul class='pagination pull-left'>";
        $config['full_tag_close']   = "</ul>";
        $config['num_tag_open']     = "<li>";
        $config['num_tag_close']    = "</li>";
        $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
        // $config['next_link']        = "Selanjutnya";
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        // $config['prev_link']        = "Sebelumnya";
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        // $config['first_link']       = "Awal";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        // $config['last_link']        = 'Terakhir';
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";

        //load hasil config
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = (int) $this->uri->segment(3);

        $data['pagination'] = $this->pagination->create_links();
        $data['kas_keluar']    = $this->m_keluar->getkas_keluar($limit, $offset);
        $data['title']      = 'Data kas_keluar';

        // $data['anggota'] = $this->Mod_anggota->getAll()->result();
        // $this->load->view('member/hasil_kas_keluar', $data);
        $this->template->load('layoutm/template','member/hasil_kas_keluar',$data);
    }


    public function search_kas_keluar()
    {
        $total = $this->m_keluar->total_rows('kas_keluar');
        $config['base_url']   = base_url('index.php/search_kas_keluar/');
        $config['total_rows'] = $total;
        $config['per_page']   = 5;

        /*config*/
        // tag pagination bootstrap
        $config['full_tag_open']    = "<ul class='pagination pull-right'>";
        $config['full_tag_close']   = "</ul>";
        $config['num_tag_open']     = "<li>";
        $config['num_tag_close']    = "</li>";
        $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
        // $config['next_link']        = "Selanjutnya";
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        // $config['prev_link']        = "Sebelumnya";
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        // $config['first_link']       = "Awal";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        // $config['last_link']        = 'Terakhir';
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";


        //load hasil config
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = (int) $this->uri->segment(3);

        $data['pagination'] = $this->pagination->create_links();

       $cari = $this->input->post('cari_kas');
       $data['title']   = 'Data Kaskeluar';
       $data['kas_keluar'] = $this->m_keluar->searchKaskeluar($cari, $limit, $offset);
       $this->load->view('kas_keluar/hasil_kas_keluar', $data);
    }


}
;
?>