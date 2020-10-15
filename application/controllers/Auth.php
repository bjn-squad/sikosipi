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
        $data['title'] = 'Login Pegawai';
        $this->load->view('auth/pegawai/header', $data);
        $this->load->view('auth/pegawai/login');
    }

    public function loginAnggota()
    {
        if ($this->session->userdata('level') == "pegawai") {
            redirect('pegawai', 'refresh');
        } elseif ($this->session->userdata('level') == "anggota") {
            redirect('anggota', 'refresh');
        }
        $data['title'] = 'Login Anggota';
        $this->load->view('auth/anggota/header', $data);
        $this->load->view('auth/anggota/login');
    }

    public function prosesLoginPegawai()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->auth_model->loginPegawai($email, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_pegawai', $row->id_pegawai);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('nama_pegawai', $row->nama_pegawai);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('kategori', $row->kategori);
            $this->session->set_userdata('level', "pegawai");
            redirect('pegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
            redirect('auth/loginPegawai');
        }
    }

    public function prosesLoginAnggota()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->auth_model->loginAnggota($email, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_anggota', $row->id_anggota);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('nama_anggota', $row->nama_anggota);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('status', $row->status_anggota);
            $this->session->set_userdata('level', "anggota");
            redirect('anggota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
            redirect('auth/loginAnggota');
        }
    }

    public function registerAnggota()
    {
        if ($this->session->userdata('level') == "pegawai") {
            redirect('pegawai', 'refresh');
        } elseif ($this->session->userdata('level') == "anggota") {
            redirect('anggota', 'refresh');
        }
        $data['title'] = 'Register Anggota';
        $this->load->view('auth/anggota/header', $data);
        $this->load->view('auth/anggota/register');
    }

    public function prosesRegisterAnggota()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telpon', 'no_telpon', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.email]', [
            'is_unique' => 'This email already taken'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[anggota.username]', [
            'is_unique' => 'This username already taken'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);


        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('level') == "pegawai") {
                redirect('pegawai', 'refresh');
            } elseif ($this->session->userdata('level') == "anggota") {
                redirect('anggota', 'refresh');
            }
            $data['title'] = 'Register Anggota';
            $this->load->view('auth/anggota/header', $data);
            $this->load->view('auth/anggota/register');
        } else {
            $this->auth_model->registerAnggota();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun anda telah sukses dibuat! Silahkan login!
          </div>');
            redirect('auth/loginAnggota');
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
