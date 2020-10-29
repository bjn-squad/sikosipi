<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('pegawai_model');
        $this->load->model('anggota_model');
        $this->load->model('pinjaman_model');
        $this->load->model('aksi_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/index');
        $this->load->view('layout/pegawai/footer');
    }

    public function daftarAnggota()
    {
        $data['title'] = 'Daftar Anggota';
        $data['anggota'] = $this->anggota_model->getAllAnggota();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftaranggota');
        $this->load->view('layout/pegawai/footer');
    }

    public function verifikasiAnggota($id)
    {
        $getDataAnggota = $this->db->query("SELECT * FROM anggota WHERE id_anggota = $id");
        foreach ($getDataAnggota->result_array() as $item) {
            $status_anggota = $item['status_anggota'];
        }
        if ($status_anggota == "Aktif" || $status_anggota == "Belum Aktif" || $status_anggota == "Tidak Aktif") {
            redirect('pegawai');
        } else {
            $data['title'] = 'Verifikasi Anggota';
            $data['anggota'] = $this->anggota_model->getAnggotaById($id);
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pegawai/verifikasianggota');
            $this->load->view('layout/pegawai/footer');
        }
    }

    public function prosesVerifikasiAnggota()
    {
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('status_anggota', 'status_anggota', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarAnggota');
        } else {
            $data = $this->pegawai_model->verifikasiAnggota();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi Anggota
          </div>');
            redirect('pegawai/daftarAnggota');
        }
    }
    public function daftarPengajuanPinjaman()
    {
        $data['title'] = 'Daftar Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function daftarPinjaman()
    {
        $data['title'] = 'Daftar Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllAnggota();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function verifikasiPengajuanPinjaman($id)
    {
        $data['title'] = 'Verifikasi Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/verifikasiPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesVerifikasiPengajuanPinjaman()
    {
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim|required');
        $this->form_validation->set_rules('verifikasi_pegawai', 'verifikasi_pegawai', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPengajuanPinjaman');
        } else {
            $data = $this->pinjaman_model->verifikasiPengajuan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Verifikasi Pinjaman
          </div>');
            redirect('pegawai/daftarPengajuanPinjaman');
        }
    }
    public function detailPengajuanPinjaman($id)
    {
        $data['title'] = 'Detail Pengajuan Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/detailPengajuanPinjaman');
        $this->load->view('layout/pegawai/footer');
    }

    public function detailAnggota($id)
    {
        $data['title'] = 'Detail Anggota';
        $data['anggota'] = $this->anggota_model->getAnggotaById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/detailAnggota');
        $this->load->view('layout/pegawai/footer');
    }

    public function ubahPasswordAnggota($id)
    {
        $data['title'] = 'Ubah Password Anggota';
        $data['anggota'] = $this->anggota_model->getAnggotaById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/ubahpassword');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesGantiPasswordAnggota()
    {
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarAnggota');
        } else {
            $data = $this->pegawai_model->gantiPasswordAnggota();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Ganti Password Anggota!
          </div>');
            redirect('pegawai/daftarAnggota');
        }
    }

    public function daftarAksi()
    {
        $data['title'] = 'Daftar Aksi';
        $data['aksi'] = $this->aksi_model->getAllAksi();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftaraksi');
        $this->load->view('layout/pegawai/footer');
    }

    public function nonaktifkanAnggota($id)
    {
        $data['title'] = 'Nonaktifkan Akun';
        $data['anggota'] = $this->anggota_model->getAnggotaById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/nonaktifkanakun');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesNonaktifkanAnggota()
    {
        $kategori = 'Nonaktifkan Anggota';
        $id_data_kategori = $this->input->post('id_anggota');
        $data = $this->db->query("SELECT * FROM aksi WHERE id_data_kategori = $id_data_kategori AND kategori_aksi LIKE '$kategori'");
        foreach ($data->result_array() as $result) {
            $status = $result['status_verifikasi'];
        }
        if (!empty($status)) {
            if ($status != "Diterima Admin") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi nonaktif pada user yang anda pilih masih pending. Harap bersabar menunggu verifikasi admin.
          </div>');
                redirect('pegawai/daftarAnggota');
            } else {
                $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('pegawai/daftarAnggota');
                } else {
                    $data = $this->pegawai_model->nonaktifkanAnggota();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Request nonaktifkan anggota sukses, tunggu admin review aksi anda.
          </div>');
                    redirect('pegawai/daftarAnggota');
                }
            }
        } else {
            $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
            $this->form_validation->set_rules('pesan_aksi', 'pesan_aksi', 'required');
            if ($this->form_validation->run() == FALSE) {
                redirect('pegawai/daftarAnggota');
            } else {
                $data = $this->pegawai_model->nonaktifkanAnggota();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Anggota berhasil dinonaktifkan
          </div>');
                redirect('pegawai/daftarAnggota');
            }
        }
    }

    public function reviewPenonaktifanAnggota($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $data['title'] = 'Review Penonaktifkan Akun';
            $data['aksi'] = $this->aksi_model->getAksiNonaktif($id);
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pegawai/reviewPenonaktifanAnggota');
            $this->load->view('layout/pegawai/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pegawai/daftarAksi');
        }
    }

    public function terimaAksiPenonaktifan($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->pegawai_model->terimaAksiPenonaktifan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request Penonaktifan Diterima
            </div>');
            redirect('pegawai/daftarAksi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pegawai/daftarAksi');
        }
    }

    public function tolakAksiPenonaktifan($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->pegawai_model->tolakAksiPenonaktifan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Request Penonaktifan Ditolak
          </div>');
            redirect('pegawai/daftarAksi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       Aksi yang telah direview tidak dapat diubah kembali.
      </div>');
            redirect('pegawai/daftarAksi');
        }
    }
}
