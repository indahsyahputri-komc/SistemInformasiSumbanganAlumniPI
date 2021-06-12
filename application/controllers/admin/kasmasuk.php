<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasmasuk extends  MY_Controller {

    public function __construct(){

        parent ::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->model('m_masuk');
        $this->load->library('pagination'); 
        

    }

    public function detail($id)
    {
        $id = $this->uri->segment(4);

        $data = array(

            'title'     => 'Detail Transaksi',
            'data_kas_masuk' => $this->m_masuk->detail($id)

        );

        // $this->load->view('kas_masuk/edit_kasmasuk', $data);
        $this->template->load('layout/template','admin/kas_masuk/detail_transaksi',$data);
    }

//     function detail($id){
//    $b['data_nama']=$this->m_masuk->get_email($id)->nama;
//    $b['data_nim']=$this->m_masuk->get_email($id)->nim;
//    $b['data_jenis_sumbangan']=$this->m_masuk->get_email($id)->jenis_sumbangan;
//    $b['data_qty']=$this->m_masuk->get_email($id)->qty;
//    $b['data_keterangan']=$this->m_masuk->get_email($id)->keterangan;
//    $b['data_email']=$this->m_masuk->get_email($id)->email;
//    // $b['data_email']=$this->m_masuk->get_email($id)->email;
//     // $this->load->view('admin/kas_masuk/detail',$b);
//     $this->template->load('layout/template','admin/kas_masuk/detail', $b);
// }


    public function tambah()
    {
        $data = array(

            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'jenis_sumbangan' => $this->input->post('jenis_sumbangan'),
            'qty' => $this->input->post('qty'),
            'keterangan' => $this->input->post('keterangan'),
            'email' => $this->input->post('email'),
            'status'=> $this->input->post('status'),

        );  
        
                // $this->load->view('kas_masuk/tambah_masuk');
                $this->template->load('layout/template','admin/kas_masuk/tambah_masuk');
             
    
}

    public function simpan(){
        // $this->form_validation->set_rules('id','id','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('nim','nim','trim|required');
        $this->form_validation->set_rules('jenis_sumbangan',' jenis_sumbangan','trim|required');
        $this->form_validation->set_rules('qty',' qty','trim|required');
        $this->form_validation->set_rules('keterangan','keterangan','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('status','status','trim|required');
            if($this->form_validation->run()==FALSE){
            $data = array(
                'errors'=> validation_errors()
            );
            $this->session->set_flashdata($data);

            redirect ('admin/kasmasuk/tambah');
        }
            else{

                $this->m_masuk->simpan();
                    //redirect('kasmasuk/view_kas_masuk');

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

            redirect('admin/kasmasuk/view_kas_masuk');
            }
    }
    
    public function edit($id)
    {
        $id = $this->uri->segment(4);

        $data = array(

            'title'     => 'Edit',
            'data_kas_masuk' => $this->m_masuk->edit($id)

        );

        // $this->load->view('kas_masuk/edit_kasmasuk', $data);
        $this->template->load('layout/template','admin/kas_masuk/edit_kas_masuk',$data);
    }

    public function update()
    {
        $id['id'] = $this->input->post("id");
        $data = array(

            'id'           => $this->input->post("id"),
            'nama'         => $this->input->post("nama"),
            'nim'         => $this->input->post("nim"),
            'jenis_sumbangan'    => $this->input->post("jenis_sumbangan"),
            'qty'    => $this->input->post("qty"),
            'keterangan'    => $this->input->post("keterangan"),
            'email'         => $this->input->post("email"),
            'status'        => $this->input->post("status"),
            
        );

        $this->m_masuk->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('/admin/kasmasuk/view_kas_masuk');

    }


    function hapus(){
        $id=$this->input->post('id');
        $this->m_masuk->hapus($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');
        redirect('admin/kasmasuk/view_kas_masuk');
    }

    // function approve()
    // {
    //     $id=$this->input->post('id');
    //     $this->m_masuk->change($id);
    //     $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! transaksi sudah disetujui
    //                                             </div>');

    //     redirect('admin/kasmasuk/view_kas_masuk');
    // }

    function status_verifikasi($id){
    $where = array('id' => $id);
    $this->m_masuk->status_verifikasi($where,'kas_masuk');
    redirect('admin/kasmasuk/view_kas_masuk');}

    public function view_kas_masuk()
    {
        $total = $this->m_masuk->total_rows('kas_masuk');
        // $total = $this->m_masuk->getkas_masuk();
        $config['base_url']   = base_url('admin/kasmasuk/view_kas_masuk/');
        $config['total_rows'] = $total;
        $config['per_page']   = 5;

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
        $offset = (int) $this->uri->segment(4);

        $data['pagination'] = $this->pagination->create_links();
        $data['kas_masuk']    = $this->m_masuk->getkas_masuk($limit, $offset);
        $data['title']      = 'Data Kas Masuk';

        // $data['anggota'] = $this->Mod_anggota->getAll()->result();
        $this->template->load('layout/template','admin/kas_masuk/hasil_kas_masuk', $data);
    }


    public function search_kas_masuk()
    {
        $total = $this->m_masuk->total_rows('kas_masuk');
        $config['base_url']   = base_url('admin/kasmasuk/search_kas_masuk/');
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
        $offset = (int) $this->uri->segment(4);

        $data['pagination'] = $this->pagination->create_links();

       $cari = $this->input->post('cari_kas');
       $data['title']   = 'Data Kas Masuk';
       $data['kas_masuk'] = $this->m_masuk->searchKasmasuk($cari, $limit, $offset);
       $this->template->load('layout/template','admin/kas_masuk/hasil_kas_masuk', $data);
    }



}
;
?>
