<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_mitra extends CI_Model
{

    public function count_all_data()
    {
        return $this->db->get('order_servis')->num_rows();
    }

    public function tampil_order($limit,$start){
        $this->db->select('*');
        $this->db->from('order_servis');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        return $this->db->get()->result_array();
    }

    public function get_keahlian_all()
    {
        $this->db->select('*');
        $this->db->from('keahlian');
        return $this->db->get()->result_array();
    }

    public function get_order_id($id){
        $this->db->select('*');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        $this->db->join('mitra', 'order_servis.id_keahlian=mitra.id_keahlian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=mitra.id_pelanggan');
        $this->db->where('mitra.id_mitra', $id);
        //$this->db->where('order_servis.id_keahlian', $mitra);
        return $this->db->get('order_servis')->result_array();
    }

    public function get_mitra_keahlian($id)
    {
        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=mitra.id_pelanggan');
        $this->db->where('mitra.id_pelanggan', $id);
        return $this->db->get()->result();
    }

    public function detail_order($data){
        $this->db->insert('detail_order_servis', $data);
       
    }
    public function edit_status_order($id_order,$data1, $table)
    {
        $this->db->where($id_order);
        $this->db->update($table, $data1);
    }

    public function edit_status_mitra($id, $data2, $table){
        $this->db->where($id);
        $this->db->update($table, $data2);
    }

    public function find($search)
    {
        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->join('keahlian', 'mitra.id_keahlian=keahlian.id_keahlian', 'left');
        if ($search != '') {
            $this->db->like('keahlian.daftar_keahlian', $search);
        }

        return $this->db->get()->result_array();
    }

    public function riwayat_order($id)
    {
        $this->db->select('*');
        $this->db->join('detail_order_servis', 'detail_order_servis.id_order=order_servis.id_order');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        $this->db->join('mitra', 'order_servis.id_keahlian=mitra.id_keahlian');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=mitra.id_pelanggan');
        $this->db->where('pelanggan.id_pelanggan', $id);
        //$this->db->where('order_servis.id_keahlian', $mitra);
        return $this->db->get('order_servis')->result_array();
    }


    public function getSaldo($id){
        $this->db->select("*");
        $this->db->from('detail_order_servis');
        $this->db->where('id_mitra', $id);

        return $this->db->get()->result_array();
    }

    public function get_mitra_id($id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('order_servis', 'pelanggan.id_pelanggan=order_servis.id_pelanggan');
        $this->db->join('detail_order_servis', 'detail_order_servis.id_order=order_servis.id_order');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        $this->db->join('mitra', 'mitra.id_mitra=detail_order_servis.id_mitra');
        $this->db->where('mitra.id_mitra', $id);
        return $this->db->get()->result_array();
    }

    public function change_order_status($id_order, $data, $table){
        $this->db->where($id_order);
        $this->db->update($table, $data);
    }

    public function change_status_mitra($id, $mitra, $table){
        $this->db->where($id);
        $this->db->update($table, $mitra);
    }

    public function tarik_saldo(){
        
    }
}