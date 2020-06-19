<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('username')) {
        //     redirect('login');
        // }

        $this->load->model('moduser');
        $this->load->model('modkonsumen');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'title' => 'Laundry',
            'judul' => 'Pesanan Selesai',
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'judul' => 'Data Konsumen',
            'tambah' => base_url('user/tambah_konsumen'),
            'items' => $this->moduser->get_konsumen()
        );

        // var_dump($data['items']);
        // die();

        $this->template->back('back/data_konsumen', $data);
    }

    //data admin

    public function admin()
    {
        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Data Admin',
            'menu' => 'Data Admin',
            'submenu' => '',
            'tambah' => base_url('user/tambah_admin'),
            'items' => $this->moduser->get_admin()
        );

        // var_dump($data['items']);
        // die();
        
        $this->template->back('back/data_admin', $data);
    }
    
    public function tambah_admin()
    {
       $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Tambah Data Admin',
            'menu' => 'Data Admin',
            'submenu' => 'Tambah Data Admin'
        );

        $this->template->back('back/tambah_admin', $data);
    }
    
    public function edit_admin()
    {
       
        $id = $this->input->get('id');
        $id_user = $this->input->get('user');
       $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'title' => 'Retail Barang Outdoor',
            'judul' => 'Edit Data Admin',
            'menu' => 'Data Admin',
            'submenu' => 'Edit Data Admin',
            'items' => $this->moduser->data_admin($id),
            'id_user' => $id_user
        );

        // var_dump($id_user);
        // die();

        $this->template->back('back/edit_admin', $data);
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
                // echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_tlp' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat')
        );

        $create = Date('Y-m-d');
        
        $user = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_tlp' => $this->input->post('telepon'),
            'create_on' => $create,
            'hak_akses' => '1'
        );

        $this->moduser->insert_admin($data, $user);
        redirect('user/admin', 'refresh');
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
                // echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_tlp' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat')
        );

        if (!empty($this->input->post('password'))) {
            $user = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_tlp' => $this->input->post('telepon')
            );
        } else {
            $user = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_tlp' => $this->input->post('telepon')
            );
        }

        $this->moduser->update_admin($data, $id, $user, $id_user);
        redirect('user/admin', 'refresh');
    }

    public function delete_admin()
    {
        $id = $this->input->get('id');

        $this->moduser->hapus_admin($id);

        redirect('user/admin', 'refresh');
    }

    public function edit()
    {

        $id = $this->input->get('id');

        $data['user'] = $this->db->get_where('data_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data = array(
            'nama' => $data['user']['nama_admin'],
            'foto' => $data['user']['foto'],
            'judul' => 'Edit Data Konsumen',
            'items' => $this->moduser->data_user($id)
        );

        // var_dump($data['items']);
        // die();

        $this->template->back('back/edit_konsumen', $data);
    }

    public function update_konsumen()
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
                // echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id');
        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_tlp' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat')
        );

        if (!empty($this->input->post('password'))) {
            $user = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_tlp' => $this->input->post('telepon')
            );
        } else {
            $user = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_tlp' => $this->input->post('telepon')
            );
        }

        $this->moduser->update_konsumen($data, $id, $user);
        redirect('user', 'refresh');
    }


    // public function tambah()
    // {
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data = array(
    //         'nama' => $data['user']['nama'],
    //         'foto' => $data['user']['foto'],
    //         'title' => 'Retail Barang Outdoor',
    //         'judul' => 'Tambah Data User',
    //         'menu' => 'Data User',
    //         'submenu' => 'Tambah Data User'
    //     );

    //     $this->template->back('back/tambah_user', $data);
    // }
    

    
    

    // public function insert()
    // {
    //     $upload_image = $_FILES['image']['name'];

    //     if ('$upload_image') {
    //         $config['allowed_types'] = 'gif|jpg|png';
    //         $config['max_size'] = '2048';
    //         $config['upload_path'] = './assets/images/profile/';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('image')) {
    //             $new_image = $this->upload->data('file_name');
    //             $this->db->set('foto', $new_image);
    //         } else {
    //             echo $this->upload->display_errors();
    //         }
    //     }

    //     $data = array(
    //         'nama' => $this->input->post('nama'),
    //         'username' => $this->input->post('username'),
    //         'email' => $this->input->post('email'),
    //         'jk' => $this->input->post('jk'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //         'telepon' => $this->input->post('telepon'),
    //         'alamat' => $this->input->post('alamat'),
    //         'hak_akses' => '2'
    //     );

    //     $this->moduser->insert_user($data);
    //     redirect('user', 'refresh');
    // }
    

    
    // public function delete()
    // {
    //     $id = $this->input->get('id');

    //     $this->moduser->hapus($id);

    //     redirect('user', 'refresh');
    // }
}
