<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail extends CI_Controller {

  public function index(){

    $this->load->view('admin/kirim_email');
    

  }


  function upload_file(){

    $config['upload_path'] = 'uploads/';

    $config['allowed_types'] = 'doc|docx|pdf'; //tipe file attach

    $this->load->library('upload', $config);

    if($this->upload->do_upload('resume')){

     return $this->upload->data();  

    }else{

     return $this->upload->display_errors();

    }

  }




public function kirimemail()
    {
      $data = $this->input->post('email');
      $pesan = $this->input->post('pesan');

      // $cek = $this->db->select('name, password')->where('name', $data)->limit(1)->get('user_finances')->row();

      // if (!empty($cek)) {
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sumbangantiusu@gmail.com';
        $mail->Password = 'sumbanganti18';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('sumbangantiusu@gmail.com', 'Pengelola Sumbangan');
        $mail->addReplyTo('sumbangantiusu@gmail.com', 'Pengelola Sumbangan');

        // email tujuan mu
        $mail->addAddress($data);

        // Attracmhent File
        if (!empty($_FILES['uploaded_file']['tmp_name'])) {
          if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
                $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
                                     $_FILES['uploaded_file']['name']);
          }
        }

        // Email subject
        $mail->Subject = 'Tanda Terima Sumbangan Alumni';

        // Set email format to HTML
        // $mail->isHTML(true);

        // Email body content / isi
        $mail->Body = $pesan;

        // Send email
        if(!$mail->send()){
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Gagal mengirimkan email,mohon periksa email tujuan!
              </div>');
              redirect('Sendemail');
        }else{
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Email berhasil terkirim ke '.$data.'!
              </div>');
            redirect('Sendemail');
        }

        // $data['anggota'] = $this->Mod_anggota->getAll()->result();
    $this->template->load('layout/template','admin/kirim_email', $data);
        
        
      // }else {
      //   echo "<pre>";
      //   print_r('sorry, email tidak di temukan di database');
      //   die;
      // }
    }
    
  }


?>