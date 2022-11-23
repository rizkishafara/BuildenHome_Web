<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_mitra');
    }
    public function index()
    {
        $data['title'] = "Order";
        $data['ahli'] = $this->M_mitra->get_keahlian_all();

        $id_login = $this->session->userdata['id'];
        $data['order_servis'] = $this->M_mitra->get_order_id($id_login);
        
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('order', $data);
        $this->load->view('template/shop/footer_shop', $data);
    }

    public function input_detail(){
        $id_order = $this->input->post('id_order');
        $id_mitra = $this->input->post('id_mitra');
        $tarif = $this->input->post('tarif');
        $biaya_admin = 10/100*$tarif;
        $data = array(
            'id_order' => $id_order,
            'id_mitra' => $id_mitra,
            'biaya_admin' => $biaya_admin,
            'harga_jasa' => $tarif,
        );
        $status_mitra = 'tidak tersedia';
        $id_mit = array(
            'id_mitra'=>$id_mitra
        );
        $data2 = array(
            'status' => $status_mitra
        );

        $status = 'sedang diproses';
        $data1 = array(
            'status_order' => $status
        );

        $id = array(
            'id_order' => $id_order
        );
        $this->M_mitra->edit_status_order($id, $data1, 'order_servis');
        $this->M_mitra->edit_status_mitra($id_mit, $data2, 'mitra');
        $this->M_mitra->detail_order($data);
        redirect('mitra/index');
    }


    public function cari()
    {
        $search = $_GET['search'];
        $data['mitra']  = $this->M_Page->find($search);
        $hasil = $this->load->view('page/view_search', $data);
    }

    public function riwayat()
    {
        $data['title'] = "Riwayat";
        $id = $this->session->userdata['id'];
        //echo $id;
        $data['saldo'] = $this->M_mitra->getSAldo($id);
        $data['riwayat'] = $this->M_mitra->riwayat_order($id);
        $data['detail'] = $this->M_mitra->get_mitra_id($id);
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('mitra/riwayat', $data);
        $this->load->view('template/shop/footer_shop');
    }

    public function change_status(){
        $id_order = $this->input->post('id_order');
        $id_mitra = $this->input->post('id_mitra');
        $status_mitra = 'tersedia';
        $status = 'selesai';

        $data = array(
         'status_order' => $status
        );

        $id = array(
                'id_order' => $id_order
            );

        $id_mit = array(
            'id_mitra' => $id_mitra
        );

        $mitra = array(
            'status' => $status_mitra
        );

        $this->M_mitra->change_order_status($id, $data, 'order_servis');
        $this->M_mitra->change_status_mitra($id_mit, $mitra, 'mitra');
        redirect('mitra/riwayat');
    }
}
