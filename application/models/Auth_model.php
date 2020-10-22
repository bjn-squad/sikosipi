<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function loginPegawai($email, $password)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where("(username='$email' OR email='$email')");
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function loginAnggota($email, $password)
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->where("(username='$email' OR email='$email')");
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function registerAnggota()
    {
        $data = [
            'nama_anggota' => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'alamat_anggota' => htmlspecialchars($this->input->post('alamat', true)),
            'no_telp_anggota' => htmlspecialchars($this->input->post('no_telpon', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password')))
        ];
        $this->db->insert('anggota', $data);
    }
}
