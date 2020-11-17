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
        $this->load->model('aksi_model');
    }

    public function laporan()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Pinjaman';
        $data['angsuran_detail'] = $this->pinjaman_model->getAllAngsuran();
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
        $dataStatus = $this->db->select('*')->order_by('id_pengajuan', "desc")->where('id_anggota', $idAnggota)->limit(1)->get('pengajuan_pinjaman')->row();
        $dataStatusPinjaman = $this->db->select('*')->order_by('id_pinjaman', "desc")->where('id_anggota', $idAnggota)->limit(1)->get('pinjaman')->row();

        if (!empty($dataStatus->status_pengajuan) && empty($dataStatusPinjaman)) {
            if ($dataStatus->status_pengajuan != "Sedang Diverifikasi" && $status == "Aktif") {
                $data1['title'] = 'Ayo Ajukan Pinjaman';
                $this->load->view('layout/anggota/header', $data1);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('pinjaman/ajukan_pinjaman');
                $this->load->view('layout/anggota/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <i class="fa fa-warning"></i> Maaf anda belum bisa mengajukan pinjaman karena status pengajuan sebelumya masih dalam tahap verifikasi.
          </div>');
                redirect('anggota');
            }
        } else if (!empty($dataStatus->status_pengajuan) && !empty($dataStatusPinjaman)) {
            if ($dataStatus->status_pengajuan != "Sedang Diverifikasi" && $status == "Aktif" && $dataStatusPinjaman->status_pinjaman == "Sudah Lunas") {
                $data1['title'] = 'Ayo Ajukan Pinjaman';
                $this->load->view('layout/anggota/header', $data1);
                $this->load->view('layout/anggota/sidebar');
                $this->load->view('layout/anggota/top');
                $this->load->view('pinjaman/ajukan_pinjaman');
                $this->load->view('layout/anggota/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <i class="fa fa-warning"></i> Maaf anda belum bisa mengajukan pinjaman karena status pengajuan sebelumya masih dalam tahap verifikasi atau anda masih memiliki pinjaman yang belum lunas.
          </div>');
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
        $dataStatus = $this->db->select('*')->order_by('id_pengajuan', "desc")->where('id_anggota', $idAnggota)->limit(1)->get('pengajuan_pinjaman')->row();

        if (!empty($dataStatus->status_pengajuan)) {
            if ($dataStatus->status_pengajuan != "Sedang Diverifikasi" && $status == "Aktif") {
                $this->form_validation->set_rules('total_pengajuan_pinjaman', 'total_pengajuan_pinjaman', 'trim|required|numeric');
                $this->form_validation->set_rules('alasan_pinjaman', 'alasan_pinjaman', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    redirect('pinjaman/ajukanPinjaman');
                } else {
                    $this->pinjaman_model->insertPengajuan();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pengajuan Pinjaman telah berhasil disubmit !
          </div>');
                    redirect('anggota');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf proses pengajuan anda masih dalam tahap verifikasi, harap bersabar.
              </div>');
                redirect('anggota');
            }
        } else {
            if ($status == "Aktif") {
                $this->form_validation->set_rules('total_pengajuan_pinjaman', 'total_pengajuan_pinjaman', 'trim|required|numeric');
                $this->form_validation->set_rules('alasan_pinjaman', 'alasan_pinjaman', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    redirect('pinjaman/ajukanPinjaman');
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
    public function pinjamanSaya()
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $data['title'] = 'Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getPinjamanByIdAnggota($this->session->userdata('id_anggota'));
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('pinjaman/pinjamanSaya');
        $this->load->view('layout/anggota/footer');
    }
    public function AngsuranSaya($id)
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $data['title'] = 'Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAngsuranById($id);
        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/sidebar');
        $this->load->view('layout/anggota/top');
        $this->load->view('pinjaman/angsuranSaya');
        $this->load->view('layout/anggota/footer');
    }
    public function hapusAngsuran($id)
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Hapus Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAngsuranByIdAngsuran($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pinjaman/hapusAngsuran');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesHapusAngsuran()
    {
        $kategori = 'Hapus Angsuran';
        $id_data_kategori = $this->input->post('id_angsuran_detail');
        $data = $this->db->query("SELECT * FROM aksi WHERE id_data_kategori = $id_data_kategori AND kategori_aksi LIKE '$kategori'");
        foreach ($data->result_array() as $result) {
            $status = $result['status_verifikasi'];
        }
        if (!empty($status)) {
            if ($status != "Diterima Admin") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi hapus transaksi angsuran masih pending. Harap bersabar menunggu verifikasi admin.
          </div>');
                redirect('pegawai/daftarPinjaman');
            } else {
                $this->form_validation->set_rules('id_angsuran_detail', 'id_angsuran_detail', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('pegawai/daftarPinjaman');
                } else {
                    $data = $this->pinjaman_model->hapusAngsuran();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Request hapus transaksi angsuran sukses, tunggu admin review aksi anda.
          </div>');
                    redirect('pegawai/daftarPinjaman');
                }
            }
        } else {
            $this->form_validation->set_rules('id_angsuran_detail', 'id_angsuran_detail', 'trim|required');
            $this->form_validation->set_rules('pesan_aksi', 'pesan_aksi', 'required');
            if ($this->form_validation->run() == FALSE) {
                redirect('pegawai/daftarPinjaman');
            } else {
                $data = $this->pinjaman_model->hapusAngsuran();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Request hapus transaksi angsuran sukses, tunggu admin review aksi anda.
          </div>');
                redirect('pegawai/daftarPinjaman');
            }
        }
    }

    public function daftarAksiPenghapusanAngsuran()
    {
        $data['title'] = 'Daftar Aksi';
        $data['aksi'] = $this->aksi_model->getAksiPenghapusanAngsuran();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pinjaman/daftarAksiPenghapusanAngsuran');
        $this->load->view('layout/pegawai/footer');
    }

    public function reviewPenghapusanAngsuran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $data['title'] = 'Review Penghapusan Angsuran';
            $data['aksi'] = $this->aksi_model->getAksiPenghapusanAngsuran($id);
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pinjaman/reviewPenghapusanAngsuran');
            $this->load->view('layout/pegawai/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
        }
    }

    public function terimaAksiPenghapusanAngsuran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pinjaman', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->pinjaman_model->terimaAksiPenghapusanAngsuran($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Request Penghapusan Angsuran Diterima
            </div>');
            redirect('pinjaman/daftarAksiPenghapusanAngsuran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pinjaman/daftarAksiPenghapusanAngsuran');
        }
    }

    public function tolakAksiPenghapusanAngsuran($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pinjaman', 'refresh');
        }
        $getStatus = $this->db->query("SELECT * FROM aksi where id_aksi = $id");
        foreach ($getStatus->result_array() as $result) {
            $status_verifikasi = $result['status_verifikasi'];
        }
        if ($status_verifikasi == "Pending") {
            $this->pinjaman_model->tolakAksiPenghapusanAngsuran($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Request Penghapusan Angsuran Ditolak
          </div>');
            redirect('pinjaman/daftarAksiPenghapusanAngsuran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       Aksi yang telah direview tidak dapat diubah kembali.
      </div>');
            redirect('pinjaman/daftarAksiPenghapusanAngsuran');
        }
    }

    public function cetakAngsuran($id)
    {
        $data['angsuran_detail'] = $this->pinjaman_model->cetakPdf($id);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-angsuran');
        $this->load->view('laporan/layout/footer');
    }

    public function cetakTransaksiPinjaman()
    {
        $data['angsuran_detail'] = $this->pinjaman_model->getAllAngsuran();
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-angsuran');
        $this->load->view('laporan/layout/footer');
    }

    public function filterLaporanAngsuran()
    {
        if ($this->session->userdata('level') != "pegawai") {

            redirect('auth/loginPegawai', 'refresh');
        }
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $data['title'] = 'Angsuran';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['angsuran_detail'] = $this->pinjaman_model->getAngsuranByDate($startDate, $endDate);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pinjaman/laporan');
        $this->load->view('layout/pegawai/footer');
    }

    public function filterCetakPinjaman()
    {
        if ($this->session->userdata('level') != "pegawai") {
            redirect('auth/loginPegawai', 'refresh');
        }
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $data['angsuran_detail'] = $this->pinjaman_model->getAngsuranByDate($startDate, $endDate);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-angsuran');
        $this->load->view('laporan/layout/footer');
    }

    public function cetakAngsuranSaya($id)
    {
        if ($this->session->userdata('level') != "anggota") {
            redirect('auth/loginAnggota', 'refresh');
        }
        $data['title'] = 'Pinjaman';
        $data['angsuran_detail'] = $this->pinjaman_model->cetakPdf($id);
        $this->load->view('laporan/layout/header', $data);
        $this->load->view('laporan/nota-angsuran');
        $this->load->view('laporan/layout/footer');
    }
}
