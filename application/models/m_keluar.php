<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluar extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('kas_keluar')
                 ->order_by('no_kwitansi', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan(){
        

        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'jlh_uang' => $this->input->post('jlh_uang'),
            'keterangan' => $this->input->post('keterangan')
        );
        $insert_data=$this->db->insert('kas_keluar',$data);
        return $insert_data;
    }

    public function edit($no_kwitansi)
    {

        $query = $this->db->where("no_kwitansi", $no_kwitansi)
                ->get("kas_keluar");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $no_kwitansi)
    {

        $query = $this->db->update("kas_keluar", $data, $no_kwitansi);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    // public function update($data, $no_kwitansi){
        

    //     $data = array(
    //         'tanggal' => $this->input->post('tanggal'),
    //         'jlh_uang' => $this->input->post('jlh_uang'),
    //         'keterangan' => $this->input->post('keterangan')
    //     );
    //     $update_data=$this->db->update('kas_keluar',$data, $no_kwitansi);
    //     return $update_data;
    // }


    function hapus($no_kwitansi){
        $hasil=$this->db->query("DELETE FROM kas_keluar WHERE no_kwitansi='$no_kwitansi'");
        return $hasil;
    }

    function getkas_keluar($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('kas_keluar a');
        // $this->db->where('a.nis', $nis);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.no_kwitansi');
        return $this->db->get();
    }

    function total_rows($table)
    {
        return $this->db->count_all_results($table);
    }

     function searchKaskeluar($cari, $limit, $offset)
    {
        $this->db->like("no_kwitansi",$cari);
        $this->db->or_like("tanggal",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('kas_keluar');
    }

}
?>