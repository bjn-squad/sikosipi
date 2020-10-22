<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupapassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->model('lupapassword_model');
    }

    public function index()
    {
        redirect('lupapassword/tambahPertanyaanKeamanan');
    }

    public function tambahPertanyaanKeamanan()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_anggota'));

        if ($cekSetPertanyaan) {
            redirect('anggota');
        }
        $data['title'] = 'Tambah Pertanyaan Keamanan Anggota';
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('lupapassword/index');
        $this->load->view('layout/anggota/footer');
    }

    public function prosesTambahPertanyaanKeamanan()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_anggota'));

        if ($cekSetPertanyaan) {
            redirect('anggota');
        }
        $this->form_validation->set_rules('pertanyaankeamanan1', 'pertanyaankeamanan1', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan1', 'jawabankeamanan1', 'trim|required');
        $this->form_validation->set_rules('pertanyaankeamanan2', 'pertanyaankeamanan2', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan2', 'jawabankeamanan2', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Pertanyaan Keamanan Anggota';
            $this->load->view('layout/anggota/header', $data);
            $this->load->view('layout/anggota/sidebar');
            $this->load->view('layout/anggota/top');
            $this->load->view('lupapassword/index');
            $this->load->view('layout/anggota/footer');
        } else {
            $this->Lupapassword_model->tambahPertanyaan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pertanyaan Keamanan Telah Diset!
          </div>');
            redirect('anggota');
        }
    }

    public function reset()
    {
        $this->load->model('lupapassword_model');
        $this->form_validation->set_rules('emailorusername', 'emailorusername', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Reset Password';
            $this->load->view('auth/anggota/header', $data);
            $this->load->view('lupapassword/resetpassword');
        } else {
            $getEmailorUsername = $this->lupapassword_model->getPertanyaan($this->input->post('emailorusername'));
            if ($getEmailorUsername) {
                foreach ($getEmailorUsername as $row);
                $idAnggota = $row->id_anggota;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username dan Email tidak ditemukan
              </div>');
                redirect('lupapassword/reset');
            }
            $data['loadPertanyaan'] = $this->lupapassword_model->loadPertanyaan($idAnggota);
            $data['title'] = 'Jawab Pertanyaan';
            $this->load->view('auth/anggota/header', $data);
            $this->load->view('lupapassword/pertanyaan', $data);
        }
    }

    public function cekJawaban()
    {
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan1', 'jawabankeamanan1', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan2', 'jawabankeamanan2', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('lupapassword/reset');
        } else {
            $cekJawaban = $this->lupapassword_model->cekJawaban($this->input->post('id_anggota'), $this->input->post('jawabankeamanan1'), $this->input->post('jawabankeamanan2'));
            if ($cekJawaban) {
                foreach ($cekJawaban as $row);
                $idAnggota = $row->id_anggota;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Jawaban anda salah!<br>Silahkan ulangi lagi atau urus ganti password ke koperasi.
              </div>');
                redirect('lupapassword/reset');
            }
            $data['id'] = $this->anggota_model->getAnggotaById($idAnggota);
            $data['title'] = 'Ubah Password';
            $this->load->view('auth/anggota/header', $data);
            $this->load->view('lupapassword/gantipasswordlama', $data);
        }
    }

    public function prosesUbahPassword()
    {
        $this->anggota_model->ubahPasswordById($this->input->post('id_anggota'));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password anda telah diganti, silahkan login.
              </div>');
        redirect('auth/loginAnggota');
    }
}
