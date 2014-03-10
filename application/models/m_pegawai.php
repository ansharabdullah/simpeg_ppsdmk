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

    public function get_periode() {
        $query = $this->db->query("SELECT tanggal_periode FROM `periode` WHERE 1 order by tanggal_periode asc");
        $data = $query->result();
        $periode;
        foreach ($data as $row) {
            $periode = $row->tanggal_periode;
        }
        return $periode;
    }

    //INSERT PEGAWAI
    public function insert_pegawai(
                $nip,$nip_lama,$gelar_depan,$nama_pegawai,$gelar_belakang ,$tempat_lahir ,$tgl_lahir, 
                $jenis_kelamin ,$alamat ,$kecamatan ,$kelurahan ,$kabupaten ,$provinsi ,$tmt_cpns ,
                $tmt_pns ,$agama ,$status_perkawinan ,$status_pegawai ,$foto ,$keterangan ,$jabatan, 
                $unit_kerja, $golongan , $pendidikan ,$nama_sekolah
            ){
        $query = $this->db->query("INSERT INTO pegawai (NIP, NIP_LAMA, NAMA_PEGAWAI, GELAR_DEPAN, GELAR_BELAKANG, JENIS_KELAMIN, 
            TEMPAT_LAHIR, TGL_LAHIR, AGAMA, STATUS_PERKAWINAN, TMT_CPNS, TMT_PNS, KETERANGAN, STATUS_PEGAWAI, FOTO) 
            VALUES ('$nip', '$nip_lama','$nama_pegawai', '$gelar_depan',  '$gelar_belakang', '$jenis_kelamin',
                '$tempat_lahir', '$tgl_lahir',  '$agama', '$status_perkawinan', '$tmt_cpns', '$tmt_pns', '$keterangan',
                '$status_pegawai', '$foto')");
        $last_id = $this->db->insert_id();
        $query2 = $this->db->query("INSERT INTO log_jabatan (ID_PEGAWAI, ID_JENIS_JABATAN, ID_UNIT, STATUS_JABATAN) 
                VALUES ($last_id, $jabatan, $unit_kerja, 1)");
        $query3 = $this->db->query("INSERT INTO log_kepangkatan (ID_PEGAWAI, ID_JENIS_GOLONGAN, STATUS_KEPANGKATAN) VALUES ($last_id,$golongan,1)");
        $query4 = $this->db->query("INSERT INTO log_pendidikan (ID_PEGAWAI, TINGKAT_PENDIDIKAN, NAMA_SEKOLAH,STATUS_PENDIDIKAN_TERAKHIR,KETERANGAN_PENDIDIKAN)
                VALUES($last_id, '$pendidikan', '$nama_sekolah', 1,1)");
        $query5 = $this->db->query("INSERT INTO log_alamat (ID_PEGAWAI, STATUS_ALAMAT, ALAMAT, PROVINSI, KABUPATEN, KELURAHAN, KECAMATAN)
                VALUES($last_id, 1, '$alamat', '$provinsi', '$kabupaten', '$kelurahan', '$kecamatan')");
        
    }

    public function insert_data_tambahan($id_pegawai, $no_kartu_pegawai, $tanggal_kartu_pegawai, $no_ktp, $npwp, $no_askes, $tanggal_askes, $kode_wilayah_askes, $no_handphone, $email, $golongan_darah, $rambut, $bentuk_muka, $warna_kulit, $tinggi_badan, $berat_badan, $ciri_khas, $cacat_tubuh, $bahasa_asing, $hobi) {
        $query = $this->db->query("UPDATE pegawai set NO_KARTU_PEGAWAI='$no_kartu_pegawai', TGL_KARTU_PEGAWAI='$tanggal_kartu_pegawai', 
                NO_KTP='$no_ktp', NO_NPWP='$npwp', NO_ASKES='$no_askes',TGL_ASKES='$tanggal_askes',KODE_WILAYAH_ASKES='$kode_wilayah_askes',
                NO_HANDPHONE='$no_handphone', EMAIL='$email', GOL_DARAH='$golongan_darah', RAMBUT='$rambut', BENTUK_MUKA='$bentuk_muka', 
                WARNA_KULIT='$warna_kulit', TINGGI_BADAN='$tinggi_badan', BERAT_BADAN='$berat_badan', 
                CIRI_KHAS='$ciri_khas', CACAT_TUBUH='$cacat_tubuh', BAHASA_ASING='$bahasa_asing', HOBI='$hobi' where ID_PEGAWAI=$id_pegawai
                ");
    }

    //INSERT LOG
    public function insert_log_jabatan($id_pegawai, $aktif, $jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt) {
        $query = $this->db->query("
                INSERT INTO log_jabatan (ID_PEGAWAI, STATUS_JABATAN, ID_JENIS_JABATAN, ID_UNIT,NO_SK_JABATAN, TGL_SK_JABATAN, TMT_JABATAN) 
                VALUES ($id_pegawai, $aktif, $jabatan, $unit_kerja, '$no_sk', '$tanggal_sk', '$tmt')");
    }

    public function insert_log_pangkat($id_pegawai, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan) {
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN,ID_JENIS_GOLONGAN, JENIS_KENAIKAN,  TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, GAJI_GOLONGAN, PERATURAN, KETERANGAN_KEPANGKATAN) 
                VALUES ($id_pegawai, $aktif, $golongan, '$jenis_kenaikan', '$tmt', '$no_sk', '$tanggal_sk', $masa_kerja, '$gaji', '$peraturan', '$keterangan')");
    }

    public function insert_log_pendidikan($id_pegawai, $aktif, $tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah, $ipk) {
        $query = $this->db->query("
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR, TINGKAT_PENDIDIKAN, NAMA_SEKOLAH, LOKASI, FAKULTAS, JURUSAN, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$tingkat', '$nama_sekolah', '$lokasi', '$fakultas', '$jurusan', '$no_ijazah', '$tanggal_ijazah', '$ipk', 1)");
    }

    public function insert_log_diklat_struktural($id_pegawai, $aktif, $jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT, RANGKING_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis, '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan', '$rangking' )
                ");
    }

    public function insert_log_diklat_fungsional($id_pegawai, $aktif, $jenis, $nama_diklat, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, STATUS_DIKLAT, ID_JENIS_DIKLAT, JUDUL_DIKLAT, INSTANSI_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT, ANGKATAN_DIKLAT)
                VALUES ($id_pegawai, $aktif, $jenis,'$nama_diklat', '$instansi',$no_ijazah, '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai', '$angkatan')
                ");
    }

    public function insert_log_diklat_teknis($id_pegawai, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai) {
        $query = $this->db->query(" 
                INSERT INTO log_diklat (ID_PEGAWAI, INSTANSI_DIKLAT,JUDUL_DIKLAT, NO_IJAZAH_DIKLAT, TGL_IJAZAH_DIKLAT, LAMA_DIKLAT, TGL_MULAI_DIKLAT, TGL_SELESAI_DIKLAT)
                VALUES ($id_pegawai, '$instansi','$nama_diklat', '$no_ijazah', '$tanggal_ijazah', '$lama', '$tanggal_mulai', '$tanggal_selesai')
                ");
    }

    public function insert_log_toefl($id_pegawai, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai) {
        $query = $this->db->query(" 
                INSERT INTO log_pendidikan (ID_PEGAWAI,STATUS_PENDIDIKAN_TERAKHIR,JENIS_PENDIDIKAN, TAHUN_PENDIDIKAN, INSTANSI, NO_IJAZAH, TGL_IJAZAH, IPK, KETERANGAN_PENDIDIKAN)
                VALUES ($id_pegawai, $aktif, '$jenis', $tahun, '$instansi',  '$no_sertifikat', '$tanggal_sertifikat', '$ipk', 0)");
    }

    public function insert_log_penugasan($id_pegawai, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, LOKASI_PENUGASAN, NO_SK_PENUGASAN, TGL_SK_PENUGASAN, TUJUAN_PENUGASAN, BIAYA_PENUGASAN, LAMA_PENUGASAN, TAHUN_PENUGASAN, KETERANGAN_PENUGASAN)
                VALUES ($id_pegawai, $jenis, '$lokasi', '$no_sk', '$tgl_sk', '$tujuan', '$biaya', $lama, $tahun, '$keterangan')");
    }

    public function insert_log_seminar($id_pegawai, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO log_penugasan (ID_PEGAWAI,ID_JENIS_PENUGASAN, NAMA_PENUGASAN, PERANAN, INSTANSI_PENUGASAN, LOKASI_PENUGASAN, NO_IJAZAH_PENUGASAN, TGL_IJAZAH_PENUGASAN, LAMA_PENUGASAN, TGL_MULAI_PENUGASAN,TGL_SELESAI_PENUGASAN, KETERANGAN_PENUGASAN)
                VALUES ($id_pegawai,4, '$jenis', '$peranan', '$instansi', '$lokasi', '$no_ijazah', '$tgl_ijazah', $lama, '$tanggal_mulai', '$tanggal_selesai', '$keterangan')");
    }

    public function insert_log_organisasi($id_pegawai, $kd_stat_organisasi, $nama_organisasi, $jabatan, $tahun, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO log_ORGANISASI (ID_PEGAWAI,ID_JENIS_ORGANISASI, NAMA_ORGANISASI, JABATAN_ORGANISASI, TAHUN_ORGANISASI,KETERANGAN_ORGANISASI)
                VALUES ($id_pegawai,$kd_stat_organisasi,'$nama_organisasi','$jabatan',$tahun, '$keterangan')");
    }

    public function insert_log_alamat($id_pegawai, $aktif, $alamat, $provinsi, $kabupaten, $kelurahan, $kecamatan, $kode_pos, $telepon, $fax, $tahun, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO log_alamat (ID_PEGAWAI,STATUS_ALAMAT,ALAMAT,PROVINSI,KABUPATEN,KELURAHAN,KECAMATAN,KODE_POS,TELEPON,FAX,TAHUN_AKTIF,KETERANGAN_ALAMAT)
                VALUES ($id_pegawai,$aktif,'$alamat','$provinsi','$kabupaten','$kelurahan','$kecamatan','$kode_pos','$telepon','$fax',$tahun,'$keterangan')");
    }

    public function insert_log_pasangan($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $tanggal_nikah, $no_kariskarsu, $tanggal_kariskarsu, $pekerjaan, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO pasangan(ID_PEGAWAI,STATUS_PASANGAN,NAMA_PASANGAN,TGL_LAHIR_PASANGAN,TEMPAT_LAHIR_PASANGAN,TGL_NIKAH,NO_KARISKARSU,TGL_KARISKARSU,PEKERJAAN_PASANGAN,KETERANGAN_PASANGAN)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$tanggal_nikah','$no_kariskarsu','$tanggal_kariskarsu','$pekerjaan','$keterangan')");
    }

    public function insert_log_anak($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',1)");
    }

    public function insert_log_saudara($id_pegawai, $status, $nama, $jenis_kelamin, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,JENIS_KELAMIN_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$jenis_kelamin','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',2)");
    }

    public function insert_log_orangtua($id_pegawai, $status, $nama, $tanggal_lahir, $tempat_lahir, $pekerjaan, $keterangan) {
        $query = $this->db->query(" 
                INSERT INTO anggota_keluarga(ID_PEGAWAI,STATUS_AK,NAMA_AK,TGL_LAHIR_AK,TEMPAT_LAHIR_AK,PEKERJAAN_AK,KETERANGAN_AK,JENIS_AK)
                VALUES ($id_pegawai,'$status','$nama','$tanggal_lahir','$tempat_lahir','$pekerjaan','$keterangan',3)");
    }

    public function insert_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $keterangan) {
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN, TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, ID_KATEGORI_GAJI, KETERANGAN_KEPANGKATAN) 
                VALUES ($id_pegawai, $status, '$tmt', $no_sk, '$tanggal_sk', $masa_kerja, $gaji, '$keterangan')");
    }

    public function insert_log_penghargaan($id_pegawai, $nama, $instansi, $no_sk, $tanggal_sk, $tahun, $keterangan) {
        $query = $this->db->query("
                INSERT INTO log_penghargaan (ID_PEGAWAI,NAMA_PENGHARGAAN, INSTANSI_PENGHARGAAN, NO_SK_PENGHARGAAN,TGL_SK_PENGHARGAAN,TAHUN_PENGHARGAAN, KETERANGAN_PENGHARGAAN) 
                VALUES ($id_pegawai, '$nama', '$instansi','$no_sk', '$tanggal_sk', '$tahun', '$keterangan')");
    }

    public function insert_log_medis($id_pegawai, $indikasi, $tindakan, $tahun, $keterangan) {
        $query = $this->db->query("
                INSERT INTO log_medis (ID_PEGAWAI,INDIKASI, TINDAKAN, TAHUN_PEMERIKSAAN, KETERANGAN_MEDIS) 
                VALUES ($id_pegawai, '$indikasi', '$tindakan','$tahun', '$keterangan')");
    }

    //DELETE
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

    //GET LOG 
    public function get_log_jabatan($nip) {
        $query = $this->db->query("SELECT LJ.ID_JABATAN, LJ.STATUS_JABATAN,J.JABATAN, UK.NAMA_UNIT, LJ.NO_SK_JABATAN, LJ.TGL_SK_JABATAN, LJ.TMT_JABATAN FROM JABATAN J, UNIT_KERJA UK, LOG_JABATAN LJ, PEGAWAI P
        WHERE J.ID_JENIS_JABATAN=LJ.ID_JENIS_JABATAN AND LJ.ID_PEGAWAI=P.ID_PEGAWAI AND LJ.ID_UNIT=UK.ID_UNIT AND P.NIP='$nip' order by lj.status_jabatan desc");
        return $query->result();
    }

    public function get_log_kepangkatan($nip) {
        $query = $this->db->query("SELECT LK.ID_KEPANGKATAN,LK.STATUS_KEPANGKATAN, JG.NAMA_PANGKAT, JG.GOLONGAN,  LK.JENIS_KENAIKAN,LK.TMT_GOLONGAN, LK.NO_SK_GOLONGAN, LK.TGL_SK_GOLONGAN, LK.MASA_KERJA_GOLONGAN, LK.GAJI_GOLONGAN, LK.PERATURAN, LK.KETERANGAN_KEPANGKATAN
        FROM LOG_KEPANGKATAN LK, PEGAWAI P, JENIS_GOLONGAN JG
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI  AND 
        LK.ID_JENIS_GOLONGAN=JG.ID_JENIS_GOLONGAN AND P.NIP='$nip' order by lk.status_kepangkatan desc");
        return $query->result();
    }

    public function get_log_pendidikan($nip) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.TINGKAT_PENDIDIKAN, LP.NAMA_SEKOLAH, LP.LOKASI, LP.FAKULTAS,LP.JURUSAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
                    FROM LOG_PENDIDIKAN LP, PEGAWAI P
                    WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=1 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_struktural($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
        FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
        WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=1 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_fungsional($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT, LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM DIKLAT D, LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=2 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    PUBLIC FUNCTION get_log_diklat_teknis($nip) {
        $query = $this->db->query("SELECT LD.ID_DIKLAT,LD.STATUS_DIKLAT,D.NAMA_DIKLAT,LD.JUDUL_DIKLAT, LD.INSTANSI_DIKLAT, LD.NO_IJAZAH_DIKLAT, LD.TGL_IJAZAH_DIKLAT, LD.LAMA_DIKLAT, LD.TGL_MULAI_DIKLAT, LD.TGL_SELESAI_DIKLAT, LD.ANGKATAN_DIKLAT, LD.RANGKING_DIKLAT
            FROM  DIKLAT D,LOG_DIKLAT LD, PEGAWAI P
            WHERE D.ID_JENIS_DIKLAT=LD.ID_JENIS_DIKLAT AND P.ID_PEGAWAI=LD.ID_PEGAWAI AND D.JENIS_DIKLAT=3 AND P.NIP='$nip' order by LD.STATUS_DIKLAT desc");
        return $query->result();
    }

    public function get_log_toefl($nip) {
        $query = $this->db->query("SELECT LP.ID_PENDIDIKAN,LP.STATUS_PENDIDIKAN_TERAKHIR, LP.JENIS_PENDIDIKAN, LP.TAHUN_PENDIDIKAN, LP.INSTANSI, LP.NO_IJAZAH, LP.TGL_IJAZAH, LP.IPK 
            FROM LOG_PENDIDIKAN LP, PEGAWAI P
            WHERE P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.KETERANGAN_PENDIDIKAN=0 order by LP.STATUS_PENDIDIKAN_TERAKHIR desc");
        return $query->result();
    }

    public function get_log_penugasan($nip) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,JP.JENIS_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_SK_PENUGASAN, LP.TGL_SK_PENUGASAN, LP.TUJUAN_PENUGASAN, LP.BIAYA_PENUGASAN, LP.LAMA_PENUGASAN, LP.TAHUN_PENUGASAN,LP.KETERANGAN_PENUGASAN FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P

                WHERE JP.ID_JENIS_PENUGASAN=LP.ID_JENIS_PENUGASAN AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN<>4");
        return $query->result();
    }

    public function get_log_seminar($nip) {
        $query = $this->db->query("SELECT LP.ID_PENUGASAN,LP.NAMA_PENUGASAN, LP.PERANAN, LP.INSTANSI_PENUGASAN, LP.LOKASI_PENUGASAN, LP.NO_IJAZAH_PENUGASAN, LP.TGL_IJAZAH_PENUGASAN, LP.LAMA_PENUGASAN, LP.TGL_MULAI_PENUGASAN, LP.TGL_SELESAI_PENUGASAN, LP.KETERANGAN_PENUGASAN
                FROM JENIS_PENUGASAN JP, LOG_PENUGASAN LP, PEGAWAI P 
                WHERE JP.ID_JENIS_PENUGASAN=4 AND P.ID_PEGAWAI=LP.ID_PEGAWAI AND P.NIP='$nip' AND LP.ID_JENIS_PENUGASAN=4");
        return $query->result();
    }

    public function get_log_organisasi($nip) {
        $query = $this->db->query("SELECT LO.ID_ORGANISASI,JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI 

        FROM JENIS_ORGANISASI JO, LOG_ORGANISASI LO, PEGAWAI P
        WHERE JO.ID_JENIS_ORGANISASI=LO.ID_JENIS_ORGANISASI AND P.ID_PEGAWAI=LO.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_alamat($nip) {
        $query = $this->db->query("SELECT LA.ID_ALAMAT,LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TAHUN_AKTIF
            FROM LOG_ALAMAT LA, PEGAWAI P 
            WHERE LA.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' order by LA.STATUS_ALAMAT desc");
        return $query->result();
    }

    public function get_log_pasangan($nip) {
        $query = $this->db->query("SELECT LP.ID_PASANGAN,LP.STATUS_PASANGAN, LP.NAMA_PASANGAN, LP.TEMPAT_LAHIR_PASANGAN, LP.TGL_LAHIR_PASANGAN, LP.TGL_NIKAH, LP.NO_KARISKARSU, LP.TGL_KARISKARSU, LP.PEKERJAAN_PASANGAN, LP.KETERANGAN_PASANGAN
            FROM PASANGAN LP, PEGAWAI P
            WHERE LP.ID_PEGAWAI = P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_anak($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=1");
        return $query->result();
    }

    public function get_log_saudara($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=2");
        return $query->result();
    }

    public function get_log_medis($nip) {
        $query = $this->db->query("SELECT LM.ID_MEDIS,LM.INDIKASI,LM.TINDAKAN, LM.TAHUN_PEMERIKSAAN, LM.KETERANGAN_MEDIS 
                FROM LOG_MEDIS LM, PEGAWAI P 
                WHERE LM.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_penghargaan($nip) {
        $query = $this->db->query("SELECT LP.ID_LOG_PENGHARGAAN,LP.NAMA_PENGHARGAAN,LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip'");
        return $query->result();
    }

    public function get_log_orang_tua($nip) {
        $query = $this->db->query("SELECT AK.ID_AK,AK.STATUS_AK, AK.NAMA_AK, AK.TEMPAT_LAHIR_AK, AK.TGL_LAHIR_AK, AK.JENIS_KELAMIN_AK, AK.PEKERJAAN_AK, AK.KETERANGAN_AK
            FROM ANGGOTA_KELUARGA AK, PEGAWAI P
            WHERE AK.ID_PEGAWAI=P.ID_PEGAWAI AND P.NIP='$nip' AND AK.JENIS_AK=3");
        return $query->result();
    }
    
    

    //SELECT FOR EDIT
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

    public function edit_log_organisasi($id_organisasi){
        $query = $this->db->query ("SELECT LO.ID_ORGANISASI,JO.ID_JENIS_ORGANISASI,P.NIP,JO.JENIS_ORGANISASI, LO.NAMA_ORGANISASI, LO.JABATAN_ORGANISASI, LO.TAHUN_ORGANISASI, LO.KETERANGAN_ORGANISASI 

        FROM JENIS_ORGANISASI JO, LOG_ORGANISASI LO, PEGAWAI P
        WHERE JO.ID_JENIS_ORGANISASI=LO.ID_JENIS_ORGANISASI AND P.ID_PEGAWAI=LO.ID_PEGAWAI AND LO.ID_ORGANISASI='$id_organisasi'");
        return $query->result();
    }


    public function edit_log_alamat($id_alamat){
        $query = $this->db->query ("SELECT P.NIP,LA.ID_ALAMAT,LA.STATUS_ALAMAT, LA.ALAMAT, LA.PROVINSI, LA.KABUPATEN, LA.KELURAHAN, LA.KECAMATAN, LA.KODE_POS, LA.TELEPON, LA.FAX, LA.KETERANGAN_ALAMAT, LA.TAHUN_AKTIF
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

 public function edit_log_penghargaan($id_penghargaan){
        $query = $this->db->query ("SELECT P.NIP,LP.ID_LOG_PENGHARGAAN,LP.NAMA_PENGHARGAAN,LP.INSTANSI_PENGHARGAAN, LP.NO_SK_PENGHARGAAN, LP.TGL_SK_PENGHARGAAN, LP.TAHUN_PENGHARGAAN, LP.KETERANGAN_PENGHARGAAN
            FROM LOG_PENGHARGAAN LP, PEGAWAI P 
            WHERE LP.ID_PEGAWAI=P.ID_PEGAWAI AND LP.ID_LOG_PENGHARGAAN='$id_penghargaan'");
        return $query->result();
    }


    //UPDATE
    
    public function update_log_jabatan($id_jabatan,$aktif,$jabatan, $unit_kerja, $no_sk, $tanggal_sk, $tmt){
        $query = $this->db->query("
                UPDATE log_jabatan set STATUS_JABATAN= $aktif, ID_JENIS_JABATAN=$jabatan, 
                ID_UNIT=$unit_kerja, NO_SK_JABATAN=$no_sk, TGL_SK_JABATAN='$tanggal_sk', TMT_JABATAN='$tmt' 
                WHERE id_jabatan=$id_jabatan");
        
    }
    
     public function update_log_pangkat($id_kepangkatan, $aktif, $golongan, $jenis_kenaikan, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $peraturan, $keterangan){
        $query = $this->db->query("
                UPDATE log_kepangkatan SET STATUS_KEPANGKATAN=$aktif, ID_JENIS_GOLONGAN='$golongan',
                JENIS_KENAIKAN='$jenis_kenaikan',  TMT_GOLONGAN='$tmt', NO_SK_GOLONGAN=$no_sk,TGL_SK_GOLONGAN='$tanggal_sk',MASA_KERJA_GOLONGAN=$masa_kerja, GAJI_GOLONGAN='$gaji', PERATURAN='$peraturan', KETERANGAN_KEPANGKATAN='$keterangan' 
                WHERE ID_KEPANGKATAN=$id_kepangkatan");
    }
    
    public function update_log_pendidikan($id_pendidikan, $aktif,$tingkat, $nama_sekolah, $lokasi, $fakultas, $jurusan, $no_ijazah, $tanggal_ijazah,$ipk){
        $query = $this->db->query("
                UPDATE log_pendidikan SET STATUS_PENDIDIKAN_TERAKHIR=$aktif, TINGKAT_PENDIDIKAN='$tingkat', NAMA_SEKOLAH='$nama_sekolah', LOKASI='$lokasi', FAKULTAS='$fakultas', JURUSAN='$jurusan', NO_IJAZAH='$no_ijazah', TGL_IJAZAH='$tanggal_ijazah', IPK='$ipk', KETERANGAN_PENDIDIKAN=1
                WHERE ID_PENDIDIKAN=$id_pendidikan    ");
        
    }
    
    public function update_log_diklat($id_diklat, $aktif,$jenis, $instansi, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $angkatan, $rangking){
        $query = $this->db->query(" 
                UPDATE log_diklat SET STATUS_DIKLAT='$aktif', ID_JENIS_DIKLAT='$jenis', INSTANSI_DIKLAT='$instansi', NO_IJAZAH_DIKLAT='$no_ijazah', TGL_IJAZAH_DIKLAT='$tanggal_ijazah', LAMA_DIKLAT='$lama', TGL_MULAI_DIKLAT='$tanggal_mulai', TGL_SELESAI_DIKLAT='$tanggal_selesai', ANGKATAN_DIKLAT='$angkatan', RANGKING_DIKLAT='$rangking' 
                WHERE ID_DIKLAT=$id_diklat
                ");
        
    }
     public function update_log_diklat_teknis($id_diklat, $instansi, $nama_diklat, $no_ijazah, $tanggal_ijazah, $lama, $tanggal_mulai, $tanggal_selesai){
        $query = $this->db->query(" 
                UPDATE log_diklat SET INSTANSI_DIKLAT='$instansi',JUDUL_DIKLAT='$nama_diklat', NO_IJAZAH_DIKLAT='$no_ijazah', TGL_IJAZAH_DIKLAT='$tanggal_ijazah', LAMA_DIKLAT='$lama', TGL_MULAI_DIKLAT='$tanggal_mulai', TGL_SELESAI_DIKLAT='$tanggal_selesai'
                WHERE ID_DIKLAT=$id_diklat
                ");
        
    }
    
    public function update_log_toefl($id_pendidikan, $aktif, $jenis, $tahun, $instansi, $no_sertifikat, $tanggal_sertifikat, $nilai){
        $query = $this->db->query(" 
                UPDATE log_pendidikan SET STATUS_PENDIDIKAN_TERAKHIR=$aktif,JENIS_PENDIDIKAN='$jenis', TAHUN_PENDIDIKAN=$tahun, 
                INSTANSI='$instansi', NO_IJAZAH='$no_sertifikat', TGL_IJAZAH='$tanggal_sertifikat', IPK='$nilai', KETERANGAN_PENDIDIKAN=0
                WHERE ID_PENDIDIKAN=$id_pendidikan");
                
    }
    
    public function update_log_penugasan($id_penugasan, $jenis, $lokasi, $no_sk, $tgl_sk, $tujuan, $biaya, $lama, $tahun, $keterangan){
        $query = $this->db->query(" 
                UPDATE log_penugasan SET ID_JENIS_PENUGASAN=$jenis, LOKASI_PENUGASAN='$lokasi', 
                NO_SK_PENUGASAN='$no_sk', TGL_SK_PENUGASAN='$tgl_sk', TUJUAN_PENUGASAN='$tujuan', 
                BIAYA_PENUGASAN='$biaya', LAMA_PENUGASAN=$lama, TAHUN_PENUGASAN=$tahun, KETERANGAN_PENUGASAN='$keterangan'
                WHERE ID_PENUGASAN=$id_penugasan");
                
    }
    public function update_log_seminar($id_penugasan, $jenis, $peranan, $instansi, $lokasi, $no_ijazah, $tgl_ijazah, $lama, $tanggal_mulai, $tanggal_selesai, $keterangan){
        $query = $this->db->query(" 
                UPDATE log_penugasan SET ID_JENIS_PENUGASAN=4, NAMA_PENUGASAN='$jenis', PERANAN='$peranan', 
                INSTANSI_PENUGASAN='$instansi', LOKASI_PENUGASAN='$lokasi', NO_IJAZAH_PENUGASAN='$no_ijazah', 
                TGL_IJAZAH_PENUGASAN='$tgl_ijazah', LAMA_PENUGASAN=$lama, TGL_MULAI_PENUGASAN='$tanggal_mulai',TGL_SELESAI_PENUGASAN='$tanggal_selesai', KETERANGAN_PENUGASAN='$keterangan'
                where ID_PENUGASAN=$id_penugasan");
                
    }
    public function update_log_organisasi($id_organisasi,$kd_stat_organisasi,$nama_organisasi,$jabatan,$tahun, $keterangan){
        $query = $this->db->query(" 
                UPDATE log_ORGANISASI SET ID_JENIS_ORGANISASI=$kd_stat_organisasi, NAMA_ORGANISASI='$nama_organisasi', 
                    JABATAN_ORGANISASI='$jabatan', TAHUN_ORGANISASI=$tahun,KETERANGAN_ORGANISASI='$keterangan'
               WHERE ID_ORGANISASI=$id_organisasi");
                
    }
     public function update_log_alamat($id_alamat,$aktif,$alamat,$provinsi,$kabupaten,$kelurahan,$kecamatan,$kode_pos,$telepon,$fax,$tahun,$keterangan){
        $query = $this->db->query(" 
                UPDATE log_alamat SET STATUS_ALAMAT=$aktif,ALAMAT='$alamat',PROVINSI='$provinsi',
                    KABUPATEN='$kabupaten',KELURAHAN='$kelurahan',KECAMATAN='$kecamatan',
                    KODE_POS='$kode_pos',TELEPON='$telepon',FAX='$fax',TAHUN_AKTIF='$tahun',KETERANGAN_ALAMAT='$keterangan'
                WHERE ID_ALAMAT=$id_alamat");
    }
    
    public function update_log_pasangan($id_pasangan,$status,$nama,$tanggal_lahir,$tempat_lahir,$tanggal_nikah,$no_kariskarsu,$tanggal_kariskarsu,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                UPDATE pasangan SET STATUS_PASANGAN='$status',NAMA_PASANGAN='$nama',TGL_LAHIR_PASANGAN='$tanggal_lahir',
                TEMPAT_LAHIR_PASANGAN='$tempat_lahir',TGL_NIKAH='$tanggal_nikah',NO_KARISKARSU='$no_kariskarsu',
                TGL_KARISKARSU='$tanggal_kariskarsu',PEKERJAAN_PASANGAN='$pekerjaan',KETERANGAN_PASANGAN='$keterangan'
                WHERE ID_PASANGAN=$id_pasangan");
                
    }
      public function update_log_ak($id_ak,$status,$nama,$jenis_kelamin,$tanggal_lahir,$tempat_lahir,$pekerjaan,$keterangan){
        $query = $this->db->query(" 
                UPDATE anggota_keluarga SET STATUS_AK='$status',NAMA_AK='$nama',
                JENIS_KELAMIN_AK='$jenis_kelamin',TGL_LAHIR_AK='$tanggal_lahir',
                TEMPAT_LAHIR_AK='$tempat_lahir',PEKERJAAN_AK='$pekerjaan',KETERANGAN_AK='$keterangan'
                WHERE ID_AK=$id_ak");
                
    }  
    public function update_log_gaji_berkala($id_pegawai, $status, $tmt, $no_sk, $tanggal_sk, $masa_kerja, $gaji, $keterangan){
        $query = $this->db->query("
                INSERT INTO log_kepangkatan (ID_PEGAWAI,STATUS_KEPANGKATAN, TMT_GOLONGAN, NO_SK_GOLONGAN,TGL_SK_GOLONGAN,MASA_KERJA_GOLONGAN, ID_KATEGORI_GAJI, KETERANGAN_KEPANGKATAN) 
                VALUES ($id_pegawai, $status, '$tmt', $no_sk, '$tanggal_sk', $masa_kerja, $gaji, '$keterangan')");
    }
    
    public function update_log_penghargaan($id_penghargaan, $nama,$instansi, $no_sk, $tanggal_sk, $tahun, $keterangan){
        $query = $this->db->query("
                UPDATE log_penghargaan SET NAMA_PENGHARGAAN='$nama', INSTANSI_PENGHARGAAN='$instansi', 
                    NO_SK_PENGHARGAAN='$no_sk',TGL_SK_PENGHARGAAN='$tanggal_sk',TAHUN_PENGHARGAAN='$tahun', 
                        KETERANGAN_PENGHARGAAN='$keterangan'
                WHERE ID_LOG_PENGHARGAAN=$id_penghargaan");
    }
    public function update_log_medis($id_medis, $indikasi,$tindakan,$tahun, $keterangan){
        $query = $this->db->query("
                UPDATE log_medis SET INDIKASI='$indikasi', TINDAKAN= '$tindakan', 
                    TAHUN_PEMERIKSAAN='$tahun', KETERANGAN_MEDIS='$keterangan' 
                WHERE ID_MEDIS=$id_medis");
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

    public function get_dsp() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN,P.NAMA_PEGAWAI,P.GELAR_BELAKANG, JG.GOLONGAN, jg.NAMA_PANGKAT,J.JABATAN, J.BAGIAN, J.SUBBAGIAN, J.LEVEL, U.NAMA_UNIT
        FROM PEGAWAI P, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK, LOG_JABATAN LJ, JABATAN J, UNIT_KERJA U
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND JG.ID_JENIS_GOLONGAN=LK.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND LJ.ID_UNIT=U.ID_UNIT
        ORDER BY `BAGIAN` ASC, `SUBBAGIAN` ASC, `LEVEL` ASC");
        return $query->result();
    }

    public function get_kp() {
        $query = $this->db->query("SELECT P.NIP, P.GELAR_DEPAN,P.NAMA_PEGAWAI,P.GELAR_BELAKANG, JG.GOLONGAN, jg.NAMA_PANGKAT, LK.TMT_GOLONGAN, J.JABATAN, LJ.TMT_JABATAN, P.TGL_LAHIR, U.NAMA_UNIT
        FROM PEGAWAI P, JENIS_GOLONGAN JG, LOG_KEPANGKATAN LK, LOG_JABATAN LJ, JABATAN J,UNIT_KERJA U
        WHERE P.ID_PEGAWAI=LK.ID_PEGAWAI AND JG.ID_JENIS_GOLONGAN=LK.ID_JENIS_GOLONGAN AND P.ID_PEGAWAI=LJ.ID_PEGAWAI AND LJ.ID_JENIS_JABATAN=J.ID_JENIS_JABATAN AND LK.STATUS_KEPANGKATAN=1 AND LJ.STATUS_JABATAN=1 AND U.ID_UNIT=LJ.ID_UNIT
        ORDER BY JG.ID_JENIS_GOLONGAN DESC");
        return $query->result();
    }

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
        $query = $this->db->query("update akun, pegawai set akun.password=$password
        where akun.id_pegawai=pegawai.id_pegawai and pegawai.NIP='$nip'");
    }

}
