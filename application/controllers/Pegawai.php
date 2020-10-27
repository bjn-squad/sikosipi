<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('pegawai_model');
        $this->load->model('anggota_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/index');
        $this->load->view('layout/pegawai/footer');
    }

    public function daftarAnggota()
    {
        $data['title'] = 'Daftar Anggota';
        $data['anggota'] = $this->anggota_model->getAllAnggota();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftaranggota');
        $this->load->view('layout/pegawai/footer');
    }

    public function verifikasiAnggota($id)
    {
        $getDataAnggota = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
        foreach ($getDataAnggota->result_array() as $item) {
            $status_anggota = $item['status_anggota'];
        }
        if ($status_anggota == "Aktif" || $status_anggota == "Belum Aktif" || $status_anggota == "Tidak Aktif") {
            redirect('pegawai');
        } else {
            $data['title'] = 'Verifikasi Anggota';
            $data['anggota'] = $this->anggota_model->getAnggotaById($id);
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pegawai/verifikasi_anggota');
            $this->load->view('layout/pegawai/footer');
        }
    }

    public function prosesVerifikasiAnggota()
    {
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('status_anggota', 'status_anggota', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarAnggota');
        } else {
            $data = $this->pegawai_model->verifikasiAnggota();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi Anggota
          </div>');
            redirect('pegawai/daftarAnggota');
        }
    }
}
