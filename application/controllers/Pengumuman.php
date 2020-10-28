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
        $this->load->library('form_validation');
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
        $data['title'] = 'Tambah Pengumuman';
        $pengumuman = $this->pengumuman_model;
        $validation = $this->form_validation;

        if ($validation->run()) {
            $pengumuman->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/tambah');
        $this->load->view('layout/pegawai/footer');
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('pengumuman');

        $pengumuman = $this->pengumuman_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengumuman->rules());

        if ($validation->run()) {
            $pengumuman->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pengumuman"] = $pengumuman->getPengumumanById($id);
        if (!$data["pengumuman"]) show_404();
        $data['title'] = 'Edit Pengumuman';
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/edit');
        $this->load->view('layout/pegawai/footer');
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->pengumuman_model->delete($id)) {
            redirect(site_url('pengumuman'));
        }
    }
}
