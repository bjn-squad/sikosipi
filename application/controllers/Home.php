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
        $data['title'] = 'KSP Mitra Artha';
        $data['pengumuman'] = $this->home_model->getAllPengumuman();
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/pengumuman');
        $this->load->view('home/layout/footer');
    }
    public function detail($id)
    {

        $data['title'] = 'KSP Mitra Artha';
        $data['pengumuman'] = $this->home_model->getPengumumanById($id);
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/detail');
        $this->load->view('home/layout/footer');
    }
}
