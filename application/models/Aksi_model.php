<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_model extends CI_Model
{
    public function getAllAksiPenonaktifan()
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN anggota an ON a.id_data_kategori = an.id_anggota WHERE kategori_aksi = 'Nonaktifkan Anggota'");
        return $query->result_array();
    }

    public function getAksiNonaktif($id)
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN anggota an ON a.id_data_kategori = an.id_anggota WHERE a.id_aksi = $id");
        return $query->result_array();
    }

    public function getAksiPenghapusanSetoranById($id)
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN simpanan_detail sd ON a.id_data_kategori = sd.id_simpanan_detail JOIN simpanan s ON s.id_simpanan = sd.id_simpanan JOIN anggota an ON an.id_anggota = s.id_anggota WHERE a.id_data_kategori = $id AND a.kategori_aksi LIKE 'Hapus Setoran' ");
        return $query->result_array();
    }

    public function getAksiPenghapusanSetoran()
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN simpanan_detail sd ON a.id_data_kategori = sd.id_simpanan_detail JOIN simpanan s ON s.id_simpanan = sd.id_simpanan JOIN anggota an ON an.id_anggota = s.id_anggota WHERE kategori_aksi = 'Hapus Setoran'");
        return $query->result_array();
    }
}
