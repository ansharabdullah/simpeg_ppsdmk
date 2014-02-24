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
    public function seluruh_pegawai() {
        $this->allpegawai();
        $this->load->view("laman/v_footer");
    }

    public function biodata($nama_pegawai) {
        $this->info_pegawai($nama_pegawai);
        $this->load->view("laman/v_footer");
    }

    public function pengaturan_akun() {
        $this->load->view('form/v_akun');
        $this->load->view('laman/v_footer');
    }

    public function persetujuan() {

        $this->load->view('laman/v_footer');
    }

    public function kenaikan_pangkat() {

        $this->load->view('laman/v_footer');
    }

    public function gaji_berkala() {

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

    public function pegawai_pensiun() {
        $this->usiaPensiun();
        $this->load->view('laman/v_footer');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function input_pegawai() {
        $data['nip'] = $this->input->post('nip', true);
        $data['nip_lama'] = $this->input->post('nip_lama', true);
        $data['gelar_depan'] = $this->input->post('gelar_depan', true);
        $data['nama_pegawai'] = $this->input->post('nama_pegawai', true);
        $data['gelar_belakang'] = $this->input->post('gelar_belakang', true);
        $data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
        $data['tgl_lahir'] = $this->input->post('tgl_lahir', true);
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin', true);
        $data['agama'] = $this->input->post('agama', true);
        $data['status_perkawinan'] = $this->input->post('status_perkawinan', true);
        $data['tmt_cpns'] = $this->input->post('tmt_cpns', true);
        $data['tmt_pns'] = $this->input->post('tmt_pns', true);
        $data['pendidikan_awal'] = $this->input->post('pendidikan_awal', true);
        $data['keterangan'] = $this->input->post('keterangan', true);
        $data['status_pegawai'] = $this->input->post('status_pegawai', true);

        $nip = $this->input->post('nip', true);
        $query = $this->m_pegawai->get_pegawai($nip);
        $this->m_pegawai->insert_pegawai($data);
        $this->load->view("grafik/v_chart_satu_pegawai", array('title' => $query));
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

        $this->load->view("grafik/v_chart_satu_pegawai", array('query' => $query, 'query2' => $query2, 'query3' => $query3, 'query4' => $query4, 'query4' => $query5, 'query4' => $query6, 'query4' => $query7));

        //$this->load->view("v_table_satu_pegawai", array('title' => $nama, 'query' => $query, 'title' => $nama, 'periode' => $periode, 'rekomendasi' => $hasil, 'pilihan1' => $pilihan1, 'pilihan2' => $pilihan2, 'pilihan3' => $pilihan3, 'nilai1' => $nilai1));
    }

//notifikasi

    public function usiaPensiun() {
        $query = $this->m_pegawai->get_pensiun();
        $title = "PENSIUN";
        $this->load->view("tabel/v_table_peringatan", array('query' => $query, 'title' => $title));
    }

    public function kenaikanGajiBerkala() {
        
    }

    public function kenaikanPangkat() {
        
    }

    public function cetakDUK() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DUK.doc");

        echo "<html>";
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
        echo "<body>";
        echo "<b>My first document</b>"
        . "<table border='1'>"
        . "<tr>"
        . "<td>a</td>"
        . "<td>b</td>"
        . "<td>c</td>"
        . "</tr>"
        . "</table>";
        echo "</body>";
        echo "</html>";
    }

    public function cetakDSP() {
        $query = $this->m_pegawai->get_all_pegawai();
        $this->load->view("tabel/v_table_cetak", array('query' => $query));
    }
    
    public function developer(){
        $this->load->view("laman/v_developer");
    }
}
