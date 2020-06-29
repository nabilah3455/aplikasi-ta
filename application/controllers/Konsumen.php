<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('username')) {
        //     redirect('login');
        // }

        $this->load->model('modkonsumen');
    }
    public function index()
    {
        $data = array(
            // 'title' => 'Retail Barang Outdoor',
            // 'judul' => 'Data Barang',
        );

        $this->template->front('front/index');
    }

    public function pesanan()
    {
        $data['user'] = $this->db->get_where('data_konsumen', ['username' => $this->session->userdata('username')])->row_array();
        $id = $data['user']['no_tlp'];

        $data = array(
            'title' => 'Riwayat Pesanan',
            'username' => $data['user']['username'],
            'no_tlp' => $data['user']['no_tlp'],
            'data' => $this->modkonsumen->get_konsumen($id),
            'items' => $this->modkonsumen->get_pesanan($id),
            'tanggal' => $this->modkonsumen->get_tanggal($id),
            'total' => $this->modkonsumen->get_total($id),
            'kode' => $id,
        );

        // var_dump($data['no_seri']);
        // die();

        $this->template->front('front/pesanan_kosong', $data);
    }
    
    public function status_pesanan()
    {
        $no_seri = $this->input->get('no_seri');
        $data['user'] = $this->db->get_where('data_konsumen', ['username' => $this->session->userdata('username')])->row_array();
        $id = $data['user']['no_tlp'];

        $data = array(
            'title' => 'Status Pesanan',
            'username' => $data['user']['username'],
            'no_tlp' => $data['user']['no_tlp'],
            'data' => $this->modkonsumen->get_konsumen($no_seri),
            'items' => $this->modkonsumen->pesanan($no_seri),
            'status' => $this->modkonsumen->status($no_seri),
            'tanggal' => $this->modkonsumen->get_tanggal($no_seri),
            'total' => $this->modkonsumen->get_total($no_seri),
            'kode' => $no_seri,
            'no_tlp' => $id
        );

        // var_dump($data['items']);
        // die();

        $this->template->front('front/status_pesanan', $data);
    }
    
    public function cari(){

        $id = $this->input->get('kode');
        $data['user'] = $this->db->get_where('data_konsumen', ['username' => $this->session->userdata('username')])->row_array();
        
        $data = array(
            'title' => 'Riwayat Pesanan',
            'username' => $data['user']['username'],
            'no_tlp' => $data['user']['no_tlp'],
            'data' => $this->modkonsumen->get_konsumen($id),
            'items' => $this->modkonsumen->get_pesanan($id),
            'tanggal' => $this->modkonsumen->get_tanggal($id),
            'total' => $this->modkonsumen->get_total($id),
            'kode' => $id
        );


        $this->template->front('front/pesanan', $data);
    }

    public function cetak_nota()
    {
        $this->load->library('pdfgenerator');
        $this->load->model('modpesanan');

        $id = $this->input->get('kode');

        $data = array(
            'title' => "Surat Informasi Marketing Aktif",
            'data' => $this->modkonsumen->get_konsumen($id),
            'items' => $this->modkonsumen->get_pesanan($id),
            'tanggal' => $this->modkonsumen->get_tanggal($id),
            'total' => $this->modkonsumen->get_total($id)
        );

        // var_dump($data['items']);
        // die();

        $html = $this->parser->parse("front/nota_print", $data);
        $this->pdfgenerator->generate($html, "Bukti Pembayaran", true, 'A5', 'potrait');
    }

    public function komplain()
    {
        $id = $this->input->get('id_pesanan');
        $data = array (
            'items' => $this->modkonsumen->data_komplain($id),
            'id' => $id
        );

        $this->template->front('front/komplain', $data);
    }

    public function input_komplain()
    {
        $id = $this->input->post('id');
        $no_seri = $this->input->post('no_seri');
        $tanggal = date('Y-m-d');

        $profil['user'] = $this->db->get_where('data_konsumen', ['username' => $this->session->userdata('username')])->row_array();
        $tlp = $profil['user']['no_tlp'];

        $data = array (
            'id_pesanan' => $id,
            'tanggal' => $tanggal,
            'komplain' => $this->input->post('komplain')
        );
        // var_dump($no_seri);
        // die();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Ajuan Komplain Berhasil dan Akan Segera Di Proses Oleh Pengelola. Terimakasih!</center></div>');
        $this->modkonsumen->input_komplain($data);
        redirect('konsumen/cari?kode='.$tlp, 'refresh');
    }

    public function profil()
    {
        $data['user'] = $this->db->get_where('data_konsumen', ['username' => $this->session->userdata('username')])->row_array();
        $username = $data['user']['username'];

        $data = array(
            'judul' =>  'adsadd',
            'foto' => $data['user']['foto'],
            'items' => $this->modkonsumen->get_data($username)
        );

        // var_dump($data['items']);
        // die();

        $this->template->front('front/profil', $data);
    }

    public function update_profil()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $tlp = $this->input->post('no_tlp');
        $data = array (
            'nama_konsumen' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'jk' => $this->input->post('jk'),
            'no_tlp' => $tlp,
            'alamat' => $this->input->post('alamat')
        );

        $user = array (
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'username' => $this->input->post('username'),
            'no_tlp' => $tlp
        );

        $this->moduser->update_profil($tlp, $data, $user);
        redirect('konsumen/profil', 'refresh');
    }
}
