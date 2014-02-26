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

        $query = $this->db->query("select p.nip, p.nip_lama, p.gelar_depan, p.nama_pegawai,p.gelar_belakang, p.tempat_lahir, p.tgl_lahir, p.jenis_kelamin, p.tmt_cpns,p.tmt_pns, jg.nama_pangkat, jg.golongan,lk.tmt_golongan, j.jabatan, p.keterangan, p.status_pegawai, p.tgl_kartu_pegawai, p.agama, p.status_perkawinan, la.alamat,la.kelurahan, la.kecamatan, la.kabupaten,la.provinsi, p.no_handphone, p.email,p.no_npwp, 
            p.no_ktp, p.no_askes, p.tgl_askes, p.kode_wilayah_askes, p.gol_darah, p.rambut, p.bentuk_muka, p.warna_kulit, p.tinggi_badan, p.berat_badan, p.ciri_khas, p.cacat_tubuh, p.bahasa_asing, p.hobi, p.foto
        from pegawai p, jenis_golongan jg, jabatan j, log_alamat la, log_kepangkatan lk, log_jabatan lj 
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

    public function get_log_jabatan($nip) {
        $query = $this->db->query("SELECT LJ.STATUS_JABATAN,J.JABATAN, UK.NAMA_UNIT, LJ.NO_SK_JABATAN, LJ.TGL_SK_JABATAN, LJ.TMT_JABATAN FROM JABATAN J, UNIT_KERJA UK, LOG_JABATAN LJ, PEGAWAI P
        WHERE J.ID_JENIS_JABATAN=LJ.ID_JENIS_JABATAN AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=UK.ID_UNIT AND P.NIP='$nip' order by lj.status_jabatan desc");
        return $query->result();
    }

    public function get_log_kepangkatan($nip) {
        $query = $this->db->query("SELECT LK.STATUS_KEPANGKATAN, JG.NAMA_PANGKAT, JG.GOLONGAN, JK.JENIS_KENAIKAN, LK.TMT_GOLONGAN, LK.NO_SK_GOLONGAN, LK.TGL_SK_GOLONGAN, LK.MASA_KERJA_GOLONGAN, KG.BESAR_GAJI, LK.PERATURAN, LK.KETERANGAN_KEPANGKATAN
        FROM LOG_KEPANGKATAN LK, PEGAWAI P, JENIS_GOLONGAN JG, JENIS_KENAIKAN JK, KATEGORI_GAJI KG
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_KENAIKAN=JK.ID_JENIS_KENAIKAN AND 
        LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LK.ID_KATEGORI_GAJI=KG.ID_KATEGORI_GAJI AND P.NIP='$nip' order by lk.status_kepangkatan desc");
        return $query->result();
    }

    public function get_log_pendidikan($nip) {
        $query = $this->db->query("SELECT LP.STATUS_PENDIDIKAN_TERAKHIR, LP.TINGKAT_PENDIDIKAN, LP.NAMA_SEKOLAH, LP.LOKASI, LP.FAKULTAS,LP.JURUSAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
                    FROM LOG_PENDIDIKAN LP, PEGAWAI P
                    WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=1 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_struktural($nip) {
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=1 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();

    }

    PUBLIC FUNCTION get_log_diklat_fungsional($nip) {
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=2 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_teknis($nip) {
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=3 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }
    
    public function get_log_toefl($nip){
        $query = $this->db->query("SELECT LP.STATUS_PENDIDIKAN_TERAKHIR, LP.JENIS_PENDIDIKAN, LP.TAHUN_PENDIDIKAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
            FROM LOG_PENDIDIKAN LP, PEGAWAI P
            WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=0 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
                return $query->result();
    }
    
   public function get_log_penugasan($nip){
        $query = $this->db->query("SELECT JP.JENIS_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_SK_PENUGASAN, LP.TGL_SK_PENUGASAN, LP.TUJUAN_PENUGASAN, LP.BIAYA_PENUGASAN, LP.LAMA_PENUGASAN, LP.TAHUN_PENUGASAN,LP.KETERANGAN_PENUGASAN FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P
                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip'");
                return $query->result();
    }
    
    public function get_log_seminar($nip){
        $query = $this->db->query("SELECT LP.NAMA_PENUGASAN, LP.PERANAN, LP.INSTANSI_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_IJAZAH_PENUGASAN, LP.TGL_IJAZAH_PENUGASAN, LP.LAMA_PENUGASAN, LP.TGL_MULAI_PENUGASAN, LP.TGL_SELESAI_PENUGASAN, LP.KETERANGAN_PENUGASAN
                FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P 
                WHERE JP.ID_JENIS_PENUGASAN=4 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip'");
                return $query->result();
    }
    
    public function get_log_organisasi($nip){
        $query = $this->db->query ("SELECT JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI, LO.KETERANGAN_ORGANISASI 
        FROM JENIS_ORGANISASI JO, LOG_ORGANISASI LO, PEGAWAI P
        WHERE JO.ID_JENIS_ORGANISASI=LO.ID_JENIS_ORGANISASI AND P.ID_PEGAWAI=LO.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }
    
    public function get_log_alamat($nip){
        $query = $this->db->query ("SELECT LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TGL_AKTIF
            FROM LOG_ALAMAT LA, PEGAWAI P 
            WHERE LA.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' order by LA.STATUS_ALAMAT desc");
        return $query->result();
    }
    
    public function get_log_pasangan($nip){
        $query = $this->db->query ("SELECT LP.STATUS_PASANGAN, LP.NAMA_PASANGAN, LP.TEMPAT_LAHIR_PASANGAN, LP.TGL_LAHIR_PASANGAN, LP.TGL_NIKAH, LP.NO_KARISKARSU, LP.TGL_KARISKARSU, LP.PEKERJAAN_PASANGAN, LP.KETERANGAN_PASANGAN
            FROM PASANGAN LP, PEGAWAI P
            WHERE LP.ID_PEGAWAI = P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }
    
    public function get_log_anak($nip){
        $query = $this->db->query ("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=1");
        return $query->result();
    }
    
    public function get_log_saudara($nip){
        $query = $this->db->query ("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=2");
        return $query->result();
    }
    
    public function get_log_medis($nip){
        $query = $this->db->query ("SELECT LM.INDIKASI,LM.TINDAKAN, LM.TAHUN_PEMERIKSAAN, LM.KETERANGAN_MEDIS 
                FROM LOG_MEDIS LM, PEGAWAI P 
                WHERE LM.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }
    public function get_log_penghargaan($nip){
        $query = $this->db->query ("SELECT LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }
    
    public function get_log_orang_tua($nip){
        $query = $this->db->query ("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=3");
        return $query->result();
    }

    public function get_pensiun() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, JG.GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT, (ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)) AS UMUR, (696 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) AS PENSIUN
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND (696 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) <= 3
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }
    public function get_kgb() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, JG.GOLONGAN, LK.TMT_GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LJ.STATUS_JABATAN=1 
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }

    public function get_naikPangkat() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }

}
