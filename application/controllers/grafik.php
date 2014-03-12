<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class grafik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_isvalidated();
        if ($this->session->userdata('role') == 1) {
            $this->header_admin($this->session->userdata('nip'));
        } else {
            $this->header_pegawai($this->session->userdata('nip'));
        }
    }

    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }

//    function panggil halaman
    public function index() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikDivisi();
            foreach ($query as $q) {
                $x[] = $q->NAMA_UNIT;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA BAGIAN";
            $alamat = "grafik/bagian";
            $status = 1;
            $judul = "Jumlah Pegawai Seluruh Bagian PPSDMK";
            $this->load->view("laman/v_home", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
        } else {
            $this->load->view('laman/v_home_pegawai');
        }
        $this->load->view('laman/v_footer');
    }

    //bagian
    public function semua_bagian() {
        if ($this->session->userdata('role') == 1) {

            $this->grafik_bagian_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function bagian($nama_bagian) {
        if ($this->session->userdata('role') == 1) {
            $this->perbagian($nama_bagian);
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    //jabatan
    public function semua_jabatan() {
        if ($this->session->userdata('role') == 1) {
            //$this->grafik_bagian_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function jabatan($param) {
        if ($this->session->userdata('role') == 1) {
            //
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    //golongan
    public function semua_golongan() {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_golongan_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function golongan($param) {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_golongan($param);
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    //pendidikan
    public function semua_pendidikan() {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_pendidikan_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function pendidikan($param) {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_pendidikan($param);
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    //jenjang umur
    public function semua_jenjang_umur() {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_umur_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function jenjang_umur($param) {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_umur($param);
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    //status kepegawaian
    public function semua_status_pegawai() {
        if ($this->session->userdata('role') == 1) {

            $this->grafik_status_pegawai_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function status_pegawai($param) {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_status_pegawai($param);
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

//====================================================================================================
//    function program
    public function grafik_bagian_all() {

        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikDivisi();
            foreach ($query as $q) {
                $x[] = $q->NAMA_UNIT;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA BAGIAN";
            $alamat = "grafik/bagian";
            $status = 1;
            $judul = "Jumlah Pegawai Seluruh Bagian PPSDMK";
            $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $query, 'status' => $status, 'judul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function perbagian($nama_bagian) {

        if ($this->session->userdata('role') == 1) {
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
            } else if ($nama_bagian == "widyaiswara") {
                $id = 4;
                $nama_bagian = "WIDYAISWARA";
            } else {
                show_404();
            }
            $title = $nama_bagian;
            $query = $this->m_grafik->grafikPegawaiDivisi($id);

            foreach ($query as $q) {
                $x[] = $q->JABATAN;
                $y[] = $q->JUMLAH;
                $y1[] = $q->LAKI;
                $y2[] = $q->PEREMPUAN;
            }
            $where = "AND J.BAGIAN='$id'";
            $query1 = $this->m_grafik->tabelPegawai($where);
            $subtitle = $title;
            $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'x' => $x, 'y1' => $y1, 'y2' => $y2, 'subtitle' => $subtitle));
            $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_golongan_all() {

        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikGolongan();
            foreach ($query as $q) {
                $x[] = $q->GOLONGAN;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA GOLONGAN";
            $alamat = "grafik/golongan";
            $status = 2;
            $judul = "Jumlah Pegawai Seluruh Golongan PPSDMK";
            $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $query, 'status' => $status, 'judul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_golongan($golongan) {

        if ($this->session->userdata('role') == 1) {
            $title = "Golongan $golongan";
            $title = strtoupper($title);
            $title = str_replace("_", " ", $title);
            $golongan = str_replace("_", " ", $golongan);

            $query = $this->m_grafik->grafikPergolongan($golongan);
            $i = 0;
            foreach ($query as $q) {
                $x[] = $q->GOLONGAN;
                $y[] = $q->JUMLAH;
                $y1[] = $q->LAKI;
                $y2[] = $q->PEREMPUAN;
                $i++;
            }
            if($i == 0){
                show_404();
            }
            $golongan = strtoupper($golongan);
            $golongan = str_replace("_", " ", $golongan);
            $where = "AND JG.GOLONGAN='$golongan'";
            $query1 = $this->m_grafik->tabelPegawai($where);
            $subtitle = $title;
            $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'x' => $x, 'y1' => $y1, 'y2' => $y2, 'subtitle' => $subtitle));
            $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_pendidikan_all() {

        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikPendidikan();
            foreach ($query as $q) {
                $x[] = $q->TINGKAT_PENDIDIKAN;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA JENJANG PENDIDIKAN";
            $alamat = "grafik/pendidikan";
            $status = 3;
            $judul = "Jumlah Pegawai Seluruh Jenjang Pendidikan Akhir PPSDMK";
            $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $query, 'status' => $status, 'jdul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_pendidikan($tingkat_pendidikan) {
        if ($this->session->userdata('role') == 1) {
            $title = "Pendidikan Akhir $tingkat_pendidikan";
            $title = strtoupper($title);
            $title = str_replace("_", " ", $title);
            $query = $this->m_grafik->grafikPerPendidikan($tingkat_pendidikan);

            $i = 0;
            foreach ($query as $q) {
                $x[] = $q->TINGKAT_PENDIDIKAN;
                $y[] = $q->JUMLAH;
                $y1[] = $q->LAKI;
                $y2[] = $q->PEREMPUAN;
                $i ++;
            }
            if($i == 0){
                show_404();
            }
            $where = "AND LP.TINGKAT_PENDIDIKAN='$tingkat_pendidikan'";
            $query1 = $this->m_grafik->tabelPegawai($where);
            $subtitle = $title;
            $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'x' => $x, 'y1' => $y1, 'y2' => $y2, 'subtitle' => $subtitle));
            $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_umur_all() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikJenjangUmur();
            foreach ($query as $q) {
                $x[] = $q->UMUR;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA JENJANG UMUR";
            $alamat = "grafik/jenjang_umur";
            $status = 4;
            $judul = "Jumlah Pegawai Seluruh Jenjang Umur PPSDMK";
            $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $query, 'status' => $status, 'judul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_umur($rentang) {
        if ($this->session->userdata('role') == 1) {
            $awal = substr($rentang, 0, 2);
            $akhir = substr($rentang, 3, 5);

            $title = "Rentang Umur $rentang";
            if ($rentang == '%3E50') {
                $awal = substr($rentang, 3, 5);
                $akhir = 100;
                $title = 'Rentang Umur >50';
            }
            $title = strtoupper($title);
            $title = str_replace("_", " ", $title);
            $query = $this->m_grafik->grafikPerJenjangUmur($awal, $akhir);
            $i = 0;
            foreach ($query as $q) {
                $x[] = $q->UMUR;
                $y[] = $q->JUMLAH;
                if ($q->JENIS_KELAMIN == 'LAKI-LAKI') {
                    $y1[] = $q->JUMLAH;
                } else {
                    $y2[] = $q->JUMLAH;
                }
                $i++;
            }
            if($i == 0){
                show_404();
            }
            $where = "AND round(datediff(now(),tgl_lahir)/365,0) between '$awal' and '$akhir'";
            $query1 = $this->m_grafik->tabelPegawai($where);
            $subtitle = $title;
            $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'x' => $x, 'y1' => $y1, 'y2' => $y2, 'subtitle' => $subtitle));
            $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_status_pegawai_all() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikStatusPegawai();
            foreach ($query as $q) {
                $x[] = $q->STATUS_PEGAWAI;
                $y[] = $q->JUMLAH;
            }

            $subtitle = "SEMUA STATUS_PEGAWAI";
            $alamat = "grafik/status_pegawai";
            $status = 5;
            $judul = "Jumlah Pegawai Seluruh Status Kepegawaian PPSDMK";
            $this->load->view("grafik/v_chart_semua_divisi", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $query, 'status' => $status, 'judul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_status_pegawai($id) {
        if ($this->session->userdata('role') == 1) {
            $title = "Status Kepegawaian :  $id";
            $title = strtoupper($title);
            $title = str_replace("_", " ", $title);
            $query = $this->m_grafik->grafikPerStatusPegawai($id);
            
            foreach ($query as $q) {
                $x[] = $q->STATUS_PEGAWAI;
                $y[] = $q->JUMLAH;
                $y1[] = $q->LAKI;
                $y2[] = $q->PEREMPUAN;
            }
            if($y[0] == 0){
                show_404();
            }
            $where = "AND P.STATUS_PEGAWAI='$id'";
            $query1 = $this->m_grafik->tabelPegawai($where);
            $subtitle = $title;
            $this->load->view("grafik/v_chart_satu_divisi", array('title' => $title, 'x' => $x, 'y1' => $y1, 'y2' => $y2, 'subtitle' => $subtitle));
            $this->load->view("tabel/v_table_satu_divisi", array('query1' => $query1));
        } else {
            redirect('./pegawai');
        }
    }

    public function header_admin($nip) {
        $query = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header', array('query' => $query));
    }

    public function header_pegawai($nip) {
        $query0 = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header_pegawai', array('query' => $query0));
    }

}
