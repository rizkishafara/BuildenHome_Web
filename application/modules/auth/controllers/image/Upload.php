<?php
class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_upload');
    }
    public function index()
    {
        $this->load->view('image/uploadv', array('error' => ' '));
    }
    public function aksi_upload()
    {
        $config['upload_path'] = 'assets/gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('image/uploadv', $error);
        } else {
            $data['nama_berkas'] = $this->upload->data("file_name");
            $this->db->insert('file', $data);

            $data = array('upload_data' => $this->upload->data());
            $data['berkas'] = $this->db->get('file');
            $this->load->view('image/upload_suksesv', $data);
        }
    }
}
