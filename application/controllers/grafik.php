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

            $subtitle = "SEMUA BAGIAN/BIDANG/KELOMPOK FUNGSIONAL";
            $alamat = "grafik/bagian";
            $status = 1;
            $judul = "Jumlah Pegawai Seluruh Bagian/Bidang/Kelompok Fungsional PPSDMK";
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

    public function semua_cuti() {
        if ($this->session->userdata('role') == 1) {

            $this->grafik_cuti_all();
            $this->load->view('laman/v_footer');
        } else {
            redirect('./pegawai');
        }
    }

    public function cuti($param) {
        if ($this->session->userdata('role') == 1) {
            $this->grafik_cuti($param);
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

            $subtitle = "SEMUA BAGIAN/BIDANG/KELOMPOK FUNGSIONAL";
            $alamat = "grafik/bagian";
            $status = 1;
            $judul = "Jumlah Pegawai Seluruh Bagian/Bidang/Kelompok Fungsional PPSDMK";
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
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
                $id = 3;
                $nama_bagian = "BAGIAN PROGRAM DAN KERJASAMA";
            } else if ($nama_bagian == "pengembangan_kompetensi_dan_kemetrologian") {
                $id = 2;
                $nama_bagian = "BAGIAN PENGEMBANGAN KOMPETENSI DAN KEMETROLOGIAN";
            } else if ($nama_bagian == "jabatan_fungsional") {
                $id = 4;
                $nama_bagian = "JABATAN FUNGSIONAL";
            } else if ($nama_bagian == "kepala_ppsdmk") {
                $id = 0;
                $nama_bagian = "KEPALA PPSDMK";
            } else {
                show_404();
            }
            $title = $nama_bagian;
            $query = $this->m_grafik->grafikPegawaiDivisi($id);

            foreach ($query as $q) {
                if ($q->JABATAN != 'Kelompok Widyaiswara') {
                    $x[] = $q->JABATAN;
                    $y[] = $q->JUMLAH;
                    $y1[] = $q->LAKI;
                    $y2[] = $q->PEREMPUAN;
                }
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
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
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
            if ($i == 0) {
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
            $judul = "Jumlah Pegawai Seluruh Jenjang Pendidikan Terakhir PPSDMK";
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
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
            if ($i == 0) {
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
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
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
            if ($i == 0) {
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

            print_r($query);
            $subtitle = "SEMUA STATUS_PEGAWAI";
            $alamat = "grafik/status_pegawai";
            $status = 5;
            $judul = "Jumlah Pegawai Seluruh Status Kepegawaian PPSDMK";
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
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
            if ($y[0] == 0) {
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

    public function grafik_cuti_all() {
        if ($this->session->userdata('role') == 1) {
            $query = $this->m_grafik->grafikCuti();

            $y = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($query as $q) {
                if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '01') {
                    $y[0] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '02') {
                    $y[1] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '03') {
                    $y[2] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '04') {
                    $y[3] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '05') {
                    $y[4] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '06') {
                    $y[5] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '07') {
                    $y[6] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '08') {
                    $y[7] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '09') {
                    $y[8] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '10') {
                    $y[9] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '11') {
                    $y[10] ++;
                } else if (date("m", strtotime($q->TGL_MULAI_CUTI)) == '12') {
                    $y[11] ++;
                }
            }
            $x = array("JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER");

            $data = array(
                array("bulan" => "JANUARI",
                    "jumlah" => $y[0]),
                array("bulan" => "FEBRUARI",
                    "jumlah" => $y[1]),
                array("bulan" => "MARET",
                    "jumlah" => $y[2]),
                array("bulan" => "APRIL",
                    "jumlah" => $y[3]),
                array("bulan" => "MEI",
                    "jumlah" => $y[4]),
                array("bulan" => "JUNI",
                    "jumlah" => $y[5]),
                array("bulan" => "JULI",
                    "jumlah" => $y[6]),
                array("bulan" => "AGUSTUS",
                    "jumlah" => $y[7]),
                array("bulan" => "SEPTEMBER",
                    "jumlah" => $y[8]),
                array("bulan" => "OKTOBER",
                    "jumlah" => $y[9]),
                array("bulan" => "NOVEMBER",
                    "jumlah" => $y[10]),
                array("bulan" => "DESEMBER",
                    "jumlah" => $y[11])
            );
            //print_r($data);


            $subtitle = "SEMUA CUTI DI TAHUN INI";
            $alamat = "grafik/cuti";
            $status = 6;
            $judul = "CUTI PEGAWAI PPSDMK";
            $this->load->view("grafik/v_chart_semua", array('x' => $x, 'y' => $y, 'subtitle' => $subtitle, 'alamat' => $alamat, 'judul' => $judul));
            $this->load->view("tabel/v_table_semua_divisi", array('query' => $data, 'status' => $status, 'judul' => $judul));
        } else {
            redirect('./pegawai');
        }
    }

    public function grafik_cuti($id) {
        if ($this->session->userdata('role') == 1) {
            $title = " Bulan:  $id";
            $title = strtoupper($title);
            $query = $this->m_grafik->grafikCutiPerbulan($id);

            foreach ($query as $q) {
                $x[] = $q->STATUS_PEGAWAI;
                $y[] = $q->JUMLAH;
                $y1[] = $q->LAKI;
                $y2[] = $q->PEREMPUAN;
            }
            if ($y[0] == 0) {
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
        $data = $this->get_persetujuan();
        $jumlah = '';
        $jumlah = count($data['nip']);
        $query = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header', array('query' => $query, 'jumlah' => $jumlah));
    }

    public function get_persetujuan() {
        if ($this->session->userdata('role') == 1) {

            $query1 = $this->m_pegawai->get_alamat();
            $query2 = $this->m_pegawai->get_diklat();
            $query3 = $this->m_pegawai->get_acc_jabatan();
            $query4 = $this->m_pegawai->get_kepangkatan();
            $query5 = $this->m_pegawai->get_medis();
            $query6 = $this->m_pegawai->get_organisasi();
            $query7 = $this->m_pegawai->get_pendidikan();
            $query8 = $this->m_pegawai->get_penghargaan();
            $query9 = $this->m_pegawai->get_penugasan();
            $query10 = $this->m_pegawai->get_cuti();

            $i = 0;
            foreach ($query1->result() as $q) {
                $data['id_log'][] = $q->ID_ALAMAT;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_ALAMAT;
                $data['ket'][] = "PERUBAHAN RIWAYAT ALAMAT";
                $data['ket_id'][] = 1;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "ALAMAT : " . $q->ALAMAT . "<br>KEL. : " . $q->KELURAHAN . "<br>KEC. : " . $q->KECAMATAN . "<br>KAB. : " . $q->KABUPATEN . "<br>PROV. : " . $q->PROVINSI . "<br>KODE POS. : " . $q->KODE_POS . "<br>TELP. : " . $q->TELEPON;
                $i++;
            }

            foreach ($query2->result() as $q) {
                $data['id_log'][] = $q->ID_DIKLAT;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_DIKLAT;
                $data['ket'][] = "PERUBAHAN RIWAYAT DIKLAT";
                $data['ket_id'][] = 2;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "NAMA DIKLAT : " . $q->JUDUL_DIKLAT . "<br>NO.IJAZAH : " . $q->NO_IJAZAH_DIKLAT . "<br>LAMA : " . $q->LAMA_DIKLAT . "<br>TANGGAL MULAI : " . $q->TGL_MULAI_DIKLAT . "<br>TGL AKHIR : " . $q->TGL_AKHIR_DIKLAT;
                $i++;
            }

            foreach ($query3->result() as $q) {
                $data['id_log'][] = $q->ID_JABATAN;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_JABATAN;
                $data['ket'][] = "PERUBAHAN RIWAYAT JABATAN";
                $data['ket_id'][] = 3;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "JABATAN : " . $q->JABATAN . "<br>UNIT : " . $q->NAMA_UNIT . "<br>SK : " . $q->NO_SK_JABATAN . "<br>TMT : " . $q->TMT_JABATAN;
                $i++;
            }

            foreach ($query4->result() as $q) {
                $data['id_log'][] = $q->ID_KEPANGKATAN;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_KEPANGKATAN;
                $data['ket'][] = "PERUBAHAN RIWAYAT KEPANGKATAN";
                $data['ket_id'][] = 4;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "PANGKAT : " . $q->NAMA_PANGKAT . "/" . $q->GOLONGAN . "<br>TMT : " . $q->TMT_GOLONGAN . "<br>NO. SK / TANGGAL : " . $q->NO_SK_GOLONGAN . " / " . $q->TGL_SK_GOLONGAN;
                $i++;
            }

            foreach ($query5->result() as $q) {
                $data['id_log'][] = $q->ID_MEDIS;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_MEDIS;
                $data['ket'][] = "PERUBAHAN RIWAYAT MEDIS";
                $data['ket_id'][] = 5;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "INDIKASI : " . $q->INDIKASI . "<br>TINDAKAN : " . $q->TINDAKAN . "<br>TAHUN PERIKSA : " . $q->TAHUN_PEMERIKSAAN;
                $i++;
            }

            foreach ($query6->result() as $q) {
                $data['id_log'][] = $q->ID_ORGANISASI;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_ORGANISASI;
                $data['ket'][] = "PERUBAHAN RIWAYAT ORGANISASI";
                $data['ket_id'][] = 6;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "NAMA ORGANISASI : " . $q->NAMA_ORGANISASI . "<br>JABATAN : " . $q->JABATAN_ORGANISASI . "<br>TAHUN :" . $q->TAHUN_ORGANISASI;
                $i++;
            }

            foreach ($query7->result() as $q) {
                $data['id_log'][] = $q->ID_PENDIDIKAN;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_PENDIDIKAN;
                $data['ket'][] = "PERUBAHAN RIWAYAT PENDIDIKAN";
                $data['ket_id'][] = 7;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "NAMA INSTITUSI : " . $q->NAMA_SEKOLAH . "<br>JENJANG : " . $q->TINGKAT_PENDIDIKAN . "<br> FAKULTAS/JURUSAN : " . $q->FAKULTAS . "/" . $q->JURUSAN . "<br>NO IJAZAH / TANGGAL : " . $q->NO_IJAZAH . "/" . $q->TGL_IJAZAH;

                $i++;
            }

            foreach ($query8->result() as $q) {
                $data['id_log'][] = $q->ID_LOG_PENGHARGAAN;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_PENGHARGAAN;
                $data['ket'][] = "PERUBAHAN RIWAYAT PENGHARGAAN";
                $data['ket_id'][] = 8;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "NAMA PENGHARGAAN : " . $q->NAMA_PENGHARGAAN . "<br>INSTANSI : " . $q->INSTANSI_PENGHARGAAN . "<br>NO.SK / TAHUN : " . $q->NO_SK_PENGHARGAAN . " / " . $q->TAHUN_PENGHARGAAN;
                $i++;
            }

            foreach ($query9->result() as $q) {
                $data['id_log'][] = $q->ID_PENUGASAN;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_PENUGASAN;
                $data['ket'][] = "PERUBAHAN RIWAYAT PENUGASAN";
                $data['ket_id'][] = 9;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "NAMA PENUGASAN : " . $q->NAMA_PENUGASAN . "<br>PERANAN : " . $q->PERANAN . "<br>INSTANSI : " . $q->INSTANSI_PENUGASAN . "<br>LOKASI : " . $q->LOKASI_PENUGASAN . "<br>TANGGAL : " . $q->TGL_MULAI_PENUGASAN . " s/d " . $q->TGL_SELESAI_PENUGASAN;
                $i++;
            }

            foreach ($query10->result() as $q) {
                $data['id_log'][] = $q->ID_CUTI;
                $data['nip'][] = $q->NIP;
                $data['nama'][] = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . " " . $q->GELAR_BELAKANG;
                $data['tgl'][] = $q->TGL_LOG_CUTI;
                $data['ket'][] = "PERUBAHAN RIWAYAT CUTI";
                $data['ket_id'][] = 10;
                $data['photo'][] = $q->FOTO;
                $data['detail'][] = "JENIS CUTI : " . $q->JENIS_CUTI . "<br>ALASAN CUTI : " . $q->ALASAN_CUTI . "<br>NO SK : " . $q->NO_SK_CUTI . "<br>TANGGAL : " . $q->TGL_MULAI_CUTI . " s/d " . $q->TGL_SELESAI_CUTI;
                $i++;
            }
            if ($i >= 1) {
                return $data;
            } else {
                return 0;
            }
        } else {
            redirect('./pegawai');
        }
    }

    public function header_pegawai($nip) {
        $query0 = $this->m_pegawai->get_akun($nip);
        $this->load->view('laman/v_header_pegawai', array('query' => $query0));
    }

}
