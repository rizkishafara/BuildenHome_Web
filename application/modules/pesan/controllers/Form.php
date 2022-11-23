<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model("Pesan_model");
		$this->load->library('form_validation');
       
    }
	public function index()
	{
        $data['title'] = "Pesan";
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view("form_view");
        //$this->load->model("pesan/Pesan_model", $data);
        $this->load->view('template/shop/footer_shop', $data);
	}
    public function pesan($id){
        $keahlian = $this->Pesan_model;
        $data["keahlian"] = $keahlian->get_keahlian_id($id);
        $data1['title'] = "Pesan";
        $data['kota'] = $this->Pesan_model->get_kota();
        $this->load->view('template/shop/header_shop', $data1);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view("form_view", $data);
        //$this->load->model("pesan/Pesan_model", $data);
        $this->load->view('template/shop/footer_shop', $data1);
    }

    public function kecamatan()
    {
        $id = $this->input->post('id');
        $data = $this->Pesan_model->get_kec($id);
        echo json_encode($data);
    }
	public function postPesan()
    {
        $pesan = $this->Pesan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pesan->rules());

        if ($validation->run()) {
            $pesan->pesan();
            $this->session->set_flashdata('pesan', ', Pesanan Diproses!');
            $this->pesan($id = null);
        }
        redirect(site_url("service/page/layanan"));
        
    }
}
