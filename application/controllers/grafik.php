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
        $this->grafik_golongan_all();
        $this->load->view('laman/v_footer');
    }

    public function golongan($param) {
        $this->grafik_golongan($param);
        $this->load->view('laman/v_footer');
    }

    //pendidikan
    public function semua_pendidikan() {
        $this->grafik_pendidikan_all();
        $this->load->view('laman/v_footer');
    }

    public function pendidikan($param) {
        $this->grafik_pendidikan($param);
        $this->load->view('laman/v_footer');
    }

    //jenjang umur
    public function semua_jenjang_umur() {
        $this->grafik_umur_all();
        $this->load->view('laman/v_footer');
    }

    public function jenjang_umur($param) {
        $this->grafik_umur($param);
        $this->load->view('laman/v_footer');
    }

    //status kepegawaian
    public function semua_status_pegawai() {
        $this->grafik_status_pegawai_all();
        $this->load->view('laman/v_footer');
    }

    public function status_pegawai($param) {
        $this->grafik_status_pegawai($param);
        $this->load->view('laman/v_footer');
    }

//    function program
    public function grafik_bagian_all() {
        $query = $this->m_grafik->grafikDivisi();
        foreach ($query as $q) {
            $x[] = $q->NAMA_UNIT;
            $y[] = $q->JUMLAH;
        }

        $subtitle = "SEMUA BAGIAN";
        $alamat = "grafik/bagian";
        $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat));
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
            $nama_bagian = "BAGIAN PENGEMBANGAN KOMPETENSI DAN KEMETROLOGIAN";
        } else {
            header("HTTP/1.1 404 Not Found");
        }
        $title = $nama_bagian;
        $query = $this->m_grafik->grafikPegawaiDivisi($id);

        $jabatan[] = '';
        $jumlah[] = '';
        foreach ($query as $q) {
            $jabatan[] = $q->JABATAN;
            $jumlah[] = $q->JUMLAH;
        }
        print_r($jabatan);
        echo '<br>';
        echo '<br>';
        print_r($jumlah);
        $where = "AND J.BAGIAN='$id'";
        $query1 = $this->m_grafik->tabelPegawai($where);
        $subtitle = $title;
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jbtn' => $jabatan, 'jml' => $jumlah, 'subtitle' => $subtitle));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

    public function grafik_golongan_all() {
        $query = $this->m_grafik->grafikGolongan();
        foreach ($query as $q) {
            $x[] = $q->GOLONGAN;
            $y[] = $q->JUMLAH;
        }

        $subtitle = "SEMUA GOLONGAN";
        $alamat = "grafik/golongan";
        $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function grafik_golongan($golongan) {
        $title = $golongan;
        $query = $this->m_grafik->grafikPergolongan($golongan);

        $jabatan[] = '';
        $jumlah[] = '';
        foreach ($query as $q) {
            $jabatan[] = $q->GOLONGAN;
            $jumlah[] = $q->JUMLAH;
        }
        print_r($jabatan);
        echo '<br>';
        echo '<br>';
        print_r($jumlah);
        $golongan = strtoupper($golongan);
        $golongan = str_replace("_", " ", $golongan);
        echo $golongan;
        $where = "AND JG.GOLONGAN='$golongan'";
        $query1 = $this->m_grafik->tabelPegawai($where);
        $subtitle = $title;
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jbtn' => $jabatan, 'jml' => $jumlah, 'subtitle' => $subtitle));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

    public function grafik_pendidikan_all() {
        $query = $this->m_grafik->grafikPendidikan();
        foreach ($query as $q) {
            $x[] = $q->TINGKAT_PENDIDIKAN;
            $y[] = $q->JUMLAH;
        }

        $subtitle = "SEMUA JENJANG PENDIDIKAN";
        $alamat = "grafik/pendidikan";
        $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function grafik_pendidikan($tingkat_pendidikan) {
        $title = $tingkat_pendidikan;
        $query = $this->m_grafik->grafikPerPendidikan($tingkat_pendidikan);

        $jabatan[] = '';
        $jumlah[] = '';
        foreach ($query as $q) {
            $jabatan[] = $q->TINGKAT_PENDIDIKAN;
            $jumlah[] = $q->JUMLAH;
        }
        print_r($jabatan);
        echo '<br>';
        echo '<br>';
        print_r($jumlah);
        $where = "AND LP.TINGKAT_PENDIDIKAN='$tingkat_pendidikan'";
        $query1 = $this->m_grafik->tabelPegawai($where);
        $subtitle = $title;
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jbtn' => $jabatan, 'jml' => $jumlah, 'subtitle' => $subtitle));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

    public function grafik_umur_all() {
        $query = $this->m_grafik->grafikJenjangUmur();
        foreach ($query as $q) {
            $x[] = $q->UMUR;
            $y[] = $q->JUMLAH;
        }

        $subtitle = "SEMUA JENJANG UMUR";
        $alamat = "grafik/jenjang_umur";
        $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function grafik_umur($rentang) {
        $awal = substr($rentang, 0, 2);
        $akhir = substr($rentang, 3, 5);
        $title = $rentang;
        $query = $this->m_grafik->grafikPerJenjangUmur($awal, $akhir);
        echo $awal;
        echo $akhir;
        $jabatan[] = '';
        $jumlah[] = '';
        foreach ($query as $q) {
            $jabatan[] = $q->UMUR;
            $jumlah[] = $q->JUMLAH;
        }
        print_r($jabatan);
        echo '<br>';
        echo '<br>';
        print_r($jumlah);
        $where = "AND round(datediff(now(),tgl_lahir)/365,0) between '$awal' and '$akhir'";
        $query1 = $this->m_grafik->tabelPegawai($where);
        $subtitle = $title;
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jbtn' => $jabatan, 'jml' => $jumlah, 'subtitle' => $subtitle));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

    public function grafik_status_pegawai_all() {
        $query = $this->m_grafik->grafikStatusPegawai();
        foreach ($query as $q) {
            $x[] = $q->STATUS_PEGAWAI;
            $y[] = $q->JUMLAH;
        }

        $subtitle = "SEMUA STATUS_PEGAWAI";
        $alamat = "grafik/status_pegawai";
        $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat));
        $this->load->view("tabel/v_table_semua_divisi", array('query' => $query));
    }

    public function grafik_status_pegawai($id) {
        $title = $id;
        $query = $this->m_grafik->grafikPerStatusPegawai($id);

        $jabatan[] = '';
        $jumlah[] = '';
        foreach ($query as $q) {
            $jabatan[] = $q->STATUS_PEGAWAI;
            $jumlah[] = $q->JUMLAH;
        }
        print_r($jabatan);
        echo '<br>';
        echo '<br>';
        print_r($jumlah);
        $where = "AND P.STATUS_PEGAWAI='$id'";
        $query1 = $this->m_grafik->tabelPegawai($where);
        $subtitle = $title;
        $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'jbtn' => $jabatan, 'jml' => $jumlah, 'subtitle' => $subtitle));
        $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
    }

}
