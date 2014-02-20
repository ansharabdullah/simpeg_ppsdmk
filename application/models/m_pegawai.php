<?php

class m_pegawai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_pegawai() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }

    public function get_pegawai($nip) {
        $query = $this->db->query("select p.nip_lama, p.nip, p.nama_pegawai, p.GELAR_DEPAN, p.GELAR_BELAKANG, p.TEMPAT_LAHIR, p.TGL_LAHIR, p.JENIS_KELAMIN, p.TMT_CPNS, p.TMT_PNS, jg.golongan, jg.NAMA_PANGKAT, lk.TMT_GOLONGAN, j.JABATAN, uk.NAMA_UNIT, p.AGAMA, p.STATUS_PERKAWINAN, la.ALAMAT, la.KELURAHAN, la.KECAMATAN, la.KABUPATEN, la.PROVINSI, la.KODE_POS, p.NO_HANDPHONE, p.EMAIL, p.NO_NPWP
        from pegawai p, jenis_golongan jg, log_kepangkatan lk, jabatan j, unit_kerja uk, log_alamat la, log_jabatan lj
        where p.ID_PEGAWAI=lk.ID_PEGAWAI and lk.ID_JENIS_GOLONGAN=jg.ID_JENIS_GOLONGAN and lj.ID_JABATAN=j.ID_JENIS_JABATAN and lj.ID_PEGAWAI=p.ID_PEGAWAI and lj.ID_UNIT=uk.ID_UNIT and la.ID_PEGAWAI=p.ID_PEGAWAI and p.nip='$nip'");
        return $query->result();
    }

    public function get_periode() {
        $query = $this->db->query("SELECT tanggal_periode FROM `periode` WHERE 1 order by tanggal_periode asc");
        $data = $query->result();
        $periode;
        foreach ($data as $row) {
            $periode = $row->tanggal_periode;
        }
        return $periode;
    }

    public function insert_penilaian($id_pegawai, $id_periode, $kejujuran, $tanggung_jawab, $loyalitas, $kepemimpinan, $perencanaan, $organisasi, $komunikasi, $adaptasi, $berbagi_informasi, $ahp) {
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
        $tanggal = "kosong";
        foreach ($data as $row) {
            $tanggal = !empty($row->TANGGAL_NILAI) ? $row->TANGGAL_NILAI : "kosong";
        }
        return $tanggal;
    }

    public function insert_pegawai($data) {
        $this->db->insert('pegawai', $data);
    }
    
    public function get_pensiun() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, JG.GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT, (ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)) AS UMUR, (687 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) AS PENSIUN
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND (687 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) <= 3
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }
    
    public function get_kgb() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }
    
    public function get_naikPangkat() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }

}
