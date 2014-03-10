<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_isvalidated();
        if ($this->session->userdata('role') == 1) {
            $this->header_admin($this->session->userdata('nip'));
        } else {
            $this->header_pegawai($this->session->userdata('nip'));
        }
    }

    public function index() {
        
    }

    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }

//    method halaman
    public function seluruh_pegawai() {
        $this->allpegawai();
        $this->load->view("laman/v_footer");
    }

    public function biodata($nama_pegawai) {
        $this->info_pegawai($nama_pegawai);
        $this->load->view("laman/v_footer");
    }

    public function pengaturan_akun($nip) {
        $this->load->view('laman/v_akun', array('NIP' => $nip));
        $this->load->view('laman/v_footer');
    }

    public function kenaikan_pangkat() {
        if ($this->session->userdata('role') == 1) {
            $this->kenaikanPangkat();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function kenaikan_gaji_berkala() {
        if ($this->session->userdata('role') == 1) {
            $this->kenaikanGajiBerkala();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

//INPUT FORM
    public function input_biodata() {
        $query = $this->m_pegawai->get_jabatan();
        $query2 = $this->m_pegawai->get_unit();
        $query3 = $this->m_pegawai->get_golongan();

        $this->load->view("form/v_form_biodata", array('query' => $query, 'query2' => $query2, 'query3' => $query3));
        $this->load->view("laman/v_footer");
    }

    public function input_data_tambahan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $this->load->view("form/v_form_data_tambahan", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_jabatan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_jabatan();
        $query3 = $this->m_pegawai->get_unit();

        $this->load->view("form/v_form_jabatan", array('query' => $query, 'query2' => $query2, 'query3' => $query3));
        $this->load->view("laman/v_footer");
    }

    public function input_log_pangkat($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_golongan();
        $this->load->view("form/v_form_pangkat", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function input_log_pendidikan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_pendidikan", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_diklat_struktural($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_diklat_struktural();

        $this->load->view("form/v_form_diklat_struktural", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function input_log_diklat_fungsional($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_diklat_fungsional();

        $this->load->view("form/v_form_diklat_fungsional", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function input_log_diklat_teknis($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_diklat_teknis", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_toefl($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_toefl", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_penugasan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_jenis_penugasan();

        $this->load->view("form/v_form_penugasan", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function input_log_seminar($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_seminar", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_organisasi($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_organisasi", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_alamat($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_alamat", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_pasangan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_pasangan", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_anak($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_anak", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_saudara($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_saudara", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_orangtua($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_orangtua", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_gaji_berkala($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_gaji_berkala", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_penghargaan($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_tanda_jasa", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function input_log_medis($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("form/v_form_medis", array('query' => $query));
    }

    //view edit
    public function edit_biodata() {
        $this->load->view("form/v_form_biodata");
        $this->load->view("form/v_data_tambahan");
        $this->load->view("laman/v_footer");
    }

    public function edit_log_jabatan($id_jabatan) {
        $query = $this->m_pegawai->edit_log_jabatan($id_jabatan);
        $query2 = $this->m_pegawai->get_jabatan();
        $query3 = $this->m_pegawai->get_unit();

        $this->load->view("form/v_form_edit_jabatan", array('query' => $query, 'query2' => $query2, 'query3' => $query3));
    }

    public function edit_log_pangkat($id_kepangkatan) {
        $query = $this->m_pegawai->edit_log_pangkat($id_kepangkatan);
        $query2 = $this->m_pegawai->get_golongan();

        $this->load->view("form/v_form_edit_pangkat",array('query'=>$query, 'query2'=>$query2));
    }

    public function edit_log_pendidikan($id_pendidikan) {
        $query = $this->m_pegawai->edit_log_pendidikan($id_pendidikan);

        $this->load->view("form/v_form_edit_pendidikan", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_diklat_struktural($id_diklat) {
        $query = $this->m_pegawai->edit_log_diklat($id_diklat);
        $query2 = $this->m_pegawai->get_diklat_struktural();

        $this->load->view("form/v_form_edit_diklat_struktural", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_diklat_fungsional($id_diklat) {
        $query = $this->m_pegawai->edit_log_diklat($id_diklat);
        $query2 = $this->m_pegawai->get_diklat_fungsional();

        $this->load->view("form/v_form_edit_diklat_fungsional", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_diklat_teknis($id_diklat) {
        $query = $this->m_pegawai->edit_log_diklat($id_diklat);

        $this->load->view("form/v_form_edit_diklat_teknis", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_toefl($id_pendidikan) {
        $query = $this->m_pegawai->edit_log_toefl($id_pendidikan);

        $this->load->view("form/v_form_edit_toefl", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_penugasan($id_penugasan) {
        $query = $this->m_pegawai->edit_log_penugasan($id_penugasan);
        $query2 = $this->m_pegawai->get_jenis_penugasan();

        $this->load->view("form/v_form_edit_penugasan", array('query' => $query, 'query2' => $query2));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_seminar($id_penugasan) {
        $query = $this->m_pegawai->edit_log_seminar($id_penugasan);

        $this->load->view("form/v_form_edit_seminar", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_organisasi($id_organisasi) {
        $query = $this->m_pegawai->edit_log_organisasi($id_organisasi);

        $this->load->view("form/v_form_edit_organisasi", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_alamat($id_alamat) {
        $query = $this->m_pegawai->edit_log_alamat($id_alamat);

        $this->load->view("form/v_form_edit_alamat", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_pasangan($id_pasangan) {
        $query = $this->m_pegawai->edit_log_pasangan($id_pasangan);

        $this->load->view("form/v_form_edit_pasangan", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_anak($id_ak) {
        $query = $this->m_pegawai->edit_log_ak($id_ak);

        $this->load->view("form/v_form_edit_anak", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_saudara($id_ak) {
        $query = $this->m_pegawai->edit_log_ak($id_ak);

        $this->load->view("form/v_form_edit_saudara", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_orangtua($id_ak) {
        $query = $this->m_pegawai->edit_log_ak($id_ak);

        $this->load->view("form/v_form_edit_orangtua", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_gaji_berkala($id_kepangkatan) {
        $query = $this->m_pegawai->edit_log_pangkat($id_kepangkatan);

        $this->load->view("form/v_form_edit_gaji_berkala", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_penghargaan($id_penghargaan) {
        $query = $this->m_pegawai->edit_log_penghargaan($id_penghargaan);

        $this->load->view("form/v_form_edit_tanda_jasa", array('query' => $query));
        $this->load->view("laman/v_footer");
    }

    public function edit_log_medis($id_medis) {
        $query = $this->m_pegawai->edit_log_medis($id_medis);

        $this->load->view("form/v_form_edit_medis", array('query' => $query));
    }

    //proses edit

    public function proses_edit_log_jabatan() {
        $id_jabatan = $this->input->post('id_jabatan', true);
        $aktif = $this->input->post('aktif', true);
        $jabatan = $this->input->post('jabatan', true);
        $unit_kerja = $this->input->post('unit_kerja', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tmt = $this->input->post('tmt', true);

        $nip = $this->input->post('nip', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_jabatan($id_jabatan, $aktif, $jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_pangkat() {
        $id_kepangkatan = $this->input->post('id_kepangkatan', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $golongan = $this->input->post('golongan', true);
        $jenis_kenaikan = $this->input->post('jenis_kenaikan', true);
        $tmt = $this->input->post('tmt', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('masa_kerja', true);
        $bulan = $this->input->post('bulan', true);
        $gaji = $this->input->post('gaji', true);
        $peraturan = $this->input->post('peraturan', true);
        $keterangan = $this->input->post('keterangan', true);

        $masa_kerja = (($tahun * 12) + $bulan);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_pangkat($id_kepangkatan, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_pendidikan() {
        $id_pendidikan = $this->input->post('id_pendidikan', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $tingkat = $this->input->post('tingkat', true);
        $nama_sekolah = $this->input->post('nama_sekolah', true);
        $lokasi = $this->input->post('lokasi', true);
        $fakultas = $this->input->post('fakultas', true);
        $jurusan = $this->input->post('jurusan', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $ipk = $this->input->post('ipk', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_pendidikan($id_pendidikan, $aktif, $tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah, $ipk);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_diklat() {
        $id_diklat = $this->input->post('id_diklat', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $instansi = $this->input->post('instansi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        $angkatan = $this->input->post('angkatan', true);
        $rangking = $this->input->post('rangking', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_diklat($id_diklat, $aktif, $jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_diklat_teknis() {
        $id_diklat = $this->input->post('id_diklat', TRUE);
        $nip = $this->input->post('nip', true);
        $nama_diklat = $this->input->post('nama_diklat', true);
        $instansi = $this->input->post('instansi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_diklat_teknis($id_diklat, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_toefl() {
        $id_pendidikan = $this->input->post('id_pendidikan', TRUE);
        $nip = $this->input->post('nip', true);
        $aktif = $this->input->post('aktif', true);
        $jenis = $this->input->post('jenis', true);
        $tahun = $this->input->post('tahun', true);
        $instansi = $this->input->post('instansi', true);
        $no_sertifikat = $this->input->post('no_sertifikat', true);
        $tanggal_sertifikat = $this->input->post('tanggal_sertifikat', true);
        $nilai = $this->input->post('nilai', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_toefl($id_pendidikan, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_penugasan() {
        $id_penugasan = $this->input->post('id_penugasan', TRUE);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $lokasi = $this->input->post('lokasi', true);
        $no_sk = $this->input->post('no_sk', true);
        $tgl_sk = $this->input->post('tanggal_sk', true);
        $tujuan = $this->input->post('tujuan', true);
        $biaya = $this->input->post('biaya', true);
        $lama = $this->input->post('lama', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_penugasan($id_penugasan, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_seminar() {
        $id_penugasan = $this->input->post('id_penugasan', TRUE);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $peranan = $this->input->post('peranan', true);
        $instansi = $this->input->post('instansi', true);
        $lokasi = $this->input->post('lokasi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tgl_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_seminar($id_penugasan, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_organisasi() {
        $id_organisasi = $this->input->post('id_organisasi', TRUE);
        $nip = $this->input->post('nip', true);
        $kd_stat_organisasi = $this->input->post('kd_stat_organisasi', true);
        $nama_organisasi = $this->input->post('nama_organisasi', true);
        $jabatan = $this->input->post('jabatan', true);
        $tahun = $this->input->post('tahun', true);
        ;
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_organisasi($id_organisasi, $kd_stat_organisasi, $nama_organisasi, $jabatan, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_alamat() {
        $id_alamat = $this->input->post('id_alamat', TRUE);
        $nip = $this->input->post('nip', true);
        $aktif = $this->input->post('aktif', true);
        $alamat = $this->input->post('alamat', true);
        $provinsi = $this->input->post('provinsi', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $kelurahan = $this->input->post('kelurahan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kode_pos = $this->input->post('kode_pos', true);
        $telepon = $this->input->post('telepon', true);
        $fax = $this->input->post('fax', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_alamat($id_alamat, $aktif, $alamat, $provinsi, $kabupaten, $kelurahan, $kecamatan, $kode_pos, $telepon, $fax, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_pasangan() {
        $id_pasangan = $this->input->post('id_pasangan', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tanggal_nikah = $this->input->post('tanggal_nikah', true);
        $no_kariskarsu = $this->input->post('no_kariskarsu', true);
        $tanggal_kariskarsu = $this->input->post('tanggal_kariskarsu', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_pasangan($id_pasangan, $status, $nama, $tanggal_lahir, $tempat_lahir, $tanggal_nikah, $no_kariskarsu, $tanggal_kariskarsu, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_ak() {
        $id_ak = $this->input->post('id_ak', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_ak($id_ak, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    ///BELUM
    public function proses_edit_log_gaji_berkala() {
        $id_pegawai = $this->input->post('id_kepangkatan', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $tmt = $this->input->post('tmt', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('masa_kerja', true);
        $bulan = $this->input->post('bulan', true);
        $gaji = $this->input->post('gaji', true);
        $keterangan = $this->input->post('keterangan', true);

        $masa_kerja = (($tahun * 12) + $bulan);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_edit_log_penghargaan() {
        $id_penghargaan = $this->input->post('id_penghargaan', TRUE);
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $instansi = $this->input->post('instansi', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);

        $this->m_pegawai->update_log_penghargaan($id_penghargaan, $nama, $instansi, $no_sk, $tanggal_sk, $tahun, $keterangan);
        redirect('pegawai/biodata/' . $nip);
    }

    public function proses_edit_log_medis() {
        $id_medis = $this->input->post('id_medis', TRUE);
        $nip = $this->input->post('nip', true);
        $indikasi = $this->input->post('indikasi', true);
        $tindakan = $this->input->post('tindakan', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->update_log_medis($id_medis, $indikasi, $tindakan, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    //============================================================================================//

    public function pegawai_pensiun() {
        if ($this->session->userdata('role') == 1) {
            $this->usiaPensiun();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
//PROSES INSERT    
    public function input_pegawai() {
        $config['upload_path'] = './././assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';
		
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }else{
                $data = array('upload_data' => $this->upload->data());
                $temp_file = $this->upload->data();

                $data2['judul'] = $this->input->post('judul', true);
                $data2['id_kategori'] = $this->input->post('id_kategori', true);
                $data2['detail'] = $this->input->post('detail', true);
                $data2['harga'] = $this->input->post('harga', true);
                $data2['status'] = 1;

                $data2['id_penjual'] = $this->session->userdata('id_penjual');
                $data2['photo1'] =  "images/".$temp_file['file_name'];

                $this->model_iklan->insert_iklan($data2);

                //$this->load->view('menu');

                $this->iklan_all();
        }
        
        
        $nip = $this->input->post('nip', true);
        $nip_lama = $this->input->post('nip_lama', true);
        $gelar_depan = $this->input->post('gelar_depan', true);
        $nama_pegawai = $this->input->post('nama_pegawai', true);
        $gelar_belakang = $this->input->post('gelar_belakang', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $alamat = $this->input->post('alamat', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kelurahan = $this->input->post('kelurahan', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $provinsi = $this->input->post('provinsi', true);
        $tmt_cpns = $this->input->post('tmt_cpns', true);
        $tmt_pns = $this->input->post('tmt_pns', true);
        $agama = $this->input->post('agama', true);
        $status_perkawinan = $this->input->post('status_perkawinan', true);
        $status_pegawai = $this->input->post('status_pegawai', true);
        $foto = $this->input->post('foto', true);
        $keterangan = $this->input->post('keterangan', true);
        $jabatan = $this->input->post('jabatan', true);
        $unit_kerja = $this->input->post('unit_kerja', true);
        $golongan = $this->input->post('golongan', true);

        $pendidikan = $this->input->post('pendidikan', true);
        $nama_sekolah = $this->input->post('nama_sekolah', true);


        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_pegawai(
                    $nip, $nip_lama, $gelar_depan, $nama_pegawai, $gelar_belakang, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $kecamatan, $kelurahan, $kabupaten, $provinsi, $tmt_cpns, $tmt_pns, $agama, $status_perkawinan, $status_pegawai, $foto, $keterangan, $jabatan, $unit_kerja, $golongan, $jenis_kenaikan, $gaji, $pendidikan, $nama_sekolah
            );
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_data_tambahan() {
        $id_pegawai = $this->input->post('id_pegawai', true);
        $nip = $this->input->post('nip', true);
        $no_kartu_pegawai = $this->input->post('no_kartu_pegawai', true);
        $tanggal_kartu_pegawai = $this->input->post('tanggal_kartu_pegawai', true);
        $no_ktp = $this->input->post('no_ktp', true);
        $npwp = $this->input->post('npwp', true);
        $no_askes = $this->input->post('no_askes', true);
        $tanggal_askes = $this->input->post('tanggal_askes', true);
        $kode_wilayah_askes = $this->input->post('kode_wilayah_askes', true);
        $no_handphone = $this->input->post('no_handphone', true);
        $email = $this->input->post('email', true);
        $golongan_darah = $this->input->post('golongan_darah', true);
        $rambut = $this->input->post('rambut', true);
        $bentuk_muka = $this->input->post('bentuk_muka', true);
        $warna_kulit = $this->input->post('warna_kulit', true);
        $tinggi_badan = $this->input->post('tinggi_badan', true);
        $berat_badan = $this->input->post('berat_badan', true);
        $ciri_khas = $this->input->post('ciri_khas', true);
        $cacat_tubuh = $this->input->post('cacat_tubuh', true);
        $bahasa_asing = $this->input->post('bahasa_asing', true);
        $hobi = $this->input->post('hobi', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_data_tambahan($id_pegawai, $no_kartu_pegawai, $tanggal_kartu_pegawai, $no_ktp, $npwp, $no_askes, $tanggal_askes, $kode_wilayah_askes, $no_handphone, $email, $golongan_darah, $rambut, $bentuk_muka, $warna_kulit, $tinggi_badan, $berat_badan, $ciri_khas, $cacat_tubuh, $bahasa_asing, $hobi);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_jabatan() {
        $id_pegawai = $this->input->post('id_pegawai', true);
        $aktif = $this->input->post('aktif', true);
        $jabatan = $this->input->post('jabatan', true);
        $unit_kerja = $this->input->post('unit_kerja', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tmt = $this->input->post('tmt', true);
        $nip = $this->input->post('nip', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_jabatan($id_pegawai, $aktif, $jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_pangkat() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $golongan = $this->input->post('golongan', true);
        $jenis_kenaikan = $this->input->post('jenis_kenaikan', true);
        $tmt = $this->input->post('tmt', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('masa_kerja', true);
        $bulan = $this->input->post('bulan', true);
        $gaji = $this->input->post('gaji', true);
        $peraturan = $this->input->post('peraturan', true);
        $keterangan = $this->input->post('keterangan', true);

        $masa_kerja = (($tahun * 12) + $bulan);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_pangkat($id_pegawai, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_pendidikan() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $tingkat = $this->input->post('tingkat', true);
        $nama_sekolah = $this->input->post('nama_sekolah', true);
        $lokasi = $this->input->post('lokasi', true);
        $fakultas = $this->input->post('fakultas', true);
        $jurusan = $this->input->post('jurusan', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $ipk = $this->input->post('ipk', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_pendidikan($id_pegawai, $aktif, $tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah, $ipk);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_diklat_struktural() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $instansi = $this->input->post('instansi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        $angkatan = $this->input->post('angkatan', true);
        $rangking = $this->input->post('rangking', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_diklat_struktural($id_pegawai, $aktif, $jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_diklat_fungsional() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $aktif = $this->input->post('aktif', true);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $nama_diklat = $this->input->post('nama_diklat', true);
        $instansi = $this->input->post('instansi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        $angkatan = $this->input->post('angkatan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_diklat_fungsional($id_pegawai, $aktif, $jenis, $nama_diklat, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_diklat_teknis() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $nama_diklat = $this->input->post('nama_diklat', true);
        $instansi = $this->input->post('instansi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tanggal_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_diklat_teknis($id_pegawai, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_toefl() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $aktif = $this->input->post('aktif', true);
        $jenis = $this->input->post('jenis', true);
        $tahun = $this->input->post('tahun', true);
        $instansi = $this->input->post('instansi', true);
        $no_sertifikat = $this->input->post('no_sertifikat', true);
        $tanggal_sertifikat = $this->input->post('tanggal_sertifikat', true);
        $nilai = $this->input->post('nilai', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_toefl($id_pegawai, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_penugasan() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $lokasi = $this->input->post('lokasi', true);
        $no_sk = $this->input->post('no_sk', true);
        $tgl_sk = $this->input->post('tanggal_sk', true);
        $tujuan = $this->input->post('tujuan', true);
        $biaya = $this->input->post('biaya', true);
        $lama = $this->input->post('lama', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_penugasan($id_pegawai, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_seminar() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $jenis = $this->input->post('jenis', true);
        $peranan = $this->input->post('peranan', true);
        $instansi = $this->input->post('instansi', true);
        $lokasi = $this->input->post('lokasi', true);
        $no_ijazah = $this->input->post('no_ijazah', true);
        $tgl_ijazah = $this->input->post('tanggal_ijazah', true);
        $lama = $this->input->post('lama', true);
        $tanggal_mulai = $this->input->post('tanggal_mulai', true);
        $tanggal_selesai = $this->input->post('tanggal_selesai', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_seminar($id_pegawai, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_organisasi() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $kd_stat_organisasi = $this->input->post('kd_stat_organisasi', true);
        $nama_organisasi = $this->input->post('nama_organisasi', true);
        $jabatan = $this->input->post('jabatan', true);
        $tahun = $this->input->post('tahun', true);
        ;
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_organisasi($id_pegawai, $kd_stat_organisasi, $nama_organisasi, $jabatan, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_alamat() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $aktif = $this->input->post('aktif', true);
        $alamat = $this->input->post('alamat', true);
        $provinsi = $this->input->post('provinsi', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $kelurahan = $this->input->post('kelurahan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kode_pos = $this->input->post('kode_pos', true);
        $telepon = $this->input->post('telepon', true);
        $fax = $this->input->post('fax', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_alamat($id_pegawai, $aktif, $alamat, $provinsi, $kabupaten, $kelurahan, $kecamatan, $kode_pos, $telepon, $fax, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_pasangan() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tanggal_nikah = $this->input->post('tanggal_nikah', true);
        $no_kariskarsu = $this->input->post('no_kariskarsu', true);
        $tanggal_kariskarsu = $this->input->post('tanggal_kariskarsu', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_pasangan($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $tanggal_nikah, $no_kariskarsu, $tanggal_kariskarsu, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_anak() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_anak($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_saudara() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_saudara($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_orangtua() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $nama = $this->input->post('nama', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $keterangan = $this->input->post('keterangan', true);

        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_orangtua($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_gaji_berkala() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $status = $this->input->post('status', true);
        $tmt = $this->input->post('tmt', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('masa_kerja', true);
        $bulan = $this->input->post('bulan', true);
        $gaji = $this->input->post('gaji', true);
        $keterangan = $this->input->post('keterangan', true);

        $masa_kerja = (($tahun * 12) + $bulan);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_penghargaan() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $instansi = $this->input->post('instansi', true);
        $no_sk = $this->input->post('no_sk', true);
        $tanggal_sk = $this->input->post('tanggal_sk', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_penghargaan($id_pegawai, $nama, $instansi, $no_sk, $tanggal_sk, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function proses_insert_log_medis() {
        $id_pegawai = $this->input->post('id_pegawai', TRUE);
        $nip = $this->input->post('nip', true);
        $indikasi = $this->input->post('indikasi', true);
        $tindakan = $this->input->post('tindakan', true);
        $tahun = $this->input->post('tahun', true);
        $keterangan = $this->input->post('keterangan', true);
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->insert_log_medis($id_pegawai, $indikasi, $tindakan, $tahun, $keterangan);
            redirect('pegawai/biodata/' . $nip);
        } else {
            
        }
    }

    public function delete_log_jabatan($id_jabatan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_jabatan($id_jabatan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_pangkat($id_kepangkatan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_pangkat($id_kepangkatan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_pendidikan($id_pendidikan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_pendidikan($id_pendidikan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_diklat($id_diklat, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_diklat($id_diklat);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_penugasan($id_penugasan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_penugasan($id_penugasan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_organisasi($id_organisasi, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_organisasi($id_organisasi);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_alamat($id_alamat, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_alamat($id_alamat);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_pasangan($id_pasangan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_pasangan($id_pasangan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_ak($id_ak, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_ak($id_ak);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_penghargaan($id_log_penghargaan, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_penghargaan($id_log_penghargaan);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_log_medis($id_medis, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_medis($id_medis);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

    public function delete_pegawai($id_pegawai, $nip) {
        if ($this->session->userdata('role') == 1) {
            $this->m_pegawai->delete_log_medis($id_pegawai);
            redirect('pegawai/biodata/' . $nip, 'refresh');
        } else {
            
        }
    }

//    program
    public function input_nilai($nama) {
        $nama_pegawai = str_replace("_", " ", $nama);
        $query1 = $this->m_pegawai->get_pegawai($nama_pegawai);
        $query2 = $this->m_pegawai->get_periode();

        $cek_penilaian = $this->m_pegawai->cekPenilaian($nama_pegawai, $query2);

        $this->load->view("admin/v_input_nilai", array('biodata' => $query1, 'periode' => $query2, 'nama' => $nama_pegawai, 'cek' => $cek_penilaian));
        $this->load->view("admin/v_footer");
    }

    public function allpegawai() {
        $query = $this->m_pegawai->get_all_pegawai();
        $this->load->view("tabel/v_table_semua_pegawai_admin", array('query' => $query));
    }

    public function info_pegawai($nip) {
        /* biodata pegawai */
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_log_jabatan($nip);
        $query3 = $this->m_pegawai->get_log_kepangkatan($nip);
        $query4 = $this->m_pegawai->get_log_pendidikan($nip);
        $query5 = $this->m_pegawai->get_log_diklat_struktural($nip);
        $query6 = $this->m_pegawai->get_log_diklat_fungsional($nip);
        $query7 = $this->m_pegawai->get_log_diklat_teknis($nip);
        $query8 = $this->m_pegawai->get_log_toefl($nip);
        $query9 = $this->m_pegawai->get_log_penugasan($nip);
        $query10 = $this->m_pegawai->get_log_seminar($nip);
        $query11 = $this->m_pegawai->get_log_organisasi($nip);
        $query12 = $this->m_pegawai->get_log_alamat($nip);
        $query13 = $this->m_pegawai->get_log_pasangan($nip);
        $query14 = $this->m_pegawai->get_log_anak($nip);
        $query15 = $this->m_pegawai->get_log_saudara($nip);
        $query16 = $this->m_pegawai->get_log_orang_tua($nip);
        $query17 = $this->m_pegawai->get_log_medis($nip);
        $query18 = $this->m_pegawai->get_log_penghargaan($nip);

        $this->load->view("grafik/v_chart_satu_pegawai", array('query' => $query, 'query2' => $query2, 'query3' => $query3, 'query4' => $query4, 'query5' => $query5, 'query6' => $query6,
            'query7' => $query7, 'query8' => $query8, 'query9' => $query9, 'query10' => $query10, 'query11' => $query11,
            'query12' => $query12, 'query13' => $query13, 'query14' => $query14, 'query15' => $query15, 'query16' => $query16, 'query17' => $query17, 'query18' => $query18));
    }

//notifikasi

    public function usiaPensiun() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_pegawai->get_pensiun();
            $title = "PENSIUN";
            $this->load->view("tabel/v_table_peringatan", array('query' => $query, 'title' => $title));
        } else {
            redirect('./pegawai');
        }
    }

    public function kenaikanGajiBerkala() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_pegawai->get_kgb();
            $title = "KENAIKAN GAJI BERKALA";

            $this->load->view("tabel/v_table_kgb", array('query' => $query, 'title' => $title));
        } else {
            redirect('./pegawai');
        }
    }

    //belum
    public function kenaikanPangkat() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_pegawai->get_kp();
            $title = "KENAIKAN PANGKAT";


            $this->load->view("tabel/v_table_naikpangkat", array('query' => $query, 'title' => $title));
        } else {
            redirect('./pegawai');
        }
    }

    public function persetujuan() {
        if ($this->session->userdata('role') == 1) {

            $doc = new DOMDocument();
            $doc->load('xml/coba.xml'); //xml file loading here

            $employees = $doc->getElementsByTagName("employee");
            foreach ($employees as $employee) {
                $names = $employee->getElementsByTagName("name");
                $name = $names->item(0)->nodeValue;

                $ages = $employee->getElementsByTagName("age");
                $age = $ages->item(0)->nodeValue;

                $salaries = $employee->getElementsByTagName("salary");
                $salary = $salaries->item(0)->nodeValue;

                echo "<b>$name - $age - $salary\n</b><br>";
            }
        } else {
            redirect('./pegawai');
        }
    }

    public function DUK() {
        $query = $this->m_pegawai->get_duk();
        $title = "DAFTAR URUT KEPANGKATAN PEGAWAI NEGERI SIPIL PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN";
        $this->load->view("tabel/v_table_cetak", array('query' => $query, 'title' => $title, 'link' => "DUK"));
    }

    public function cetak_DUK() {
        $query = $this->m_pegawai->get_duk();
        echo"<html
            xmlns:o='urn:schemas-microsoft-com:office:office'
            xmlns:w='urn:schemas-microsoft-com:office:word'
            xmlns='http://www.w3.org/TR/REC-html40'>
            <head>
                <title>DUP PPSDMK</title>
                <!--[if gte mso 9]-->
                <xml>
                    <w:WordDocument>
                        <w:View>Print</w:View>
                        <w:Zoom>90</w:Zoom>
                        <w:DoNotOptimizeForBrowser/>
                    </w:WordDocument>
                </xml>
                <!-- [endif]-->
                <style>
                    p.MsoFooter, li.MsoFooter, div.MsoFooter{
                        margin: 0cm;
                        margin-bottom: 0001pt;
                        mso-pagination:widow-orphan;
                        font-size: 12.0 pt;
                        text-align: right;
                    }


                    @page Section1{
                        size: 29.7cm 21cm;
                        margin: 2cm 1cm 2cm 1cm;
                        mso-page-orientation: landscape;
                        mso-footer:f1;
                    }
                    div.Section1 { page:Section1;}
                </style>
            </head>
            <body>
                <div class='Section1'>
                    <center><h2>DAFTAR URUT KEPANGKATAN PEGAWAI NEGERI SIPIL<br>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN</h2></center><br />
                    <table border='1'>
                        <tr class='head-archive'>
                            <th>NO</th>
                            <th>NAMA / NIP</th>
                            <th>PANGKAT / GOLONGAN</th>
                            <th>TMT PANGKAT</th>
                            <th>JABATAN</th>
                            <th>TMT JABATAN</th>
                            <th>TGL_LAHIR</th>
                            <th>KET.</th>
                        </tr>
                        </thead>
                        <tbody>";
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DUK PPSDMK.doc");
        header("Content-Disposition: attachment;Filename=DSP PPSDMK.doc");
        $no = 1;
        foreach ($query as $q) {
            $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
            echo "<tr>
                            <td>$no</td>
                            <td>$nama /<br>$q->NIP</td>
                            <td>$q->NAMA_PANGKAT / $q->GOLONGAN</td>
                            <td>$q->TMT_GOLONGAN</td>
                            <td>$q->JABATAN</td>
                            <td>$q->TMT_JABATAN</td>
                            <td>$q->TGL_LAHIR</td>
                            <td></td>
                        </tr>";
            $no++;
        }
        echo"</tbody>
                    </table>
                    <br clear=all style='mso-special-character:line-break;' />
                </body>
            </html>";
    }

    public function DSP() {
        $query = $this->m_pegawai->get_dsp();
        $title = "DAFTAR SEMUA PEGAWAI NEGERI SIPIL PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN";
        $this->load->view("tabel/v_table_cetak", array('query' => $query, 'title' => $title, 'link' => "DSP"));
    }

    public function cetak_DSP() {
        $query = $this->m_pegawai->get_dsp();
        echo"<html
            xmlns:o='urn:schemas-microsoft-com:office:office'
            xmlns:w='urn:schemas-microsoft-com:office:word'
            xmlns='http://www.w3.org/TR/REC-html40'>
            <head>
                <title>DUP PPSDMK</title>
                <!--[if gte mso 9]-->
                <xml>
                    <w:WordDocument>
                        <w:View>Print</w:View>
                        <w:Zoom>90</w:Zoom>
                        <w:DoNotOptimizeForBrowser/>
                    </w:WordDocument>
                </xml>
                <!-- [endif]-->
                <style>
                    p.MsoFooter, li.MsoFooter, div.MsoFooter{
                        margin: 0cm;
                        margin-bottom: 0001pt;
                        mso-pagination:widow-orphan;
                        font-size: 12.0 pt;
                        text-align: right;
                    }


                    @page Section1{
                        size: 29.7cm 21cm;
                        margin: 2cm 1cm 2cm 1cm;
                        mso-page-orientation: landscape;
                        mso-footer:f1;
                    }
                    div.Section1 { page:Section1;}
                </style>
            </head>
            <body>
                <div class='Section1'>
                    <center><h2>DAFTAR SELURUH PEGAWAI NEGERI SIPIL<br>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN</h2></center><br />
                    <table border=1>
                        
                        <tbody>";
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DSP PPSDMK.doc");
        $no = 1;
        $bagian = '';
        foreach ($query as $q) {
            $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
            if ($bagian != $q->BAGIAN && $no > 1) {
                echo "<tr><td colspan='5'><b>$q->NAMA_UNIT</b></tr>";
            }

            echo "<tr>";
            if ($q->BAGIAN > 0) {
                if ($q->LEVEL > 1) {
                    echo "<td colspan=$q->LEVEL></td>
                    <td>$q->JABATAN</td>
                    <td>$nama /<br>$q->NIP</td>";
                    if ($q->LEVEL == 2) {
                        echo "<td ></td>";
                    }
                } else {
                    echo "<td colspan=1></td>
                    <td>$q->JABATAN</td>
                    <td>$nama /<br>$q->NIP</td>
                    <td colspan=2></td>";
                }
            } else {
                echo "
                 <td colspan=3>$q->JABATAN</td>
                 <td>$nama /<br>$q->NIP</td>
                 <td></td>";
            }
            echo "</tr>";
            /*
              echo "<tr>
              <td>$no</td>
              <td colspan=$q->LEVEL>$nama /<br>$q->NIP</td>
              <td>$q->NAMA_PANGKAT / $q->GOLONGAN</td>
              <td>$q->JABATAN</td>
              <td>$q->BAGIAN</td>
              <td>$q->SUBBAGIAN</td>
              <td>$q->LEVEL</td>
              <td></td>
              </tr>";
             * 
             */
            $no++;
            $bagian = $q->BAGIAN;
        }
        echo"</tbody>
                    </table>
                    <br clear=all style='mso-special-character:line-break;' />
                </body>
            </html>";
    }

    public function developer() {
        $this->load->view("laman/v_developer");
    }

    public function ubah_akun() {
        $nip = $this->input->post('nip', true);
        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        $password_konfirmasi = $this->input->post('password_konfirmasi', true);

        $query = $this->m_pegawai->get_password($nip);
        foreach ($query as $q) {
            $password = $q->password;
        }

        if ($password == $password_lama) {
            if ($password_baru == $password_konfirmasi) {
                $this->m_pegawai->ubah_akun($nip, $password_baru);
            } else {
                echo "password tidak sama";
            }
        } else {
            echo "salah password lama";
        }
    }

    public function header_admin($nip) {
        $query = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header', array('query' => $query));
    }

    public function header_pegawai($nip) {
        $query = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header', array('query' => $query));
    }

}
