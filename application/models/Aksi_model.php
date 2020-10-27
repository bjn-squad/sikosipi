<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_model extends CI_Model
{
    public function getAllAksi()
    {
        $query = $this->db->query("SELECT * FROM aksi a JOIN pegawai p ON a.id_pegawai = p.id_pegawai");
        return $query->result_array();
    }
}
