<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->model('modpesanan');
        $this->load->model('modbarang');
        $this->load->model('modkonsumen');
    }
    
    public function index()
    {
        if ($this->input->post('cari')) {
            $konsumen = $this->input->post('no_tlp');
        } else {
            $konsumen = null;
        }

        $kode_seri = $this->modkonsumen->no_seri();
        // $seri = $kode_seri['kode'];
        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kode_seri, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "LD";
        $kodeseri = $huruf . sprintf("%04s", $urutan);
        // echo $kodeseri;

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'judul' => 'Data Konsumen',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'barang' => $this->modbarang->get_barang(),
            'konsumen' => $this->modkonsumen->get_data_konsumen($konsumen),
            'tanggal'=>  $this->modkonsumen->tanggal(),
            'no_seri' => $kodeseri

        );
        // var_dump($data['no_seri']);
        // die();
        $this->template->back('back/tambah_pesanan', $data);
    }

    public function tambah()
    {
        $id = $this->input->get('no_seri');
        
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => 'Data Konsumen',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'barang' => $this->modbarang->get_barang(),
            // 'jml_barang' => $jml_barang,
            'items' => $this->modpesanan->tambah_pesanan($id),
            'seri' => $id,
            'pesanan' => $this->modpesanan->data_pesanan($id)
        );

        // var_dump($data['pesanan']);
        // die();

        $this->template->back('back/tambah', $data);
    }

    public function antrian()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => '',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->get_antrian()
        );

        // var_dump($data['items']);
        // die();

        $this->template->back('back/data_antrian', $data);
    }
    
    public function cuci()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => '',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->get_cuci()
        );

        $this->template->back('back/pesanan_cuci', $data);
    }
   
    public function setrika()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => '',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->get_setrika()
        );

        $this->template->back('back/pesanan_setrika', $data);
    }
    
    public function ambil()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => '',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->get_ambil(),
            'antar' => $this->modpesanan->get_antar()
        );

        $this->template->back('back/pesanan_ambil', $data);
    }
    
    public function cari()
    {
        $id = $this->input->post('no_seri');
        $status = $this->modpesanan->status($id);
        $item = "[";
        foreach ($status as $key) {
            $item .= $key['nama_status'] . ",";
        }
        $item = rtrim($item, ",");
        $item .= "]";

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => '',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->pencarian($id),
            'status' => $item,
            'self' => base_url('pesanan/cari')
        );

        $this->template->back('back/cari_pesanan', $data);
    }
    
    public function nota()
    {
        $id = $this->input->get('id_pesanan');

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->get_nota($id)
        );

        $this->template->back('back/nota', $data);
    }
    
    public function bayar()
    {
        $id = $this->input->get('no_seri');

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => 'Detail Pesanan',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->pembayaran($id),
            'barang' => $this->modpesanan->total_barang($id),
            'harga' => $this->modpesanan->get_total($id),
            'seri' => $id,
            'pesanan' => $this->modpesanan->data_pesanan($id),
            'status_bayar' => $this->modpesanan->status_bayar($id), 
        );

        // var_dump($data['seri']);
        // die();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Pesanan Baru. Pesanan akan masuk ke dalah daftar antrian</div>');
        $this->template->back('back/pembayaran', $data);
    }

    public function edit_status()
    {
        $id = $this->input->get('id_pesanan');
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => 'Edit Status Pesanan',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->edit_status_pesanan($id),
            'progress' => $this->modbarang->get_status()
        );

        // var_dump($data['items']);
        // die();

        $this->template->back('back/edit_status', $data);
    }

    public function selesai()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => 'Riwayat Pesanan',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'items' => $this->modpesanan->pesanan_selesai()
        );

        $this->template->back('back/pesanan_selesai', $data);
    }

    public function cetak_nota()
    {
        $this->load->library('pdfgenerator');
        $this->load->model('modkonsumen');

        $id = $this->input->get('no_seri');

        $data = array(
            'title' => "Surat Informasi Marketing Aktif",
            'data' => $this->modkonsumen->get_konsumen($id),
            'items' => $this->modkonsumen->get_pesanan($id),
            'tanggal' => $this->modkonsumen->get_tanggal($id),
            'total' => $this->modkonsumen->get_total($id)
        );
        //  var_dump($data['items']);
        //  die();

        $html = $this->parser->parse("back/nota_print", $data);
        $this->pdfgenerator->generate($html, "Bukti Pembayaran", true, 'A5', 'potrait');
    }

    public function update_status_bayar()
    {
        $id = $this->input->post('no_seri');

        $pesanan = array(
            'status_bayar' => $this->input->post('bayar'),
        );

        // var_dump($id);
        // die();

        $this->modpesanan->update_pembayaran($id, $pesanan);
        redirect('pesanan/bayar?no_seri=' . $id);
    }
    
    public function pesanan_batal()
    {
        $id = $this->input->get('id_pesanan');
        $tanggal=date('Y-m-d');

        $pesanan = array(
            'status_pesanan' => '6',
            'tgl_selesai' => $tanggal
        );

        // var_dump($id);
        // die();

        $this->modpesanan->update_status_pesanan($id, $pesanan);
        redirect('pesanan/antrian');
    }
    
    public function cetak_kwitansi()
    {
        $id = $this->input->get('no_seri');

        $this->load->library('pdfgenerator');
        $this->load->model('modpesanan');

       
        $data = array(
            'title' => "Surat Informasi Marketing Aktif",
            'items' => $this->modpesanan->get_kwitansi($id),
            'barang' => $this->modpesanan->get_data_kwitansi($id),
            'total' => $this->modpesanan->get_total($id)
        );

        // var_dump($id);
        // die();

        $html = $this->parser->parse("back/kwitansi_print", $data);
        $this->pdfgenerator->generate($html, "Bukti Pembayaran", true, 'A5', 'potrait');
    }

    function input_pesanan()
    {
        $tlp = $this->input->post('tlp');
        $nama_konsumen = $this->input->post('nama_konsumen');
        // $tanggal = DATE('d-m-Y');

        $data = array(
            'no_seri' => $this->input->post('no_seri'),
            'no_telepon' => $tlp,
            'nama_konsumen' => $nama_konsumen,
            'antar' => $this->input->post('antar'),
            'jenis_barang' =>  $this->input->post('jenis'),
            'jml_barang' => $this->input->post('jml_barang'),
            'cuci' => $this->input->post('cuci'),
            'tgl_masuk' => $this->input->post('masuk'),
            'berat' => $this->input->post('berat'),
            'status_pesanan' => '1'
        );

        // var_dump($data['tgl_masuk']);
        // die();

        $konsumen = array (
            'nama_konsumen' => $nama_konsumen,
            'no_tlp' => $tlp,
            'alamat' => $this->input->post('alamat'),
        );
        
        // var_dump($nama_konsumen);
        // die();
        $this->modpesanan->input_konsumen($konsumen, $tlp, $nama_konsumen);
        $this->modpesanan->input_pesanan($data);
        redirect('pesanan/tambah?no_seri='.$data['no_seri']);
    }

    function update_status()
    {
        $id = $this->input->post('id_pesanan');

        $data = array(
            'status_pesanan' => $this->input->post('status')
        );

        // var_dump($id);
        // die();

        $this->modpesanan->update_status($data, $id);

        if ($data['status_pesanan'] == '1'){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Pesanan Berhasil Di Update</div>');
            redirect('pesanan/antrian');
        }elseif($data['status_pesanan'] == '2'){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Pesanan Berhasil Di Update</div>');
            redirect('pesanan/cuci');
        }elseif($data['status_pesanan'] == '4'){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Pesanan Berhasil Di Update</div>');
            redirect('pesanan/settrika');
        }elseif($data['status_pesanan'] == '5'){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Pesanan Berhasil Di Update</div>');
            redirect('pesanan/ambil');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Pesanan Berhasil Di Update</div>');
            redirect('pesanan/selesai');
        }
            
    }
    
    function update_selesai()
    {
        $id = $this->input->get('id_pesanan');
        $tanggal = DATE('Y-m-d');

        $data = array(
            'status_pesanan' => '7',
            'status_bayar' => 'Lunas',
            'tgl_selesai' => $tanggal
        );

        // var_dump($id);
        // die();

        $this->modpesanan->update_status($data, $id);

        redirect('pesanan/selesai');
    }
}
