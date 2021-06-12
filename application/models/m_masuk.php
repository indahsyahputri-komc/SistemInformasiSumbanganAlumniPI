<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masuk extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('kas_masuk')
                 ->order_by('nama asc')
                 ->get();
        return $query->result();
    }

     function get()
    {
        return $this->db->get('kas_masuk');
    }


    function create_masuk($data)
    {
        $this->table_name = 'kas_masuk';
        $this->db->insert($this->table_name, $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }


    public function simpan(){
        

        $data = array(
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'jenis_sumbangan' => $this->input->post('jenis_sumbangan'),
            'qty' => $this->input->post('qty'),
            'keterangan' => $this->input->post('keterangan'),
            'email' => $this->input->post('email'),
        );
        $insert_data=$this->db->insert('kas_masuk',$data);
        return $insert_data;
    }

    public function edit($id)
    {

        $query = $this->db->where("id", $id)
                ->get("kas_masuk");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("kas_masuk", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    function hapus($id){
        $hasil=$this->db->query("DELETE FROM kas_masuk WHERE id='$id'");
        return $hasil;
    }

    // function change($id){
    //     $ubah=$this->db->query("UPDATE kas_masuk SET status = '1' WHERE id='$id'");
    //     return $ubah;
    // }

    function status_verifikasi($where,$kas_masuk){
    // if ($status =='0') {
       $this->db->set('status','1');
   // } else{
   //     $this->db->set('status','0');
   // }
   $this->db->where($where);
   $this->db->update($kas_masuk);}

     function getkas_masuk($limit, $offset)
    {
        
        $this->db->select('*');
        $this->db->from('kas_masuk a');
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id asc');
        return $this->db->get();
    }

    function total_rows($table)
    {
        return $this->db->count_all_results($table);
        $this->db->order_by('nama asc');
    }

     function searchKasmasuk($cari, $limit, $offset)
    {
        $this->db->like("tanggal",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('kas_masuk');
    }

    function get_email($id){
    $this->db->select("*");
    $this->db->where("id",$id);
    return $this->db->get('kas_masuk')->row();
}

        public function detail($id)
    {

        $query = $this->db->where("id", $id)
                ->get("kas_masuk");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }



}
?>