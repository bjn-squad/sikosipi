<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function tambah()
    {
        $data['title'] = 'Pengumuman';
        
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/tambah');
        $this->load->view('layout/pegawai/footer');
    }
    public function edit()
    {
        $data['title'] = 'Dashboard Pengumuman';
        
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pengumuman/edit');
        $this->load->view('layout/pegawai/footer');
    }
}
