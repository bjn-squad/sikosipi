<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('pengumuman_model');
    }

    public function index()
    {
        $data['title'] = 'Data Pengumuman';
        $data['pengumuman'] = $this->pengumuman_model->getAllPengumuman();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/index');
        $this->load->view('layout/pegawai/footer');
    }
    public function add()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Pengumuman';
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pengumuman/tambah');
            $this->load->view('layout/pegawai/footer');
        } else {
            $this->pengumuman_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Pengumuman
          </div>');
            redirect('pengumuman');
        }
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['pengumuman'] = $this->pengumuman_model->getPengumumanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/detail');
        $this->load->view('layout/pegawai/footer');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Pengumuman';
        $data['pengumuman'] = $this->pengumuman_model->getPengumumanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/edit');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai');
            // redirect('pengumuman/edit/' . $this->input->post('id_pengumuman'));
        } else {
            $this->pengumuman_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Pengumuman
          </div>');
            redirect('pengumuman');
        }
    }
    public function delete($id)
    {
        $this->pengumuman_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Pengumuman.
          </div>');
        redirect('pengumuman');
    }
}
