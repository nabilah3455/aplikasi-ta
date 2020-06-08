<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('moduser');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Data User',
            'menu' => 'Data User',
            'submenu' => '',
            'tambah' => base_url('user/tambah'),
            'items' => $this->moduser->get_user()
        );

        $this->template->back('back/data_user', $data);
    }

    public function admin()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Data Admin',
            'menu' => 'Data Admin',
            'submenu' => '',
            'tambah' => base_url('user/tambah_admin'),
            'items' => $this->moduser->get_admin()
        );

        $this->template->back('back/data_admin', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Tambah Data User',
            'menu' => 'Data User',
            'submenu' => 'Tambah Data User'
        );

        $this->template->back('back/tambah_user', $data);
    }

    public function tambah_admin()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Tambah Data Admin',
            'menu' => 'Data Admin',
            'submenu' => 'Tambah Data Admin'
        );

        $this->template->back('back/tambah_admin', $data);
    }

    public function edit()
    {

        $id = $this->input->get('id');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Edit Data User',
            'menu' => 'Data User',
            'submenu' => 'Edit Data User',
            'items' => $this->moduser->data_user($id)
        );

        $this->template->back('back/edit_user', $data);
    }

    public function edit_admin()
    {

        $id = $this->input->get('id');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Edit Data Admin',
            'menu' => 'Data Admin',
            'submenu' => 'Edit Data Admin',
            'items' => $this->moduser->data_admin($id)
        );

        $this->template->back('back/edit_admin', $data);
    }

    public function insert()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'jk' => $this->input->post('jk'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'hak_akses' => '2'
        );

        $this->moduser->insert_user($data);
        redirect('user', 'refresh');
    }

    public function insert_admin()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'jk' => $this->input->post('jk'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'hak_akses' => '1',
            'is_active' => '1'
        );

        $this->moduser->insert_user($data);
        redirect('user/admin', 'refresh');
    }

    public function update()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'jk' => $this->input->post('jk'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'hak_akses' => '2'
        );

        $this->moduser->update_user($data, $id);
        redirect('user', 'refresh');
    }

    public function update_admin()
    {
        $upload_image = $_FILES['image']['name'];

        if ('$upload_image') {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'jk' => $this->input->post('jk'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'hak_akses' => '1'
        );

        $this->moduser->update_user($data, $id);
        redirect('user/admin', 'refresh');
    }

    public function delete()
    {
        $id = $this->input->get('id');

        $this->moduser->hapus($id);

        redirect('user', 'refresh');
    }

    public function delete_admin()
    {
        $id = $this->input->get('id');

        $this->moduser->hapus($id);

        redirect('user_admin', 'refresh');
    }
}
