<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_Page extends CI_Model
{
    public function getAllData($id)
    {
        return $this->db->get('pelanggan');
    }

    public function get_keahlian()
    {
        return $this->db->get('keahlian')->result_array();
    }

    public function Add_mitra($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jenis_pelanggan($id_pelanggan, $data1, $table)
    {
        $this->db->where($id_pelanggan);
        $this->db->update($table, $data1);
    }

    public function count_all_data()
    {
        return $this->db->get('keahlian')->num_rows();
    }

    public function tampil_mitra($limit, $start)
    {
        return $this->db->get('keahlian', $limit, $start)->result_array();
    }

    public function detail_mitra($detail)
    {
        $this->db->from('keahlian');
        $this->db->where('id_keahlian', $detail);
        return $this->db->get()->row_array();
    }

    public function get_keahlian_all()
    {
        return $this->db->get('keahlian')->result_array();
    }

    public function get_keahlian_id($jenis)
    {
        $this->db->select('*');
        $this->db->from('keahlian');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function orderBatal($id){
        $this->db->where('id_order', $id);
        $this->db->delete('order_servis');
    }

    public function riwayat_order($id)
    {
        $this->db->select('*');
        $this->db->from('order_servis');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=order_servis.id_pelanggan');
        $this->db->join('detail_order_servis', 'detail_order_servis.id_order=order_servis.id_order');
        $this->db->join('mitra', 'mitra.id_mitra=detail_order_servis.id_mitra');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        $this->db->where('order_servis.id_pelanggan', $id);
        $this->db->order_by('order_servis.id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function beriRating($id)
    {
        $this->db->select('*');
        $this->db->from('order_servis');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan=order_servis.id_pelanggan');
        $this->db->join('detail_order_servis', 'detail_order_servis.id_order=order_servis.id_order');
        $this->db->join('mitra', 'mitra.id_mitra=detail_order_servis.id_mitra');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        $this->db->where('order_servis.id_order', $id);
        return $this->db->get()->result_array();
    }
   


    public function find($search)
    {
        $this->db->select('*');
        $this->db->from('keahlian');
        if ($search != '') {
            $this->db->like('daftar_keahlian', $search);
        }

        return $this->db->get()->result_array();
    }

    public function pembayaran($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function bukti($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function input_review($data){
        $this->db->insert('review_servis', $data);
    }

    public function rating_order($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function edit_rating_mitra($id, $mitra, $table){
        $this->db->where($id);
        $this->db->update($table, $mitra);
    }

    public function data_bayar($bayar){
        $this->db->insert('pembayaran_servis', $bayar);
    }
}
