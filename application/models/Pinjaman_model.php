<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman_model extends CI_Model
{

    public function getAllPengajuan()
    {
        $query = $this->db->query("SELECT * 
        FROM pengajuan_pinjaman as p
        JOIN anggota as a ON a.id_anggota = p.id_anggota");
        return $query->result_array();
    }
    public function getAllPengajuanById($id)
    {
        $query = $this->db->query("SELECT * 
        FROM pengajuan_pinjaman as p
        JOIN anggota as a ON a.id_anggota = p.id_anggota
        WHERE p.id_pengajuan = $id");
        return $query->result_array();
    }

    public function insertPengajuan()
    {
        $pathDoc = "assets/datakoperasi/dokumen/";
        $id = $this->session->userdata('id_anggota');
        $file_name = $_FILES['lampiran_pendukung']['name'];
        $newfile_name = str_replace(' ', '', $file_name);
        // Upload KYC
        $config2['upload_path']          = './assets/datakoperasi/dokumen';
        $config2['allowed_types']        = 'jpg|png|pdf|doc|docx';
        $newName2 = date('dmYHis') . $newfile_name;
        $config2['file_name']         = $newName2;
        $config2['max_size']             = 3100;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        if ($this->upload->do_upload('lampiran_pendukung')) {
            $this->upload->data('file_name');
            $data = [
                "lampiran_pendukung" => $newName2,
                "status_pengajuan" => "Sedang Diverifikasi",
                'id_anggota' => $id,
                'total_pengajuan_pinjaman' => $this->input->post('total_pengajuan_pinjaman', true),
                'alasan_pinjaman' => $this->input->post('alasan_pinjaman', true),
                'tanggal_pengajuan' => date("d-m-y"),
                'verifikasi_pegawai' => "Sedang Diverifikasi",
                'verifikasi_admin' => "Sedang Diverifikasi",
                'pesan' => "Belum terdapat pesan"
            ];
            $this->db->insert('pengajuan_pinjaman', $data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $this->session->set_flashdata('error', $error['error']);
        }
    }
    public function getAllRiwayatPinjamanById($id)
    {
        $query = $this->db->query("SELECT * FROM pengajuan_pinjaman WHERE id_anggota = $id");
        return $query->result_array();
    }

    public function verifikasiPengajuan()
    {
        $status = $this->input->post('verifikasi_pegawai');
        if ($status == "Verifikasi Diterima") {
            $data = [
                "verifikasi_pegawai" => $status,
                "pesan" => 'Verifikasi Diterima Pegawai, Menunggu Verifikasi Admin'
            ];
        } else if ($status == "Verifikasi Ditolak") {
            $data = [
                "verifikasi_pegawai" => $status,
                "verifikasi_admin" => "Verifikasi Ditolak",
                "status_pengajuan" => "Verifikasi Ditolak",
                "pesan" => $this->input->post('pesan')
            ];
        }

        $this->db->where('id_pengajuan', $this->input->post('id_pengajuan'));
        $this->db->update('pengajuan_pinjaman', $data);
    }
}
