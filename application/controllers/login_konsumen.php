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

        if ($this->form_validation->run() == false) {
            $this->load->view('login_konsumen');
        } else {
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

        if ($user) {
            if ($user['hak_akses'] == 2) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'password' => $user['password']
                    ];

                    $this->session->set_userdata($data);
                    redirect('konsumen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('login_konsumen');
                }
            } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Di aktivasi!</div>');
                redirect('login_konsumen');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
            redirect('login_konsumen');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_username|is_unique[user.username]', [
            'is_unique' => 'Username sudah ada, mohon isi dengan nama username lain'
        ]);
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'required|trim|valid_no_tlp|is_unique[user.no_tlp]', [
            'is_unique' => 'Nomor Telepon sudah terdaftar, mohon isi dengan nomor telepon lain'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun Baru';
            $this->load->view('register', $data);
        } else {
            $tanggal = date('d-m-Y');
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'no_tlp' => htmlspecialchars($this->input->post('tlp', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'created_on' => $tanggal,
                'hak_akses' => 2
            ];

            $user = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'no_tlp' => htmlspecialchars($this->input->post('tlp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>Register Succes! your account has been created, Please Login! </center></div>');
            redirect('login_konsumen');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><center>You have been logged out!</center></div>');
        redirect('login_konsumen');
    }
}
