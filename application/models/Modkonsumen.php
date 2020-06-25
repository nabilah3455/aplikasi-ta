<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Modkonsumen extends CI_Model
{
    function data_konsumen()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, nama_konsumen, IF(no_telepon != 'NULL', no_telepon,'-') as no_telepon, alamat, SUM(jml_barang) as total 
            FROM pesanan, (SELECT @no:= 0) AS nomor 
            GROUP BY nama_konsumen
            ");

        return $q->result_array();
    }
    
    function get_konsumen($id)
    {
        $q = $this->db->query("
            SELECT p.nama_konsumen, p.no_seri, IF(k.no_tlp = NULL, '-', k.no_tlp) as no_tlp, k.alamat, COUNT(p.jml_barang) as total
            FROM pesanan p, data_konsumen k
            WHERE (p.no_telepon=k.no_tlp OR p.nama_konsumen=k.nama_konsumen) AND (p.no_seri LIKE'$id' OR k.no_tlp LIKE '$id')
            ");

        return $q->result_array();
    }
    
    function get_pesanan($id)
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.id_pesanan, p.no_seri, j.nama_barang, p.jml_barang, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total, p.antar, p.status_pesanan, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') tgl_selesai
            FROM pesanan p, jenis_barang j, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE j.kode_barang=p.jenis_barang AND (p.no_telepon=k.no_tlp OR p.nama_konsumen=k.nama_konsumen) AND (p.no_seri LIKE '$id' OR p.no_telepon LIKE '$id')
            GROUP BY p.id_pesanan
            ");

        return $q->result_array();
    }
    
    function get_tanggal($id)
    {
        $q = $this->db->query("
        
            SELECT @no:=@no+1 as nomor, p.no_seri, j.nama_barang, p.jml_barang, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total, p.status_pesanan, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') tgl_selesai
            FROM pesanan p, jenis_barang j, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE j.kode_barang=p.jenis_barang AND (p.no_telepon=k.no_tlp OR p.nama_konsumen=k.nama_konsumen) AND p.no_seri LIKE'$id' OR k.no_tlp LIKE '$id'
            GROUP BY p.id_pesanan LIMIT 1
            ");

        return $q->result_array();
    }

    function get_total($id)
    {
        $q = $this->db->query("
            SELECT SUM(p.jml_barang) as jml, SUM(p.jml_barang* IF(p.cuci = 'laundry', j.hrg_laundry, j.hrg_dryclean)) as jumlah 
            FROM jenis_barang j, pesanan p 
            WHERE p.jenis_barang=j.kode_barang AND (p.no_seri='$id' OR p.no_telepon LIKE '$id')
            ");

        return $q->result_array();
    }

    function seri($id){
        $q = $this->db->query("
            SELECT p.no_seri as seri, p.nama_konsumen as nama, p.no_telepon as tlp, p.alamat as alamat
            FROM pesanan p, jenis_barang j
            WHERE p.jenis_barang=j.kode_barang AND p.no_seri='$id'
        ");

        return $q->result_array();
    }

    function cari_konsumen($tlp)
    {
        $q = $this->db->query("SELECT * FROM data_konsumen WHERE no_tlp='$tlp'");

        if ($q->result_array() != 0) {
            return $q->result_array();
        } else {
            return NULL;
        }
    }
   
    function get_data_konsumen($kode)
    {
        $q = $this->db->query("SELECT * FROM data_konsumen WHERE no_tlp='$kode'");

        if ($q->result_array() != 0) {
            return $q->result_array();
        } else {
            return NULL;
        }
    }

    function tanggal()
    {
        $q = $this->db->query("SELECT max(no_seri) as kode, CURRENT_DATE() as tanggal FROM pesanan");

        return $q->result_array();
    }
   
    function no_seri()
    {
        $q = $this->db->query("SELECT max(no_seri) as kode FROM pesanan");

        return $q->row()->kode;
    }

    function data_komplain($id)
    {
        $q = $this->db->query("
            SELECT p.id_pesanan, p.no_seri, p.nama_konsumen, j.nama_barang, p.jml_barang, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total, p.antar, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') tgl_selesai
            FROM pesanan p, jenis_barang j, data_konsumen k
            WHERE j.kode_barang=p.jenis_barang AND p.no_telepon=k.no_tlp AND p.id_pesanan='$id' 
            GROUP BY p.id_pesanan
        ");

        return $q->result_array();
    }

    function input_komplain($data)
    {
        if ($this->db->insert('data_komplain', $data)) {
            $e = "Data berhasil dimasukkan";
        } else {
            $e = FALSE;
        }
        return $e;
    }

    function get_data($username)
    {
        $q = $this->db->query("
            SELECT u.username, u.nama, k.no_tlp, k.jk, k.foto, IF(k.jk = 'L','Laki-Laki', 'Perempuan') as kelamin, k.alamat, u.create_on, u.password
            FROM user u, data_konsumen k
            WHERE u.username=k.username AND u.username='$username'
        ");

        return $q->result_array();
    }
}