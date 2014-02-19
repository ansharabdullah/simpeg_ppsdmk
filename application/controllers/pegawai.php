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
     
    public function info_pegawai($nip) {
        /* biodata pegawai */
        $query = $this->m_pegawai->get_pegawai($nip);

        $this->load->view("grafik/v_chart_satu_pegawai", array('query' => $query));

        //$this->load->view("v_table_satu_pegawai", array('title' => $nama, 'query' => $query, 'title' => $nama, 'periode' => $periode, 'rekomendasi' => $hasil, 'pilihan1' => $pilihan1, 'pilihan2' => $pilihan2, 'pilihan3' => $pilihan3, 'nilai1' => $nilai1));
     }

     
}
