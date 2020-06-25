<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        
        $this->load->model('moddashboard');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'judul' =>  'adsadd',
            'nama' => $data['user']['nama_admin'],
            'username' => $data['user']['username'],
            'foto' => $data['user']['foto'],
            'pesanan' => $this->moddashboard->get_pesanan(),
            'pendapatan' => $this->moddashboard->get_total(),
            // 'jml_user' => $this->moddashboard->get_user(),
            'list' => $this->moddashboard->get_barang(),
            'antrian' => $this->moddashboard->antrian(),
            'cuci' => $this->moddashboard->cuci(),
            'belum_diambil' => $this->moddashboard->belum_diambil(),
            'antar' => $this->moddashboard->antar(),
            'linechart' => json_encode($this->moddashboard->grafik()),
            'komplain' => $this->moddashboard->data_komplain(),
            'konsumen' => $this->moddashboard->get_konsumen(),
            'terbanyak' => $this->moddashboard->get_terbanyak()
        );
        
        $this->template->back('back/dashboard', $data);
    }

    public function hapus_komplain()
    {
        $id = $this->input->get('id');

        $q = $this->db->where('id_komplain', $id)->delete('data_komplain');
        redirect('dashboard', 'refresh');
    }
}
