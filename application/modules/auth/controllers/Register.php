<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->load->model('m_account'); //call model
	}
	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[pelanggan.email_pelanggan]',
			['is_unique' => 'Email has been used.']
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tlp', 'NoHP', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('password_conf', 'Password Configuration', 'required|trim|matches[password]');

		//konfigurasi email
		

		if ($this->form_validation->run() == TRUE) {
			$data['nama_pelanggan'] = $this->input->post('name');
			$data['username_pelanggan'] = $this->input->post('username');
			$data['email_pelanggan'] = $this->input->post('email');
			$data['id_kota'] = $this->input->post('kota');
			$data['id_kecamatan'] = $this->input->post('kecamatan');
			$data['alamat_pelanggan'] = $this->input->post('alamat');
			$data['no_hp'] = $this->input->post('tlp');
			$data['password_pelanggan'] = md5($this->input->post('password'));
			$data['jenis'] = $this->input->post('jenis');
			$this->m_account->daftar($data);

			// $this->_sendEmail();
			$pesan['message'] = "Pendaftaran Berhasil!, Silahkan Login";
			$this->load->view('loginv', $pesan);
		} else {
			$data['kota'] = $this->m_account->get_kota();
			$this->load->view('registerv', $data);
		}
	}

	public function kecamatan()
	{
		$id = $this->input->post('id');
		$data = $this->Pesan_model->get_kec($id);
		echo json_encode($data);
	}

	private function _sendEmail(){
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'xxxxxx',
			'smtp_pass' => 'xxxxx',
			'smtp_port' => 465,
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);  
		$this->email->from('rian.eko1213@gmail.com', 'Admin Jasa Online');
		$this->email->to('rianeko44qwe@gmail.com');	
		$this->email->subject('testing!!');
		$this->email->message('Selamat Bergabung');

		if($this->email->send()){
			return true;
		}else{
			$this->email->print_debugger();
			die;
		}
	}
}
