<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->library('Pdf');
        $this->load->model('simpanan_model');
        $this->load->model('anggota_model');
    }

    public function dataSimpanan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Simpanan';
        $data['simpanan'] = $this->simpanan_model->getAllSimpanan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/dataSimpanan');
        $this->load->view('layout/pegawai/footer');
    }

    public function tambah_simpanan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('jumlah_simpanan_pokok', 'jumlah_simpanan_pokok', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Simpanan';
            $data['anggota'] = $this->anggota_model->getFilterAnggota();
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('simpanan/tambah_simpanan');
            $this->load->view('layout/pegawai/footer');
        } else {
            $data = $this->simpanan_model->tambahSimpananPokok();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Simpanan Pokok Telah Ditambah
          </div>');
            redirect('simpanan/dataSimpanan');
        }
    }

    public function dataSetoran($id)
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Data Setoran';
        $data['data_setoran'] = $this->simpanan_model->getSetoranById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/dataSetoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function tambah_setoran($id)
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Tambah Setoran';
        $data['data_setoran'] = $this->simpanan_model->getSimpananById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/tambah_setoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function proses_tambah_setoran()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->form_validation->set_rules('id_simpanan', 'id_simpanan', 'trim|required');
        $this->form_validation->set_rules('jumlah_setor_tunai', 'jumlah_setor_tunai', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            redirect('simpanan/dataSimpanan');
        } else {
            $data = $this->simpanan_model->tambahSetoranSimpananWajib();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Setoran Telah Ditambah
          </div>');
            redirect('simpanan/dataSetoran/' . $this->input->post("id_simpanan"));
        }
    }

    public function laporan()
    {
        $data['title'] = 'Simpanan';

        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/laporan');
        $this->load->view('layout/pegawai/footer');
    }

    public function laporan_pdf($id)
    {
        $data['simpanan_detail'] = $this->simpanan_model->cetakPdf($id);
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "nota-setoran-" . date('d-m-y') . ".pdf";
        $this->pdf->load_view('simpanan/laporan_cetak', $data);
    }
}
