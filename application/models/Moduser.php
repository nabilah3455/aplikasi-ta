<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Moduser extends CI_Model
{    
    function get_admin()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, a.id_admin, a.nama_admin as nama, u.username, u.password, a.foto, a.jk, a.no_tlp, a.alamat, DATE_FORMAT(u.create_on, '%d %M %Y') as create_on 
            FROM data_admin a, user u ,(SELECT @no:= 0) AS nomor
            WHERE a.nama_admin=u.nama AND a.no_tlp=u.no_tlp AND u.hak_akses='1'
            ");

        return $q->result_array();
    }
    
    function get_konsumen()
    {
        $q = $this->db->query("
            SELECT *, @no:=@no+1 as nomor, IF(no_tlp != 'null', no_tlp,'-') as no_tlp, IF(username != 'null', username,'-') as username
            FROM data_konsumen, (SELECT @no:= 0) AS dummy
            ORDER BY nama_konsumen
            ");

        return $q->result_array();
    }


    function data_user($id)
    {
        $q = $this->db->query("SELECT *,nama_konsumen as nama, IF(jk != null,jk,'-') as kelamin FROM data_konsumen WHERE id_konsumen='$id'");

        return $q->result_array();
    }

    function data_admin($id)
    {
        $q = $this->db->query("
            SELECT a.id_admin, a.nama_admin as nama, a.jk, a.id_admin as id, u.username, u.password, a.foto, IF(a.jk='L','Laki-Laki','Perempuan') as kelamin, a.no_tlp, a.alamat
            FROM data_admin a, user u
            WHERE a.nama_admin=u.nama AND a.no_tlp=u.no_tlp AND a.id_admin='$id'
        ");

        return $q->result_array();
    }

    // function insert_user($data)
    // {
    //     if ($this->db->insert('user', $data)) {
    //         $e = "Data berhasil dimasukkan";
    //     } else {
    //         $e = FALSE;
    //     }

    //     return $e;
    // }
    
    function insert_admin($data, $user)
    {
        if ($this->db->insert('data_admin', $data) && $this->db->insert('user', $user)) {
            $e = "Data berhasil dimasukkan";
        } else {
            $e = FALSE;
        }

        return $e;
    }

    function update_konsumen($data, $id)
    {
        $this->db->where('id_konsumen', $id);
        $q = $this->db->update('data_konsumen', $data);

        return $q;
    }
    
    function update_admin($data, $id, $user)
    {
        $this->db->where('id_admin', $id);
        $q = $this->db->update('data_admin', $data);

        $this->db->where('id', $id);
        $q = $this->db->update('user', $user);

        return $q;
    }

    // function hapus($id)
    // {
    //     $q = $this->db->where('id', $id)->delete('user');
    //     return $q;
    // }
    
    function hapus_admin($id)
    {
        $q = $this->db->where('id_admin', $id)->delete('data_admin');
        $q = $this->db->where('id', $id)->delete('user');
        return $q;
    }

    function register($data)
    {        
        if ($this->db->insert('user', $data)) {
            $e = "Data berhasil dimasukkan";
        } else {
            $e = FALSE;
        }
    
        return $e;
    }
    
    function register_konsumen($user, $tlp)
    {
        // $q = $this->db->where('no_tlp', $tlp);
        $q = $this->db->query("SELECT no_tlp FROM data_konsumen WHERE no_tlp='$tlp'");
        
        if ($q->result() != null ) {
            $this->db->where('no_tlp', $tlp);
            $e = $this->db->update('data_konsumen', $user);
        }else{
            $e = $this->db->insert('data_konsumen', $user);
        }

        return $e;
    }

    function update_profil($tlp, $data, $user)
    {
        $this->db->where('no_tlp', $tlp);
        $q = $this->db->update('data_konsumen', $data);
        
        $this->db->where('no_tlp', $tlp);
        $q = $this->db->update('user', $user);


        return $q;
    }
}
