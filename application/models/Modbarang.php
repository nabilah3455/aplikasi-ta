<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Modbarang extends CI_Model
{
    function get_barang()
    {
        $q = $this->db->query("SELECT * FROM jenis_barang ORDER BY nama_barang");

        return $q->result_array();
    }
    
    function get_kiloan()
    {
        $q = $this->db->query("SELECT * FROM jenis_barang WHERE kode_barang='78'");

        return $q->result_array();
    }
    
    function data_barang($id)
    {
        $q = $this->db->query("SELECT * FROM jenis_barang WHERE kode_barang='$id'");

        return $q->result_array();
    }

    function get_status()
    {
        $q = $this->db->query("SELECT * FROM status");

        return $q->result_array();   
    }

    function get_laporan_masuk($tgl_akhir, $tgl_awal)
    {
        $q = $this->db->query("SELECT @no:=@no+1 as no, DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, SUM((p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean))) as total FROM pesanan p, jenis_barang j, (SELECT @no:= 0) AS dummy WHERE p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang AND p.tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY p.no_seri ORDER BY p.no_seri");

        return $q->result_array();
    }
   
    function get_total($tgl_akhir, $tgl_awal)
    {
        $q = $this->db->query("SELECT SUM((p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean))) as total, (SUM((p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)))) * 0.3 as diskon, SUM((p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)))-(SUM((p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)))) * 0.3 as grand FROM pesanan p, jenis_barang j, (SELECT @no:= 0) AS dummy WHERE p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang AND p.tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'");

        return $q->result_array();
    }

    function update_barang($data, $id)
    {
        $this->db->where('kode_barang', $id);
        $q = $this->db->update('jenis_barang', $data);

        return $q;
    }

    function insert_barang($data)
    {
        if ($this->db->insert('jenis_barang', $data)) {
            $e = "Data berhasil dimasukkan";
        } else {
            $e = FALSE;
        }
        return $e;
    }

    function hapus_barang($id){
        $q = $this->db->where('kode_barang', $id)->delete('jenis_barang');
        return $q;
    }
}
