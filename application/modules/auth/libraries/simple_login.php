<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
* simple_login Class
* Class ini digunakan untuk fitur login, proteksi halaman dan logout
*/
class simple_login
{
    // SET SUPER GLOBAL
    var $CI = NULL;
    /**
     * Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->CI = &get_instance();
    }
    /*cek username dan password pada table users, jika ada set session berdasar data user daritable users.
    * @param string username dari input form
    * @param string password dari input form*/
    public function login($username, $password)
    {
        //cek username dan password
        $query = $this->CI->db->get_where('pelanggan', array('username_pelanggan' => $username, 'password_pelanggan' =>
        md5($password)));
        if ($query->num_rows() == 1) {
            //ambil data user berdasar username
            $row = $this->CI->db->query('SELECT * FROM pelanggan where username_pelanggan = "' . $username . '"');
            $pelanggan = $row->row();
            $jenis = $pelanggan->jenis;
            $id = $pelanggan->id_pelanggan;


            if ($jenis == 'member') {
                //set session user
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('jenis', $jenis);
                $this->CI->session->set_userdata('id_login', uniqid(rand()));
                $this->CI->session->set_userdata('id', $id);
                $this->CI->session->set_flashdata('pesan', 'Login');
                //redirect ke halaman dashboard
                redirect(site_url('service/page'));
            } else if ($jenis == 'admin') {
                //set session user
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('jenis', $jenis);
                $this->CI->session->set_userdata('id_login', uniqid(rand()));
                $this->CI->session->set_userdata('id', $id);
                $this->CI->session->set_flashdata('pesan', 'Login');
                //redirect ke halaman dashboard
                redirect(site_url('board/dashboard'));
            } else {
                $row = $this->CI->db->query('SELECT * FROM mitra where id_pelanggan = "' . $id . '"');
                $mitra = $row->row();
                $id_mitra = $mitra->id_mitra;
                //set session user
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('jenis', $jenis);
                $this->CI->session->set_userdata('id_login', uniqid(rand()));
                $this->CI->session->set_userdata('id', $id_mitra);
                $this->CI->session->set_flashdata('pesan', 'Login');
                //redirect ke halaman dashboard
                redirect(site_url('service/page'));
            }
        } else {
            //jika tidak ada, set notifikasi dalam flashdata.
            $this->CI->session->set_flashdata('sukses', 'Username atau Password Anda salah, silakan coba lagi.. ');
            //redirect ke halaman login
            redirect(site_url('auth/login'));
        }
        return false;
    }
    public function cek_login()
    {
        //cek session username
        if ($this->CI->session->userdata('username') == '') {
            //set notifikasi
            $this->CI->session->set_flashdata('sukses', 'Maaf, Anda belum login!');
            //alihkan ke halaman login
            redirect(site_url('auth/login'));
        }
    }
    /**
     * Hapus session, lalu set notifikasi kemudian di alihkan
     * ke halaman login
     */
    public function logout()
    {
        $this->CI->session->unset_userdata('jenis');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('id_login');
        $this->CI->session->unset_userdata('id');
        $this->CI->session->set_flashdata('sukses', 'Terimakasih, Anda telah logout!');
        redirect(site_url('auth/login'));
    }
}
