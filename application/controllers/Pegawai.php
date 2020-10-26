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
        $this->load->model('pinjaman_model');
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
    public function daftarPengajuanPinjaman()
    {
        $data['title'] = 'Daftar Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function daftarPinjaman()
    {
        $data['title'] = 'Daftar Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllAnggota();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function verifikasiPengajuanPinjaman($id)
    {
        $data['title'] = 'Verifikasi Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/verifikasiPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesVerifikasiPengajuanPinjaman()
    {
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim|required');
        $this->form_validation->set_rules('verifikasi_pegawai', 'verifikasi_pegawai', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPengajuanPinjaman');
        } else {
            $data = $this->pinjaman_model->verifikasiPengajuan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi Pinjaman
          </div>');
            redirect('pegawai/daftarPengajuanPinjaman');
        }
    }
    public function detailPengajuanPinjaman($id)
    {
        $data['title'] = 'Detail Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/detailPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
}
