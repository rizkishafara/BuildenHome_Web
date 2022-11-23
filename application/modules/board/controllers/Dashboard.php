<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('simple_login');
        $this->simple_login->cek_login();
    }
    //Load Halaman dashboard
    public function index()
    {
        $data['title'] = "Halaman Dashboard";
        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('dashboardv');
        $this->load->view('template/auth/footer');
    }
}
