<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->view('laman/v_header');
    }

    public function index() {
    }
    
//    method halaman
    public function seluruh_pegawai(){
        $this->allpegawai();
        $this->load->view("laman/v_footer");
    }
    
    public function biodata($nama_pegawai){
        $this->info_pegawai($nama_pegawai);
        $this->load->view("laman/v_footer");
    }
    
    public function pengaturan_akun(){
        $this->load->view('form/v_akun');
        $this->load->view('laman/v_footer');
    }
        
    public function persetujuan(){
        
        $this->load->view('laman/v_footer');
    }
    
    public function kenaikan_pangkat(){
        
        $this->load->view('laman/v_footer');
    }
    
    public function gaji_berkala(){
        
        $this->load->view('laman/v_footer');
    }
        
    public function input_biodata() {

        $this->load->view("form/v_form_biodata");
        $this->load->view("laman/v_footer");
    }
    
    public function ubah_biodata() {

        $this->load->view("form/v_form_biodata");
        $this->load->view("laman/v_footer");
    }
    
    public function pegawai_pensiun(){
        
        $this->load->view('laman/v_footer');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
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
     
    public function info_pegawai($nama_pegawai) {
        $nama = str_replace("_", " ", $nama_pegawai);

        /* Untuk grafik semua periode pegawai */
        $query = $this->m_nilai->grafikPeriodePegawai($nama);

        $nama_periode = array();
        $tgl_periode = array();
        $nilai1 = array();
        foreach ($query as $q) {
            $nama_periode[] = $q->nama_periode;
            $tgl_periode[] = $q->tanggal_periode;
            $nilai1[] = !empty($q->nilai_total) ? $q->nilai_total : '0';
        }

        /* biodata pegawai */
        $query1 = $this->m_nilai->get_pegawai($nama);

        /* mendapatkan gaji pegawai */
        $nama_divisi = "";
        $gaji = 0;
        foreach ($query1 as $row) {
            $nama_divisi = $row->NAMA_DIVISI;
            $gaji = $row->GAJI_POKOK;
        }


        /* Untuk di spyder chart */
        $periode = $this->uri->segment(4);
        $query2 = $this->m_nilai->nilaiPeriode($periode, $nama);
        $subkriteria = array();
        $nilai = array();
        foreach ($query2 as $q) {
            $subkriteria[] = $q->subkriteria;
            $nilai[] = $q->nilai;
        }

        $periode_skrng = $this->m_nilai->getPeriode();
        /* Menampilkan Rekomendasi yang telah dipilih */
        $nilai_AHP = 0;
        $hasil = "";
        $rekomendasi = $this->m_nilai->getRekomendasi($nama, $periode);
        foreach ($rekomendasi as $q) {
            $hasil = !empty($q->pilihan_rekomendasi) ? $q->pilihan_rekomendasi : "kosong";
            $nilai_AHP = $q->NILAI_TOTAL;
        }

        /* rasio baik dan buruk di satu divisi */

        $id = 0;
        if ($nama_divisi == "DIVISI MARKETING") {
            $id = 1;
        } else if ($nama_divisi == "DIVISI HRD") {
            $id = 2;
        } else if ($nama_divisi == "DIVISI FINANSIAL") {
            $id = 3;
        } else if ($nama_divisi == "DIVISI OPERASIONAL") {
            $id = 4;
        } else if ($nama_divisi == "DIVISI IT") {
            $id = 5;
        }

        $query4 = $this->m_nilai->grafikPegawaiDivisi($id);
        $jumlah_baik = 0;
        $jumlah_jahat = 0;
        foreach ($query4 as $q) {
            if ($q->rerata == null || $q->rerata <= 50) {
                $jumlah_jahat++;
            } else {
                $jumlah_baik++;
            }
        }
        $rasio = $jumlah_jahat / ($jumlah_jahat + $jumlah_baik) * 100;

        $pilihan1 = $nilai_AHP / 100 * $gaji;
        $pilihan1 = $pilihan1 * 0.3;
        $pilihan1 = ceil($pilihan1);
        $pilihan2 = $pilihan1 - ($pilihan1 * $rasio / 100);
        $pilihan2 = ceil($pilihan2);
        $pilihan3 = $pilihan2 - ($pilihan2 * 0.2); // 20%
        $pilihan3 = ceil($pilihan3);
        //$pilihan1 = $nilai_AHP;

        $this->load->view("grafik/v_chart_satu_pegawai", array('title' => $nama, 'tgl' => $tgl_periode, 'nilai' => $nilai, 'nilai1' => $nilai1, 'biodata' => $query1, 'subkriteria' => $subkriteria, 'nilai' => $nilai, 'periode' => $periode, 'periode_skrng' => $periode_skrng));

        //$this->load->view("v_table_satu_pegawai", array('title' => $nama, 'query' => $query, 'title' => $nama, 'periode' => $periode, 'rekomendasi' => $hasil, 'pilihan1' => $pilihan1, 'pilihan2' => $pilihan2, 'pilihan3' => $pilihan3, 'nilai1' => $nilai1));
     }

     
}
