<?php

class m_pegawai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_pegawai() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }

    public function get_foto($nip) {
        $query = $this->db->query("SELECT FOTO FROM PEGAWAI WHERE NIP=$nip");
        return $query->result();
    }

    public function get_pegawai($nip) {
        $query = $this->db->query("select p.id_pegawai, p.nip, p.nip_lama, p.gelar_depan, p.nama_pegawai,p.gelar_belakang, p.tempat_lahir, p.tgl_lahir, p.jenis_kelamin, p.tmt_cpns,p.tmt_pns, jg.nama_pangkat, jg.golongan,lk.tmt_golongan, j.jabatan, p.keterangan, p.status_pegawai, p.no_kartu_pegawai,p.tgl_kartu_pegawai, p.agama, p.status_perkawinan, la.alamat,la.kelurahan, la.kecamatan, la.kabupaten,la.provinsi, p.no_handphone, p.email,p.no_npwp, 
        p.no_ktp, p.no_askes, p.tgl_askes, p.kode_wilayah_askes, p.gol_darah, p.rambut, p.bentuk_muka, p.warna_kulit, p.tinggi_badan, p.berat_badan, p.ciri_khas, p.cacat_tubuh, p.bahasa_asing, p.hobi, p.foto
        from pegawai p, jenis_golongan jg, jabatan j, log_alamat la, log_kepangkatan lk, log_jabatan lj 
        where p.id_pegawai=lj.id_pegawai and p.id_pegawai=lk.id_pegawai and p.id_pegawai=la.id_pegawai and lj.id_jenis_jabatan=j.id_jenis_jabatan and lk.id_jenis_golongan=jg.id_jenis_golongan 
        and p.nip='$nip' and la.status_alamat=1 and lj.status_jabatan=1 AND P.STATUS_AKTIF=1");
        return $query->result();
    }

    public function get_id_pegawai($nip) {
        $query = $this->db->query("select nip,id_pegawai from pegawai where nip='$nip'");
        return $query->result();
    }

    public function get_jabatan() {
        $query = $this->db->query("select id_jenis_jabatan,jabatan from jabatan");
        return $query->result();
    }

    public function get_unit() {
        $query = $this->db->query("select id_unit,nama_unit from unit_kerja");
        return $query->result();
    }

    public function get_golongan() {
        $query = $this->db->query("select id_jenis_golongan,golongan,nama_pangkat from jenis_golongan");
        return $query->result();
    }

    public function get_diklat_struktural() {
        $query = $this->db->query("select id_jenis_diklat, nama_diklat from diklat where jenis_diklat=1");
        return $query->result();
    }

    public function get_diklat_fungsional() {
        $query = $this->db->query("select id_jenis_diklat, nama_diklat from diklat where jenis_diklat=2");
        return $query->result();
    }

    public function get_jenis_penugasan() {
        $query = $this->db->query("select id_jenis_penugasan, jenis_penugasan from jenis_penugasan where id_jenis_penugasan<>4");
        return $query->result();
    }

    public function get_honorer() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NAMA_PEGAWAI, P.GELAR_BELAKANG, P.GELAR_DEPAN, U.NAMA_UNIT, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN
        FROM PEGAWAI P, UNIT_KERJA U, LOG_JABATAN LJ, LOG_PENDIDIKAN LP
        WHERE P.STATUS_PEGAWAI='NON PNS' AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=U.ID_UNIT AND P.STATUS_AKTIF=1 AND P.ID_PEGAWAI=LP.ID_PEGAWAI");
        return $query->result();
    }

    //INSERT PEGAWAI
    public function insert_pegawai(
    $nip, $nip_lama, $gelar_depan, $nama_pegawai, $gelar_belakang, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $kecamatan, $kelurahan, $kabupaten, $provinsi, $tmt_cpns, $tmt_pns, $agama, $status_perkawinan, $status_pegawai, $foto, $keterangan, $jabatan, $unit_kerja, $golongan, $pendidikan, $nama_sekolah, $acc, $status_aktif
    ) {
        $query = $this->db->query("INSERT INTO pegawai (NIP, NIP_LAMA, NAMA_PEGAWAI, GELAR_DEPAN, GELAR_BELAKANG, JENIS_KELAMIN, 
            TEMPAT_LAHIR, TGL_LAHIR, AGAMA, STATUS_PERKAWINAN, TMT_CPNS, TMT_PNS, KETERANGAN, STATUS_PEGAWAI, FOTO, ACC_PEGAWAI, STATUS_AKTIF) 
            VALUES ('$nip', '$nip_lama','$nama_pegawai', '$gelar_depan',  '$gelar_belakang', '$jenis_kelamin',
                '$tempat_lahir', '$tgl_lahir',  '$agama', '$status_perkawinan', '$tmt_cpns', '$tmt_pns', '$keterangan',
                '$status_pegawai', '$foto', $acc, $status_aktif)");
        $last_id = $this->db->insert_id();
        $query2 = $this->db->query("INSERT INTO log_jabatan (ID_PEGAWAI, ID_JENIS_JABATAN, ID_UNIT, STATUS_JABATAN, ACC_JABATAN) 
                VALUES ($last_id, $jabatan, $unit_kerja, 1, $acc)");
        $query3 = $this->db->query("INSERT INTO log_kepangkatan (ID_PEGAWAI, ID_JENIS_GOLONGAN, STATUS_KEPANGKATAN, ACC_KEPANGKATAN) VALUES ($last_id,$golongan,1, $acc)");
        $query4 = $this->db->query("INSERT INTO log_pendidikan (ID_PEGAWAI, TINGKAT_PENDIDIKAN, NAMA_SEKOLAH,STATUS_PENDIDIKAN_TERAKHIR,KETERANGAN_PENDIDIKAN, ACC_PENDIDIKAN)
                VALUES($last_id, '$pendidikan', '$nama_sekolah', 1,1, $acc)");
        $query5 = $this->db->query("INSERT INTO log_alamat (ID_PEGAWAI, STATUS_ALAMAT, ALAMAT, PROVINSI, KABUPATEN, KELURAHAN, KECAMATAN, ACC_ALAMAT)
                VALUES($last_id, 1, '$alamat', '$provinsi', '$kabupaten', '$kelurahan', '$kecamatan', $acc)");
    }

    public function insert_data_tambahan($id_pegawai, $no_kartu_pegawai, $tanggal_kartu_pegawai, $no_ktp, $npwp, $no_askes, $tanggal_askes, $kode_wilayah_askes, $no_handphone, $email, $golongan_darah, $rambut, $bentuk_muka, $warna_kulit, $tinggi_badan, $berat_badan, $ciri_khas, $cacat_tubuh, $bahasa_asing, $hobi, $acc) {
        $query = $this->db->query("UPDATE pegawai set NO_KARTU_PEGAWAI='$no_kartu_pegawai', TGL_KARTU_PEGAWAI='$tanggal_kartu_pegawai', 
                NO_KTP='$no_ktp', NO_NPWP='$npwp', NO_ASKES='$no_askes',TGL_ASKES='$tanggal_askes',KODE_WILAYAH_ASKES='$kode_wilayah_askes',
                NO_HANDPHONE='$no_handphone', EMAIL='$email', GOL_DARAH='$golongan_darah', RAMBUT='$rambut', BENTUK_MUKA='$bentuk_muka', 
                WARNA_KULIT='$warna_kulit', TINGGI_BADAN='$tinggi_badan', BERAT_BADAN='$berat_badan', 
                CIRI_KHAS='$ciri_khas', CACAT_TUBUH='$cacat_tubuh', BAHASA_ASING='$bahasa_asing', HOBI='$hobi', ACC_PEGAWAI=$acc where ID_PEGAWAI=$id_pegawai
                ");
    }

//========================================================================================================================================================================================================================
    //INSERT LOG
    public function insert_log_jabatan($id_pegawai, $aktif, $jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt, $acc) {
        $query = $this->db->query("
                INSERT INTO log_jabatan (ID_PEGAWAI, STATUS_JABATAN, ID_JENIS_JABATAN, ID_UNIT,NO_SK_JABATAN, TGL_SK_JABATAN, TMT_JABATAN, ACC_JABATAN) 
                VALUES ($id_pegawai, $aktif, $jabatan, $unit_kerja, '$no_sk', '$tanggal_sk', '$tmt', $acc)");
    }

    public function insert_log_pangkat($id_pegawai, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan, $acc) {
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN,ID_JENIS_GOLONGAN, JENIS_KENAIKAN,  TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, GAJI_GOLONGAN, PERATURAN, KETERANGAN_KEPANGKATAN, ACC_KEPANGKATAN) 
                VALUES ($id_pegawai, $aktif, $golongan, '$jenis_kenaikan', '$tmt', '$no_sk', '$tanggal_sk', $masa_kerja, '$gaji', '$peraturan', '$keterangan', $acc)");
    }

    public function insert_log_pendidikan($id_pegawai, $aktif, $tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah, $ipk, $acc) {
        $query = $this->db->query("
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR, TINGKAT_PENDIDIKAN, NAMA_SEKOLAH, LOKASI, FAKULTAS, JURUSAN, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN, ACC_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$tingkat', '$nama_sekolah', '$lokasi', '$fakultas', '$jurusan', '$no_ijazah', '$tanggal_ijazah', '$ipk', 1, $acc)");
    }

    public function insert_log_diklat_struktural($id_pegawai, $aktif, $jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT, RANGKING_DIKLAT, ACC_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis, '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan', '$rangking' , $acc)
                ");
    }

    public function insert_log_diklat_fungsional($id_pegawai, $aktif, $jenis, $nama_diklat, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, JUDUL_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT, ACC_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis,'$nama_diklat', '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan', $acc)
                ");
    }

    public function insert_log_diklat_teknis($id_pegawai, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, INSTANSI_DIKLAT,JUDUL_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ACC_DIKLAT, KETERANGAN_DIKLAT)
                VALUES ($id_pegawai, '$instansi','$nama_diklat', '$no_ijazah', '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', $acc, 3)
                ");
    }

    public function insert_log_toefl($id_pegawai, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR,JENIS_PENDIDIKAN, TAHUN_PENDIDIKAN, INSTANSI, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN, ACC_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$jenis', $tahun, '$instansi',  '$no_sertifikat', '$tanggal_sertifikat', '$nilai', 0, $acc)");
    }

    public function insert_log_penugasan($id_pegawai, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, LOKASI_PENUGASAN, NO_SK_PENUGASAN, TGL_SK_PENUGASAN, TUJUAN_PENUGASAN, BIAYA_PENUGASAN, LAMA_PENUGASAN, TAHUN_PENUGASAN, KETERANGAN_PENUGASAN, ACC_PENUGASAN)
                VALUES ($id_pegawai, $jenis, '$lokasi', '$no_sk', '$tgl_sk', '$tujuan', '$biaya', $lama, $tahun, '$keterangan', $acc)");
    }

    public function insert_log_seminar($id_pegawai, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, NAMA_PENUGASAN, PERANAN, INSTANSI_PENUGASAN, LOKASI_PENUGASAN, NO_IJAZAH_PENUGASAN, TGL_IJAZAH_PENUGASAN, LAMA_PENUGASAN, TGL_MULAI_PENUGASAN,TGL_SELESAI_PENUGASAN, KETERANGAN_PENUGASAN, ACC_PENUGASAN)
                VALUES ($id_pegawai,4, '$jenis', '$peranan', '$instansi', '$lokasi', '$no_ijazah', '$tgl_ijazah', $lama, '$tanggal_mulai', '$tanggal_selesai', '$keterangan', $acc)");
    }

    public function insert_log_organisasi($id_pegawai, $kd_stat_organisasi, $nama_organisasi, $jabatan, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_ORGANISASI (ID_PEGAWAI,JENIS_ORGANISASI, NAMA_ORGANISASI, JABATAN_ORGANISASI, TAHUN_ORGANISASI,KETERANGAN_ORGANISASI, ACC_ORGANISASI)
                VALUES ($id_pegawai,$kd_stat_organisasi,'$nama_organisasi','$jabatan',$tahun, '$keterangan', $acc)");
    }

    public function insert_log_alamat($id_pegawai, $aktif, $alamat, $provinsi, $kabupaten, $kelurahan, $kecamatan, $kode_pos, $telepon, $fax, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO log_alamat (ID_PEGAWAI,STATUS_ALAMAT,ALAMAT,PROVINSI,KABUPATEN,KELURAHAN,KECAMATAN,KODE_POS,TELEPON,FAX,TAHUN_AKTIF,KETERANGAN_ALAMAT, ACC_ALAMAT)
                VALUES ($id_pegawai,$aktif,'$alamat','$provinsi','$kabupaten','$kelurahan','$kecamatan','$kode_pos','$telepon','$fax',$tahun,'$keterangan', $acc)");
    }

    public function insert_log_pasangan($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $tanggal_nikah, $no_kariskarsu, $tanggal_kariskarsu, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO pasangan(ID_PEGAWAI,STATUS_PASANGAN,NAMA_PASANGAN,TGL_LAHIR_PASANGAN,TEMPAT_LAHIR_PASANGAN,TGL_NIKAH,NO_KARISKARSU,TGL_KARISKARSU,PEKERJAAN_PASANGAN,KETERANGAN_PASANGAN, ACC_PASANGAN)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$tanggal_nikah','$no_kariskarsu','$tanggal_kariskarsu','$pekerjaan','$keterangan', $acc)");
    }

    public function insert_log_anak($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK, ACC_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',1, $acc)");
    }

    public function insert_log_saudara($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK, ACC_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',2, $acc)");
    }

    public function insert_log_orangtua($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK, ACC_AK)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',3, $acc)");
    }

    public function insert_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $gaji, $keterangan, $acc) {
        $query = $this->db->query("
                INSERT INTO log_gaji(ID_PEGAWAI,STATUS_GAJI, TMT_GAJI, NO_SK_GAJI,TGL_SK_GAJI, TOTAL_GAJI, KETERANGAN_GAJI, ACC_GAJI) 
                VALUES ($id_pegawai, $status, '$tmt', '$no_sk', '$tanggal_sk',  $gaji, '$keterangan', $acc)");
        $last_id = $this->db->insert_id();
        $query2 = $this->db->query("UPDATE log_gaji set ID_KEPANGKATAN=(SELECT ID_KEPANGKATAN FROM LOG_KEPANGKATAN WHERE STATUS_KEPANGKATAN=1 AND ID_PEGAWAI='$id_pegawai') WHERE ID_GAJI=$last_id");
    }

    public function insert_log_penghargaan($id_pegawai, $nama, $instansi, $no_sk, $tanggal_sk, $tahun, $keterangan, $acc) {
        $query = $this->db->query("
                INSERT INTO log_penghargaan (ID_PEGAWAI,NAMA_PENGHARGAAN, INSTANSI_PENGHARGAAN, NO_SK_PENGHARGAAN,TGL_SK_PENGHARGAAN,TAHUN_PENGHARGAAN, KETERANGAN_PENGHARGAAN, ACC_PENGHARGAAN) 
                VALUES ($id_pegawai, '$nama', '$instansi','$no_sk', '$tanggal_sk', '$tahun', '$keterangan', $acc)");
    }

    public function insert_log_medis($id_pegawai, $indikasi, $tindakan, $tahun, $keterangan, $acc) {
        $query = $this->db->query("
                INSERT INTO log_medis (ID_PEGAWAI,INDIKASI, TINDAKAN, TAHUN_PEMERIKSAAN, KETERANGAN_MEDIS, ACC_MEDIS) 
                VALUES ($id_pegawai, '$indikasi', '$tindakan','$tahun', '$keterangan', $acc)");
    }

    public function insert_log_cuti($id_pegawai, $aktif, $jenis, $alasan, $no_sk, $tgl_sk, $tgl_mulai, $tgl_selesai, $acc) {
        $query = $this->db->query("
                INSERT INTO log_cuti (ID_PEGAWAI, JENIS_CUTI, ALASAN_CUTI, NO_SK_CUTI, TGL_SK_CUTI, TGL_MULAI_CUTI, TGL_SELESAI_CUTI, ACC_CUTI, STATUS_CUTI)
                VALUES ($id_pegawai, '$jenis', '$alasan', '$no_sk','$tgl_sk', '$tgl_mulai', '$tgl_selesai', $acc, $aktif)
                ");
    }

//========================================================================================================================================================================================================================
    //DELETE
    public function delete_pegawai($id_pegawai) {
        $query = $this->db->query("UPDATE PEGAWAI SET STATUS_AKTIF=0 WHERE ID_PEGAWAI='$id_pegawai'");
    }

    public function delete_log_jabatan($id_jabatan) {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->delete('log_jabatan');
    }

    public function delete_log_pangkat($id_kepangkatan) {
        $this->db->where('id_kepangkatan', $id_kepangkatan);
        $this->db->delete('log_kepangkatan');
    }

    public function delete_log_pendidikan($id_pendidikan) {
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->delete('log_pendidikan');
    }

    public function delete_log_diklat($id_diklat) {
        $this->db->where('id_diklat', $id_diklat);
        $this->db->delete('log_diklat');
    }

    public function delete_log_penugasan($id_penugasan) {
        $this->db->where('id_penugasan', $id_penugasan);
        $this->db->delete('log_penugasan');
    }

    public function delete_log_organisasi($id_organisasi) {
        $this->db->where('id_organisasi', $id_organisasi);
        $this->db->delete('log_organisasi');
    }

    public function delete_log_alamat($id_alamat) {
        $this->db->where('id_alamat', $id_alamat);
        $this->db->delete('log_alamat');
    }

    public function delete_log_pasangan($id_pasangan) {
        $this->db->where('id_pasangan', $id_pasangan);
        $this->db->delete('pasangan');
    }

    public function delete_log_ak($id_ak) {
        $this->db->where('id_ak', $id_ak);
        $this->db->delete('anggota_keluarga');
    }

    public function delete_log_penghargaan($ID_LOG_PENGHARGAAN) {
        $this->db->where('ID_LOG_PENGHARGAAN', $ID_LOG_PENGHARGAAN);
        $this->db->delete('log_penghargaan');
    }

    public function delete_log_medis($ID_MEDIS) {
        $this->db->where('ID_MEDIS', $ID_MEDIS);
        $this->db->delete('log_medis');
    }

    public function delete_log_cuti($ID_CUTI) {
        $this->db->where('ID_CUTI', $ID_CUTI);
        $this->db->delete('log_cuti');
    }

    public function delete_log_gaji($ID_GAJI) {
        $this->db->where('ID_GAJI', $ID_GAJI);
        $this->db->delete('log_gaji');
    }

//========================================================================================================================================================================================================================
    //GET LOG
    public function get_log_jabatan($nip) {
        $query = $this->db->query("SELECT LJ.ID_JABATAN, LJ.STATUS_JABATAN,J.JABATAN, UK.NAMA_UNIT, LJ.NO_SK_JABATAN, LJ.TGL_SK_JABATAN, LJ.TMT_JABATAN FROM JABATAN J, UNIT_KERJA UK, LOG_JABATAN LJ, PEGAWAI P
        WHERE J.ID_JENIS_JABATAN=LJ.ID_JENIS_JABATAN AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=UK.ID_UNIT AND P.STATUS_AKTIF=1 AND P.NIP='$nip' AND LJ.ACC_JABATAN=1 order by lj.status_jabatan desc");
        return $query->result();
    }

    public function get_log_kepangkatan($nip) {
        $query = $this->db->query("SELECT LK.ID_KEPANGKATAN,LK.STATUS_KEPANGKATAN, JG.NAMA_PANGKAT, JG.GOLONGAN,  LK.JENIS_KENAIKAN,LK.TMT_GOLONGAN, LK.NO_SK_GOLONGAN, LK.TGL_SK_GOLONGAN, LK.MASA_KERJA_GOLONGAN, LK.GAJI_GOLONGAN, LK.PERATURAN, LK.KETERANGAN_KEPANGKATAN
        FROM LOG_KEPANGKATAN LK, PEGAWAI P, JENIS_GOLONGAN JG
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI  AND LK.ACC_KEPANGKATAN=1 AND
        LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND P.NIP='$nip' order by lk.status_kepangkatan desc");
        return $query->result();
    }

    public function get_log_pendidikan($nip) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.TINGKAT_PENDIDIKAN, LP.NAMA_SEKOLAH, LP.LOKASI, LP.FAKULTAS,LP.JURUSAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
                    FROM LOG_PENDIDIKAN LP, PEGAWAI P
                    WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=1 AND LP.ACC_PENDIDIKAN=1 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_struktural($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=1 AND P.NIP='$nip' AND LD.ACC_DIKLAT=1 order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_fungsional($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=2 AND P.NIP='$nip' AND LD.ACC_DIKLAT=1 order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_teknis($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT,LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM  DIKLAT D,LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND LD.KETERANGAN_DIKLAT=3 AND P.NIP='$nip' AND LD.ACC_DIKLAT=1 order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    public function get_log_toefl($nip) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.JENIS_PENDIDIKAN, LP.TAHUN_PENDIDIKAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
            FROM LOG_PENDIDIKAN LP, PEGAWAI P
            WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=0 AND LP.ACC_PENDIDIKAN=1 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    public function get_log_penugasan($nip) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,JP.JENIS_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_SK_PENUGASAN, LP.TGL_SK_PENUGASAN, LP.TUJUAN_PENUGASAN, LP.BIAYA_PENUGASAN, LP.LAMA_PENUGASAN, LP.TAHUN_PENUGASAN,LP.KETERANGAN_PENUGASAN FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P

                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN<>4 AND LP.ACC_PENUGASAN=1");
        return $query->result();
    }

    public function get_log_seminar($nip) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,LP.NAMA_PENUGASAN, LP.PERANAN, LP.INSTANSI_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_IJAZAH_PENUGASAN, LP.TGL_IJAZAH_PENUGASAN, LP.LAMA_PENUGASAN, LP.TGL_MULAI_PENUGASAN, LP.TGL_SELESAI_PENUGASAN, LP.KETERANGAN_PENUGASAN
                FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P 
                WHERE JP.ID_JENIS_PENUGASAN=4 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN=4 AND LP.ACC_PENUGASAN=1");
        return $query->result();
    }

    public function get_log_organisasi($nip) {
        $query = $this->db->query("SELECT LO.ID_ORGANISASI,LO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI 

        FROM LOG_ORGANISASI LO, PEGAWAI P
        WHERE P.ID_PEGAWAI=LO.ID_PEGAWAI AND P.NIP='$nip' AND LO.ACC_ORGANISASI=1");
        return $query->result();
    }

    public function get_log_alamat($nip) {
        $query = $this->db->query("SELECT LA.ID_ALAMAT,LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TAHUN_AKTIF
            FROM LOG_ALAMAT LA, PEGAWAI P 
            WHERE LA.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND LA.ACC_ALAMAT=1 order by LA.STATUS_ALAMAT desc");
        return $query->result();
    }

    public function get_log_pasangan($nip) {
        $query = $this->db->query("SELECT LP.ID_PASANGAN,LP.STATUS_PASANGAN, LP.NAMA_PASANGAN, LP.TEMPAT_LAHIR_PASANGAN, LP.TGL_LAHIR_PASANGAN, LP.TGL_NIKAH, LP.NO_KARISKARSU, LP.TGL_KARISKARSU, LP.PEKERJAAN_PASANGAN, LP.KETERANGAN_PASANGAN
            FROM PASANGAN LP, PEGAWAI P
            WHERE LP.ID_PEGAWAI = P.ID_PEGAWAI AND P.NIP='$nip' AND LP.ACC_PASANGAN=1");
        return $query->result();
    }

    public function get_log_anak($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=1 AND AK.ACC_AK=1");
        return $query->result();
    }

    public function get_log_saudara($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=2 AND AK.ACC_AK=1");
        return $query->result();
    }

    public function get_log_medis($nip) {
        $query = $this->db->query("SELECT LM.ID_MEDIS,LM.INDIKASI,LM.TINDAKAN, LM.TAHUN_PEMERIKSAAN, LM.KETERANGAN_MEDIS 
                FROM LOG_MEDIS LM, PEGAWAI P 
                WHERE LM.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND LM.ACC_MEDIS=1");
        return $query->result();
    }

    public function get_log_penghargaan($nip) {
        $query = $this->db->query("SELECT LP.ID_LOG_PENGHARGAAN,LP.NAMA_PENGHARGAAN,LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND LP.ACC_PENGHARGAAN=1");
        return $query->result();
    }

    public function get_log_orang_tua($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=3 AND AK.ACC_AK=1");
        return $query->result();
    }

    public function get_log_cuti($nip) {
        $query = $this->db->query("SELECT LC.ID_CUTI, LC.JENIS_CUTI, LC.ALASAN_CUTI, LC.NO_SK_CUTI, LC.TGL_SK_CUTI, LC.TGL_MULAI_CUTI, LC.TGL_SELESAI_CUTI,LC.STATUS_CUTI
                FROM LOG_CUTI LC, PEGAWAI P
                WHERE LC.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND LC.ACC_CUTI=1 order by LC.STATUS_CUTI desc");
        return $query->result();
    }

    public function get_log_gaji($nip) {
        $query = $this->db->query("SELECT LG.ID_GAJI, LG.TMT_GAJI, LG.NO_SK_GAJI, LG.TGL_SK_GAJI, LG.TOTAL_GAJI, LG.KETERANGAN_GAJI, LG.STATUS_GAJI
                FROM LOG_GAJI LG, PEGAWAI P, LOG_KEPANGKATAN KP
                WHERE LG.ID_KEPANGKATAN=KP.ID_KEPANGKATAN AND P.ID_PEGAWAI=LG.ID_PEGAWAI AND P.NIP='$nip' AND LG.ACC_GAJI=1 ORDER BY LG.STATUS_GAJI DESC");

        return $query->result();
    }
    
//========================================================================================================================================================================================================================
    //SELECT FOR EDIT
    public function edit_biodata($id_pegawai) {
        $query = $this->db->query("select p.id_pegawai, p.nip, p.nip_lama, p.gelar_depan, p.nama_pegawai,p.gelar_belakang, p.tempat_lahir, p.tgl_lahir, p.jenis_kelamin, p.tmt_cpns,p.tmt_pns, jg.nama_pangkat, jg.golongan,lk.tmt_golongan, j.jabatan, p.keterangan, p.status_pegawai, p.no_kartu_pegawai,p.tgl_kartu_pegawai, p.agama, p.status_perkawinan, la.alamat,la.kelurahan, la.kecamatan, la.kabupaten,la.provinsi, p.no_handphone, p.email,p.no_npwp, 
        p.no_ktp, p.no_askes, p.tgl_askes, p.kode_wilayah_askes, p.gol_darah, p.rambut, p.bentuk_muka, p.warna_kulit, p.tinggi_badan, p.berat_badan, p.ciri_khas, p.cacat_tubuh, p.bahasa_asing, p.hobi, p.foto
        from pegawai p, jenis_golongan jg, jabatan j, log_alamat la, log_kepangkatan lk, log_jabatan lj 
        where p.id_pegawai=lj.id_pegawai and p.id_pegawai=lk.id_pegawai and p.id_pegawai=la.id_pegawai and lj.id_jenis_jabatan=j.id_jenis_jabatan and lk.id_jenis_golongan=jg.id_jenis_golongan and p.id_pegawai='$id_pegawai'");

        return $query->result();
    }

    public function edit_log_jabatan($id_jabatan) {
        $query = $this->db->query("SELECT LJ.ID_JABATAN,J.ID_JENIS_JABATAN, P.NIP, LJ.STATUS_JABATAN,J.JABATAN, UK.NAMA_UNIT,UK.ID_UNIT, LJ.NO_SK_JABATAN, LJ.TGL_SK_JABATAN, LJ.TMT_JABATAN FROM JABATAN J, UNIT_KERJA UK, LOG_JABATAN LJ, PEGAWAI P
        WHERE J.ID_JENIS_JABATAN=LJ.ID_JENIS_JABATAN AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=UK.ID_UNIT AND LJ.ID_JABATAN='$id_jabatan'");
        return $query->result();
    }

    public function edit_log_pangkat($id_kepangkatan) {
        $query = $this->db->query("SELECT LK.ID_KEPANGKATAN,P.NIP,LK.STATUS_KEPANGKATAN, JG.NAMA_PANGKAT,LK.ID_JENIS_GOLONGAN,LK.JENIS_KENAIKAN,LK.GAJI_GOLONGAN, JG.GOLONGAN, LK.TMT_GOLONGAN, LK.NO_SK_GOLONGAN, LK.TGL_SK_GOLONGAN, LK.MASA_KERJA_GOLONGAN, LK.PERATURAN, LK.KETERANGAN_KEPANGKATAN
        FROM LOG_KEPANGKATAN LK, PEGAWAI P, JENIS_GOLONGAN JG
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LK.ID_KEPANGKATAN='$id_kepangkatan'");
        return $query->result();
    }

    public function edit_log_pendidikan($id_pendidikan) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,P.NIP,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.TINGKAT_PENDIDIKAN, LP.NAMA_SEKOLAH, LP.LOKASI, LP.FAKULTAS,LP.JURUSAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
                    FROM LOG_PENDIDIKAN LP, PEGAWAI P
                    WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND LP.ID_PENDIDIKAN='$id_pendidikan'");
        return $query->result();
    }

    PUBLIC FUNCTION edit_log_diklat($id_diklat) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,P.NIP,LD.ID_JENIS_DIKLAT,LD.STATUS_DIKLAT,LD.JUDUL_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND LD.ID_DIKLAT='$id_diklat'");
        return $query->result();
    }

    public function edit_log_toefl($id_pendidikan) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,P.NIP,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.JENIS_PENDIDIKAN, LP.TAHUN_PENDIDIKAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
            FROM LOG_PENDIDIKAN LP, PEGAWAI P
            WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND LP.ID_PENDIDIKAN='$id_pendidikan'");
        return $query->result();
    }

    public function edit_log_penugasan($id_penugasan) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,P.NIP,LP.ID_JENIS_PENUGASAN,JP.JENIS_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_SK_PENUGASAN, LP.TGL_SK_PENUGASAN, LP.TUJUAN_PENUGASAN, LP.BIAYA_PENUGASAN, LP.LAMA_PENUGASAN, LP.TAHUN_PENUGASAN,LP.KETERANGAN_PENUGASAN FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P

                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND LP.ID_PENUGASAN='$id_penugasan'");
        return $query->result();
    }

    public function edit_log_seminar($id_penugasan) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,P.NIP,LP.NAMA_PENUGASAN, LP.PERANAN, LP.INSTANSI_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_IJAZAH_PENUGASAN, LP.TGL_IJAZAH_PENUGASAN, LP.LAMA_PENUGASAN, LP.TGL_MULAI_PENUGASAN, LP.TGL_SELESAI_PENUGASAN, LP.KETERANGAN_PENUGASAN
                FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P 
                WHERE JP.ID_JENIS_PENUGASAN=4 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND LP.ID_PENUGASAN='$id_penugasan'");
        return $query->result();
    }

    public function edit_log_organisasi($id_organisasi) {
        $query = $this->db->query("SELECT LO.ID_ORGANISASI,LO.JENIS_ORGANISASI,P.NIP,JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI 

        FROM JENIS_ORGANISASI JO, LOG_ORGANISASI LO, PEGAWAI P
        WHERE P.ID_PEGAWAI=LO.ID_PEGAWAI AND LO.ID_ORGANISASI='$id_organisasi'");
        return $query->result();
    }

    public function edit_log_alamat($id_alamat) {
        $query = $this->db->query("SELECT P.NIP,LA.ID_ALAMAT,LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TAHUN_AKTIF
            FROM LOG_ALAMAT LA, PEGAWAI P 
            WHERE LA.ID_PEGAWAI=P.ID_PEGAWAI AND LA.ID_ALAMAT='$id_alamat'");
        return $query->result();
    }

    public function edit_log_pasangan($id_pasangan) {
        $query = $this->db->query("SELECT P.NIP,LP.ID_PASANGAN,LP.STATUS_PASANGAN, LP.NAMA_PASANGAN, LP.TEMPAT_LAHIR_PASANGAN, LP.TGL_LAHIR_PASANGAN, LP.TGL_NIKAH, LP.NO_KARISKARSU, LP.TGL_KARISKARSU, LP.PEKERJAAN_PASANGAN, LP.KETERANGAN_PASANGAN
            FROM PASANGAN LP, PEGAWAI P
            WHERE LP.ID_PEGAWAI = P.ID_PEGAWAI AND LP.ID_PASANGAN='$id_pasangan'");
        return $query->result();
    }

    public function edit_log_ak($id_ak) {
        $query = $this->db->query("SELECT P.NIP,AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK, AK.JENIS_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND AK.ID_AK='$id_ak'");
        return $query->result();
    }

    public function edit_log_medis($id_medis) {
        $query = $this->db->query("SELECT P.NIP,LM.ID_MEDIS,LM.INDIKASI,LM.TINDAKAN, LM.TAHUN_PEMERIKSAAN, LM.KETERANGAN_MEDIS 
                FROM LOG_MEDIS LM, PEGAWAI P 
                WHERE LM.ID_PEGAWAI=P.ID_PEGAWAI AND LM.ID_MEDIS='$id_medis'");
        return $query->result();
    }

    public function edit_log_penghargaan($id_penghargaan) {
        $query = $this->db->query("SELECT P.NIP,LP.ID_LOG_PENGHARGAAN,LP.NAMA_PENGHARGAAN,LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.ID_LOG_PENGHARGAAN='$id_penghargaan'");
        return $query->result();
    }

    public function edit_log_cuti($id_cuti) {
        $query = $this->db->query("SELECT P.NIP, LC.ID_CUTI, LC.JENIS_CUTI, LC.ALASAN_CUTI, LC.NO_SK_CUTI,
                LC.TGL_SK_CUTI, LC.TGL_MULAI_CUTI, LC.TGL_SELESAI_CUTI, LC.STATUS_CUTI
                FROM PEGAWAI P, LOG_CUTI LC
                WHERE P.ID_PEGAWAI=LC.ID_PEGAWAI AND LC.ID_CUTI='$id_cuti'");
        return $query->result();
    }

    public function edit_log_gaji_berkala($id_gaji) {
        $query = $this->db->query("SELECT P.NIP, LG.ID_GAJI, LG.TMT_GAJI, LG.NO_SK_GAJI, LG.TGL_SK_GAJI, LG.TOTAL_GAJI, LG.STATUS_GAJI, LG.KETERANGAN_GAJI
                FROM PEGAWAI P, LOG_GAJI LG
                WHERE P.ID_PEGAWAI=LG.ID_PEGAWAI AND LG.ID_GAJI=$id_gaji");
        return $query->result();
    }
    
//========================================================================================================================================================================================================================
    //UPDATE
    public function update_biodata(
    $nip, $nip_lama, $gelar_depan, $nama_pegawai, $gelar_belakang, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $tmt_cpns, $tmt_pns, $agama, $status_perkawinan, $status_pegawai, $keterangan, $no_kartu_pegawai, $tanggal_kartu_pegawai, $no_ktp, $npwp, $no_askes, $tanggal_askes, $kode_wilayah_askes, $no_handphone, $email, $golongan_darah, $rambut, $bentuk_muka, $warna_kulit, $tinggi_badan, $berat_badan, $ciri_khas, $cacat_tubuh, $bahasa_asing, $hobi, $id_pegawai, $foto, $acc) {
        $query = $this->db->query("  
            UPDATE pegawai set NIP='$nip', NIP_LAMA='$nip_lama', NAMA_PEGAWAI='$nama_pegawai', GELAR_DEPAN='$gelar_depan', GELAR_BELAKANG='$gelar_belakang', 
            JENIS_KELAMIN='$jenis_kelamin', TEMPAT_LAHIR='$tempat_lahir', TGL_LAHIR='$tgl_lahir', AGAMA='$agama', STATUS_PERKAWINAN='$status_perkawinan', TMT_CPNS='$tmt_cpns', TMT_PNS='$tmt_pns', KETERANGAN='$keterangan', 
            STATUS_PEGAWAI='$status_pegawai', NO_KARTU_PEGAWAI='$no_kartu_pegawai', TGL_KARTU_PEGAWAI='$tanggal_kartu_pegawai', NO_KTP='$no_ktp', 
            NO_NPWP='$npwp', NO_ASKES='$no_askes', TGL_ASKES='$tanggal_askes', KODE_WILAYAH_ASKES='$kode_wilayah_askes', NO_HANDPHONE='$no_handphone', 
            EMAIL='$email', GOL_DARAH='$golongan_darah', RAMBUT='$rambut', BENTUK_MUKA='$bentuk_muka', WARNA_KULIT='$warna_kulit', 
            TINGGI_BADAN='$tinggi_badan', BERAT_BADAN='$berat_badan', CIRI_KHAS='$ciri_khas', CACAT_TUBUH='$cacat_tubuh', BAHASA_ASING='$bahasa_asing', HOBI='$hobi'  , FOTO='$foto' , ACC_PEGAWAI=$acc   
            WHERE ID_PEGAWAI=$id_pegawai
            ");
    }

    public function update_log_jabatan($id_jabatan, $aktif, $jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt, $acc) {
        $query = $this->db->query("
                UPDATE log_jabatan set STATUS_JABATAN= $aktif, ID_JENIS_JABATAN=$jabatan, 
                ID_UNIT=$unit_kerja, NO_SK_JABATAN=$no_sk, TGL_SK_JABATAN='$tanggal_sk', TMT_JABATAN='$tmt', ACC_JABATAN=$acc 
                WHERE id_jabatan=$id_jabatan");
    }

    public function update_log_pangkat($id_kepangkatan, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan, $acc) {
        $query = $this->db->query("
                UPDATE log_kepangkatan SET STATUS_KEPANGKATAN=$aktif, ID_JENIS_GOLONGAN='$golongan',
                JENIS_KENAIKAN='$jenis_kenaikan',  TMT_GOLONGAN='$tmt', NO_SK_GOLONGAN=$no_sk,TGL_SK_GOLONGAN='$tanggal_sk',MASA_KERJA_GOLONGAN=$masa_kerja, GAJI_GOLONGAN='$gaji', PERATURAN='$peraturan', KETERANGAN_KEPANGKATAN='$keterangan', ACC_KEPANGKATAN=$acc 
                WHERE ID_KEPANGKATAN=$id_kepangkatan");
    }

    public function update_log_pendidikan($id_pendidikan, $aktif, $tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah, $ipk, $acc) {
        $query = $this->db->query("
                UPDATE log_pendidikan SET STATUS_PENDIDIKAN_TERAKHIR=$aktif, TINGKAT_PENDIDIKAN='$tingkat', NAMA_SEKOLAH='$nama_sekolah', LOKASI='$lokasi', FAKULTAS='$fakultas', JURUSAN='$jurusan', NO_IJAZAH='$no_ijazah', TGL_IJAZAH='$tanggal_ijazah', IPK='$ipk', KETERANGAN_PENDIDIKAN=1, ACC_PENDIDIKAN=$acc
                WHERE ID_PENDIDIKAN=$id_pendidikan    ");
    }

    public function update_log_diklat($id_diklat, $aktif, $jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking, $acc) {
        $query = $this->db->query(" 
                UPDATE log_diklat SET STATUS_DIKLAT='$aktif', ID_JENIS_DIKLAT='$jenis', INSTANSI_DIKLAT='$instansi', NO_IJAZAH_DIKLAT='$no_ijazah', TGL_IJAZAH_DIKLAT='$tanggal_ijazah', LAMA_DIKLAT='$lama', TGL_MULAI_DIKLAT='$tanggal_mulai', TGL_SELESAI_DIKLAT='$tanggal_selesai', ANGKATAN_DIKLAT='$angkatan', RANGKING_DIKLAT='$rangking', ACC_DIKLAT=$acc 
                WHERE ID_DIKLAT=$id_diklat
                ");
    }

    public function update_log_diklat_teknis($id_diklat, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $acc) {
        $query = $this->db->query(" 
                UPDATE log_diklat SET INSTANSI_DIKLAT='$instansi',JUDUL_DIKLAT='$nama_diklat', NO_IJAZAH_DIKLAT='$no_ijazah', TGL_IJAZAH_DIKLAT='$tanggal_ijazah', LAMA_DIKLAT='$lama', TGL_MULAI_DIKLAT='$tanggal_mulai', TGL_SELESAI_DIKLAT='$tanggal_selesai', ACC_DIKLAT=$acc
                WHERE ID_DIKLAT=$id_diklat
                ");
    }

    public function update_log_toefl($id_pendidikan, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai, $acc) {
        $query = $this->db->query(" 
                UPDATE log_pendidikan SET STATUS_PENDIDIKAN_TERAKHIR=$aktif,JENIS_PENDIDIKAN='$jenis', TAHUN_PENDIDIKAN=$tahun, 
                INSTANSI='$instansi', NO_IJAZAH='$no_sertifikat', TGL_IJAZAH='$tanggal_sertifikat', IPK='$nilai', KETERANGAN_PENDIDIKAN=0, ACC_PENDIDIKAN=$acc
                WHERE ID_PENDIDIKAN=$id_pendidikan");
    }

    public function update_log_penugasan($id_penugasan, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE log_penugasan SET ID_JENIS_PENUGASAN=$jenis, LOKASI_PENUGASAN='$lokasi', 
                NO_SK_PENUGASAN='$no_sk', TGL_SK_PENUGASAN='$tgl_sk', TUJUAN_PENUGASAN='$tujuan', 
                BIAYA_PENUGASAN='$biaya', LAMA_PENUGASAN=$lama, TAHUN_PENUGASAN=$tahun, KETERANGAN_PENUGASAN='$keterangan', ACC_PENUGASAN=$acc
                WHERE ID_PENUGASAN=$id_penugasan");
    }

    public function update_log_seminar($id_penugasan, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE log_penugasan SET ID_JENIS_PENUGASAN=4, NAMA_PENUGASAN='$jenis', PERANAN='$peranan', 
                INSTANSI_PENUGASAN='$instansi', LOKASI_PENUGASAN='$lokasi', NO_IJAZAH_PENUGASAN='$no_ijazah', 
                TGL_IJAZAH_PENUGASAN='$tgl_ijazah', LAMA_PENUGASAN=$lama, TGL_MULAI_PENUGASAN='$tanggal_mulai',TGL_SELESAI_PENUGASAN='$tanggal_selesai', KETERANGAN_PENUGASAN='$keterangan', ACC_PENUGASAN=$acc
                where ID_PENUGASAN=$id_penugasan");
    }

    public function update_log_organisasi($id_organisasi, $kd_stat_organisasi, $nama_organisasi, $jabatan, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE log_ORGANISASI SET JENIS_ORGANISASI=$kd_stat_organisasi, NAMA_ORGANISASI='$nama_organisasi', 
                    JABATAN_ORGANISASI='$jabatan', TAHUN_ORGANISASI=$tahun,KETERANGAN_ORGANISASI='$keterangan',ACC_ORGANISASI=$acc
               WHERE ID_ORGANISASI=$id_organisasi");
    }

    public function update_log_alamat($id_alamat, $aktif, $alamat, $provinsi, $kabupaten, $kelurahan, $kecamatan, $kode_pos, $telepon, $fax, $tahun, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE log_alamat SET STATUS_ALAMAT=$aktif,ALAMAT='$alamat',PROVINSI='$provinsi',
                    KABUPATEN='$kabupaten',KELURAHAN='$kelurahan',KECAMATAN='$kecamatan',
                    KODE_POS='$kode_pos',TELEPON='$telepon',FAX='$fax',TAHUN_AKTIF='$tahun',KETERANGAN_ALAMAT='$keterangan',ACC_ALAMAT=$acc
                WHERE ID_ALAMAT=$id_alamat");
    }

    public function update_log_pasangan($id_pasangan, $status, $nama, $tanggal_lahir, $tempat_lahir, $tanggal_nikah, $no_kariskarsu, $tanggal_kariskarsu, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE pasangan SET STATUS_PASANGAN='$status',NAMA_PASANGAN='$nama',TGL_LAHIR_PASANGAN='$tanggal_lahir',
                TEMPAT_LAHIR_PASANGAN='$tempat_lahir',TGL_NIKAH='$tanggal_nikah',NO_KARISKARSU='$no_kariskarsu',
                TGL_KARISKARSU='$tanggal_kariskarsu',PEKERJAAN_PASANGAN='$pekerjaan',KETERANGAN_PASANGAN='$keterangan', ACC_PASANGAN=$acc
                WHERE ID_PASANGAN=$id_pasangan");
    }

    public function update_log_ak($id_ak, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan, $acc) {
        $query = $this->db->query(" 
                UPDATE anggota_keluarga SET STATUS_AK='$status',NAMA_AK='$nama',
                JENIS_KELAMIN_AK='$jenis_kelamin',TGL_LAHIR_AK='$tanggal_lahir',
                TEMPAT_LAHIR_AK='$tempat_lahir',PEKERJAAN_AK='$pekerjaan',KETERANGAN_AK='$keterangan',ACC_AK=$acc
                WHERE ID_AK=$id_ak");
    }

    public function update_log_gaji_berkala($id_gaji, $status, $tmt, $no_sk, $tanggal_sk, $gaji, $keterangan, $acc) {
        $query = $this->db->query("
               UPDATE log_gaji SET STATUS_GAJI=$status, TMT_GAJI='$tmt', NO_SK_GAJI='$no_sk', TGL_SK_GAJI='$tanggal_sk', KETERANGAN_GAJI='$keterangan', ACC_GAJI=$acc
                WHERE ID_GAJI=$id_gaji");
    }

    public function update_log_penghargaan($id_penghargaan, $nama, $instansi, $no_sk, $tanggal_sk, $tahun, $keterangan, $acc) {
        $query = $this->db->query("
                UPDATE log_penghargaan SET NAMA_PENGHARGAAN='$nama', INSTANSI_PENGHARGAAN='$instansi', 
                    NO_SK_PENGHARGAAN='$no_sk',TGL_SK_PENGHARGAAN='$tanggal_sk',TAHUN_PENGHARGAAN='$tahun', 
                        KETERANGAN_PENGHARGAAN='$keterangan', ACC_PENGHARGAAN=$acc
                WHERE ID_LOG_PENGHARGAAN=$id_penghargaan");
    }

    public function update_log_medis($id_medis, $indikasi, $tindakan, $tahun, $keterangan, $acc) {
        $query = $this->db->query("
                UPDATE log_medis SET INDIKASI='$indikasi', TINDAKAN= '$tindakan', 
                    TAHUN_PEMERIKSAAN='$tahun', KETERANGAN_MEDIS='$keterangan', ACC_MEDIS=$acc 
                WHERE ID_MEDIS=$id_medis");
    }

    public function update_log_cuti($id_cuti, $aktif, $jenis, $alasan, $no_sk, $tgl_sk, $tgl_mulai, $tgl_selesai, $acc) {
        $query = $this->db->query("
                UPDATE log_cuti SET STATUS_CUTI=$aktif, JENIS_CUTI= '$jenis', 
                    ALASAN_CUTI='$alasan', NO_SK_CUTI='$no_sk', TGL_SK_CUTI='$tgl_sk', TGL_MULAI_CUTI='$tgl_mulai', TGL_SELESAI_CUTI= '$tgl_selesai',ACC_CUTI=$acc 
                WHERE ID_CUTI=$id_cuti");
    }

//========================================================================================================================================================================================================================
    //PERINGATAN
    public function get_pensiun() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, P.GELAR_DEPAN, P.GELAR_BELAKANG, JG.GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT, (ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0)) AS UMUR, (696 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) AS PENSIUN
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND P.STATUS_AKTIF=1 AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND (696 -(ROUND(DATEDIFF(NOW(),TGL_LAHIR)/365,0))*12) <= 3
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }

    public function get_kgb() {
        $query = $this->db->query("SELECT P.ID_PEGAWAI, P.NIP, P.NAMA_PEGAWAI, P.GELAR_DEPAN, P.GELAR_BELAKANG, JG.GOLONGAN, LK.TMT_GOLONGAN, P.JENIS_KELAMIN, LP.TINGKAT_PENDIDIKAN, J.JABATAN, U.NAMA_UNIT
        FROM PEGAWAI P, UNIT_KERJA U, JABATAN J, LOG_JABATAN LJ, LOG_PENDIDIKAN LP, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK
        WHERE P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LJ.ID_UNIT=U.ID_UNIT AND LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LP.KETERANGAN_PENDIDIKAN=1 AND LK.ID_PEGAWAI=P.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND LJ.STATUS_JABATAN=1 and P.STATUS_PEGAWAI='PNS' AND P.STATUS_AKTIF=1
        ORDER BY P.NAMA_PEGAWAI ");
        return $query->result();
    }

    public function get_naikPangkat() {
        $query = $this->db->query("Select * from get_all_pegawai");
        return $query->result();
    }

    public function get_kp() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN,P.NAMA_PEGAWAI,P.GELAR_BELAKANG, JG.GOLONGAN, jg.NAMA_PANGKAT, LK.TMT_GOLONGAN, J.JABATAN, LJ.TMT_JABATAN, P.TGL_LAHIR, U.NAMA_UNIT
        FROM PEGAWAI P, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK, LOG_JABATAN LJ, JABATAN J,UNIT_KERJA U
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND JG.ID_JENIS_GOLONGAN=LK.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND U.ID_UNIT=LJ.ID_UNIT AND P.STATUS_PEGAWAI='PNS' AND P.STATUS_AKTIF=1
        ORDER BY JG.ID_JENIS_GOLONGAN DESC");
        return $query->result();
    }

    //PERSETUJUAN
    public function get_alamat() {
        $query = $this->db->query("select * 
        from pegawai p, log_alamat la
        where p.id_pegawai=la.id_pegawai and la.STATUS_ALAMAT=1 and p.STATUS_AKTIF=1 AND la.ACC_ALAMAT=0");
        return $query;
    }

    public function get_cuti() {
        $query = $this->db->query("SELECT * 
        from PEGAWAI P, LOG_CUTI LC
        WHERE P.ID_PEGAWAI=LC.ID_PEGAWAI and p.status_aktif=1 and LC.ACC_CUTI=0");
        return $query;
    }

    public function get_diklat() {
        $query = $this->db->query("select * 
        from pegawai p, log_diklat ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_DIKLAT=0;");
        return $query;
    }

    public function get_acc_jabatan() {
        $query = $this->db->query("select * 
        from pegawai p, log_JABATAN ld, UNIT_KERJA U, JABATAN J
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_JABATAN=0 AND LD.ID_UNIT=U.ID_UNIT AND J.ID_JENIS_JABATAN=LD.ID_JENIS_JABATAN;");
        return $query;
    }

    public function get_kepangkatan() {
        $query = $this->db->query("select * 
        from pegawai p, log_KEPANGKATAN ld, jenis_golongan jg
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_KEPANGKATAN=0 and jg.id_jenis_golongan=ld.id_jenis_golongan;");
        return $query;
    }

    public function get_medis() {
        $query = $this->db->query("select * 
        from pegawai p, log_MEDIS ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_MEDIS=0;");
        return $query;
    }

    public function get_organisasi() {
        $query = $this->db->query("select * 
        from pegawai p, log_ORGANISASI ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_ORGANISASI=0;");
        return $query;
    }

    public function get_pendidikan() {
        $query = $this->db->query("select * 
        from pegawai p, log_PENDIDIKAN ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_PENDIDIKAN=0;");
        return $query;
    }

    public function get_penghargaan() {
        $query = $this->db->query("select * 
        from pegawai p, log_PENGHARGAAN ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_PENGHARGAAN=0;");
        return $query;
    }

    public function get_penugasan() {
        $query = $this->db->query("select * 
        from pegawai p, log_PENUGASAN ld
        where p.id_pegawai=ld.id_pegawai and p.STATUS_AKTIF=1 and ld.ACC_PENUGASAN=0;");
        return $query;
    }

    public function acc_alamat($id) {
        $query = $this->db->query("UPDATE LOG_ALAMAT SET ACC_ALAMAT=1 WHERE ID_ALAMAT=$id");
    }

    public function acc_diklat($id) {
        $query = $this->db->query("UPDATE LOG_DIKLAT SET ACC_diklat=1 WHERE ID_DIKLAT=$id");
    }

    public function acc_jabatan($id) {
        $query = $this->db->query("UPDATE LOG_JABATAN SET ACC_jabatan=1 WHERE ID_JABATAN=$id");
    }

    public function acc_kepangkatan($id) {
        $query = $this->db->query("UPDATE LOG_kepangkatan SET ACC_kepangkatan=1 WHERE ID_kepangkatan=$id");
    }

    public function acc_medis($id) {
        $query = $this->db->query("UPDATE LOG_medis SET ACC_medis=1 WHERE ID_medis=$id");
    }

    public function acc_organisasi($id) {
        $query = $this->db->query("UPDATE LOG_organisasi SET ACC_organisasi=1 WHERE ID_organisasi=$id");
    }

    public function acc_pendidikan($id) {
        $query = $this->db->query("UPDATE LOG_pendidikan SET ACC_pendidikan=1 WHERE ID_pendidikan=$id");
    }

    public function acc_penghargaan($id) {
        $query = $this->db->query("UPDATE LOG_penghargaan SET ACC_penghargaan=1 WHERE ID_log_penghargaan=$id");
    }

    public function acc_penugasan($id) {
        $query = $this->db->query("UPDATE LOG_penugasan SET ACC_penugasan=1 WHERE ID_penugasan=$id");
    }

    public function acc_cuti($id) {
        $query = $this->db->query("UPDATE LOG_CUTI SET ACC_CUTI=1 WHERE ID_CUTI=$id");
    }

    public function reject_alamat($id) {
        $query = $this->db->query("delete from log_alamat where id_alamat=$id");
    }

    public function reject_diklat($id) {
        $query = $this->db->query("delete from log_diklat where id_diklat=$id");
    }

    public function reject_jabatan($id) {
        $query = $this->db->query("delete from log_jabatan where id_jabatan=$id");
    }

    public function reject_kepangkatan($id) {
        $query = $this->db->query("delete from log_kepangkatan where id_kepangkatan=$id");
    }

    public function reject_medis($id) {
        $query = $this->db->query("delete from log_medis where id_medis=$id");
    }

    public function reject_organisasi($id) {
        $query = $this->db->query("delete from log_organisasi where id_organisasi=$id");
    }

    public function reject_pendidikan($id) {
        $query = $this->db->query("delete from log_pendidikan where id_pendidikan=$id");
    }

    public function reject_penghargaan($id) {
        $query = $this->db->query("delete from log_penghargaan where id_log_penghargaan=$id");
    }

    public function reject_penugasan($id) {
        $query = $this->db->query("delete from log_penugasan where id_penugasan=$id");
    }

    public function reject_cuti($id) {
        $query = $this->db->query("delete from log_cuti where id_cuti=$id");
    }
    
    public function count_status_jabatan($nip){
        $query = $this->db->query("
        SELECT a.id_jabatan,d.cnt
        FROM log_jabatan a, pegawai b,
        (SELECT COUNT(p.status_jabatan) AS cnt from log_jabatan p, pegawai peg where p.status_jabatan=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_jabatan=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_jabatan($id_jabatan){
        $query = $this->db->query("UPDATE log_jabatan set status_jabatan=0 where id_jabatan=$id_jabatan");
    }
    
    public function count_status_pangkat($nip){
        $query = $this->db->query("
        SELECT a.id_kepangkatan,d.cnt
        FROM log_kepangkatan a, pegawai b,
        (SELECT COUNT(p.status_kepangkatan) AS cnt from log_kepangkatan p, pegawai peg where p.status_kepangkatan=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_kepangkatan=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_pangkat($id_pangkat){
        $query = $this->db->query("UPDATE log_kepangkatan set status_kepangkatan=0 where id_kepangkatan=$id_pangkat");
    }
    
    
    public function count_status_pendidikan($nip){
        $query = $this->db->query("
        SELECT a.id_pendidikan,d.cnt
        FROM log_pendidikan a, pegawai b,
        (SELECT COUNT(p.status_pendidikan_terakhir) AS cnt from log_pendidikan p, pegawai peg where p.status_pendidikan_terakhir=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_pendidikan_terakhir=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_pendidikan($id_pend){
        $query = $this->db->query("UPDATE log_pendidikan set status_pendidikan_terakhir=0 where id_pendidikan=$id_pend");
    }
    
    public function count_status_diklat($nip){
        $query = $this->db->query("
        SELECT a.id_diklat,d.cnt
        FROM log_diklat a, pegawai b,
        (SELECT COUNT(p.status_diklat) AS cnt from log_diklat p, pegawai peg where p.status_diklat=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_diklat=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_diklat($id_diklat){
        $query = $this->db->query("UPDATE log_diklat set status_diklat=0 where id_diklat=$id_diklat");
    }
    
    public function count_status_alamat($nip){
        $query = $this->db->query("
        SELECT a.id_alamat,d.cnt
        FROM log_alamat a, pegawai b,
        (SELECT COUNT(p.status_alamat) AS cnt from log_alamat p, pegawai peg where p.status_alamat=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_alamat=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_alamat($id_alamat){
        $query = $this->db->query("UPDATE log_alamat set status_alamat=0 where id_alamat=$id_alamat");
    }
    
    public function count_status_gaji($nip){
        $query = $this->db->query("
        SELECT a.id_gaji,d.cnt
        FROM log_gaji a, pegawai b,
        (SELECT COUNT(p.status_gaji) AS cnt from log_gaji p, pegawai peg where p.status_gaji=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_gaji=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_gaji($id_gaji){
        $query = $this->db->query("UPDATE log_gaji set status_gaji=0 where id_gaji=$id_gaji");
    }
    public function count_status_cuti($nip){
        $query = $this->db->query("
        SELECT a.id_cuti,d.cnt
        FROM log_cuti a, pegawai b,
        (SELECT COUNT(p.status_cuti) AS cnt from log_cuti p, pegawai peg where p.status_cuti=1 and p.id_pegawai=peg.id_pegawai and peg.nip='$nip') as d
        where a.status_cuti=1 and a.id_pegawai=b.id_pegawai and b.nip='$nip'        
        ");
        return $query->result();
    }
    
    public function update_status_cuti($id_cuti){
        $query = $this->db->query("UPDATE log_cuti set status_cuti=0 where id_cuti=$id_cuti");
    }

//========================================================================================================================================================================================================================
    //CETAK  
    public function get_duk() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN,P.NAMA_PEGAWAI,P.GELAR_BELAKANG, JG.GOLONGAN, jg.NAMA_PANGKAT, LK.TMT_GOLONGAN, J.JABATAN, LJ.TMT_JABATAN, P.TGL_LAHIR, P.TMT_CPNS, LP.NAMA_SEKOLAH, LP.TAHUN_PENDIDIKAN, LP.TINGKAT_PENDIDIKAN
        FROM PEGAWAI P, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK, LOG_JABATAN LJ, JABATAN J, LOG_PENDIDIKAN LP
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND JG.ID_JENIS_GOLONGAN=LK.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND P.STATUS_PEGAWAI='PNS' AND P.STATUS_AKTIF=1
        ORDER BY JG.ID_JENIS_GOLONGAN DESC");
        return $query->result();
    }

    public function get_dsp() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN, P.NAMA_PEGAWAI, P.GELAR_BELAKANG, P.TEMPAT_LAHIR, P.TGL_LAHIR, P.JENIS_KELAMIN, JG.GOLONGAN, LP.TINGKAT_PENDIDIKAN, LP.JURUSAN, LP.NO_IJAZAH, P.TMT_CPNS, P.AGAMA, U.NAMA_UNIT, J.JABATAN, J.BAGIAN, J.SUBBAGIAN, J.LEVEL
        FROM JABATAN J, UNIT_KERJA U, PEGAWAI P, LOG_JABATAN LJ, LOG_KEPANGKATAN LK, JENIS_GOLONGAN JG, LOG_PENDIDIKAN LP
        WHERE U.ID_UNIT=J.BAGIAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND P.ID_PEGAWAI=LK.ID_PEGAWAI AND LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI 
        AND LP.STATUS_PENDIDIKAN_TERAKHIR=1 AND LJ.STATUS_JABATAN=1 AND LK.STATUS_KEPANGKATAN=1 AND P.STATUS_AKTIF=1
        ORDER BY J.BAGIAN ASC , J.SUBBAGIAN ASC, J.LEVEL ASC");
        return $query->result();
    }

//========================================================================================================================================================================================================================
    //AKUN 
    public function get_akun($NIP) {
        $query = $this->db->query("select p.ID_PEGAWAI, p.NIP, p.NAMA_PEGAWAI, p.FOTO
        from pegawai p, akun a
        where p.id_pegawai=a.id_pegawai and p.nip='$NIP'");
        return $query->result();
    }

    public function get_password($nip) {
        $query = $this->db->query("select a.password from akun a, pegawai p where p.id_pegawai=a.id_pegawai and p.nip='$nip'");
        return $query->result();
    }

    public function ubah_akun($nip, $password) {
        $query = $this->db->query("update akun, pegawai set akun.password='$password'
        where akun.id_pegawai=pegawai.id_pegawai and pegawai.NIP='$nip'");
    }

}
