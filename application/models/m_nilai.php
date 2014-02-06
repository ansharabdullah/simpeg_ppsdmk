<?php

class m_nilai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
      public function get_all_nilai() {
      $query = $this->db->query("Select * from pegawai p, divisi j, penilaian pe, subkriteria s, kriteria k, periode per where p.id_jabatan=j.id_jabatan and p.id_pegawai=pe.id_pegawai and pe.id_subkriteria=s.id_subkriteria and s.id_kriteria=k.id_kriteria and per.id_periode=pe.id_periode order by p.id_pegawai;");
      return $query;
      }

      public function get_nilai_pegawai($id_pegawai) {
      $query = $this->db->query("Select * from pegawai p, divisi j, penilaian pe, subkriteria s, kriteria k, periode per where p.id_jabatan=j.id_jabatan and p.id_pegawai=pe.id_pegawai and pe.id_subkriteria=s.id_subkriteria and s.id_kriteria=k.id_kriteria and per.id_periode=pe.id_periode and id_pegawai='$id_pegawai' order by p.id_pegawai;");
      return $query;
      }

      public function get_nilai_pegawai_periode($id_pegawai, $id_periode) {
      $query = $this->db->query("Select * from pegawai p, divisi j, penilaian pe, subkriteria s, kriteria k, periode per where p.id_jabatan=j.id_jabatan and p.id_pegawai=pe.id_pegawai and pe.id_subkriteria=s.id_subkriteria and s.id_kriteria=k.id_kriteria and per.id_peri/ode=pe.id_periode and p.id_pegawai='$id_pegawai' and per.id_periode='$id_periode' order by p.id_pegawai;");
      return $query;
      }
     */

    
    /*
      public function update_nilai($id_pegawai, $id_periode, $nilai) {
      $query = $this->db->query("update penilaian set nilai='$nilai' where id_pegawai='$id_pegawai' and '$id_periode'");
      return $query;
      }

      public function delete_nilai($id_penilaian) {
      $query = $this->db->query("delete from penilaian where id_penilaian='$id_penilaian'");
      return $query;
      }

      public function insert_periode($nama_periode, $tanggal_periode) {
      $query = $this->db->query("insert into periode values(null,'$nama_periode','$tanggal_periode')");
      }

      public function get_all_kriteria() {
      $query = $this->db->query("select * from subkriteria s, kriteria k where s.id_kriteria=k.id_kriteria");
      return $query;
      }
     */

    public function get_pegawai($nama_pegawai) {
        $query = $this->db->query("Select * from pegawai p, divisi j where p.id_jabatan=j.id_jabatan and p.nama_pegawai='$nama_pegawai'");
        return $query->result();
    }

    public function getAllPegawai() {
        $query = $this->db->query("select p.id_pegawai, p.nip, p.nama_pegawai, d.nama_divisi, p.jenis_kelamin, (select avg(nilai_total) from log_nilai where id_pegawai=p.id_pegawai and p.id_jabatan=d.id_jabatan) as rerata from pegawai p, divisi d where p.id_jabatan=d.id_jabatan order by rerata DESC;");
        return $query->result();
    }

    //------------- high chart
    public function grafikDivisi() {
        $query = $this->db->query("select d.id_jabatan, d.nama_divisi, (select count(id_jabatan) from pegawai where id_jabatan=d.id_jabatan) as jml_pegawai, (select avg(l.nilai_total) from log_nilai l, pegawai p where p.ID_PEGAWAI=l.ID_PEGAWAI and p.ID_JABATAN=d.id_jabatan) as rerata from divisi d,pegawai p where p.ID_JABATAN=d.id_jabatan group by d.id_jabatan order by rerata desc;");
        return $query->result();
    }

    public function grafikPegawaiDivisi($id_jabatan) {
        $query = $this->db->query("select p.id_pegawai, p.nip, p.nama_pegawai, d.nama_divisi, p.jenis_kelamin, (select avg(nilai_total) from log_nilai where id_pegawai=p.id_pegawai and p.id_jabatan=d.id_jabatan) as rerata from pegawai p, divisi d where p.id_jabatan=d.id_jabatan and p.id_jabatan='$id_jabatan' order by rerata desc;");
        return $query->result();
    }

    public function grafikPeriodePegawai($nama_pegawai) {
        $query = $this->db->query("select per.id_periode, per.nama_periode, per.tanggal_periode, l.nilai_total from periode per, log_nilai l, pegawai p where per.id_periode=l.id_periode and l.id_pegawai=p.id_pegawai and p.nama_pegawai='$nama_pegawai';");
        return $query->result();
    }

    public function nilaiPeriode($tanggal_periode, $nama_pegawai) {
        $query = $this->db->query("SELECT k.kriteria, s.subkriteria, p.nilai FROM kriteria k, subkriteria s, penilaian p, pegawai pe, periode per WHERE k.ID_KRITERIA = s.ID_KRITERIA AND s.ID_SUBKRITERIA = p.ID_SUBKRITERIA AND p.id_pegawai = pe.id_pegawai AND per.id_periode = p.id_periode AND pe.nama_pegawai = '$nama_pegawai' AND per.tanggal_periode = '$tanggal_periode';");
        return $query->result();
    }

    public function detailNilai($id_pegawai) {
        $query = $this->db->query("select k.kriteria, s.SUBKRITERIA, pe.NILAI , pe.TANGGAL_NILAI from penilaian pe, subkriteria s, kriteria k where s.ID_SUBKRITERIA=pe.ID_SUBKRITERIA and k.id_kriteria=s.ID_KRITERIA and pe.id_pegawai='$id_pegawai'");
        return $query->result();
    }
	
	public function getPeriode(){
		$query = $this->db->query("SELECT tanggal_periode FROM `periode` WHERE 1 order by tanggal_periode asc");
		$data = $query->result();
		$periode;
		foreach ($data as $row){
			$periode = $row->tanggal_periode;
		}
        return $periode;
	}
	
	public function getRekomendasi($nama,$periode){
		$query = $this->db->query("SELECT * from periode pe, pegawai p, log_nilai l where p.id_pegawai=l.id_pegawai and  pe.id_periode=l.id_periode and p.nama_pegawai='$nama' and pe.tanggal_periode='$periode'");
		return $query->result();
	}

	public function rekomendasi($rekomendasi,$nama,$periode){
		$query = $this->db->query("update log_nilai l, pegawai p, periode pe set l.pilihan_rekomendasi='$rekomendasi' where p.id_pegawai=l.id_pegawai and  pe.id_periode=l.id_periode and p.nama_pegawai='$nama' and pe.tanggal_periode='$periode'");
	}
		
}
