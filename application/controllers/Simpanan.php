<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('simpanan_model');
        $this->load->model('anggota_model');
    }

    public function simpanan()
    {
        $data['title'] = 'Simpanan';
        $data['simpanan'] = $this->simpanan_model->getAllSimpanan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/simpanan');
        $this->load->view('layout/pegawai/footer');
    }

    public function tambah_simpanan()
    {
        $data['title'] = 'Simpanan';
        $data['anggota'] = $this->anggota_model->getAllAnggota();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/tambah_simpanan');
        $this->load->view('layout/pegawai/footer');
    }

    public function dataSetoran()
    {
        $data['title'] = 'Simpanan';
        $data['data_setoran'] = $this->simpanan_model->getAllSetoran();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/dataSetoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function tambah_setoran()
    {
        $data['title'] = 'Simpanan';

        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/tambah_setoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function laporan()
    {
        $data['title'] = 'Simpanan';

        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/laporan');
        $this->load->view('layout/pegawai/footer');
    }
}
