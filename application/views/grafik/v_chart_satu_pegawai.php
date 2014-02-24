    
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-user"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Data Pegawai </h1>
            
    </div>
</div>
    
<!-- biodata -->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-pencil"></i> &nbsp;Edit Data</a></li>
                </ul>
            </div>
                
            <h4 class="widgettitle"><span class="icon-book icon-white"></span>BIODATA</h4>
        </div>
            
            
            
        <div class="widgetcontent" >
            <?php
            $NIP = "";
            $NIP_LAMA = "";
            $GELAR_DEPAN ="";
            $NAMA_PEGAWAI = "";
            $GELAR_BELAKANG = "";
            $TEMPAT_LAHIR = "";
            $TGL_LAHIR = "";
            $JENIS_KELAMIN = "";
            $TMT_CPNS = "";
            $GOLONGAN = "";
            $NAMA_PANGKAT = "";
            $TMT_GOLONGAN = "";
            $JABATAN = "";
            $NAMA_UNIT = "";
            $AGAMA = "";
            $STATUS_PERKAWINAN = "";
            $ALAMAT = "";
            $KELURAHAN = "";
            $KECAMATAN = "";
            $KABUPATEN = "";
            $PROVINSI = "";
            $KODE_POS = "";
            $NO_HANDPHONE = "";
            $EMAIL = "";
            $NO_NPWP = "";
            $MASA_KERJA="";
            foreach ($query as $row) {
                $NIP = $row->nip;
                $NIP_LAMA = $row->nip_lama;
                $GELAR_DEPAN = $row->gelar_depan;
                $NAMA_PEGAWAI = $row->nama_pegawai;
                $GELAR_BELAKANG = $row->gelar_belakang;
                $TEMPAT_LAHIR = $row->tempat_lahir;
                $TGL_LAHIR = $row->tgl_lahir;
                $JENIS_KELAMIN = $row->jenis_kelamin;
                $TMT_CPNS = $row->tmt_cpns;
                $NAMA_PANGKAT = $row->nama_pangkat;
                $GOLONGAN = $row->golongan;
                $TMT_GOLONGAN = $row->tmt_golongan;
                $JABATAN = $row->jabatan;
                $AGAMA = $row->agama;
                $STATUS_PERKAWINAN = $row->status_perkawinan;
                $ALAMAT = $row->alamat;
                $KELURAHAN = $row->kelurahan;
                $KECAMATAN = $row->kecamatan;
                $KABUPATEN = $row->kabupaten;
                $PROVINSI = $row->provinsi;
                $NO_HANDPHONE = $row->no_handphone;
                $EMAIL = $row->email;
                $NO_NPWP = $row->no_npwp;
            }
            ?>
            <br />
                
            <div class="row-fluid">    
                <img src="<?php echo base_url(); ?>assets/shamcey/images/photos/foto_profil.png"  class="pull-right"/></center>
                    
                <div class="span9">
                    <table class="table table-bordered table-invoice">
                        <tr>
                            <td class="width30">NIP/NIP Lama</td>
                            <td><?php echo $NIP; ?> / <?php echo $NIP_LAMA; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?php echo $GELAR_DEPAN;?><?php echo $NAMA_PEGAWAI ?>,<?php echo $GELAR_BELAKANG; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><?php echo $TEMPAT_LAHIR; ?>, <?php echo $TGL_LAHIR; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $JENIS_KELAMIN; ?></td>
                        </tr>
                        <tr>
                            <td>TMT CPNS/MASA KERJA</td>
                            <td><?php echo $TMT_CPNS?></td>
                        </tr>
                        <tr>
                            <td>Pangkat/Gol.Ruang/TMT</td>
                            <td><?php echo $NAMA_PANGKAT," / ",$GOLONGAN," / ",$TMT_GOLONGAN; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?php echo $JABATAN; ?></td>
                        </tr>
                            
                        <tr>
                            <td>Agama</td>
                            <td><?php echo $AGAMA; ?></td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td><?php echo $STATUS_PERKAWINAN; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Rumah</td>
                            <td><?php echo $ALAMAT," KELURAHAN ",$KELURAHAN," KECAMATAN ",$KECAMATAN," KABUPATEN ",$KABUPATEN," PROVINSI ",$PROVINSI; ?></td>
                        </tr>
                        <tr>
                            <td>No Handphone</td>
                            <td><?php echo $NO_HANDPHONE; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $EMAIL; ?></td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td><?php echo $NO_NPWP; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
