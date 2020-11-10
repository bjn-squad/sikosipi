<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_anggota'));

        if (empty($cekSetPertanyaan)) {
            redirect('lupapassword/tambahPertanyaanKeamanan');
        }
        $this->load->model('anggota_model');
        $this->load->model('simpanan_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Anggota';
        $data['data'] = $this->anggota_model->getAnggotaById($this->session->userdata('id_anggota'));
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('anggota/index');
        $this->load->view('layout/anggota/footer');
    }

    public function verifikasi()
    {
        if ($this->session->userdata('status') == "Aktif" and $this->session->userdata('status') == "Dinonaktifkan") {
            redirect('anggota');
        } else {
            $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['data'] = $this->anggota_model->getAnggotaById($this->session->userdata('id_anggota'));
                $data['title'] = 'Dashboard Anggota';
                $this->load->view('layout/anggota/header', $data);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('anggota/verifikasi');
                $this->load->view('layout/anggota/footer');
            } else {
                $data = $this->anggota_model->verifikasi($this->session->userdata('id_anggota'));
                if ($data == "True") {
                    redirect('anggota');
                } else {
                    redirect('anggota/verifikasi');
                }
            }
        }
    }

    public function ubahPassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Password';
            $this->load->view('layout/anggota/header', $data);
            $this->load->view('layout/anggota/sidebar');
            $this->load->view('layout/anggota/top');
            $this->load->view('anggota/ubahPassword');
            $this->load->view('layout/anggota/footer');
        } else {
            $data = $this->anggota_model->ubahPassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password Berhasil Diganti!
           </div>');
            redirect('anggota');
        }
    }

    public function simpananSaya()
    {
        $data['title'] = 'Simpanan';
        $data['simpanan'] = $this->simpanan_model->getSimpananByIdAnggota($this->session->userdata('id_anggota'));
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('simpanan/simpananSaya');
        $this->load->view('layout/anggota/footer');
    }

    public function dataSetoranSaya($id)
    {
        $data['title'] = 'Data Setoran';
        $data['data_setoran'] = $this->simpanan_model->getSetoranById($id);
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('simpanan/dataSetoranSaya');
        $this->load->view('layout/anggota/footer');
    }
    public function requestTarikSimpanan($id)
    {
        $dataStatus = $this->db->select('*')->order_by('id_penarikan', "desc")->where('id_simpanan', $id)->limit(1)->get('penarikan_simpanan')->row();
        if (!empty($dataStatus->status_penarikan)) {
            if ($dataStatus->status_penarikan != "Verifikasi Ditolak") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Maaf Transaksi Penarikan Anda Masih Pending.
          </div>');
                redirect('anggota/simpananSaya');
            } else {
                $data['title'] = 'Penarikan Simpanan';
                $data['simpanan'] = $this->simpanan_model->getSimpananById($id);
                $this->load->view('layout/anggota/header', $data);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('simpanan/requestPenarikan');
                $this->load->view('layout/anggota/footer');
            }
        } else {
            $data['title'] = 'Penarikan Simpanan';
            $data['simpanan'] = $this->simpanan_model->getSimpananById($id);
            $this->load->view('layout/anggota/header', $data);
            $this->load->view('layout/anggota/sidebar');
            $this->load->view('layout/anggota/top');
            $this->load->view('simpanan/requestPenarikan');
            $this->load->view('layout/anggota/footer');
        }
    }

    public function prosesRequestPenarikan()
    {
        $this->form_validation->set_rules('id_simpanan', 'id_simpanan', 'trim|required');
        $this->form_validation->set_rules('nominal_total_penarikan', 'nominal_total_penarikan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
           Request Ditolak
          </div>');
            redirect('anggota/simpananSaya');
        } else {
            $data = $this->simpanan_model->requestPenarikan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Request Penarikan Telah Ditambah
          </div>');
            redirect('anggota/simpananSaya');
        }
    }

    public function cetakSetoranSaya($id)
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $data['title'] = 'Simpanan';
        $data['simpanan_detail'] = $this->simpanan_model->cetakPdf($id);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-setoran');
        $this->load->view('laporan/layout/footer');
    }
    public function riwayatPenarikan()
    {
        $data['title'] = 'Riwayat Penarikan Simpanan';
        $data['simpanan'] = $this->simpanan_model->getRiwayatPenarikanByAnggota($this->session->userdata('id_anggota'));
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('simpanan/riwayatPenarikan');
        $this->load->view('layout/anggota/footer');
    }
}
