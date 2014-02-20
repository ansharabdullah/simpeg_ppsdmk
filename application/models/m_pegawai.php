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
        $query = $this->db->query("select p.nip, p.nip_lama, p.gelar_depan, p.nama_pegawai,p.gelar_belakang, p.tempat_lahir, p.tgl_lahir, p.jenis_kelamin, p.tmt_cpns, jg.nama_pangkat, jg.golongan,lk.tmt_golongan, j.jabatan, p.agama, p.status_perkawinan, la.alamat,la.kelurahan, la.kecamatan, la.kabupaten,la.provinsi, p.no_handphone, p.email,p.no_npwp from pegawai p, jenis_golongan jg, jabatan j, log_alamat la, log_kepangkatan lk, log_jabatan lj 
where p.id_pegawai=lj.id_pegawai and p.id_pegawai=lk.id_pegawai and p.id_pegawai=la.id_pegawai and lj.id_jenis_jabatan=j.id_jenis_jabatan and lk.id_jenis_golongan=jg.id_jenis_golongan and p.nip='$nip' and la.status_alamat=1 and lj.status_jabatan=1");
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
    
    
    public function get_log_jabatan($nip){
        $query = $this->db->query("SELECT LJ.STATUS_JABATAN,J.JABATAN, UK.NAMA_UNIT, LJ.NO_SK_JABATAN, LJ.TGL_SK_JABATAN, LJ.TMT_JABATAN FROM JABATAN J, UNIT_KERJA UK, LOG_JABATAN LJ, PEGAWAI P
        WHERE J.ID_JENIS_JABATAN=LJ.ID_JENIS_JABATAN AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=UK.ID_UNIT AND P.NIP='$nip' order by lj.status_jabatan desc");
        return $query->result();
    }
    
    public function get_log_kepangkatan($nip){
         $query = $this->db->query("SELECT LK.STATUS_KEPANGKATAN, JG.NAMA_PANGKAT, JG.GOLONGAN, JK.JENIS_KENAIKAN, LK.TMT_GOLONGAN, LK.NO_SK_GOLONGAN, LK.TGL_SK_GOLONGAN, LK.MASA_KERJA_GOLONGAN, KG.BESAR_GAJI, LK.PERATURAN, LK.KETERANGAN_KEPANGKATAN
        FROM LOG_KEPANGKATAN LK, PEGAWAI P, JENIS_GOLONGAN JG, JENIS_KENAIKAN JK, KATEGORI_GAJI KG
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_KENAIKAN=JK.ID_JENIS_KENAIKAN AND 
        LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LK.ID_KATEGORI_GAJI=KG.ID_KATEGORI_GAJI AND P.NIP='$nip' order by lk.status_kepangkatan desc");
         return $query->result();
    }
    
    public function get_log_pendidikan($nip){
        $query = $this->db->query("SELECT LP.STATUS_PENDIDIKAN_TERAKHIR, LP.TINGKAT_PENDIDIKAN, LP.NAMA_SEKOLAH, LP.LOKASI, LP.FAKULTAS,LP.JURUSAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
                    FROM LOG_PENDIDIKAN LP, PEGAWAI P
                    WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        
        return $query->result();
    }
    
    PUBLIC FUNCTION get_log_diklat_struktural($nip){
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=1 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
         return $query->result();
    }
    
    PUBLIC FUNCTION get_log_diklat_fungsional($nip){
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=2 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
         return $query->result();
    }
    
    PUBLIC FUNCTION get_log_diklat_teknis($nip){
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=3 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
         return $query->result();
    }
}
