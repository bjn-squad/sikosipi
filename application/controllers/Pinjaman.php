<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
   

    public function laporan()
    {
        $data['title'] = 'Pinjaman';
        
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pinjaman/laporan');
        $this->load->view('layout/pegawai/footer');
    }
}
