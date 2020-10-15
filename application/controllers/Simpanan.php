<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
   

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
