<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_data extends CI_Model
{
    
    public function rules()
    {
        return [

            ['field' => 'daftar_keahlian',
            'label' => 'Daftar Keahlian',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required']
        ];
    }
    public function rulespelanggan()
    {
        return [

            ['field' => 'nama_pelanggan',
            'label' => 'Nama Pelanggan',
            'rules' => 'required'],

            ['field' => 'email_pelanggan',
            'label' => 'Email Pelanggan',
            'rules' => 'required'],

            ['field' => 'username_pelanggan',
            'label' => 'Username Pelanggan',
            'rules' => 'required'],

            ['field' => 'password_pelanggan',
            'label' => 'Password Pelanggan',
            'rules' => 'required'],

            ['field' => 'alamat_pelanggan',
            'label' => 'Alamat Pelanggan',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No HP',
            'rules' => 'required'],

            ['field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'required'],

            ['field' => 'kota',
            'label' => 'Kota',
            'rules' => 'numeric'],

            ['field' => 'kecamatan',
            'label' => 'Kecamatan',
            'rules' => 'numeric']
            
        ];
    }
    public function rulesmitra()
    {
        return [

            ['field' => 'keahlian',
            'label' => 'Keahlian',
            'rules' => 'required'],

            ['field' => 'nama_mitra',
            'label' => 'Nama Mitra',
            'rules' => 'required'],

            ['field' => 'alamat_mitra',
            'label' => 'Alamat Mitra',
            'rules' => 'required'],

            ['field' => 'harga_jasa',
            'label' => 'Harga Jasa',
            'rules' => 'required'],

            ['field' => 'no_ktp',
            'label' => 'No KTP',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],

            ['field' => 'rating',
            'label' => 'Rating',
            'rules' => 'numeric']
        ];
    }
    // Tampil Data //
    public function tampil_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('kecamatan', 'pelanggan.id_kecamatan=kecamatan.id_kec');
        $this->db->join('kota', 'pelanggan.id_kota=kota.id_kota');
        return $this->db->get();

        //return $this->db->get('pelanggan');
    }
    public function tampilKeahlian()
    {
        return $this->db->get('keahlian');
    }
    public function tampilMitra()
    {
        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->join('keahlian', 'mitra.id_keahlian=keahlian.id_keahlian');
        return $this->db->get();
    }
    public function tampil_do()
    {
        return $this->db->get('tbl_detail_order');
    }
    public function tampil_user()
    {
        return $this->db->get('users');
    }
    public function tampilOrder()
    {
        $this->db->select('*');
        $this->db->from('order_servis');
        $this->db->join('pelanggan', 'order_servis.id_pelanggan=pelanggan.id_pelanggan');
        $this->db->join('kota', 'order_servis.id_kota=kota.id_kota');
        $this->db->join('kecamatan', 'order_servis.id_kecamatan=kecamatan.id_kec');
        $this->db->join('keahlian', 'order_servis.id_keahlian=keahlian.id_keahlian');
        return $this->db->get();
    }


    public function getIdPelanggan($id)
    {
        //return $this->db->get_where($this->_pelanggan, ["id_pelanggan" => $id])->row();

        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('kecamatan', 'pelanggan.id_kecamatan=kecamatan.id_kec');
        $this->db->join('kota', 'pelanggan.id_kota=kota.id_kota');
        $this->db->where('id_pelanggan', $id);
        return $this->db->get()->row();
    }
    public function getIdKeahlian($id)
    {
        $this->db->select('*');
        $this->db->from('keahlian');
        $this->db->where('id_keahlian', $id);
        return $this->db->get()->row();
        // $hasil = $this->db->query("SELECT * FROM keahlian");
        // return $hasil->result();
    }
    public function getIdMitra($id)
    {
        //return $this->db->get_where($this->_pelanggan, ["id_pelanggan" => $id])->row();

        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->join('keahlian', 'mitra.id_keahlian=keahlian.id_keahlian');
        $this->db->where('id_mitra', $id);
        return $this->db->get()->row();
    }
    public function getIdOrder($id)
    {
        //return $this->db->get_where($this->_pelanggan, ["id_pelanggan" => $id])->row();

        $this->db->select('*');
        $this->db->from('detail_order_servis');
        $this->db->join('mitra', 'detail_order_servis.id_mitra=mitra.id_mitra');
        $this->db->join('order_servis', 'order_servis.id_order=detail_order_servis.id_order');
        return $this->db->get()->row();
    }

    public function get_kota()
    {
        $hasil = $this->db->query("SELECT * FROM kota");
        return $hasil->result();
    }

    public function get_kec($id)
    {
        $ambil = $this->db->query("SELECT * FROM kecamatan WHERE id_kota = '$id'");
        return $ambil->result();
    }

    public function simpanKeahlian()
    {
        $post = $this->input->post();
        $this->daftar_keahlian = $post["daftar_keahlian"];
        $this->gambar_keahlian = $this->_imageKeahlian();
        $this->deskripsi = $post["deskripsi"];
        $this->jenis = $post["jenis"];
        return $this->db->insert("keahlian", $this);
    }


    public function ubahPelanggan()
    {
        $post = $this->input->post();
        //$this->id_pelanggan = $post["id_pelanggan"];
        $this->nama_pelanggan = $post["nama_pelanggan"];
        $this->email_pelanggan = $post["email_pelanggan"];
        $this->username_pelanggan = $post["username_pelanggan"];
        $this->password_pelanggan = md5($post["password_pelanggan"]);
        $this->alamat_pelanggan = $post["alamat_pelanggan"];
        $this->id_kota = $post["kota"];
        $this->id_kecamatan = $post["kecamatan"];
        $this->no_hp = $post["no_hp"];
        $this->jenis = $post["jenis"];
        return $this->db->update("pelanggan", $this, array('id_pelanggan' => $post['id_pelanggan']));
    }
    public function ubahKeahlian()
    {
        $post = $this->input->post();
        //$this->id_keahlian = $post["id_keahlian"];
        $this->daftar_keahlian = $post["daftar_keahlian"];
        if (!empty($_FILES["gambar_keahlian"]["name"])) {
            $this->gambar_keahlian = $this->_imageKeahlian();
        } else {
            $this->gambar_keahlian = $post["old_image"];
        }
        $this->deskripsi = $post["deskripsi"];
        $this->jenis = $post["jenis"];
        
        return $this->db->update('keahlian', $this, array('id_keahlian' => $post['id_keahlian']));
    }
    public function ubahMitra()
    {
        $post = $this->input->post();
        $this->id_keahlian = $post["keahlian"];
        $this->nama_mitra = $post["nama_mitra"];
        if (!empty($_FILES["foto_mitra"]["name"])) {
            $this->foto_mitra = $this->_imageMitra();
        } else {
            $this->foto_mitra = $post["old_image"];
        }
        $this->alamat_mitra = $post["alamat_mitra"];
        $this->harga_jasa = $post["harga_jasa"];
        $this->no_ktp = $post["no_ktp"];
        $this->status = $post["status"];
        $this->rating = $post["rating"];
        
        return $this->db->update('mitra', $this, array('id_mitra' => $post['id_mitra']));
    }

    public function deleteKeahlian($id)
    {
        return $this->db->delete('keahlian', array("id_keahlian" => $id));
    }
    public function deletePelanggan($id)
    {
        return $this->db->delete('pelanggan', array("id_pelanggan" => $id));
    }
    public function deleteMitra($id)
    {
        return $this->db->delete('mitra', array("id_mitra" => $id));
    }

    private function _imageKeahlian()
    {
        $config['upload_path']          = 'assets/gambar/mitra';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->daftar_keahlian;
        $config['overwrite']			= true;
        $config['max_size']             = 10240;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar_keahlian')) {
            return $this->upload->data("file_name");
        }else{
            $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
        }
        
        return "default.jpg";
    }
    private function _imageMitra()
    {
        $config['upload_path']          = 'assets/gambar/img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->nama_mitra;
        $config['overwrite']			= true;
        $config['max_size']             = 10240;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto_mitra')) {
            return $this->upload->data("file_name");
        }else{
            $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
        }
        
        return "avatar.png";
    }

    




    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_id_produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori=kategori.id', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function edit_id_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori=kategori.id', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get();
    }

    // User //
    
    public function daftar($data)
    {
        $this->db->insert('users', $data);
    }
    public function get_data_edit($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('users');
        return $query->result();
    }
    public function update_user($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }

    // Pelanggan //
    
}
