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
        $data['pegawai'] = $this->pegawai_model->getPegawaiById($this->session->userdata('id_pegawai'));
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
        $data['pinjaman'] = $this->pinjaman_model->getAllPinjaman();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function tambahPinjaman($id)
    {
        $check = $this->db->query("SELECT * FROM pengajuan_pinjaman WHERE id_pengajuan = $id");
        foreach ($check->result_array() as $result) {
            $pesan = $result['pesan'];
        }
        if ($pesan == "Pinjaman anda telah terdaftar") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf anda tidak dapat menambahkan pinjaman karena sudah terdaftar.
           </div>');
            redirect('pegawai/daftarPengajuanPinjaman');
        }
        $data['title'] = 'Tambah Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/accPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesTambahPinjaman()
    {
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim|required');
        $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim|required');
        $this->form_validation->set_rules('tanggal_meminjam', 'tanggal_meminjam', 'required');
        $this->form_validation->set_rules('total_pinjaman', 'total_pinjaman', 'required');
        $this->form_validation->set_rules('angsuran_bulanan', 'angsuran_bulanan', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPengajuanPinjaman');
        } else {
            $data = $this->pinjaman_model->insertPinjaman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Tambah Pinjaman
          </div>');
            redirect('pegawai/daftarPinjaman');
        }
    }
    public function ubahPinjaman($id)
    {
        $data['title'] = 'Ubah Status Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getPinjamanByIdPinjaman($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/ubahPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesUbahPinjaman()
    {
        $this->form_validation->set_rules('status_pinjaman', 'status_pinjaman', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/ubahPinjaman');
        } else {
            $data = $this->pinjaman_model->ubahPinjaman();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Ubah Status Pinjaman
          </div>');
            redirect('pegawai/daftarPinjaman');
        }
    }

    public function tambahAngsuran($id)
    {
        $data['title'] = 'Tambah Pinjaman';
        $data['pinjaman'] = $this->pinjaman_model->getPinjamanByIdPinjaman($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/tambahAngsuranPinjaman');
        $this->load->view('layout/pegawai/footer');
    }
    public function prosesTambahAngsuran()
    {
        $this->form_validation->set_rules('id_pinjaman', 'id_pinjaman', 'trim|required');
        $this->form_validation->set_rules('angsuran_pembayaran', 'angsuran_pembayaran', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPinjaman');
        } else {
            $data = $this->pinjaman_model->insertAngsuran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Tambah Angsuran Pinjaman
          </div>');
            redirect('pegawai/daftarPinjaman');
        }
    }
    public function riwayatAngsuran($id)
    {
        $data['title'] = 'Data Setoran';
        $data['pinjaman'] = $this->pinjaman_model->getAngsuranById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/riwayatAngsuran');
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

    public function verifikasiPengajuanPinjamanByAdmin($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $data['title'] = 'Verifikasi Pengajuan Pinjaman By Admin';
        $data['pinjaman'] = $this->pinjaman_model->getAllPengajuanById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/verifikasiPengajuanPinjamanAdmin');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesVerifikasiPengajuanPinjamanByAdmin()
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai', 'refresh');
        }
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim|required');
        $this->form_validation->set_rules('verifikasi_admin', 'verifikasi_admin', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPengajuanPinjaman');
        } else {
            $data = $this->pinjaman_model->verifikasiPengajuanByAdmin();
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
        $this->load->view('pegawai/ubahpasswordanggota');
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

    public function daftarAksiPenonaktifanAnggota()
    {
        $data['title'] = 'Daftar Aksi';
        $data['aksi'] = $this->aksi_model->getAllAksiPenonaktifan();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftaraksipenonaktifananggota');
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
           Permintaan penonaktifan anggota telah sukses ditambahkan, silahkan menunggu review admin.
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
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
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
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Aksi yang telah direview tidak dapat diubah kembali.
          </div>');
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
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
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       Aksi yang telah direview tidak dapat diubah kembali.
      </div>');
            redirect('pegawai/daftarAksiPenonaktifanAnggota');
        }
    }

    public function daftarPegawai()
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai');
        }
        $data['title'] = 'Daftar Pegawai';
        $data['pegawai'] = $this->pegawai_model->getAllPegawai();
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/daftarpegawai');
        $this->load->view('layout/pegawai/footer');
    }

    public function ubahPassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Password';
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pegawai/ubahPassword');
            $this->load->view('layout/pegawai/footer');
        } else {
            $data = $this->pegawai_model->ubahPassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password Berhasil Diganti!
           </div>');
            redirect('pegawai');
        }
    }

    public function detailPegawai($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai');
        }
        $data['title'] = 'Detail Pegawai';
        $data['pegawai'] = $this->pegawai_model->getPegawaiById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/detailpegawai');
        $this->load->view('layout/pegawai/footer');
    }

    public function ubahPasswordPegawai($id)
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai');
        }
        $data['title'] = 'Ubah Password Pegawai';
        $data['pegawai'] = $this->pegawai_model->getPegawaiById($id);
        $this->load->view('layout/pegawai/header', $data);
        $this->load->view('layout/pegawai/sidebar');
        $this->load->view('layout/pegawai/top');
        $this->load->view('pegawai/ubahpasswordpegawai');
        $this->load->view('layout/pegawai/footer');
    }

    public function prosesGantiPasswordPegawai()
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai');
        }
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai/daftarPegawai');
        } else {
            $data = $this->pegawai_model->gantiPasswordPegawai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Ganti Password Pegawai!
          </div>');
            redirect('pegawai/daftarPegawai');
        }
    }

    public function tambahPegawaiBaru()
    {
        if ($this->session->userdata('kategori') != "1") {
            redirect('pegawai');
        }
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required');
        $this->form_validation->set_rules('alamat_pegawai', 'alamat_pegawai', 'required');
        $this->form_validation->set_rules('no_telp_pegawai', 'no_telp_pegawai', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pegawai.email]', [
            'is_unique' => 'This email already taken'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pegawai.username]', [
            'is_unique' => 'This username already taken'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Pegawai Baru';
            $this->load->view('layout/pegawai/header', $data);
            $this->load->view('layout/pegawai/sidebar');
            $this->load->view('layout/pegawai/top');
            $this->load->view('pegawai/tambahPegawaiBaru');
            $this->load->view('layout/pegawai/footer');
        } else {
            $data = $this->pegawai_model->tambahPegawaiBaru();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Pegawai Baru!
          </div>');
            redirect('pegawai/daftarPegawai');
        }
    }
}
