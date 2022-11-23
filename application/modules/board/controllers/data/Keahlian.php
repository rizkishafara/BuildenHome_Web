<?php
class Keahlian extends CI_Controller
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
        $data['title'] = "Data Keahlian";
        $data['keahlian'] = $this->m_data->tampilKeahlian()->result();
        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('keahlianv', $data);
        $this->load->view('template/auth/footer');
    }
    public function tambahKeahlian()
    {
        $data['title'] = "tambah Data";
        $keahlian = $this->m_data;
        $validation = $this->form_validation;
        $validation->set_rules($keahlian->rules());

        if ($validation->run()) {
            $keahlian->simpanKeahlian();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('tambahkeahlianv');
        $this->load->view('template/auth/footer');
    }
    public function editKeahlian($id = null)
    {
        $data['title'] = "Edit Data";
        $edit = $this->m_data;
        $validation = $this->form_validation;
        $validation->set_rules($edit->rules());
        
        if ($validation->run()) {
            $edit->ubahKeahlian();;
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["keahlian"] = $edit->getIdKeahlian($id);

        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('editkeahlianv', $data);
        $this->load->view('template/auth/footer');

    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_data->deleteKeahlian($id)) {
            redirect(site_url('board/data/keahlian'));
        }
    }
}
