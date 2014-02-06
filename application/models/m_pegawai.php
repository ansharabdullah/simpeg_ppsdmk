<?php

class m_pegawai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_pegawai() {
        $query = $this->db->query("Select * from pegawai p, divisi j where p.id_jabatan=j.id_jabatan order by p.nama_pegawai ASC");
        return $query->result();
    }

    public function get_pegawai($nama_pegawai) {
        $query = $this->db->query("Select * from pegawai p, divisi j where p.id_jabatan=j.id_jabatan and p.nama_pegawai='$nama_pegawai'");
        return $query->result();
    }

    public function get_periode() {
       $query = $this->db->query("SELECT tanggal_periode FROM `periode` WHERE 1 order by tanggal_periode asc");
		$data = $query->result();
		$periode;
		foreach ($data as $row){
			$periode = $row->tanggal_periode;
		}
        return $periode;
    }

    public function insert_penilaian($id_pegawai, $id_periode, $kejujuran,$tanggung_jawab,$loyalitas,$kepemimpinan,$perencanaan,$organisasi,$komunikasi,$adaptasi,$berbagi_informasi,$ahp) {
        /* Query insert penilaian disini */
		/* 
			jujur
			tanggng jawab
			loyal
			kepemimpinan
			perencanaan
			organisasi
			komunikasi
			adaptasi
			berbagi informasi
		*/
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$kejujuran', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '1'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$tanggung_jawab', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '2'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$loyalitas', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '3'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$kepemimpinan', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '4'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$perencanaan', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '5'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$organisasi', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '6'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$komunikasi', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '7'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$adaptasi', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '8'");
		$query = $this->db->query("update penilaian p, periode pe set p.nilai='$berbagi_informasi', p.tanggal_nilai=CURRENT_DATE where p.id_pegawai='$id_pegawai' and p.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode' and p.id_subkriteria = '9'");
		
		//$ahp = 100;
		$query = $this->db->query("update log_nilai l, periode pe set l.nilai_total='$ahp' where l.id_pegawai='$id_pegawai' and l.id_periode = pe.id_periode and pe.tanggal_periode = '$id_periode'");
    }	
	
    public function cekPenilaian($id_pegawai, $id_periode) {
        $query = $this->db->query("select * from pegawai peg, penilaian p, periode pe where peg.NAMA_PEGAWAI = '$id_pegawai' and p.ID_PERIODE = pe.ID_PERIODE and pe.TANGGAL_PERIODE = '$id_periode' and peg.id_pegawai=p.id_pegawai");
		$data = $query->result();
		$tanggal="kosong";
		foreach ($data as $row){
			$tanggal = !empty($row->TANGGAL_NILAI) ? $row->TANGGAL_NILAI : "kosong"; 
		}
		return $tanggal;		
    }
    

}
