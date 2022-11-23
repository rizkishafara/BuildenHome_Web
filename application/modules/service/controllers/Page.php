<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Page');
    }
    public function index()
    {
        $data['title'] = "Home";
        $data['id'] = $this->M_Page->get_keahlian('id');
        $id = $this->session->userdata('id');
        //echo $id;
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop', $data);
        $this->load->view('page/home', $data);
        $this->load->view('template/shop/footer_shop', $data);
    }

    public function tambah_mitra()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required');
        $this->form_validation->set_rules('gambar', 'Foto', 'required');


        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $id = $this->session->userdata['id'];
        $foto = $_FILES['gambar'];
        $keahlian = $this->input->post('keahlian');
        $tarif = $this->input->post('tarif');
        if ($foto == '') {
            echo '....';
        } else {
            $config['upload_path'] = 'assets/gambar/img';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                echo $foto;
            } else {
                $foto = $this->upload->data('file_name');
                echo 'success';
            }
        }

        $data = array(
            'id_pelanggan' => $id,
            'id_keahlian' => $keahlian,
            'nama_mitra' => $nama,
            'foto_mitra' => $foto,
            'alamat_mitra' => $alamat,
            'no_ktp' => $nik,
            'harga_jasa' => $tarif
        );

        $jenis = 'mitra';
        $data1 = array(
            'jenis' => $jenis
        );

        $id_pelanggan = array(
            'id_pelanggan' => $id
        );


        $this->M_Page->Add_mitra($data, 'mitra');
        $this->M_Page->edit_jenis_pelanggan($id_pelanggan, $data1, 'pelanggan');
        $this->session->set_flashdata('pesan', 'ditambahkan');
        redirect('service/page/index');
    }

    public function layanan()
    {

        //load library
        $this->load->library('pagination');
        //pagination
        $config['base_url'] = 'http://localhost/ecomm_service/service/page/layanan/';
        $config['total_rows'] = $this->M_Page->count_all_data();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        $data['start'] = $this->uri->segment(4);

        // Agar bisa mengganti stylenya sesuai class2 yg ada dibootstrap
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        // End style pagination

        $this->pagination->initialize($config);

        $data['title'] = "Layanan";
        $data['keahlian'] = $this->M_Page->get_keahlian_all();
        $data['mitra'] = $this->M_Page->tampil_mitra($config['per_page'], $data['start']);
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('template/shop/sidebar_shop', $data);
        $this->load->view('page/layanan', $data);
        $this->load->view('template/shop/footer_shop', $data);
    }

    public function detail($id)
    {
        $data['title'] = "Layanan";
        $data['mitra'] = $this->M_Page->detail_mitra($id);
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('page/detail', $data);
        $this->load->view('template/shop/footer_shop', $data);
    }

    public function kategori($jenis)
    {
        $data['title'] = "Kategori";
        $data['keahlian'] = $this->M_Page->get_keahlian_all();
        $data['getIdKeahlian'] = $this->M_Page->get_keahlian_id($jenis);
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('template/shop/sidebar_shop', $data);
        $this->load->view('page/kategori', $data);
        $this->load->view('template/shop/footer_shop', $data);
    }

    public function about()
    {
        $data['title'] = "About";
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('page/about');
        $this->load->view('template/shop/footer_shop');
    }

    public function guide()
    {
        $data['title'] = "About";
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('page/guide');
        $this->load->view('template/shop/footer_shop');
    }

    public function riwayat()
    {
        $data['title'] = "Riwayat";
        $id = $this->session->userdata['id'];
        $data['riwayat'] = $this->M_Page->riwayat_order($id);
       
        if (empty($id)) {
            redirect('auth/login');
        }
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('page/riwayat', $data);
        $this->load->view('template/shop/footer_shop');
    }

    public function batalOrder($id = null){
        $this->M_Page->orderBatal($id);
        redirect('service/page/layanan');
    }

    public function review_rating($id = null){
        $data['title'] = "Review";
        $data['riwayat'] = $this->M_Page->beriRating($id);
        $this->load->view('template/shop/header_shop', $data);
        $this->load->view('template/shop/navbar_shop');
        $this->load->view('page/review', $data);
        $this->load->view('template/shop/footer_shop');
    }

    public function status_bayar()
    {
        $id = $this->input->post('id_order');
        $total = $this->input->post('total');
        $status_bayar = 'Sudah Terbayar';
        $bukti_tf = $_FILES['bukti_tf'];
       

        if ($bukti_tf == '') {
            echo '....';
        } else {
            $config['upload_path'] = 'assets/gambar/bukti_tf';
            $config['allowed_types'] = 'jpg|png|jpeg';
            

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti_tf')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                echo $bukti_tf;
            } else {
                $bukti_tf = $this->upload->data('file_name');
                echo $bukti_tf;
                echo 'success';
            }
        }

        $data = array(
            'status_bayar' => $status_bayar,
            
        );

        $id_order = array(
            'id_order' => $id
        );
        $detail_riwayat = array(
            'bukti_tf' => $bukti_tf
            
        );

        $pembayaran = array(
            'id_order' => $id,
            'total_harga' => $total
        );

        $this->M_Page->pembayaran($id_order, $data, 'order_servis');
        $this->M_Page->bukti($id_order, $detail_riwayat, 'detail_order_servis');
        $this->M_Page->data_bayar($pembayaran);
        redirect('service/page/riwayat');
    }

    public function cari()
    {
        $search = $_GET['search'];
        $data['mitra']  = $this->M_Page->find($search);
        $hasil = $this->load->view('page/view_search', $data);
    }

    public function review_mitra(){
        $post = $this->input->post();
        $id_order = $post['id_order'];
        $id_mitra = $post['id_mitra'];
        $review = $post['review'];
        $rating = $this->input->post('rating');

        $data = array(
            'id_order' => $id_order,
            'id_mitra' => $id_mitra,
            'review' => $review,
            'rating' => $rating
        );

        $id_mit = array(
            'id_mitra' => $id_mitra
        );

        $id_or = array(
            'id_order'   => $id_order
        );

        $rating_or = array(
            'rating_review' => $rating
        );

        $mitra = array(
            'rating' => 4
        );
        $this->M_Page->input_review($data);
        $this->M_Page->rating_order($id_or, $rating_or, 'order_servis');
        $this->M_Page->edit_rating_mitra($id_mit, $mitra, 'mitra');
        redirect('service/page/riwayat');
    }

   
}
