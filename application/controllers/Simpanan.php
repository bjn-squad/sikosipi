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
        $this->load->model('aksi_model');
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

    public function hapusSetoran($id)
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Hapus Setoran';
        $data['setoran'] = $this->simpanan_model->getSetoranByIdsetoran($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/hapusSetoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesHapusSetoran()
    {
        $kategori = 'Hapus Setoran';
        $id_data_kategori = $this->input->post('id_simpanan_detail');
        $data = $this->db->query("SELECT * FROM aksi WHERE id_data_kategori = $id_data_kategori AND kategori_aksi LIKE '$kategori'");
        foreach ($data->result_array() as $result) {
            $status = $result['status_verifikasi'];
        }
        if (!empty($status)) {
            if ($status != "Diterima Admin") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi hapus transaksi setoran masih pending. Harap bersabar menunggu verifikasi admin.
          </div>');
                redirect('simpanan/dataSimpanan');
            } else {
                $this->form_validation->set_rules('id_simpanan_detail', 'id_simpanan_detail', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('simpanan/dataSimpanan');
                } else {
                    $data = $this->simpanan_model->hapusSetoran();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Request hapus transaksi setoran sukses, tunggu admin review aksi anda.
          </div>');
                    redirect('simpanan/dataSimpanan');
                }
            }
        } else {
            $this->form_validation->set_rules('id_simpanan_detail', 'id_simpanan_detail', 'trim|required');
            $this->form_validation->set_rules('pesan_aksi', 'pesan_aksi', 'required');
            if ($this->form_validation->run() == FALSE) {
                redirect('simpanan/dataSimpanan');
            } else {
                $data = $this->simpanan_model->hapusSetoran();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Request hapus transaksi setoran sukses, tunggu admin review aksi anda.
          </div>');
                redirect('simpanan/dataSimpanan');
            }
        }
    }

    public function daftarAksiPenghapusanSetoran()
    {
        $data['title'] = 'Daftar Aksi';
        $data['aksi'] = $this->aksi_model->getAksiPenghapusanSetoran();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/daftaraksipenghapusansetoran');
        $this->load->view('layout/pegawai/footer');
    }

    public function reviewPenghapusanSetoran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $data['title'] = 'Review Penghapusan Setoran';
            $data['aksi'] = $this->aksi_model->getAksiPenghapusanSetoran($id);
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('simpanan/reviewPenghapusanSetoran');
            $this->load->view('layout/pegawai/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
        }
    }

    public function terimaAksiPenghapusanSetoran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('simpanan', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->simpanan_model->terimaAksiPenghapusanSetoran($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request Penghapusan Setoran Diterima
            </div>');
            redirect('simpanan/daftarAksiPenghapusanSetoran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('simpanan/daftarAksiPenghapusanSetoran');
        }
    }

    public function tolakAksiPenghapusanSetoran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('simpanan', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->simpanan_model->tolakAksiPenghapusanSetoran($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Request Penghapusan Setoran Ditolak
          </div>');
            redirect('simpanan/daftarAksiPenghapusanSetoran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       Aksi yang telah direview tidak dapat diubah kembali.
      </div>');
            redirect('simpanan/daftarAksiPenghapusanSetoran');
        }
    }
    public function detailPenarikanSimpanan($id)
    {
        $data['title'] = 'Detail Penarikan Simpanan';
        $data['simpanan'] = $this->simpanan_model->getPenarikanSimpananById($id);
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('simpanan/detailPenarikanSimpanan');
        $this->load->view('layout/anggota/footer');
    }

    public function cetakRiwayatSetoran($id)
    {
        $data['simpanan_detail'] = $this->simpanan_model->cetakPdf($id);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-setoran');
        $this->load->view('laporan/layout/footer');
    }

    public function cetakTransaksiSimpanan()
    {
        $data['simpanan_detail'] = $this->simpanan_model->getAllSetoran();
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-setoran');
        $this->load->view('laporan/layout/footer');
    }

    public function laporan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Simpanan';
        $data['data_setoran'] = $this->simpanan_model->getAllSetoranDetail();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/laporan');
        $this->load->view('layout/pegawai/footer');
    }

    public function filterLaporanSetoran()
    {
        if ($this->session->userdata('level') != "pegawai") {

            redirect('auth/loginPegawai', 'refresh');
        }
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $data['title'] = 'Simpanan';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['data_setoran'] = $this->simpanan_model->getSetoranByDate($startDate, $endDate);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/laporan');
        $this->load->view('layout/pegawai/footer');
    }


    public function filterCetakSimpanan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $data['simpanan_detail'] = $this->simpanan_model->getSetoranByDate($startDate, $endDate);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-setoran');
        $this->load->view('laporan/layout/footer');
    }
    public function dataAksiPenarikan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Daftar Pengajuan simpanan';
        $data['simpanan'] = $this->simpanan_model->getAllPenarikan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/daftarPengajuanPenarikan');
        $this->load->view('layout/pegawai/footer');
    }
    public function verifikasiPenarikanByPegawai($id)
    {
        $data['title'] = 'Verifikasi Penarikan Simpanan';
        $data['simpanan'] = $this->simpanan_model->getPenarikanSimpananById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/verifikasiPenarikan');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesVerifikasiPenarikanByPegawai()
    {
        $this->form_validation->set_rules('id_penarikan', 'id_penarikan', 'trim|required');
        $this->form_validation->set_rules('verifikasi_pegawai', 'verifikasi_pegawai', 'trim|required');
        $this->form_validation->set_rules('total_akhir_simpanan', 'total_akhir_simpanan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('simpanan/dataAksiPenarikan');
        } else {
            $data = $this->simpanan_model->verifikasiPenarikan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi Penarikan
          </div>');
            redirect('simpanan/dataAksiPenarikan');
        }
    }

    public function verifikasiPenarikanByAdmin($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $data['title'] = 'Verifikasi Pengajuan simpanan By Admin';
        $data['simpanan'] = $this->simpanan_model->getPenarikanSimpananById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/verifikasiPenarikanAdmin');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesVerifikasiPenarikanByAdmin()
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $this->form_validation->set_rules('id_penarikan', 'id_penarikan', 'trim|required');
        $this->form_validation->set_rules('verifikasi_admin', 'verifikasi_admin', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('simpanan/dataAksiPenarikan');
        } else {
            $data = $this->simpanan_model->verifikasiPenarikanByAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi simpanan
          </div>');
            redirect('simpanan/dataAksiPenarikan');
        }
    }

    public function ubahStatusSimpanan($id)
    {
        $data['title'] = 'Ubah Status Simpanan';
        $data['simpanan'] = $this->simpanan_model->getSimpananById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('simpanan/ubahStatusSimpanan');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesUbahStatusSimpanan()
    {
        $this->form_validation->set_rules('id_simpanan', 'id_simpanan', 'trim|required');
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('status_simpanan', 'status_simpanan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('simpanan/dataSimpanan');
        } else {
            $data = $this->simpanan_model->ubahStatusSimpanan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Ubah Status Simpanan
          </div>');
            redirect('simpanan/dataSimpanan');
        }
    }
}
