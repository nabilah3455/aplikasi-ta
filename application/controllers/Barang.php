<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->model('modbarang');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Data Barang',
            'menu' => 'Data Barang',
            'submenu' => '',
            'tambah' => base_url('barang/tambah'),
            'items' => $this->modbarang->get_barang(),
           // 'edit' => base_url('barang/edit')
        );

        $this->template->back('back/data_barang', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Tambah Data Barang',
            'menu' => 'Data Barang',
            'submenu' => 'Tambah Data Barang'
        );
        
        $this->template->back('back/tambah_barang', $data);
    }
    
    public function edit()
    {
       // $upload_image = $_FILES['image']['name'];
        $id = $this->input->get('kode_barang');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Edit Data Barang',
            'menu' => 'Data Barang',
            'submenu' => 'Edit Data Barang',
            'items' => $this->modbarang->data_barang($id)
        );

        $this->template->back('back/edit_barang', $data);
    }

    public function insert()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/barang/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
           'kode_barang' => $this->input->post('kode_barang'),
           'nama_barang' => $this->input->post('nama_barang'),
           'harga' => $this->input->post('harga'),
           'stok' => $this->input->post('stok'),
           'deskripsi' => $this->input->post('deskripsi')
        );

        $this->modbarang->insert_barang($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Barang Berhasil Ditambahkan! </center></div>');
        redirect('barang', 'refresh');
    }

    public function update()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/barang/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('kode_barang');
        $data = array(
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->modbarang->update_barang($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Barang Berhasil Diubah! </center></div>');
        redirect('barang', 'refresh');
    }

    public function delete()
    { 
            $id = $this->input->get('kode_barang');

            $this->modbarang->hapus_barang($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Data Barang Telah Dihapus! </center></div>');
            redirect('barang', 'refresh');
        
    }

    public function segitiga()
    {
        $this->load->view('segitiga');
    }

}
