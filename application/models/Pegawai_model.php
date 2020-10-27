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

    public function gantiPasswordAnggota()
    {
        $data = [
            'password' => htmlspecialchars(MD5($this->input->post('password')))
        ];
        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        $this->db->update('anggota', $data);

        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        $this->db->delete('lupa_password');
    }

    public function nonaktifkanAnggota()
    {
        $data = [
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'id_data_kategori' => $this->input->post('id_anggota'),
            'kategori' => 'Nonaktifkan Anggota'
        ];
        $this->db->insert('aksi', $data);
    }
}
