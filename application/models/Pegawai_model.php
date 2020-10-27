<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function verifikasiAnggota()
    {
        $status = $this->input->post('status_anggota');
        $date = date('d-m-Y');
        if ($status == "Aktif") {
            $data = [
                "tanggal_keanggotaan" => $date,
                "status_anggota" => $this->input->post('status_anggota')
            ];
        } else {
            $data = [
                "status_anggota" => $this->input->post('status_anggota')
            ];
        }

        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        $this->db->update('anggota', $data);
    }
}
