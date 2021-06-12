<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends  MY_Controller {

    public function __construct(){

        parent ::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }

        //load model
        $this->load->model('m_anggota'); 
        $this->load->library('pagination');
        $this->load->library('form_validation');

    }

    public function tambah()
    {

        $this->template->load('layout/template','admin/anggota/tambah_anggota');

    }

    public function simpan(){
        // $this->form_validation->set_rules('no_kwitansi','no_kwitansi','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('jabatan',' jabatan','trim|required');
        $this->form_validation->set_rules('alamat','alamat','trim|required');
            if($this->form_validation->run()==FALSE){
            $data = array(
                'errors'=> validation_errors()
            );
            $this->session->set_flashdata($data);

            redirect ('admin/anggota/tambah');
        }
            else{

                $this->m_anggota->simpan();
                    //redirect('kasmasuk/view_kas_masuk');

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

            redirect('admin/anggota/view_anggota');
            }
    }

    public function edit($id)
    {
        $id = $this->uri->segment(4);

        $data = array(

            'title'     => 'Edit User',
            'data_anggota' => $this->m_anggota->edit($id)

        );

        $this->template->load('layout/template','admin/anggota/edit_anggota',$data);
    }

    public function update()
    {
        $id['id'] = $this->input->post("id");
        $data = array(

            'nama'          => $this->input->post("nama"),
            'jabatan'          => $this->input->post("jabatan"),
            'alamat'        => $this->input->post("alamat")
          
        );

        $this->m_anggota->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('/admin/anggota/view_anggota');

    }

    // public function update(){
    //     $this->form_validation->set_rules('nama','nama','trim|required');
    //     $this->form_validation->set_rules('jabatan',' jabatan','trim|required');
    //     $this->form_validation->set_rules('alamat','alamat','trim|required');
    //         if($this->form_validation->run()==FALSE){
    //         $data = array(
    //             'errors'=> validation_errors()
    //         );
    //         $this->session->set_flashdata($data);

    //         redirect ('admin/anggota/edit');
    //     }
    //         else{

    //             $this->m_anggota->update($data, $id);
    //                 //redirect('kasmasuk/view_kas_masuk');

    //         $this->session->set_userdata($user_data);
    //         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
    //                                             </div>');

    //         redirect('admin/anggota/view_anggota');
    //         }
    // }

   function hapus(){
        $id=$this->input->post('id');
        $this->m_anggota->hapus($id);
         $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');
        redirect('admin/anggota/view_anggota');
    }

    public function view_anggota()
    {
        $total = $this->m_anggota->total_rows('anggota');
        $config['base_url']   = base_url('index.php/admin/anggota/view_anggota/');
        $config['total_rows'] = $total;
        $config['per_page']   = 7;

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
        $data['anggota']    = $this->m_anggota->get_anggota($limit, $offset);
        $data['title']      = 'Data Anggota';

        // $data['anggota'] = $this->Mod_anggota->getAll()->result();
        // $this->load->view('anggota/hasil_anggota_coba', $data);
        $this->template->load('layout/template','admin/anggota/hasil_anggota', $data);
    }

}
;
?>
