<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function verifikasiAnggota()
    {
        $data = [
            "status_anggota" => $this->input->post('status_anggota')
        ];
        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        $this->db->update('anggota', $data);
    }
}
