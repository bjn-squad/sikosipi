<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public function getAllPengumuman()
    {
        $query = $this->db->query("SELECT * FROM pengumuman");
        return $query->result_array();
    }
    public function getPengumumanById($id)
    {
        $query = $this->db->query("SELECT * FROM pengumuman WHERE id_pengumuman = $id");
        return $query->result_array();
    }
    public function save($data, $pengumuman)
    {
        $post = $this->input->post();
        $this->id_pengumuman = uniqid();
        $this->isi = $post["isi"];
        $this->tanggal_post = $post["tanggal_post"];
        $this->header_gambar = $this->_uploadImage();
        $this->db->insert('pengumuman');
        return $this->db->get_where($pengumuman, $data)->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengumuman = $post["id_pengumuman"];
        $this->isi = $post["isi"];
        $this->tanggal_post = $post["tanggal_post"];


        if (!empty($_FILES["header_gambar"]["name"])) {
            $this->header_gambar = $this->_uploadImage();
        } else {
            $this->header_gambar = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_pengumuman' => $post['id_pengumuman']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_pengumuman" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = '.assets/datakoperasi/pengumuman/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_pengumuman;
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('header_gambar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $pengumuman = $this->getPengumumanById($id);
        if ($pengumuman->header_gambar != "default.jpg") {
            $filename = explode(".", $pengumuman->header_gambar)[0];
            return array_map('unlink', glob(FCPATH . "assets/datakoperasi/pengumuman/$filename.*"));
        }
    }
}
