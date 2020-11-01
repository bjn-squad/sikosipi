<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function getAllPengumuman()
    {
        $query = $this->db->query("SELECT * FROM pengumuman peng JOIN pegawai p ON peng.id_pegawai=p.id_pegawai");
        return $query->result_array();
    }
    public function getPengumumanById($id)
    {
        $query = $this->db->query("SELECT * FROM pengumuman peng JOIN pegawai p ON peng.id_pegawai=p.id_pegawai where peng.id_pengumuman = $id");
        return $query->result_array();
    }
    public function save()
    {
        // Upload Gambar
        if (empty($_FILES['header_gambar']['name'])) {
            $data = [
                "id_pegawai" => $this->session->userdata('id_pegawai'),
                "judul" => $this->input->post('judul'),
                "isi" => $this->input->post('isi'),
                "header_gambar" => 'Tidak Ada Gambar',
                "tanggal_post" => date("d-m-Y")
            ];
            $this->db->insert('pengumuman', $data);
        } else {
            $file_name = $_FILES['header_gambar']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/datakoperasi/pengumuman/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('header_gambar')) {
                $this->upload->data('file_name');
                $data = [
                    "id_pegawai" => $this->session->userdata('id_pegawai'),
                    "judul" => $this->input->post('judul'),
                    "isi" => $this->input->post('isi'),
                    "header_gambar" => $newName,
                    "tanggal_post" => date("d-m-y")
                ];
                $this->db->insert('pengumuman', $data);
            }
        }
    }

    public function update()
    {
        $pathPengumuman = "assets/datakoperasi/pengumuman/";
        $id = $this->input->post('id_pengumuman');
        $getDataGambar = $this->db->query("SELECT * FROM pengumuman WHERE id_pengumuman = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $header_gambar = $gambar['header_gambar'];
        }
        if (empty($_FILES['header_gambar']['name'])) {
            $data = [
                "id_pegawai" => $this->session->userdata('id_pegawai'),
                "judul" => $this->input->post('judul'),
                "isi" => $this->input->post('isi'),
                "tanggal_post" => date("d-m-Y")
            ];
            $this->db->where('id_pengumuman', $id);
            $this->db->update('pengumuman', $data);
        } else {
            $file_name = $_FILES['header_gambar']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/datakoperasi/pengumuman';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('header_gambar')) {
                if ($header_gambar != "Tidak Ada Gambar") {
                    unlink($pathPengumuman . $header_gambar);
                }
                $this->upload->data('file_name');
                $data = [
                    "id_pegawai" => $this->session->userdata('id_pegawai'),
                    "judul" => $this->input->post('judul'),
                    "isi" => $this->input->post('isi'),
                    "header_gambar" => $newName,
                    "tanggal_post" => date("d-m-Y")
                ];

                $this->db->where('id_pengumuman', $id);
                $this->db->update('pengumuman', $data);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        }
    }

    public function delete($id)
    {
        $pathPengumuman = "assets/datakoperasi/pengumuman/";
        $getDataGambar = $this->db->query("SELECT * FROM pengumuman WHERE id_pengumuman = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $header_gambar = $gambar['header_gambar'];
        }

        if ($header_gambar != "Tidak Ada Gambar") {
            unlink($pathPengumuman . $header_gambar);
        }

        $this->db->where('id_pengumuman', $id);
        $this->db->delete('pengumuman');
    }
}
