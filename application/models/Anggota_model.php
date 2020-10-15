<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAnggotaById($id)
    {
        $query = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
        return $query->result_array();
    }
}
