<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('id_anggota'))) {
            $id = $this->session->userdata('id_anggota');
            $data = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
            foreach ($data->result_array() as $result) {
                $status = $result['status_anggota'];
            }
            if ($status == "Dinonaktifkan") {
                redirect('anggota');
            }
        }
        $this->load->model('pinjaman_model');
    }

    public function laporan()
    {
        $data['title'] = 'Pinjaman';

        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pinjaman/laporan');
        $this->load->view('layout/pegawai/footer');
    }

    public function riwayatPengajuan()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $data['title'] = 'Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllRiwayatPinjamanById($this->session->userdata('id_anggota'));
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('pinjaman/riwayat_pinjaman');
        $this->load->view('layout/anggota/footer');
    }

    public function ajukanPinjaman()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $idAnggota = $this->session->userdata('id_anggota');
        $data = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $idAnggota");
        foreach ($data->result_array() as $result) {
            $status = $result['status_anggota'];
        }
        $dataStatus = $this->db->select('status_pengajuan')->order_by('id_pengajuan', "desc")->limit(1)->get('pengajuan_pinjaman')->row();

        if (!empty($dataStatus->status_pengajuan)) {
            if (($dataStatus->status_pengajuan != "Sedang Diverifikasi" || !empty($dataStatus)) && $status == "Aktif") {
                $data['title'] = 'Ayo Ajukan Pinjaman';
                $this->load->view('layout/anggota/header', $data);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('pinjaman/ajukan_pinjaman');
                $this->load->view('layout/anggota/footer');
            } else {
                redirect('anggota');
            }
        } else {
            if ($status == "Aktif") {
                $dat['title'] = 'Ayo Ajukan Pinjaman';
                $this->load->view('layout/anggota/header', $dat);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('pinjaman/ajukan_pinjaman');
                $this->load->view('layout/anggota/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf anda belum bisa mengajukan pinjaman karena status anda masih belum anggota aktif. Silahkan <a href="">baca pedoman berikut</a> untuk mengaktifkan anggota.
          </div>');
                redirect('anggota');
            }
        }
    }

    public function prosesAjukanPinjaman()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $idAnggota = $this->session->userdata('id_anggota');
        $data = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $idAnggota");
        foreach ($data->result_array() as $result) {
            $status = $result['status_anggota'];
        }
        $dataStatus = $this->db->select('status_pengajuan')->order_by('id_pengajuan', "desc")->limit(1)->get('pengajuan_pinjaman')->row();

        if (!empty($dataStatus->status_pengajuan)) {
            if (($dataStatus->status_pengajuan != "Sedang Diverifikasi" || !empty($dataStatus)) && $status == "Aktif") {
                $this->form_validation->set_rules('total_pengajuan_pinjaman', 'total_pengajuan_pinjaman', 'trim|required|numeric');
                $this->form_validation->set_rules('alasan_pinjaman', 'alasan_pinjaman', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $data['title'] = 'Ayo Ajukan Pinjaman';
                    $this->load->view('layout/anggota/header', $data);
                    $this->load->view('layout/anggota/sidebar');
                    $this->load->view('layout/anggota/top');
                    $this->load->view('pinjaman/ajukan_pinjaman');
                    $this->load->view('layout/anggota/footer');
                } else {
                    $this->pinjaman_model->insertPengajuan();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pengajuan Pinjaman telah berhasil disubmit !
          </div>');
                    redirect('anggota');
                }
            } else {
                redirect('anggota');
            }
        } else {
            if ($status == "Aktif") {
                $this->form_validation->set_rules('total_pengajuan_pinjaman', 'total_pengajuan_pinjaman', 'trim|required|numeric');
                $this->form_validation->set_rules('alasan_pinjaman', 'alasan_pinjaman', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $data['title'] = 'Ayo Ajukan Pinjaman';
                    $this->load->view('layout/anggota/header', $data);
                    $this->load->view('layout/anggota/sidebar');
                    $this->load->view('layout/anggota/top');
                    $this->load->view('pinjaman/ajukan_pinjaman');
                    $this->load->view('layout/anggota/footer');
                } else {
                    $this->pinjaman_model->insertPengajuan();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pengajuan Pinjaman telah berhasil disubmit !
          </div>');
                    redirect('anggota');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf anda belum bisa mengajukan pinjaman karena status anda masih belum anggota aktif. Silahkan <a href="">baca pedoman berikut</a> untuk mengaktifkan anggota.
          </div>');
                redirect('anggota');
            }
        }
    }
    public function tambahAngsuran()
    {
    }

    public function prosesTambahAngsuran()
    {
    }
}
