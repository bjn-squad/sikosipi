<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_model extends CI_Model
{
    public function getAllAksi()
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN pegawai p ON a.id_pegawai = p.id_pegawai");
        return $query->result_array();
    }

    public function getAksiNonaktif($id)
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN pegawai p ON a.id_pegawai = p.id_pegawai JOIN anggota an ON a.id_data_kategori = an.id_anggota WHERE a.id_aksi = $id");
        return $query->result_array();
    }
}
