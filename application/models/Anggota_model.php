<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAnggotaById($id)
    {
        $query = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
        return $query->result_array();
    }

    public function getFilterAnggota()
    {
        $query = $this->db->query("SELECT * FROM anggota WHERE status_anggota LIKE 'Sedang Diverifikasi (Menunggu Pembayaran Simpanan Pokok)'");
        return $query->result_array();
    }

    public function getAllAnggota()
    {
        $query = $this->db->query("SELECT * FROM anggota");
        return $query->result_array();
    }

    public function ubahPasswordById($id)
    {
        $data = [
            "password" => htmlspecialchars(MD5($this->input->post('password')))
        ];
        $this->db->where('id_anggota', $id);
        $this->db->update('anggota', $data);
    }

    public function verifikasi($id)
    {
        $pathKTP = "assets/datakoperasi/imganggota/ktp/";
        $pathKYC = "assets/datakoperasi/imganggota/kyc/";
        $getDataGambar = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $ktp = $gambar['foto_ktp_anggota'];
            $kyc = $gambar['foto_selfie_ktp_anggota'];
            $status_anggota = $gambar['status_anggota'];
        }
        // Upload KTP
        $config['upload_path']          = './assets/datakoperasi/imganggota/ktp';
        $config['allowed_types']        = 'jpg|png';
        $config['remove_spaces'] = TRUE;
        $newName = date('dmYHis') . $_FILES['gambarKTP']['name'];
        $config['file_name']         = $newName;
        $config['max_size']             = 3100;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambarKTP')) {
            if ($ktp != "Belum Diupload") {
                unlink($pathKTP . $ktp);
            }
            $this->upload->data('file_name');
            if ($status_anggota == "Verifikasi Ulang" or $status_anggota == "Tidak Aktif") {
                $data = [
                    "foto_ktp_anggota" => $newName
                ];
            }
            $this->db->where('id_anggota', $id);
            $this->db->update('anggota', $data);
            // Upload KYC
            $config2['upload_path']          = './assets/datakoperasi/imganggota/kyc';
            $config2['allowed_types']        = 'jpg|png';
            $config2['remove_spaces'] = TRUE;
            $newName2 = date('dmYHis') . $_FILES['gambarKYC']['name'];
            $config2['file_name']         = $newName2;
            $config2['max_size']             = 3100;
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
            if ($this->upload->do_upload('gambarKYC')) {
                if ($kyc != "Belum Diupload") {
                    unlink($pathKYC . $kyc);
                }
                $this->upload->data('file_name');
                if ($status_anggota == "Verifikasi Ulang" or $status_anggota == "Tidak Aktif") {
                    $data = [
                        "foto_selfie_ktp_anggota" => $newName2,
                        "status_anggota" => "Sedang Diverifikasi"
                    ];
                }
                $this->db->where('id_anggota', $id);
                $this->db->update('anggota', $data);
                return "True";
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $this->session->set_flashdata('error', $error['error']);
        }
    }
}
