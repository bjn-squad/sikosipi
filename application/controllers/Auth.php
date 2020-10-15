<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        redirect('auth/loginAnggota', 'refresh');
    }

    public function loginPegawai()
    {
        if ($this->session->userdata('level') == "pegawai") {
            redirect('pegawai', 'refresh');
        } elseif ($this->session->userdata('level') == "anggota") {
            redirect('anggota', 'refresh');
        }
        $data['title'] = 'Login';
        $this->load->view('auth/pegawai/header', $data);
        $this->load->view('auth/pegawai/login');
    }

    public function prosesLoginPegawai()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->auth_model->loginPegawai($email, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_pegawai', $row->id_pegawai);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('kategori', $row->level);
            $this->session->set_userdata('level', "pegawai");
            redirect('pegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
            $data['title'] = 'Login';
            $this->load->view('auth/pegawai/header', $data);
            $this->load->view('auth/pegawai/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        if ($this->session->userdata('id_pegawai')) {
            redirect('auth/loginPegawai', 'refresh');
        } else {
            redirect('auth/loginAnggota', 'refresh');
        }
    }
}
