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

    //INPUT
    public function input_biodata() {
        $this->load->view("form/v_form_biodata");
        $this->load->view("laman/v_footer");
    }
    
    public function input_log_jabatan() {
        $this->load->view("form/v_form_jabatan");
        $this->load->view("laman/v_footer");
    }
    
    public function input_log_pangkat() {
        $this->load->view("form/v_form_pangkat");
        $this->load->view("laman/v_footer");
    }
    
    public function input_log_pendidikan() {
        $this->load->view("form/v_form_pendidikan");
        $this->load->view("laman/v_footer");
    }
    
    public function input_log_diklat_struktural() {
        $this->load->view("form/v_form_diklat_struktural");
        $this->load->view("laman/v_footer");
    }
    public function input_log_diklat_fungsional() {
        $this->load->view("form/v_form_diklat_fungsional");
        $this->load->view("laman/v_footer");
    }
    public function input_log_diklat_teknis() {
        $this->load->view("form/v_form_diklat_teknis");
        $this->load->view("laman/v_footer");
    }
    public function input_log_toefl() {
        $this->load->view("form/v_form_toefl");
        $this->load->view("laman/v_footer");
    }
    public function input_log_penugasan() {
        $this->load->view("form/v_form_penugasan");
        $this->load->view("laman/v_footer");
    }
    public function input_log_seminar() {
        $this->load->view("form/v_form_seminar");
        $this->load->view("laman/v_footer");
    }
    public function input_log_organisasi() {
        $this->load->view("form/v_form_organisasi");
        $this->load->view("laman/v_footer");
    }
    public function input_log_alamat() {
        $this->load->view("form/v_form_alamat");
        $this->load->view("laman/v_footer");
    }
    public function input_log_pasangan() {
        $this->load->view("form/v_form_pasangan");
        $this->load->view("laman/v_footer");
    }
    public function input_log_anak() {
        $this->load->view("form/v_form_anak");
        $this->load->view("laman/v_footer");
    }
    public function input_log_saudara() {
        $this->load->view("form/v_form_saudara");
        $this->load->view("laman/v_footer");
    }
    public function input_log_orangtua() {
        $this->load->view("form/v_form_orangtua");
        $this->load->view("laman/v_footer");
    }
    public function input_log_gaji_berkala() {
        $this->load->view("form/v_form_gaji_berkala");
        $this->load->view("laman/v_footer");
    }
    public function input_log_peghargaan() {
        $this->load->view("form/v_form_tanda_jasa");
        $this->load->view("laman/v_footer");
    }
    public function input_log_medis() {
        $this->load->view("form/v_form_medis");
        $this->load->view("laman/v_footer");
    }
    
    public function ubah_biodata() {
        $this->load->view("form/v_form_biodata");
        $this->load->view("form/v_data_tambahan");
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

        $this->load->view("grafik/v_chart_satu_pegawai", array('query' => $query, 'query2'=>$query2, 'query3'=>$query3, 'query4'=>$query4, 'query5'=>$query5, 'query6'=>$query6,
            'query7'=>$query7, 'query8'=>$query8, 'query9'=>$query9, 'query10'=>$query10, 'query11'=>$query11, 
            'query12'=>$query12, 'query13'=>$query13, 'query14'=>$query14, 'query15'=>$query15,'query16'=>$query16,'query17'=>$query17,'query18'=>$query18 ));
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
