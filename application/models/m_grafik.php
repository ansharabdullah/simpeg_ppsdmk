<?php

class m_grafik extends CI_Model {

    function __construct() {
        parent::__construct();
    }

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
        $query = $this->db->query("SELECT U.NAMA_UNIT, (SELECT COUNT(P.ID_PEGAWAI) FROM PEGAWAI P, LOG_JABATAN LJ WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.STATUS_JABATAN=1 AND U.ID_UNIT=LJ.ID_UNIT) AS JUMLAH 
        FROM UNIT_KERJA U
        WHERE U.ID_UNIT<>4;");
        return $query->result();
    }

    public function grafikPegawaiDivisi($id_jabatan) {
        $query = $this->db->query("SELECT JJ.JABATAN, (SELECT COUNT(P.ID_PEGAWAI) AS JUMLAH FROM PEGAWAI P, LOG_JABATAN LJ, JABATAN J WHERE LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.STATUS_JABATAN='1' AND JJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN) AS JUMLAH FROM JABATAN JJ WHERE JJ.BAGIAN='$id_jabatan'");
        return $query->result();
    }

    public function grafikGolongan() {
        $query = $this->db->query("SELECT JG.GOLONGAN, (SELECT COUNT(P.ID_PEGAWAI ) FROM PEGAWAI P, LOG_KEPANGKATAN LK WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN) AS JUMLAH FROM JENIS_GOLONGAN JG");
        return $query->result();
    }

    public function grafikPerGolongan($golongan) {
        $query = $this->db->query("SELECT JG.GOLONGAN, (SELECT COUNT(P.ID_PEGAWAI ) FROM PEGAWAI P, LOG_KEPANGKATAN LK WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN ) AS JUMLAH FROM JENIS_GOLONGAN JG WHERE JG.GOLONGAN = '$golongan'");
        return $query->result();
    }

    public function grafikStatusPegawai() {
        $query = $this->db->query("SELECT STATUS_PEGAWAI, COUNT(ID_PEGAWAI) AS JUMLAH FROM PEGAWAI GROUP BY STATUS_PEGAWAI");
        return $query->result();
    }

    public function grafikPerStatusPegawai($status_pegawai) {
        $query = $this->db->query("SELECT STATUS_PEGAWAI, COUNT(ID_PEGAWAI) AS JUMLAH FROM PEGAWAI WHERE STATUS_PEGAWAI='$status_pegawai' group by status_pegawai");
        return $query->result();
    }

    public function grafikPendidikan() {
        $query = $this->db->query("SELECT LP.TINGKAT_PENDIDIKAN, COUNT(LP.ID_PEGAWAI) AS JUMLAH
        FROM LOG_PENDIDIKAN LP
        WHERE LP.KETERANGAN_PENDIDIKAN=1 AND STATUS_PENDIDIKAN_TERAKHIR=1
        GROUP BY LP.TINGKAT_PENDIDIKAN");
        return $query->result();
    }

    public function grafikPerPendidikan($tingkat_pendidikan) {
        $query = $this->db->query("SELECT LP.TINGKAT_PENDIDIKAN, COUNT(LP.ID_PEGAWAI) AS JUMLAH
        FROM LOG_PENDIDIKAN LP
        WHERE LP.KETERANGAN_PENDIDIKAN=1 AND STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.TINGKAT_PENDIDIKAN='$tingkat_pendidikan'
        GROUP BY LP.TINGKAT_PENDIDIKAN");
        return $query->result();
    }

    public function grafikJenjangUmur() {
        $query = $this->db->query("SELECT DISTINCT IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) <=10,'0-10', IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >10 AND ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=20,'10-19', IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >20 AND 
        ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=30,'20-29',
        IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >30 AND 
        ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=40,'30-39',
        IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >40 AND 
        ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=50,'40-49','>50'))))) 
        AS UMUR , COUNT(*) AS JUMLAH FROM PEGAWAI 
        GROUP BY UMUR ORDER BY UMUR");
        return $query->result();
    }

    public function grafikPerJenjangUmur($awal, $akhir) {
        $query = $this->db->query("SELECT DISTINCT IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) <=10,'0-10', IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >10 AND ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=20,'10-19',IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >20 AND ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=30,'20-29',
        IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >30 AND 
        ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=40,'30-39',
        IF(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) >40 AND 
        ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)<=50,'40-49','>50'))))) 
        AS UMUR , COUNT(*) AS JUMLAH FROM PEGAWAI WHERE ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0) BETWEEN '$awal' AND '$akhir'
        GROUP BY UMUR ORDER BY UMUR");
        return $query->result();
    }

    public function tabelPegawaiDivisi($id_divisi) {
        $query = $this->db->query("SELECT P.NIP, P.NAMA_PEGAWAI, P.JENIS_KELAMIN, JG.GOLONGAN, J.JABATAN, U.NAMA_UNIT FROM PEGAWAI P, UNIT_KERJA U, LOG_JABATAN LJ, JABATAN J, LOG_KEPANGKATAN LK, JENIS_GOLONGAN JG WHERE LJ.ID_UNIT=U.ID_UNIT AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND J.BAGIAN='$id_divisi'");
        return $query->result();
    }
    public function tabelPegawai($where){
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, JG.GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN $where
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }
}