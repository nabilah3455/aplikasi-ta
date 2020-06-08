<?php
//defined('BASEPATH') OR exit('No direct script access allowed');


class Modbarang extends CI_Model
{
    function get_barang()
    {
        $q = $this->db->query("SELECT * FROM jenis_barang");

        return $q->result_array();
    }

    function get_status()
    {
        $q = $this->db->query("SELECT * FROM status");

        return $q->result_array();   
    }


    // function get_laporan_masuk($template=NULL, $tgl_awal=NULL, $tgl_akhir=NULL)
    // {
    //     if (is_null($template)) {
    //         return NULL;
    //     }else {
    //         switch($template){
    //             case '1' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '1' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                  
    //             case '2' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '2' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '3' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '3' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '4' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '4' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '5' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '5' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '6' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '6' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '7' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '7' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '8' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '8' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '9' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '9' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '10' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang*  IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '10' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '11' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang*  IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '11' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             case '12' :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang*  IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE MONTH(tgl_masuk) = '12' AND p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang GROUP BY p.no_seri
    //                 ");
    //             break;
                
    //             default :
    //                 $q = $this->db->query("SELECT DATE_FORMAT(p.tgl_masuk, '%d %M %Y') as tgl_masuk, p.no_seri, (p.jml_barang* IF(p.cuci='laundry', j.hrg_laundry, j.hrg_dryclean)) as total FROM pesanan p, jenis_barang j WHERE p.status_pesanan = '7' AND j.kode_barang=p.jenis_barang AND p.selesai BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY p.no_seri
    //                 ");
    //             break;
    //         }
    //         if ($q->num_rows() != 0) {

    //             return $q->result_array();
    //         } else {
    //             return NULL;
    //         }
    //     }
    // }

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

    // function update_barang($data, $id)
    // {
    //     $this->db->where('kode_barang', $id);
    //     $q = $this->db->update('data_barang', $data);

    //     return $q;
    // }

    // function hapus_barang($id){
    //     $q = $this->db->where('kode_barang', $id)->delete('data_barang');
    //     return $q;
    // }
}
