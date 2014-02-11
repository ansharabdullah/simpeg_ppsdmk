<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class grafik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->view('laman/v_header');
    }

//    function panggil halaman
    public function index() {
        $this->load->view('laman/v_home');
        $this->load->view('laman/v_footer');
    }

    //bagian
    public function semua_bagian() {

        $this->grafik_bagian_all();
        $this->load->view('laman/v_footer');
    }

    public function bagian($nama_bagian) {
        $this->perbagian($nama_bagian);
        $this->load->view('laman/v_footer');
    }

    //jabatan
    public function semua_jabatan() {

        //$this->grafik_bagian_all();
        $this->load->view('laman/v_footer');
    }

    public function jabatan($param) {

        //
        $this->load->view('laman/v_footer');
    }

    //golongan
    public function semua_golongan() {

        //
        $this->load->view('laman/v_footer');
    }

    public function golongan($param) {

        //
        $this->load->view('laman/v_footer');
    }

    //pendidikan
    public function semua_pendidikan() {

        //
        $this->load->view('laman/v_footer');
    }

    public function pendidikan($param) {

        //
        $this->load->view('laman/v_footer');
    }

    //jenjang umur
    public function semua_jenjang_umur() {

        //
        $this->load->view('laman/v_footer');
    }

    public function jenjang_umur($param) {

        //
        $this->load->view('laman/v_footer');
    }

    //status kepegawaian
    public function semua_status_pegawai() {

        //
        $this->load->view('laman/v_footer');
    }

    public function status_pegawai($param) {

        //
        $this->load->view('laman/v_footer');
    }

//    function program
    public function grafik_bagian_all() {
        $query = $this->m_nilai->grafikDivisi();
        $divisi = array();
        $jml_peg = array();
        $rerata = array();
        foreach ($query as $q) {
            $bagian[] = $q->nama_divisi;
            $jml_peg[] = $q->jml_pegawai;
            $rerata[] = !empty($q->rerata) ? $q->rerata : '0';
        }

        $data['nilai'] = $this->m_nilai->grafikDivisi();

        $this->load->view("grafik/v_chart_semua_divisi", array('divisi' => $bagian, 'jml_peg' => $jml_peg, 'rerata' => $rerata));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function perbagian($nama_bagian) {
        $periode = $this->m_nilai->getPeriode();

        $id = 0;
        if ($nama_bagian == "divisi_marketing") {
            $id = 1;
            $nama_bagian = "Divisi Marketing";
        } else if ($nama_bagian == "divisi_hrd") {
            $id = 2;
            $nama_bagian = "Divisi HRD";
        } else if ($nama_bagian == "divisi_finansial") {
            $id = 3;
            $nama_bagian = "Divisi Finansial";
        } else if ($nama_bagian == "divisi_operasional") {
            $id = 4;
            $nama_bagian = "Divisi Operasional";
        } else if ($nama_bagian == "divisi_it") {
            $id = 5;
            $nama_bagian = "Divisi IT";
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

        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $nama_bagian, 'nama_pegawai' => $nama_pegawai, 'rerata' => $rerata, 'periode' => $periode, 'jumlah_baik' => $jumlah_baik, 'jumlah_jahat' => $jumlah_jahat));
        $this->load->view("tabel/v_table_satu_divisi", array('query' => $query, 'periode' => $periode));
    }

}
