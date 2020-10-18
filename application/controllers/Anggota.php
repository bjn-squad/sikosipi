<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_anggota'));

        if (empty($cekSetPertanyaan)) {
            redirect('lupapassword/tambahPertanyaanKeamanan');
        }
        $this->load->model('anggota_model');
    }

    public function index()
    {
        $data['data'] = $this->anggota_model->getAnggotaById($this->session->userdata('id_anggota'));
        $data['title'] = 'Dashboard Anggota';
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('anggota/index');
        $this->load->view('layout/anggota/footer');
    }

    public function verifikasi()
    {
        if ($this->session->userdata('status') == "Aktif" and $this->session->userdata('status') == "Dinonaktifkan") {
            redirect('anggota');
        } else {
            $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['data'] = $this->anggota_model->getAnggotaById($this->session->userdata('id_anggota'));
                $data['title'] = 'Dashboard Anggota';
                $this->load->view('layout/anggota/header', $data);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('anggota/verifikasi');
                $this->load->view('layout/anggota/footer');
            } else {
                $data = $this->anggota_model->verifikasi($this->session->userdata('id_anggota'));
                if ($data == "True") {
                    redirect('anggota');
                } else {
                    redirect('anggota/verifikasi');
                }
            }
        }
    }
}
