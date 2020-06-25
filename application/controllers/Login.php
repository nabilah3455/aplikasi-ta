<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
            $this->load->view('login');
        }else{
            //validasi lolos
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $pass = $this->db->get_where('user', ['password' => $password])->row_array();
        
        if($user){
            if($user['hak_akses'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'username' => $user['username'],
                        'password' => $user['password']
                    ];

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Selamat Datang di Aplikasi Pelayanan dan Pengelolaan Laundry</center></div>');
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
            redirect('login');
                }
            } elseif ($user['hak_akses'] == 2) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'password' => $user['password']
                    ];

                    $this->session->set_userdata($data);
                    redirect('konsumen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('login');
                }
            } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Di aktivasi!</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
            redirect('login');
        }
    }

    public function register()
    {
        // $this->form_validation->set_rules('nama', 'nama', 'required');
        // $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah ada, mohon isi dengan nama username lain'
        ]);
        $this->form_validation->set_rules('tlp', 'tlp', 'required|trim|is_unique[user.no_tlp]', [
            'is_unique' => 'Nomor Telepon sudah terdaftar, mohon isi dengan nomor telepon lain'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
            'min_length' => 'password to shoort!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun Baru';
            $this->load->view('register', $data);
            $tanggal = date('Y-m-d');

            // var_dump($tanggal);
            // die();
        } else {
            $tanggal = date('Y-m-d');
            $tlp = htmlspecialchars($this->input->post('tlp', true));
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'no_tlp' => $tlp,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'create_on' => $tanggal,
                'hak_akses' => '2'
            ];

            $user = [
                'nama_konsumen' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'foto' => 'default.jpg',
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'no_tlp' => $tlp
            ];

            // var_dump($tlp);
            // die();
            
            $this->moduser->register($data);
            $this->moduser->register_konsumen($user, $tlp);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Register Berhasil, Silahkan Login</center></div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Berhasil Logout</center></div>');
        redirect('login');
    }
    
    public function logout_konsumen()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Berhasil Logout</center></div>');
        redirect('konsumen');
    }
}
