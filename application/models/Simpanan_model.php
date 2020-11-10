<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
    public function getAllSimpanan()
    {
        $query = $this->db->query("SELECT * FROM simpanan s JOIN anggota a ON s.id_anggota = a.id_anggota");
        return $query->result_array();
    }

    public function getSimpananById($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan s JOIN anggota a ON s.id_anggota = a.id_anggota WHERE s.id_simpanan = $id");
        return $query->result_array();
    }

    public function getAllSetoran()
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd  JOIN pegawai p ON sd.id_pegawai = p.id_pegawai JOIN simpanan s ON s.id_simpanan = sd.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota");
        return $query->result_array();
    }

    public function tambahSimpananPokok()
    {
        $data = [
            'id_anggota' => htmlspecialchars($this->input->post('id_anggota', true)),
            'jumlah_simpanan_pokok' => htmlspecialchars($this->input->post('jumlah_simpanan_pokok', true)),
            'jumlah_simpanan_wajib' => 0
        ];
        $this->db->insert('simpanan', $data);
    }

    public function getSetoranById($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.id_simpanan=$id ORDER BY sd.tanggal_setor_tunai ASC");
        return $query->result_array();
    }

    public function getSetoranByIdsetoran($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.id_simpanan_detail=$id");
        return $query->result_array();
    }

    public function tambahSetoranSimpananWajib()
    {
        $id_simpanan = $this->input->post('id_simpanan');
        $jumlah_setor_tunai = $this->input->post('jumlah_setor_tunai');
        $date = date('Y-m-d');
        $data = [
            'id_simpanan' => $id_simpanan,
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'jumlah_setor_tunai' => $jumlah_setor_tunai,
            'tanggal_setor_tunai' => $date
        ];
        $this->db->insert('simpanan_detail', $data);

        $data1 = $this->db->query("SELECT * FROM simpanan WHERE id_simpanan = $id_simpanan");
        foreach ($data1->result_array() as $result) {
            $jumlah_simpanan_wajib = $result['jumlah_simpanan_wajib'];
        }
        $tambahSimpananWajib = $jumlah_setor_tunai + $jumlah_simpanan_wajib;
        $data = [
            "jumlah_simpanan_wajib" => $tambahSimpananWajib
        ];
        $this->db->where('id_simpanan', $id_simpanan);
        $this->db->update('simpanan', $data);
    }

    public function terimaAksiPenghapusanSetoran($id)
    {
        $getIdSimpanandetail = $this->db->query("SELECT * FROM aksi a JOIN simpanan_detail sd ON a.id_data_kategori = sd.id_simpanan_detail where a.id_aksi = $id");
        foreach ($getIdSimpanandetail->result_array() as $result) {
            $id_simpanan_detail = $result['id_data_kategori'];
            $jumlah_setoran = $result['jumlah_setor_tunai'];
        }

        $getJumlahSimpananWajib = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan WHERE sd.id_simpanan_detail=$id_simpanan_detail");
        foreach ($getJumlahSimpananWajib->result_array() as $result) {
            $jumlah_simpanan_wajib = $result['jumlah_simpanan_wajib'];
            $id_simpanan = $result['id_simpanan'];
        }
        $hasilAkhirSimpananWajib = $jumlah_simpanan_wajib - $jumlah_setoran;
        $data2 = [
            'jumlah_simpanan_wajib' => $hasilAkhirSimpananWajib
        ];
        $this->db->where('id_simpanan', $id_simpanan);
        $this->db->update('simpanan', $data2);

        $this->db->where('id_simpanan_detail', $id_simpanan_detail);
        $this->db->delete('simpanan_detail');

        $this->db->where('id_aksi', $id);
        $this->db->delete('aksi');
    }

    public function tolakAksiPenghapusanSetoran($id)
    {
        $this->db->where('id_aksi', $id);
        $this->db->delete('aksi');
    }

    public function cetakPdf($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.id_simpanan_detail=$id");
        return $query->result_array();
    }

    public function getAllSetoranDetail()
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai");
        return $query->result_array();
    }

    public function getSetoranByDate($startDate, $endDate)
    {
        $query = $this->db->query("SELECT * FROM simpanan_detail sd JOIN simpanan s ON sd.id_simpanan = s.id_simpanan JOIN anggota a ON s.id_anggota = a.id_anggota JOIN pegawai p on sd.id_pegawai = p.id_pegawai WHERE sd.tanggal_setor_tunai BETWEEN '$startDate' AND '$endDate'");
        return $query->result_array();
    }

    public function hapusSetoran()
    {
        $data = [
            'id_data_kategori' => $this->input->post('id_simpanan_detail'),
            'tanggal_aksi' => date('d-m-Y'),
            'pesan_aksi' => $this->input->post('pesan_aksi'),
            'nama_pegawai' => $this->session->userdata('nama_pegawai'),
            'kategori_aksi' => 'Hapus Setoran'
        ];
        $this->db->insert('aksi', $data);
    }

    public function getSimpananByIdAnggota($id)
    {
        $query = $this->db->query("SELECT * FROM simpanan s 
                                JOIN anggota a ON s.id_anggota = a.id_anggota 
                                WHERE s.id_anggota = $id");
        return $query->result_array();
    }

    public function requestPenarikan()
    {
        $data = [
            'id_simpanan' => $this->input->post('id_simpanan'),
            'tanggal_permintaan_penarikan' => date('Y-m-d'),
            'nominal_total_penarikan' => $this->input->post('nominal_total_penarikan'),
            'pesan' => 'Belum terdapat pesan'
        ];
        $this->db->insert('penarikan_simpanan', $data);
    }

    public function verifikasiPenarikan()
    {
        $status = $this->input->post('verifikasi_pegawai');
        if ($status == "Verifikasi Diterima") {
            $data = [
                "verifikasi_pegawai" => $status,
                "total_akhir_simpanan" => $this->input->post('total_akhir_simpanan'),
                "pesan" => 'Verifikasi Diterima Pegawai, Menunggu Verifikasi Admin'
            ];
        } else if ($status == "Verifikasi Ditolak") {
            $data = [
                "verifikasi_pegawai" => $status,
                "verifikasi_admin" => "Verifikasi Ditolak",
                "status_penarikan" => "Verifikasi Ditolak",
                "pesan" => $this->input->post('pesan')
            ];
        }

        $this->db->where('id_penarikan', $this->input->post('id_penarikan'));
        $this->db->update('penarikan_simpanan', $data);
    }
    public function getAllPenarikan()
    {
        $query = $this->db->query("SELECT * FROM penarikan_simpanan ps 
                                JOIN simpanan s ON ps.id_simpanan = s.id_simpanan
                                JOIN anggota a ON a.id_anggota = s.id_anggota");
        return $query->result_array();
    }
    public function getPenarikanSimpananById($id)
    {
        $query = $this->db->query("SELECT * FROM penarikan_simpanan ps 
                                JOIN simpanan s ON ps.id_simpanan = s.id_simpanan
                                JOIN anggota a ON a.id_anggota = s.id_anggota
                                WHERE ps.id_penarikan = $id");
        return $query->result_array();
    }

    public function ubahStatusSimpanan()
    {
        $status = $this->input->post('status_simpanan');
        $id_anggota = $this->input->post('id_anggota');

        if ($status != "Sudah Ditarik") {
            $data = [
                "status_simpanan" => $status
            ];
        } else {
            $data = [
                "status_simpanan" => $status
            ];

            $data2 = [
                "status_anggota" => "Dinonaktifkan"
            ];
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('anggota', $data2);
        }
        $this->db->where('id_simpanan', $this->input->post('id_simpanan'));
        $this->db->update('simpanan', $data);
    }
    public function verifikasiPenarikanByAdmin()
    {
        $status = $this->input->post('verifikasi_admin');
        if ($status == "Verifikasi Diterima") {
            $data = [
                "verifikasi_admin" => $status,
                "status_penarikan" => "Diterima",
                "pesan" => 'Pengajuan telah diverifikasi dan diterima, anda bisa mengambil uang simpanan di koperasi'
            ];
        } else if ($status == "Verifikasi Ditolak") {
            $data = [
                "verifikasi_admin" => $status,
                "status_penarikan" => "Verifikasi Ditolak",
                "pesan" => $this->input->post('pesan')
            ];
        }

        $this->db->where('id_penarikan', $this->input->post('id_penarikan'));
        $this->db->update('penarikan_simpanan', $data);
    }
  
    public function getRiwayatPenarikanByAnggota($id)
    {
        $query = $this->db->query("SELECT * FROM penarikan_simpanan ps 
                                JOIN simpanan s ON ps.id_simpanan = s.id_simpanan
                                JOIN anggota a ON a.id_anggota = s.id_anggota
                                WHERE s.id_anggota = $id");
        return $query->result_array();
    }
}
