<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index()
    {
        $data['title'] = 'KSP Mitra Artha';
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/layout/footer');
    }
    public function pengumuman()
    {
        $this->load->model('pengumuman_model');
        $data['pengumuman'] = $this->pengumuman_model->getAllPengumuman();
        $data['title'] = 'KSP Mitra Artha';
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/pengumuman');
        $this->load->view('home/layout/footer');
    }
}
