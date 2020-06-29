<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Moddashboard extends CI_Model
{
    function get_pesanan()
    {
        $q = $this->db->query("SELECT COUNT(*) as jumlah FROM pesanan WHERE status_pesanan='7'");

        return $q->result_array();
    }
    
    function get_total()
    {
        $q = $this->db->query("
            SELECT SUM(p.jml_barang* IF(p.cuci = 'laundry', j.hrg_laundry, j.hrg_dryclean)) as total 
            FROM jenis_barang j, pesanan p 
            WHERE p.jenis_barang=j.kode_barang
            ");

        return $q->result_array();
    }
    
    function get_konsumen()
    {
        $q = $this->db->query("SELECT COUNT(DISTINCT(nama_konsumen)) as total FROM data_konsumen");

        return $q->result_array();
    }
    
    function get_barang()
    {
        $q = $this->db->query("SELECT * FROM jenis_barang ORDER BY nama_barang ASC");

        return $q->result_array();
    }

    function antrian()
    {
        $q = $this->db->query("SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan='1'");

        return $q->result_array();
    }

    function cuci()
    {
        $q = $this->db->query("SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan='2'");

        return $q->result_array();
    }

    function belum_diambil()
    {
        $q = $this->db->query("SELECT COUNT(*) as total FROM pesanan WHERE antar='tidak' AND status_pesanan='5'");

        return $q->result_array();
    }
    
    function antar()
    {
        $q = $this->db->query("SELECT COUNT(*) as total FROM pesanan WHERE antar='ya' AND status_pesanan='5'");

        return $q->result_array();
    }
    
    function grafik()
    {
        $q = $this->db->query("
        SELECT * FROM(
            SELECT CASE
                WHEN MONTH(tgl_masuk) = 1 THEN 'Januari'
                WHEN MONTH(tgl_masuk) = 2 THEN 'Februari'
                WHEN MONTH(tgl_masuk) = 3 THEN 'Maret'
                WHEN MONTH(tgl_masuk) = 4 THEN 'April'
                WHEN MONTH(tgl_masuk) = 5 THEN 'Mei'
                WHEN MONTH(tgl_masuk) = 6 THEN 'Juni'
                WHEN MONTH(tgl_masuk) = 7 THEN 'Juli'
                WHEN MONTH(tgl_masuk) = 8 THEN 'Agustus'
                WHEN MONTH(tgl_masuk) = 9 THEN 'September'
                WHEN MONTH(tgl_masuk) = 10 THEN 'Oktober'
                WHEN MONTH(tgl_masuk) = 11 THEN 'November'
                ELSE 'Desember'
                END AS year, COUNT(*) AS income
            FROM pesanan
            GROUP BY MONTH(tgl_masuk)
            )A
        ");

        return $q->result_array();
    }

    function data_komplain(){
        $q = $this->db->query("
            SELECT @no:=@no+1 as no, k.id_komplain, k.komplain, p.no_telepon, p.nama_konsumen, b.nama_barang, DATE_FORMAT(k.tanggal, '%d %M %Y') as tanggal 
            FROM data_komplain k, pesanan p, jenis_barang b, (SELECT @no:= 0) AS no
            WHERE p.id_pesanan=k.id_pesanan AND b.kode_barang=p.jenis_barang
            ");

        return $q->result_array();   
    }

    function get_terbanyak_laundry()
    {
        $q = $this->db->query("
          SELECT j.nama_barang as country, SUM(p.jml_barang) as visits
          FROM pesanan p, jenis_barang j 
          WHERE p.jenis_barang=j.kode_barang AND p.cuci='laundry'
          GROUP BY j.nama_barang
          ORDER BY visits ASC
        ");

        return $q->result_array();
    }
    
    function get_terbanyak_dry()
    {
        $q = $this->db->query("
            SELECT j.nama_barang as country, SUM(p.jml_barang) as visits
          FROM pesanan p, jenis_barang j 
          WHERE p.jenis_barang=j.kode_barang AND p.cuci='dry'
          GROUP BY j.nama_barang
          ORDER BY visits ASC
        ");

        return $q->result_array();
    }
}
