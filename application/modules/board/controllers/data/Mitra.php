<?php
class Mitra extends CI_Controller
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
        $data['title'] = "Data Mitra";
        $data['mitra'] = $this->m_data->tampilMitra()->result();
        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('mitrav', $data);
        $this->load->view('template/auth/footer');
    }
    public function editMitra($id = null)
    {
        $data['title'] = "Edit Data";
        $edit = $this->m_data;
        $validation = $this->form_validation;
        $validation->set_rules($edit->rulesmitra());
        
        if ($validation->run()) {
            $edit->ubahMitra();;
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["mitra"] = $edit->getIdMitra($id);
        $data["keahlian"] = $edit->getIdKeahlian($id);

        $this->load->view('template/auth/head', $data);
        $this->load->view('template/auth/navbar');
        $this->load->view('template/auth/sidebar');
        $this->load->view('editmitrav', $data);
        $this->load->view('template/auth/footer');

    }
    public function hapusMitra($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_data->deleteMitra($id)) {
            redirect(site_url('board/data/mitra'));
        }
    }
}
