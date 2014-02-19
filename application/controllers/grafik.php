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
            $bagian[] = $q->NAMA_UNIT;
            $jml_peg[] = $q->JUMLAH;
        }

        $data['nilai'] = $this->m_nilai->grafikDivisi();

        $this->load->view("grafik/v_chart_semua_divisi", array('nama_bagian' => $bagian, 'jumlah_pegawai' => $jml_peg));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function perbagian($nama_bagian) {
        $id = 0;
        if ($nama_bagian == "tata_usaha") {
            $id = 1;
            $nama_bagian = "BAGIAN TATA USAHA";
        } else if ($nama_bagian == "program_dan_kerjasama") {
            $id = 2;
            $nama_bagian = "BAGIAN PROGRAM DAN KERJASAMA";
        } else if ($nama_bagian == "pengembangan_kompetensi_dan_kemetrologian") {
            $id = 3;
            $nama_bagian = "BAGIAN PENGEMBNGAN KOMPETENSI DAN KEMETROLOGIAN";
        }else{
            header("HTTP/1.1 404 Not Found");
        }
        $title=$nama_bagian;
        $query = $this->m_nilai->grafikPegawaiDivisi($id);
        $query1 = $this->m_nilai->tabelPegawaiDivisi($id);
        
        $jabatan[] ='';
        $jumlah[] ='';
        foreach ($query as $q) {
            $jabatan[]=$q->JABATAN;
            $jumlah[]=$q->JUMLAH;
        }
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jabatan' => $jabatan, 'jml' => $jumlah));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

}
