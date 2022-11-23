<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_account extends CI_Model
{
    function daftar($data)
    {
        $this->db->insert('pelanggan', $data);
    }


    //lokasi dengan ajax
    public function get_kota()
    {
        $hasil = $this->db->query("SELECT * FROM kota");
        return $hasil->result_array();
    }

    public function get_kec($id)
    {
        $ambil = $this->db->query("SELECT * FROM kecamatan WHERE id_kota = '$id'");
        return $ambil->result();
    }

   
    
}
