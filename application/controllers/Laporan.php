<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
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
            'foto' => $data['user']['foto']
        );

        $this->template->back('back/laporan_kosong', $data);
    }
    
    public function laporan()
    {
        if ($this->input->post('submit')) {
            // $template = $this->input->post('bulan');
            $tgl_awal = $this->input->post('awal');
            $tgl_akhir = $this->input->post('akhir');
            $judul = 'Laporan Pesanan Masuk';
        }else{
                // $template = null;
                $tgl_akhir = null;
                $tgl_awal = null;
                $judul = 'Laporan Pesanan Masuk';
        }

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'judul' => $judul,
            'tambah' => base_url('barang/tambah'),
            'items' => $this->modbarang->get_laporan_masuk($tgl_akhir, $tgl_awal),
            'awal' => $tgl_awal,
            'akhir' => $tgl_akhir
        );

        $this->template->back('back/laporan', $data);
    }

    public function print()
    {
        $this->load->library('pdfgenerator');
        // $this->load->model('modprintpdf');

        // $id = $this->input->get('id');
        $tanggal_awal = $this->input->get('tgl_awal');
        $tanggal_akhir = $this->input->get('tgl_akhir');

        $data = array(
            'title' => "Surat Informasi Marketing Aktif",
            'item' => $this->modbarang->get_laporan_masuk($tanggal_akhir, $tanggal_awal),
            'awal' => $tanggal_awal,
            'akhir' => $tanggal_akhir,
            'total' => $this->modbarang->get_total($tanggal_akhir, $tanggal_awal)
        );
        // $this->response();
        // var_dump($tanggal_awal);
        // die();

        $html = $this->parser->parse("back/laporan_penjualan", $data);
        $this->pdfgenerator->generate($html, "Laporan Penjualan", true, 'A4', 'portrait');
    }
}