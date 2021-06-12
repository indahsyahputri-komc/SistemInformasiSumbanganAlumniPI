<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('anggota')
                 ->order_by('username', 'asc')
                 ->get();
        return $query->result();
    }

    function create_anggota($data)
    {
        $this->table_name = 'anggota';
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
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat')
        );
        $insert_data=$this->db->insert('anggota',$data);
        return $insert_data;
    }

    function get_anggota($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('anggota a');
        // $this->db->where('a.nis', $nis);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id asc');
        return $this->db->get();
    }

    function total_rows($table)
    {
        return $this->db->count_all_results($table);
    }

     function searchAnggota($cari, $limit, $offset)
    {
        $this->db->like("username",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('anggota');
    }
        function valid_id($username)
    {
        $this->table_name = 'anggota';
        $query = $this->db->get_where($this->table_name, array('username' => $username));
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    } 

    public function edit($id)
    {

        $query = $this->db->where("id", $id)
                ->get("anggota");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("anggota", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    // public function update($data, $id){
        

    //     $data = array(
    //         'nama' => $this->input->post('nama'),
    //         'jabatan' => $this->input->post('jabatan'),
    //         'alamat' => $this->input->post('alamat')
    //     );
    //     $update_data=$this->db->update('kas_keluar',$data, $id);
    //     return $update_data;
    // }

   function hapus($id){
        $hasil=$this->db->query("DELETE FROM anggota WHERE id='$id'");
        return $hasil;
    }

}
?>