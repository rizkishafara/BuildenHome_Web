<?php
class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('simple_login');
        $this->simple_login->cek_login();
        $this->load->model('m_data');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['title'] = "Data Order";
        $data['order'] = $this->m_data->tampilOrder()->result();
        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('orderv', $data);
        $this->load->view('template/auth/footer');
    }
    public function detailOrder($id = null)
    {
        $data['title'] = "Detail Data";
        $detail = $this->m_data;

        $data["order"] = $detail->getIdOrder($id);

        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('detailorderv', $data);
        $this->load->view('template/auth/footer');

    }
}
