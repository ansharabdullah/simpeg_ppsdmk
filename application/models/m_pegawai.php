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
        $query = $this->db->query("select p.id_pegawai, p.nip, p.nip_lama, p.gelar_depan, p.nama_pegawai,p.gelar_belakang, p.tempat_lahir, p.tgl_lahir, p.jenis_kelamin, p.tmt_cpns,p.tmt_pns, jg.nama_pangkat, jg.golongan,lk.tmt_golongan, j.jabatan, p.keterangan, p.status_pegawai, p.no_kartu_pegawai,p.tgl_kartu_pegawai, p.agama, p.status_perkawinan, la.alamat,la.kelurahan, la.kecamatan, la.kabupaten,la.provinsi, p.no_handphone, p.email,p.no_npwp, 
            p.no_ktp, p.no_askes, p.tgl_askes, p.kode_wilayah_askes, p.gol_darah, p.rambut, p.bentuk_muka, p.warna_kulit, p.tinggi_badan, p.berat_badan, p.ciri_khas, p.cacat_tubuh, p.bahasa_asing, p.hobi, p.foto
        from pegawai p, jenis_golongan jg, jabatan j, log_alamat la, log_kepangkatan lk, log_jabatan lj 
        where p.id_pegawai=lj.id_pegawai and p.id_pegawai=lk.id_pegawai and p.id_pegawai=la.id_pegawai and lj.id_jenis_jabatan=j.id_jenis_jabatan and lk.id_jenis_golongan=jg.id_jenis_golongan and p.nip='$nip' and la.status_alamat=1 and lj.status_jabatan=1");
        return $query->result();
    }
    
    public function get_id_pegawai($nip){
        $query = $this->db->query("select nip,id_pegawai from pegawai where nip='$nip'");
         return $query->result();
    }
    
    public function get_jabatan(){
        $query = $this->db->query("select id_jenis_jabatan,jabatan from jabatan");
        return $query->result();
    }
    
    public function get_unit(){
        $query = $this->db->query("select id_unit,nama_unit from unit_kerja");
        return $query->result();
    }
    
    public function get_jenis_kenaikan(){
        $query = $this->db->query("select id_jenis_kenaikan,  jenis_kenaikan from jenis_kenaikan");
         return $query->result();
    }
    
    public function get_golongan(){
        $query = $this->db->query("select id_jenis_golongan,golongan,nama_pangkat from jenis_golongan");
         return $query->result();
    }
    
    public function get_kategori_gaji(){
        $query = $this->db->query("select id_kategori_gaji,besar_gaji,masa_kerja from kategori_gaji");
         return $query->result();
    }
    
    public function get_diklat_struktural(){
        $query = $this->db->query("select id_jenis_diklat, nama_diklat from diklat where jenis_diklat=1");
         return $query->result();
    }
    
    public function get_diklat_fungsional(){
        $query = $this->db->query("select id_jenis_diklat, nama_diklat from diklat where jenis_diklat=2");
         return $query->result();
    }
    
    public function get_jenis_penugasan(){
        $query = $this->db->query("select id_jenis_penugasan, jenis_penugasan from jenis_penugasan where id_jenis_penugasan<>4");
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
    
    //INSERT PEGAWAI
    public function insert_pegawai($data) {
        $this->db->insert('pegawai', $data);
    }
    
    public function insert_data_tambahan($id_pegawai,$no_kartu_pegawai,$tanggal_kartu_pegawai, $no_ktp, $npwp, $no_askes, 
                $tanggal_askes, $kode_wilayah_askes, $no_handphone, $email, $golongan_darah, $rambut, $bentuk_muka,$warna_kulit, $tinggi_badan,$berat_badan,$ciri_khas,
                $cacat_tubuh,$bahasa_asing, $hobi){
        $query = $this->db->query("UPDATE pegawai set NO_KARTU_PEGAWAI='$no_kartu_pegawai', TGL_KARTU_PEGAWAI='$tanggal_kartu_pegawai', 
                NO_KTP='$no_ktp', NO_NPWP='$npwp', NO_ASKES='$no_askes',TGL_ASKES='$tanggal_askes',KODE_WILAYAH_ASKES='$kode_wilayah_askes',
                NO_HANDPHONE='$no_handphone', EMAIL='$email', GOL_DARAH='$golongan_darah', RAMBUT='$rambut', BENTUK_MUKA='$bentuk_muka', 
                WARNA_KULIT='$warna_kulit', TINGGI_BADAN='$tinggi_badan', BERAT_BADAN='$berat_badan', 
                CIRI_KHAS='$ciri_khas', CACAT_TUBUH='$cacat_tubuh', BAHASA_ASING='$bahasa_asing', HOBI='$hobi' where ID_PEGAWAI=$id_pegawai
                ");
    }
    //INSERT LOG
    public function insert_log_jabatan($id_pegawai,$aktif,$jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt){
        $query = $this->db->query("
                INSERT INTO log_jabatan (ID_PEGAWAI, STATUS_JABATAN, ID_JENIS_JABATAN, ID_UNIT,NO_SK_JABATAN, TGL_SK_JABATAN, TMT_JABATAN) 
                VALUES ($id_pegawai, $aktif, $jabatan, $unit_kerja, $no_sk, '$tanggal_sk', '$tmt')");
    }
    
    public function insert_log_pangkat($id_pegawai, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan){
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN,ID_JENIS_GOLONGAN, ID_JENIS_KENAIKAN,  TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, ID_KATEGORI_GAJI, PERATURAN, KETERANGAN_KEPANGKATAN) 
                VALUES ($id_pegawai, $aktif, $golongan, $jenis_kenaikan, '$tmt', $no_sk, '$tanggal_sk', $masa_kerja, $gaji, '$peraturan', '$keterangan')");
    }
    
    public function insert_log_pendidikan($id_pegawai, $aktif,$tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah,$ipk){
        $query = $this->db->query("
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR, TINGKAT_PENDIDIKAN, NAMA_SEKOLAH, LOKASI, FAKULTAS, JURUSAN, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$tingkat', '$nama_sekolah', '$lokasi', '$fakultas', '$jurusan', '$no_ijazah', '$tanggal_ijazah', '$ipk', 1)");
        
    }
    
    public function insert_log_diklat_struktural($id_pegawai, $aktif,$jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking){
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT, RANGKING_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis, '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan', '$rangking' )
                ");
        
    }
    
    public function insert_log_diklat_fungsional($id_pegawai, $aktif,$jenis, $nama_diklat, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan){
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, JUDUL_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis,'$nama_diklat', '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan')
                ");
        
    }
     public function insert_log_diklat_teknis($id_pegawai, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai){
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, INSTANSI_DIKLAT,JUDUL_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT)
                VALUES ($id_pegawai, '$instansi','$nama_diklat', $no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai')
                ");
        
    }
    
    public function insert_log_toefl($id_pegawai, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai){
        $query = $this->db->query(" 
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR,JENIS_PENDIDIKAN, TAHUN_PENDIDIKAN, INSTANSI, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$jenis', $tahun, '$instansi',  '$no_sertifikat', '$tanggal_sertifikat', '$ipk', 0)");
                
    }
    
    public function insert_log_penugasan($id_pegawai, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan){
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, LOKASI_PENUGASAN, NO_SK_PENUGASAN, TGL_SK_PENUGASAN, TUJUAN_PENUGASAN, BIAYA_PENUGASAN, LAMA_PENUGASAN, TAHUN_PENUGASAN, KETERANGAN_PENUGASAN)
                VALUES ($id_pegawai, $jenis, '$lokasi', '$no_sk', '$tgl_sk', '$tujuan', '$biaya', $lama, $tahun, '$keterangan')");
                
    }
    public function insert_log_seminar($id_pegawai, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan){
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, NAMA_PENUGASAN, PERANAN, INSTANSI_PENUGASAN, LOKASI_PENUGASAN, NO_IJAZAH_PENUGASAN, TGL_IJAZAH_PENUGASAN, LAMA_PENUGASAN, TGL_MULAI_PENUGASAN,TGL_SELESAI_PENUGASAN, KETERANGAN_PENUGASAN)
                VALUES ($id_pegawai,4, '$jenis', '$peranan', '$instansi', '$lokasi', '$no_ijazah', '$tgl_ijazah', $lama, '$tanggal_mulai', '$tanggal_selesai', '$keterangan')");
                
    }
    public function insert_log_organisasi($id_pegawai,$kd_stat_organisasi,$nama_organisasi,$jabatan,$tahun, $keterangan){
        $query = $this->db->query(" 
                INSERT INTO log_ORGANISASI (ID_PEGAWAI,ID_JENIS_ORGANISASI, NAMA_ORGANISASI, JABATAN_ORGANISASI, TAHUN_ORGANISASI,KETERANGAN_ORGANISASI)
                VALUES ($id_pegawai,$kd_stat_organisasi,'$nama_organisasi','$jabatan',$tahun, '$keterangan')");
                
    }
     public function insert_log_alamat($id_pegawai,$aktif,$alamat,$provinsi,$kabupaten,$kelurahan,$kecamatan,$kode_pos,$telepon,$fax,$tahun,$keterangan){
        $query = $this->db->query(" 
                INSERT INTO log_alamat (ID_PEGAWAI,STATUS_ALAMAT,ALAMAT,PROVINSI,KABUPATEN,KELURAHAN,KECAMATAN,KODE_POS,TELEPON,FAX,TAHUN_AKTIF,KETERANGAN_ALAMAT)
                VALUES ($id_pegawai,$aktif,'$alamat','$provinsi','$kabupaten','$kelurahan','$kecamatan','$kode_pos','$telepon','$fax',$tahun,'$keterangan')");
                
    }
    
    public function insert_log_pasangan($id_pegawai,$status,$nama,$tanggal_lahir,$tempat_lahir,$tanggal_nikah,$no_kariskarsu,$tanggal_kariskarsu,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                INSERT INTO pasangan(ID_PEGAWAI,STATUS_PASANGAN,NAMA_PASANGAN,TGL_LAHIR_PASANGAN,TEMPAT_LAHIR_PASANGAN,TGL_NIKAH,NO_KARISKARSU,TGL_KARISKARSU,PEKERJAAN_PASANGAN,KETERANGAN_PASANGAN)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$tanggal_nikah','$no_kariskarsu','$tanggal_kariskarsu','$pekerjaan','$keterangan')");
                
    }
      public function insert_log_anak($id_pegawai,$status,$nama,$jenis_kelamin,$tanggal_lahir,$tempat_lahir,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',1)");
                
    }
    public function insert_log_saudara($id_pegawai,$status,$nama,$jenis_kelamin,$tanggal_lahir,$tempat_lahir,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',2)");
                
    }
    public function insert_log_orangtua($id_pegawai,$status,$nama,$tanggal_lahir,$tempat_lahir,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',3)");
                
    }
    
    public function insert_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $keterangan){
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN, TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, ID_KATEGORI_GAJI, KETERANGAN_KEPANGKATAN) 
                VALUES ($id_pegawai, $status, '$tmt', $no_sk, '$tanggal_sk', $masa_kerja, $gaji, '$keterangan')");
    }
    
    public function insert_log_penghargaan($id_pegawai, $nama,$instansi, $no_sk, $tanggal_sk, $tahun, $keterangan){
        $query = $this->db->query("
                INSERT INTO log_penghargaan (ID_PEGAWAI,NAMA_PENGHARGAAN, INSTANSI_PENGHARGAAN, NO_SK_PENGHARGAAN,TGL_SK_PENGHARGAAN,TAHUN_PENGHARGAAN, KETERANGAN_PENGHARGAAN) 
                VALUES ($id_pegawai, '$nama', '$instansi','$no_sk', '$tanggal_sk', '$tahun', '$keterangan')");
    }
    public function insert_log_medis($id_pegawai, $indikasi,$tindakan,$tahun, $keterangan){
        $query = $this->db->query("
                INSERT INTO log_medis (ID_PEGAWAI,INDIKASI, TINDAKAN, TAHUN_PEMERIKSAAN, KETERANGAN_MEDIS) 
                VALUES ($id_pegawai, '$indikasi', '$tindakan','$tahun', '$keterangan')");
    }
    
    
    //GET LOG 
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

    
    PUBLIC FUNCTION get_log_diklat_fungsional($nip){
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=2 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
         return $query->result();
    }
    
    PUBLIC FUNCTION get_log_diklat_teknis($nip){
        $query = $this->db->query("SELECT LD.STATUS_DIKLAT,D.NAMA_DIKLAT,LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM  DIKLAT D,LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=3 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
         return $query->result();
    }

    public function get_log_toefl($nip) {
        $query = $this->db->query("SELECT LP.STATUS_PENDIDIKAN_TERAKHIR, LP.JENIS_PENDIDIKAN, LP.TAHUN_PENDIDIKAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
            FROM LOG_PENDIDIKAN LP, PEGAWAI P
            WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=0 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    public function get_log_penugasan($nip) {
        $query = $this->db->query("SELECT JP.JENIS_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_SK_PENUGASAN, LP.TGL_SK_PENUGASAN, LP.TUJUAN_PENUGASAN, LP.BIAYA_PENUGASAN, LP.LAMA_PENUGASAN, LP.TAHUN_PENUGASAN,LP.KETERANGAN_PENUGASAN FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P

                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN<>4");
                return $query->result();
    }

    public function get_log_seminar($nip) {
        $query = $this->db->query("SELECT LP.NAMA_PENUGASAN, LP.PERANAN, LP.INSTANSI_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_IJAZAH_PENUGASAN, LP.TGL_IJAZAH_PENUGASAN, LP.LAMA_PENUGASAN, LP.TGL_MULAI_PENUGASAN, LP.TGL_SELESAI_PENUGASAN, LP.KETERANGAN_PENUGASAN
                FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P 
                WHERE JP.ID_JENIS_PENUGASAN=4 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_organisasi($nip) {
        $query = $this->db->query("SELECT JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI, LO.KETERANGAN_ORGANISASI 
                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN and P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN=4");
                return $query->result();
    }
    
    public function get_log_organisasi($nip){
        $query = $this->db->query ("SELECT JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI 

        FROM JENIS_ORGANISASI JO, LOG_ORGANISASI LO, PEGAWAI P
        WHERE JO.ID_JENIS_ORGANISASI=LO.ID_JENIS_ORGANISASI AND P.ID_PEGAWAI=LO.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }


    public function get_log_alamat($nip){
        $query = $this->db->query ("SELECT LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TAHUN_AKTIF
            FROM LOG_ALAMAT LA, PEGAWAI P 
            WHERE LA.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' order by LA.STATUS_ALAMAT desc");
        return $query->result();
    }

    public function get_log_pasangan($nip) {
        $query = $this->db->query("SELECT LP.STATUS_PASANGAN, LP.NAMA_PASANGAN, LP.TEMPAT_LAHIR_PASANGAN, LP.TGL_LAHIR_PASANGAN, LP.TGL_NIKAH, LP.NO_KARISKARSU, LP.TGL_KARISKARSU, LP.PEKERJAAN_PASANGAN, LP.KETERANGAN_PASANGAN
            FROM PASANGAN LP, PEGAWAI P
            WHERE LP.ID_PEGAWAI = P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_anak($nip) {
        $query = $this->db->query("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=1");
        return $query->result();
    }

    public function get_log_saudara($nip) {
        $query = $this->db->query("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=2");
        return $query->result();
    }

    public function get_log_medis($nip) {
        $query = $this->db->query("SELECT LM.INDIKASI,LM.TINDAKAN, LM.TAHUN_PEMERIKSAAN, LM.KETERANGAN_MEDIS 
                FROM LOG_MEDIS LM, PEGAWAI P 
                WHERE LM.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

 public function get_log_penghargaan($nip){
        $query = $this->db->query ("SELECT LP.NAMA_PENGHARGAAN,LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_orang_tua($nip) {
        $query = $this->db->query("SELECT AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=3");
        return $query->result();
    }

    
    //
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

    public function get_duk() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN,P.NAMA_PEGAWAI,P.GELAR_BELAKANG, JG.GOLONGAN, jg.NAMA_PANGKAT, LK.TMT_GOLONGAN, J.JABATAN, LJ.TMT_JABATAN, P.TGL_LAHIR
        FROM PEGAWAI P, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK, LOG_JABATAN LJ, JABATAN J
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND JG.ID_JENIS_GOLONGAN=LK.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1
        ORDER BY JG.ID_JENIS_GOLONGAN DESC");
        return $query->result();
    }

}