<!--RIWAYAT JABATAN--->
    
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT JABATAN</h4>
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>TMT</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            <?php
            $STATUS_JABATAN = "";
            $NAMA_JABATAN = "";
            $NAMA_UNIT_KERJA = "";
            $NO_SK_JABATAN = "";
            $TGL_SK_JABATAN = "";
            $TMT_JABATAN = "";
            $NO=1;
                
            foreach ($query2 as $row) {
                $STATUS_JABATAN = $row->STATUS_JABATAN;
                $NAMA_JABATAN = $row->JABATAN;
                $NAMA_UNIT_KERJA = $row->NAMA_UNIT;
                $NO_SK_JABATAN = $row->NO_SK_JABATAN;
                $TGL_SK_JABATAN = $row->TGL_SK_JABATAN;
                $TMT_JABATAN = $row->TMT_JABATAN;
                    
            ?>
                
                <tbody>
                    <tr>
                        <td><?PHP echo $NO;?></td>
                        <td>
                        <?php if($STATUS_JABATAN==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_JABATAN==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?php echo $NAMA_JABATAN;?></td>
                <td><?php echo $NAMA_UNIT_KERJA;?></td>
                <td><?php echo $NO_SK_JABATAN;?></td>
                <td><?php echo $TGL_SK_JABATAN;?></td>
                <td><?php echo $TMT_JABATAN;?></td>
                <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                </tr>
                    <?php $NO++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT KEPANGKATAN--->
    
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT KEPANGKATAN</h4>
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Pangkat/Golongan</th>
                        <th>Jenis Kenaikan</th>
                        <th>TMT Golongan</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Masa Kerja Tahun</th>
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Peraturan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <?php
            $STATUS_KEPANGKATAN = "";
            $PANGKAT = "";
            $GOLONGAN_KEPANGKATAN = "";
            $JENIS_KENAIKAN = "";
            $TMT_GOLONGAN_KEPANGKATAN = "";
            $NO_SK_KEPANGKATAN = "";
            $TGL_SK_KEPANGKATAN = "";
            $GAJI ="";
            $PERATURAN ="";
            $KETERANGAN_KEPANGKATAN ="";
            $NO_KP=1;
                
            foreach ($query3 as $row) {
                $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
                $PANGKAT = $row->NAMA_PANGKAT;
                $GOLONGAN_KEPANGKATAN = $row->GOLONGAN;
                $JENIS_KENAIKAN = $row->JENIS_KENAIKAN;
                $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
                $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
                $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
                $GAJI = $row->BESAR_GAJI;
                $PERATURAN =$row->PERATURAN;
                $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;
                $NO_KP=1;
                
                $datetime1 = new DateTime($TMT_GOLONGAN);
                $datetime2 = new DateTime();
                $interval = $datetime1->diff($datetime2);
                
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $NO_KP; ?></td>
                        <td>
                        <?php if($STATUS_KEPANGKATAN==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_KEPANGKATAN==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?php echo $PANGKAT;?>/<?php echo $GOLONGAN_KEPANGKATAN;?></td>
                <td><?php echo $JENIS_KENAIKAN;?></td>
                <td><?php echo $TMT_GOLONGAN_KEPANGKATAN;?></td>
                <td><?php echo $NO_SK_KEPANGKATAN;?></td>
                <td><?php echo $TGL_SK_KEPANGKATAN;?></td>
                <td><?php echo $interval->format('%y TAHUN');?></td>
                <td><?php echo $interval->format('%m BULAN')?></td>
                <td><?php echo $GAJI;?></td>
                <td><?php echo $PERATURAN;?></td>
                <td><?php echo $KETERANGAN_KEPANGKATAN;?></td>
                <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_KP++; } ?>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT PENDIDIKAN--->
    
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PENDIDIKAN</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Tingkat</th>
                        <th>Nama Sekolah</th>
                        <th>Lokasi</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>IPK</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
            $STATUS_PENDIDIKAN = "";
            $TINGKAT_PENDIDIKAN = "";
            $NAMA_SEKOLAH= "";
            $LOKASI = "";
            $FAKULTAS = "";
            $JURUSAN = "";
            $NO_IJAZAH = "";
            $TGL_IJAZAH ="";
            $IPK ="";
            $NO_PEND=1;
                
            foreach ($query4 as $row) {
                $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
                $TINGKAT_PENDIDIKAN = $row->TINGKAT_PENDIDIKAN;
                $NAMA_SEKOLAH= $row->NAMA_SEKOLAH;
                $LOKASI = $row->LOKASI;
                $FAKULTAS = $row->FAKULTAS;
                $JURUSAN = $row->JURUSAN;
                $NO_IJAZAH = $row->NO_IJAZAH;
                $TGL_IJAZAH =$row->TGL_IJAZAH;
                $IPK =$row->IPK;
                $NO_PEND=1;
                
            ?>
                <tbody>
                    
                    <tr>
                        <td><?PHP echo $NO_PEND;?></td>
                        <TD>
                        <?php if($STATUS_PENDIDIKAN==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_PENDIDIKAN==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                        <td><?PHP echo $TINGKAT_PENDIDIKAN;?></td>
                        <td><?PHP echo $NAMA_SEKOLAH; ?></td>
                        <td><?PHP echo $LOKASI; ?></td>
                        <td><?PHP echo $FAKULTAS; ?></td>
                        <td><?PHP echo $JURUSAN; ?></td>
                        <td><?PHP echo $NO_IJAZAH; ?></td>
                        <td><?PHP echo $TGL_IJAZAH; ?></td>
                        <td><?PHP echo $IPK; ?></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_PEND++; } ?>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT Diklat Struktural--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT STRUKTURAL</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Instansi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Angkatan</th>
                        <th>Rangking</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
            $STATUS_DIKLAT = "";
            $NAMA_DIKLAT = "";
            $INSTANSI_DIKLAT= "";
                
            foreach ($query4 as $row) {
                $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
                $TINGKAT_PENDIDIKAN = $row->TINGKAT_PENDIDIKAN;
                $NAMA_SEKOLAH= $row->NAMA_SEKOLAH;
                $LOKASI = $row->LOKASI;
                $FAKULTAS = $row->FAKULTAS;
                $JURUSAN = $row->JURUSAN;
                $NO_IJAZAH = $row->NO_IJAZAH;
                $TGL_IJAZAH =$row->TGL_IJAZAH;
                $IPK =$row->IPK;
                $NO_PEND=1;
                
            }?>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT Diklat FUNGSIONAL--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT FUNGSIONAL</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Angkatan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT Diklat TEKNIS--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT TEKNIS</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>Lokasi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT TOEFL--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TOEFL</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Instansi</th>
                        <th>No Sertifikat</th>
                        <th>Tanggal Sertifikat</th>
                        <th>Nilai</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT TUGAS KE LUAR NEGERI--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TUGAS KE LUAR NEGERI</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Negara</th>
                        <th>No SK</th>
                        <th>Tanggal SK</th>
                        <th>Tujuan</th>
                        <th>Biaya</th>
                        <th>Lama</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--RIWAYAT SEMINAR--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SEMINAR</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Seminar</th>
                        <th>Nama Seminar</th>
                        <th>Peranan</th>
                        <th>Instansi</th>
                        <th>Lokasi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
    
<!--RIWAYAT Organisasi--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORGANISASI</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Masa Organisasi</th>
                        <th>Nama Organisasi</th>
                        <th>Jabatan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Alamat--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ALAMAT</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kode POS</th>
                        <th>TELEPON</th>
                        <th>FAX</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Pasangan--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PASANGAN</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Nikah</th>
                        <th>Nomor Kariskarsu</th>
                        <th>Tanggal Kariskarsu</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
    
<!--Riwayat Anak--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ANAK</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Saudara--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SAUDARA</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Orang Tua--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORANG TUA</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Gaji Berkala--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT GAJI BERKALA</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>TMT</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Masa Kerja Tahun</th>
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Tanda Jasa--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TANDA JASA</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tanda Jasa</th>
                        <th>Instansi</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!--Riwayat Medis--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
                
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT MEDIS</h4> 
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Indikasi</th>
                        <th>Tindakan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>