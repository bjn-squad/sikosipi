<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
	public function getAllSimpanan()
    {
        $query = $this->db->query("SELECT * FROM simpanan");
        return $query->result_array();
    }

    public function getAllSetoran()
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail");
        return $query->result_array();
    }
}
