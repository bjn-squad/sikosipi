<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
    public function getAllSimpanan()
    {
        $query = $this->db->query("SELECT * FROM simpanan s JOIN anggota a ON s.id_anggota = a.id_anggota");
        return $query->result_array();
    }

    public function getSimpananById($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan s JOIN anggota a ON s.id_anggota = a.id_anggota WHERE s.id_simpanan = $id");
        return $query->result_array();
    }

    public function getAllSetoran()
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd  JOIN pegawai p ON sd.id_pegawai = p.id_pegawai JOIN simpanan s ON s.id_simpanan = sd.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota");
        return $query->result_array();
    }

    public function tambahSimpananPokok()
    {
        $data = [
            'id_anggota' => htmlspecialchars($this->input->post('id_anggota', true)),
            'jumlah_simpanan_pokok' => htmlspecialchars($this->input->post('jumlah_simpanan_pokok', true)),
            'jumlah_simpanan_wajib' => 0
        ];
        $this->db->insert('simpanan', $data);
    }

    public function getSetoranById($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.id_simpanan=$id");
        return $query->result_array();
    }

    public function tambahSetoranSimpananWajib()
    {
        $id_simpanan = $this->input->post('id_simpanan');
        $jumlah_setor_tunai = $this->input->post('jumlah_setor_tunai');
        $date = date('Y-m-d');
        $data = [
            'id_simpanan' => $id_simpanan,
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'jumlah_setor_tunai' => $jumlah_setor_tunai,
            'tanggal_setor_tunai' => $date
        ];
        $this->db->insert('simpanan_detail', $data);

        $data1 = $this->db->query("SELECT * FROM simpanan WHERE id_simpanan = $id_simpanan");
        foreach ($data1->result_array() as $result) {
            $jumlah_simpanan_wajib = $result['jumlah_simpanan_wajib'];
        }
        $tambahSimpananWajib = $jumlah_setor_tunai + $jumlah_simpanan_wajib;
        $data = [
            "jumlah_simpanan_wajib" => $tambahSimpananWajib
        ];
        $this->db->where('id_simpanan', $id_simpanan);
        $this->db->update('simpanan', $data);
    }

    public function cetakPdf($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.id_simpanan_detail=$id");
        return $query->result_array();
    }

    public function getAllSetoranDetail()
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai");
        return $query->result_array();
    }

    public function getSetoranByDate($startDate, $endDate)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.tanggal_setor_tunai BETWEEN '$startDate' AND '$endDate'");
        return $query->result_array();
    }
}
