<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public function getAllPegawai()
    {
        $query = $this->db->query("SELECT * FROM pegawai");
        return $query->result_array();
    }

    public function getPegawaiById($id)
    {
        $query = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = $id");
        return $query->result_array();
    }

    public function ubahPassword()
    {
        // Fitur ubah password pegawai
        $data = [
            "password" => htmlspecialchars(MD5($this->input->post('password')))
        ];
        $this->db->where('id_pegawai', $this->session->userdata('id_pegawai'));
        $this->db->update('pegawai', $data);
    }

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

    public function gantiPasswordPegawai()
    {
        $data = [
            'password' => htmlspecialchars(MD5($this->input->post('password')))
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('pegawai', $data);
    }

    public function nonaktifkanAnggota()
    {
        $data = [
            'id_data_kategori' => $this->input->post('id_anggota'),
            'tanggal_aksi' => date('d-m-Y'),
            'pesan_aksi' => $this->input->post('pesan_aksi'),
            'nama_pegawai' => $this->session->userdata('nama_pegawai'),
            'kategori_aksi' => 'Nonaktifkan Anggota'
        ];
        $this->db->insert('aksi', $data);
    }

    public function tambahPegawaiBaru()
    {
        $data = [
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'alamat_pegawai' => $this->input->post('alamat_pegawai'),
            'no_telp_pegawai' => $this->input->post('no_telp_pegawai'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            "password" => htmlspecialchars(MD5($this->input->post('password'))),
            'kategori' => '2'
        ];
        $this->db->insert('pegawai', $data);
    }

    public function terimaAksiPenonaktifan($id)
    {
        $getIdAnggota = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getIdAnggota->result_array() as $result) {
            $id_anggota = $result['id_data_kategori'];
        }
        $data = [
            'nama_admin' => $this->session->userdata('nama_pegawai'),
            'status_aksi' => 'Penonaktifan Diterima',
            'status_verifikasi' => 'Diterima Admin'
        ];
        $this->db->where('id_aksi', $id);
        $this->db->update('aksi', $data);

        $data2 = [
            'status_anggota' => 'Dinonaktifkan'
        ];
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data2);
    }

    public function tolakAksiPenonaktifan($id)
    {
        $data = [
            'nama_admin' => $this->session->userdata('nama_pegawai'),
            'status_aksi' => 'Penonaktifan Ditolak',
            'status_verifikasi' => 'Diterima Admin'
        ];
        $this->db->where('id_aksi', $id);
        $this->db->update('aksi', $data);
    }
}
