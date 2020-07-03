<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Modpesanan extends CI_Model
{
    function get_pesanan()
    {
        $q = $this->db->query("
        SELECT p.id_pesanan, u.nama as user, b.nama_barang as barang, p.total_barang as jml, DATE_FORMAT(p.tgl_pesan, '%d %M %Y') as tanggal, (b.harga*1) as total, p.status
	        FROM user u, data_barang b, pesanan p
            WHERE u.id=p.id_user AND b.kode_barang=p.id_barang AND p.status != 'selesai' AND p.status != 'barang dikirim'");

        return $q->result_array();
    }
    
    function status_pesanan($id)
    {
        $q = $this->db->query("
        SELECT p.id_pesanan, u.nama as user, b.gambar, b.nama_barang as barang, p.total_barang as jml, DATE_FORMAT(p.tgl_pesan, '%d %M %Y') as tanggal, (b.harga*1) as total, p.status, u.alamat
	        FROM user u, data_barang b, pesanan p
            WHERE u.id=p.id_user AND b.kode_barang=p.id_barang AND p.status != 'barang diterima' AND p.status != 'barang dikirim' AND p.id_pesanan='$id'");

        return $q->result_array();
    }

    function pesanan_selesai()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.no_seri as no_seri, p.id_pesanan as id, p.nama_konsumen as nama, j.nama_barang as jenis, p.jml_barang as jml, 
            CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as masuk, IF(p.tgl_selesai != NULL, p.tgl_selesai, '-') as tglselesai, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') as selesai, s.nama_status
            FROM pesanan p, jenis_barang j, status s ,(SELECT @no:= 0) AS nomor 
            WHERE p.jenis_barang=j.kode_barang AND p.status_pesanan=s.id_status AND p.status_pesanan >'5'
            ORDER BY p.tgl_masuk DESC
        ");

        return $q->result_array();
    }

    function get_nota($id)
    {
        $q = $this->db->query("
            SELECT p.no_seri as seri, p.nama_konsumen as nama, j.nama_barang as jenis, IF(p.no_telepon != NULL, p.no_telepon, '-') as tlp, p.jml_barang as jml, k.alamat as alamat, 
            CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') as selesai
            FROM pesanan p, jenis_barang j, data_konsumen k 
            WHERE p.jenis_barang=j.kode_barang AND k.no_tlp=p.no_telepon AND p.no_seri='$id'
            GROUP BY jenis
        ");

        return $q->result_array();
    }
    
    function get_data_nota($id)
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.no_seri as seri, p.nama_konsumen as nama, j.nama_barang as jenis, IF(p.no_telepon = NULL,'-', p.no_telepon) as tlp, p.jml_barang as jml, k.alamat as alamat, 
            CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') as selesai
            FROM pesanan p, jenis_barang j, data_konsumen k, (SELECT @no:= 0) AS nomor  
            WHERE p.jenis_barang=j.kode_barang AND p.no_seri='$id' GROUP BY p.no_seri
        ");

        return $q->result_array();
    }
    
    function total_harga($id)
    {
        $q = $this->db->query("
            SELECT SUM(p.jml_barang) as jml, SUM(
                CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END
            ) as total
            FROM pesanan p, jenis_barang j
            WHERE p.jenis_barang=j.kode_barang AND p.no_seri='$id'
        ");

        return $q->result_array();
    }
    
    function get_kwitansi($id)
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.no_seri as seri, p.nama_konsumen as nama, p.status_bayar, j.nama_barang as jenis, IF(p.no_telepon = NULL, '-', p.no_telepon) as tlp, p.jml_barang as jml, k.alamat as alamat, 
            CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') as tgl_selesai, IF(tgl_selesai != NULL, p.tgl_selesai, '-') as selesai
            FROM pesanan p, jenis_barang j, data_konsumen k, (SELECT @no:= 0) AS nomor  
            WHERE p.jenis_barang=j.kode_barang AND p.no_seri='$id' GROUP BY p.no_seri
        ");

        return $q->result_array();
    }
    
    function get_data_kwitansi($id)
    {
        $q = $this->db->query("
        SELECT * FROM(
            SELECT j.nama_barang as jenis, p.jml_barang as jml, 
            CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, p.berat, p.cuci
            FROM pesanan p, jenis_barang j, data_konsumen k 
            WHERE p.jenis_barang=j.kode_barang AND p.no_seri='$id' GROUP BY p.jenis_barang
            ) A
        ");

        return $q->result_array();
    }

    function pencarian($id)
    {
        $q = $this->db->query("
         SELECT @no:=@no+1 as nomor, p.id_pesanan as id, p.no_seri as seri, p.nama_konsumen as nama, j.nama_barang as jenis, IF(p.no_telepon != NULL, p.no_telepon, '-') as tlp, p.jml_barang as jml, 
         CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, p.tgl_masuk as masuk, DATE_FORMAT(p.tgl_selesai, '%d %M %Y') as tgl_selesai, IF(tgl_selesai != NULL, p.tgl_selesai, '-') as selesai, s.nama_status as status
            FROM pesanan p, jenis_barang j, status s, (SELECT @no:= 0) AS nomor  
            WHERE p.jenis_barang=j.kode_barang AND s.id_status=p.status_pesanan AND  (p.no_seri='$id' OR p.no_telepon LIKE '$id')
            ");

        return $q->result_array();

        if ($q->result_array() != 0) {
            return $q->result_array();
        } else {
            return NULL;
        }
    }

    function status($id){
        $q = $this->db->query("SELECT s.nama_status FROM pesanan p, status s WHERE s.id_status=p.status_pesanan AND  no_seri='$id' or no_telepon LIKE '%$id%'");

        return $q->result_array();
    }

    function input_pesanan($data)
    {
        if ($this->db->insert('pesanan', $data)){
            $e = "Data berhasil dimasukkan";
        } else {
            $e = FALSE;
        }
        return $e;
    }
    
    function input_konsumen($konsumen, $tlp, $nama_konsumen)
    {
        $q = $this->db->query("SELECT * FROM data_konsumen WHERE nama_konsumen='$nama_konsumen'");

        if ($q->result_array() == null) {
            return $e = $this->db->insert('data_konsumen', $konsumen);
        } else {
            
            return $e = NULL;
        }

        return $e;
    }

    function tambah_pesanan($id)
    {
        $q = $this->db->query("
            SELECT p.no_seri, k.no_tlp as tlp, p.nama_konsumen, p.antar, k.alamat, p.tgl_masuk as masuk
            FROM pesanan p, data_konsumen k
            WHERE p.no_telepon=k.no_tlp AND p.no_seri='$id' GROUP BY p.no_seri
        ");

        return $q->result_array();
    }
    
    function pembayaran($id)
    {
        $q = $this->db->query("
            SELECT p.no_seri, k.no_tlp as tlp, p.nama_konsumen, p.antar, k.alamat
            FROM pesanan p, data_konsumen k
            WHERE p.no_telepon=k.no_tlp AND p.no_seri='$id' GROUP BY p.no_seri
        ");

        return $q->result_array();
    }
    
    function total_barang($id)
    {
        $q = $this->db->query("
            SELECT j.nama_barang, p.jml_barang as jml
            FROM pesanan p, jenis_barang j
            WHERE j.kode_barang=p.jenis_barang AND p.no_seri='$id'
        ");

        return $q->result_array();
    }

    function get_total($id)
    {
        $q = $this->db->query("
            SELECT SUM(p.jml_barang) as jml, SUM(
                 CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END
            ) as jumlah, SUM(p.berat) as berat 
            FROM jenis_barang j, pesanan p 
            WHERE p.jenis_barang=j.kode_barang AND (p.no_seri='$id' OR p.no_telepon LIKE '$id')
            ");

        return $q->result_array();
    }

    function get_antrian()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.nama_konsumen, j.nama_barang, p.jml_barang, p.no_seri, p.tgl_masuk, p.id_pesanan, k.no_tlp
            FROM jenis_barang j, pesanan p, data_konsumen k, (SELECT @no:= 0) AS dummy 
            WHERE p.jenis_barang=j.kode_barang AND k.nama_konsumen=p.nama_konsumen AND p.status_pesanan='1' GROUP BY p.id_pesanan ORDER BY p.id_pesanan DESC
            ");

        return $q->result_array();
    }
   
    function get_cuci()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.nama_konsumen, j.nama_barang, p.jml_barang, p.no_seri, p.tgl_masuk, p.id_pesanan, k.no_tlp
            FROM jenis_barang j, pesanan p, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE p.jenis_barang=j.kode_barang AND k.nama_konsumen=p.nama_konsumen AND p.status_pesanan='2' GROUP BY p.id_pesanan ORDER BY p.tgl_masuk DESC
            ");

        return $q->result_array();
    }
    
    function get_setrika()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.nama_konsumen, j.nama_barang, p.jml_barang, p.no_seri, p.tgl_masuk, p.id_pesanan, k.no_tlp
            FROM jenis_barang j, pesanan p, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE p.jenis_barang=j.kode_barang AND k.nama_konsumen=p.nama_konsumen AND p.status_pesanan='4' GROUP BY p.id_pesanan ORDER BY p.tgl_masuk DESC
            ");

        return $q->result_array();
    }
    
    function get_ambil()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.nama_konsumen, j.nama_barang, p.jml_barang, p.no_seri, p.tgl_masuk, p.id_pesanan, k.no_tlp
            FROM jenis_barang j, pesanan p, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE p.jenis_barang=j.kode_barang AND k.nama_konsumen=p.nama_konsumen AND p.status_pesanan='5' AND p.antar='tidak' GROUP BY p.id_pesanan ORDER BY p.tgl_masuk DESC
            ");

        return $q->result_array();
    }
    
    function get_antar()
    {
        $q = $this->db->query("
            SELECT @no:=@no+1 as nomor, p.nama_konsumen, j.nama_barang, p.jml_barang, p.no_seri, p.tgl_masuk, p.id_pesanan, k.no_tlp
            FROM jenis_barang j, pesanan p, data_konsumen k, (SELECT @no:= 0) AS nomor 
            WHERE p.jenis_barang=j.kode_barang AND k.nama_konsumen=p.nama_konsumen AND p.status_pesanan='5' AND p.antar='ya' GROUP BY p.id_pesanan ORDER BY p.tgl_masuk DESC
            ");

        return $q->result_array();
    }

    function edit_status_pesanan($id)
    {
        $q = $this->db->query("
           SELECT p.* , j.nama_barang, s.nama_status, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.status_pesanan as status
           FROM pesanan p, jenis_barang j, status s
           WHERE j.kode_barang=p.jenis_barang AND s.id_status=p.status_pesanan AND p.id_pesanan='$id' GROUP BY p.id_pesanan
            ");

        return $q->result_array();
    }

    function update_status($data, $id)
    {
        $this->db->where('id_pesanan', $id);
        $q = $this->db->update('pesanan', $data);

        return $q;
    }
    
    function update_pembayaran($id, $pesanan)
    {
        $this->db->where('no_seri', $id);
        $q = $this->db->update('pesanan', $pesanan);

        return $q;
    }
   
    function update_status_pesanan($id, $pesanan)
    {
        $this->db->where('id_pesanan', $id);
        $q = $this->db->update('pesanan', $pesanan);

        return $q;
    }

    function data_pesanan($id)
    {
        $q = $this->db->query("
           SELECT p.* , CASE
                WHEN p.cuci = 'laundry' THEN p.jml_barang*j.hrg_laundry
                WHEN p.cuci = 'dry' THEN p.jml_barang*j.hrg_dryclean
                WHEN p.cuci = 'kiloan' THEN p.berat*j.hrg_laundry
            END as total, j.nama_barang,
           CASE
                WHEN p.cuci = 'laundry' THEN 'Laundry'
                WHEN p.cuci = 'dry' THEN 'Dry Clean'
                WHEN p.cuci = 'kiloan' THEN 'Kiloan'
            END as cuci
           FROM pesanan p, jenis_barang j
           WHERE j.kode_barang=p.jenis_barang AND p.no_seri='$id'
            ");

        return $q->result_array();
    }
    
    function status_bayar($id)
    {
        $q = $this->db->query("SELECT status_bayar FROM pesanan WHERE no_seri='$id' LIMIT 1");

        return $q->result_array();
    }
    
}