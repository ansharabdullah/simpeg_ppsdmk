<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            redirect(base_url() . "login");
        } else if ($this->session->userdata('user') == "supervisor") {
            redirect(base_url() . "pegawai");
        } else if ($this->session->userdata('user') == "manager") {
            $this->load->view("laman/v_header");
        } else {
            $this->load->view("v_login");
        }
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $query = $this->m_nilai->grafikDivisi();
        $divisi = array();
        $jml_peg = array();
        $rerata = array();
        foreach ($query as $q) {
            $divisi[] = $q->nama_divisi;
            $jml_peg[] = $q->jml_pegawai;
            $rerata[] = !empty($q->rerata) ? $q->rerata : '0';
        }

        $data['nilai'] = $this->m_nilai->grafikDivisi();
        $this->load->view("v_chart_semua_divisi", array('divisi' => $divisi, 'jml_peg' => $jml_peg, 'rerata' => $rerata));
        $this->load->view("v_table_semua_divisi", array('query' => $query));
        $this->load->view("v_footer");
    }

    public function bagian($nama_divisi) {
        $periode = $this->m_nilai->getPeriode();

        $id = 0;
        if ($nama_divisi == "divisi_marketing") {
            $id = 1;
            $nama_divisi = "Divisi Marketing";
        } else if ($nama_divisi == "divisi_hrd") {
            $id = 2;
            $nama_divisi = "Divisi HRD";
        } else if ($nama_divisi == "divisi_finansial") {
            $id = 3;
            $nama_divisi = "Divisi Finansial";
        } else if ($nama_divisi == "divisi_operasional") {
            $id = 4;
            $nama_divisi = "Divisi Operasional";
        } else if ($nama_divisi == "divisi_it") {
            $id = 5;
            $nama_divisi = "Divisi IT";
        }

        $query = $this->m_nilai->grafikPegawaiDivisi($id);
        $nip = array();
        $nama = array();
        $jk = array();
        $rerata = array();
        $jumlah_baik = 0;
        $jumlah_jahat = 0;
        foreach ($query as $q) {
            $nip[] = $q->nip;
            $nama_pegawai[] = $q->nama_pegawai;
            $jk[] = $q->jenis_kelamin;
            //$rerata[] = $q->rerata;
            $rerata[] = !empty($q->rerata) ? $q->rerata : '0';
            if ($q->rerata == null || $q->rerata <= 50) {
                $jumlah_jahat++;
            } else {
                $jumlah_baik++;
            }
        }

        $this->load->view("v_chart_satu_divisi", array('title' => $nama_divisi, 'nama_pegawai' => $nama_pegawai, 'rerata' => $rerata, 'periode' => $periode, 'jumlah_baik' => $jumlah_baik, 'jumlah_jahat' => $jumlah_jahat));
        $this->load->view("v_table_satu_divisi", array('query' => $query, 'periode' => $periode));
        $this->load->view("v_footer");
    }

    public function pegawai($nama_pegawai) {
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
        $this->load->view("laman/v_footer");
    }

    public function allpegawai() {
        $periode_skrng = $this->m_nilai->getPeriode();
        $query = $this->m_nilai->getAllPegawai();
        $this->load->view("v_table_semua_pegawai", array('query' => $query, 'periode' => $periode_skrng));
        $this->load->view("v_footer");
    }

    public function keputusan() {
        $rekomendasi = $this->input->post('rekomendasi');
        $nama = $this->input->post('nama');
        $periode = $this->input->post('periode');
        $this->m_nilai->rekomendasi($rekomendasi, $nama, $periode);

        $nama = str_replace(" ", "_", $nama);
        redirect(base_url() . 'manager/pegawai/' . $nama . '/' . $periode);
    }

}
