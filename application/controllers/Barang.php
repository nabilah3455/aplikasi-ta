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
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            // 'judul' => $judul,
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
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
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
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
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
        $data = array(
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'hrg_laundry' => $this->input->post('harga_laundry'),
            'hrg_dryclean' => $this->input->post('harga_dry')
        );

        $this->modbarang->insert_barang($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Barang Berhasil Ditambahkan! </center></div>');
        redirect('barang', 'refresh');
    }

    public function update()
    {
        $id = $this->input->post('kode_barang');
        $data = array(
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'hrg_laundry' => $this->input->post('harga_laundry'),
            'hrg_dryclean' => $this->input->post('harga_dry')
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
}
