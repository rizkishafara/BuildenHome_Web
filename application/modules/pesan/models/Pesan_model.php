<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    private $_table = "order_servis";

    public $id_order;
    public $tanggal;
    public $id_pelanggan;
    public $id_kota;
    public $id_kecamatan;
    public $lokasi_pelanggan;
    public $id_keahlian;
    

    public function rules()
    {
        return [
            [
                'field' => 'id_order',
                'label' => 'Id',
                'rules' => 'numeric'
            ],

            [
                'field' => 'tanggal',
                'label' => 'tanggal',
                'rules' => 'required'
            ],

            [
                'field' => 'waktu',
                'label' => 'waktu',
                'rules' => 'required'
            ],

            [
                'field' => 'id_pelanggan',
                'label' => 'id_pelanggan',
                'rules' => 'numeric'
            ],


            [
                'field' => 'kota',
                'label' => 'kota',
                'rules' => 'required'
            ],
            [
                'field' => 'kecamatan',
                'label' => 'kecamatan',
                'rules' => 'required'
            ],
            [
                'field' => 'lokasi_pelanggan',
                'label' => 'lokasi_pelanggan',
                'rules' => 'required'
            ]
        ];
    }
    public function get_keahlian_id($keahlian){
        $this->db->from('keahlian');
        $this->db->where('id_keahlian', $keahlian);
        return $this->db->get()->row_array();

    }

    public function pesan()
    {
        $post = $this->input->post();
        $this->id_order;
        $this->tanggal = $post["tanggal"];
        $this->waktu = $post["waktu"];
        $this->id_pelanggan = $this->session->userdata('id');
        $this->id_kota = $post["kota"];
        $this->id_kecamatan = $post["kecamatan"];
        $this->lokasi_pelanggan = $post["lokasi_pelanggan"];
        $this->id_keahlian = $post['keahlian'];
        return $this->db->insert($this->_table, $this);
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