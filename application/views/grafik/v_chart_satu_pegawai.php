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
            $TMT_PNS="";
            $KETERANGAN="";
            $STATUS_PEGAWAI="";
            $NO_KARTU_PEGAWAI="";
            $TGL_KARTU_PEGAWAI="";
            $NO_KTP="";
            $NO_ASKES="";
            $TGL_ASKES="";
            $KODE_WILAYAH_ASKES="";
            $GOL_DARAH="";
            $RAMBUT="";
            $BENTUK_MUKA="";
            $WARNA_KULIT="";
            $TINGGI_BADAN="";
            $BERAT_BADAN="";
            $CIRI_KHAS="";
            $CACAT_TUBUH="";
            $BAHASA_ASING="";
            $HOBI="";
            $FOTO="";
                
            foreach ($query as $row) {
                $id_pegawai = $row->id_pegawai;
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
                $TMT_PNS=$row->tmt_pns;
                $KETERANGAN=$row->keterangan;
                $STATUS_PEGAWAI=$row->status_pegawai;
                $NO_KARTU_PEGAWAI=$row->no_kartu_pegawai;
                $TGL_KARTU_PEGAWAI=$row->tgl_kartu_pegawai;
                $NO_KTP=$row->no_ktp;
                $NO_ASKES=$row->no_askes;
                $TGL_ASKES=$row->tgl_askes;
                $KODE_WILAYAH_ASKES=$row->kode_wilayah_askes;
                $GOL_DARAH=$row->gol_darah;
                $RAMBUT=$row->rambut;
                $BENTUK_MUKA=$row->bentuk_muka;
                $WARNA_KULIT=$row->warna_kulit;
                $TINGGI_BADAN=$row->tinggi_badan;
                $BERAT_BADAN=$row->berat_badan;
                $CIRI_KHAS=$row->ciri_khas;
                $CACAT_TUBUH=$row->cacat_tubuh;
                $BAHASA_ASING=$row->bahasa_asing;
                $HOBI=$row->hobi;
                $FOTO=$row->foto;
            }
 ?>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-user"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Data Pegawai </h1>
        <a href="<?php echo base_url(); ?>cetak/cetak_pegawai/<?php echo $NIP;?>" class=" btn btn-success btn-rounded pull-right"><i class="iconfa-print icon-white"></i> Cetak Data Pegawai</a>
    </div>
</div>


<!-- biodata -->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/edit_biodata/<?php echo $id_pegawai;?>"><i class="iconfa-pencil"></i> &nbsp;Edit Biodata</a></li>
                    <li><a href="<?php echo base_url(); ?>pegawai/input_data_tambahan/<?php echo $NIP;?>"><i class="iconfa-pencil"></i> &nbsp;Tambah Data Tambahan</a></li>
                </ul>
            </div>
            
            <h4 class="widgettitle"><span class="icon-book icon-white"></span>BIODATA</h4>
        </div>
        <div class="widgetcontent" >
            
            <br />
            
            <div class="row-fluid" style="text-transform:uppercase;">    
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $FOTO;?>" style="height:  230px; width: 205px; overflow: hidden; padding-left:53px;"/></center>
                <div class="span4"> 
                    <table class="table table-bordered table-invoice">
                        <th>DATA UTAMA</th>
                        <th></th>
                        <tr>
                            <td>NIP/NIP Lama</td>
                            <td><?php echo $NIP; ?> / <?php echo $NIP_LAMA; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?php echo $GELAR_DEPAN;?>&nbsp;<?php echo $NAMA_PEGAWAI ?>,<?php echo $GELAR_BELAKANG; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><?php echo $TEMPAT_LAHIR; ?>, <?php echo $TGL_LAHIR; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $JENIS_KELAMIN; ?></td>
                        </tr>
                        <?php if($STATUS_PEGAWAI=="PNS"){?>
                        <tr>
                            <td>TMT CPNS</td>
                            <td><?php echo $TMT_CPNS?></td>
                        </tr>
                        <tr>
                            <td>TMT PNS</td>
                            <td><?php echo $TMT_PNS?></td>
                        </tr>
                        <tr>
                            <td>Pangkat/Gol.Ruang/TMT</td>
                            <td><?php echo $NAMA_PANGKAT," / ",$GOLONGAN," / ",$TMT_GOLONGAN; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?php echo $JABATAN; ?></td>
                        </tr>
                        <?php }?>         
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
                            <td>STATUS</td>
                            <td><?php echo $STATUS_PEGAWAI; ?></td>
                        </tr>
                        <tr>
                            <td>KETERANGAN</td>
                            <td><?php echo $KETERANGAN; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="span5">
                    <table class="table table-bordered table-invoice">
                        <th>DATA TAMBAHAN</th>
                        <th></th>
                        <?php if($STATUS_PEGAWAI=="PNS"){?>
                        <tr>
                            <td>TANGGAL KARTU PEGAWAI/NO_KARTU_PEGAWAI</td>
                            <td><?php echo $TGL_KARTU_PEGAWAI; ?>/<?php echo $NO_KARTU_PEGAWAI; ?></td>
                        </tr>
                        <tr>
                            <td>NO KTP</td>
                            <td><?php echo $NO_KTP;?></td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td><?php echo $NO_NPWP; ?></td>
                        </tr>
                        <tr>
                            <td>NO ASKES/TANGGAL ASKES/KODE WILAYAH ASKES</td>
                            <td><?php echo $NO_ASKES," / ",$TGL_ASKES," / ",$KODE_WILAYAH_ASKES; ?></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>NO HANDPHONE</td>
                            <td><?php echo $NO_HANDPHONE?></td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td><?php echo $EMAIL?></td>
                        </tr>
                        <tr>
                            <td>GOLONGAN DARAH</td>
                            <td><?php echo $GOL_DARAH; ?></td>
                        </tr>
                        
                        <tr>
                            <td>RAMBUT</td>
                            <td><?php echo $RAMBUT; ?></td>
                        </tr>
                        <tr>
                            <td>BENTUK MUKA</td>
                            <td><?php echo $BENTUK_MUKA; ?></td>
                        </tr>
                        <tr>
                            <td>WARNA KULIT</td>
                            <td><?php echo $WARNA_KULIT; ?></td>
                        </tr>
                        <tr>
                            <td>TINGGI BADAN/BERAT BADAN</td>
                            <td><?php echo $TINGGI_BADAN," / ",$BERAT_BADAN; ?></td>
                        </tr>
                        <tr>
                            <td>CIRI KHAS</td>
                            <td><?php echo $CIRI_KHAS; ?></td>
                        </tr>
                        <tr>
                            <td>CACAT TUBUH</td>
                            <td><?php echo $CACAT_TUBUH; ?></td>
                        </tr>
                        <tr>
                            <td>BAHASA ASING</td>
                            <td><?php echo $BAHASA_ASING; ?></td>
                        </tr>
                        <tr>
                            <td>HOBI</td>
                            <td><?php echo $HOBI; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!--RIWAYAT JABATAN--->
<div id="jabatan">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_jabatan/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                    
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT JABATAN</h4>
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
            $ID_JABATAN="";
                
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
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_jabatan/'.$row->ID_JABATAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign">
                    <a href="<?php echo site_url('pegawai/delete_log_jabatan'.'/'.$row->ID_JABATAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')">
                        <span class="icon-trash"></span></a></td>
                </tr>
                    <?php $NO++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT KEPANGKATAN--->
<?php if($STATUS_PEGAWAI=="PNS"){?>
<div id="pangkat">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_pangkat/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT KEPANGKATAN</h4>
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Peraturan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <?php
                $ID_KEPANGKATA="";
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
                $MASA_KERJA_GOLONGAN="";
                
            foreach ($query3 as $row) {
                $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
                $PANGKAT = $row->NAMA_PANGKAT;
                $GOLONGAN_KEPANGKATAN = $row->GOLONGAN;
                $JENIS_KENAIKAN = $row->JENIS_KENAIKAN;
                $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
                $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
                $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
                $GAJI = $row->GAJI_GOLONGAN;
                $PERATURAN =$row->PERATURAN;
                $MASA_KERJA_GOLONGAN=$row->MASA_KERJA_GOLONGAN;
                $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;
                    
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
                <td><?php echo $MASA_KERJA_GOLONGAN;?></td>
                <td><?php echo $GAJI;?></td>
                <td><?php echo $PERATURAN;?></td>
                <td><?php echo $KETERANGAN_KEPANGKATAN;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_pangkat/'.$row->ID_KEPANGKATAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_pangkat'.'/'.$row->ID_KEPANGKATAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_KP++; } ?>
            </table>
        </div>
    </div>
</div>
<?php }?>

<!--RIWAYAT PENDIDIKAN--->

<div id="pendidikan">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_pendidikan/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PENDIDIKAN</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                    
            ?>
                <tbody>
                    
                    <tr>
                        <td><?PHP echo $NO_PEND;?></td>
                        <td>
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
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_pendidikan/'.$row->ID_PENDIDIKAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_pendidikan'.'/'.$row->ID_PENDIDIKAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_PEND++; } ?>
            </table>
        </div>
    </div>
</div>
<?php if($STATUS_PEGAWAI=="PNS"){?>
<!--RIWAYAT Diklat Struktural--->
<div id="diklat_struktural">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_diklat_struktural/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT STRUKTURAL</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Instansi</th>
                        <th>No Sertifikat</th>
                        <th>Tanggal Sertifikat</th>
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
            $NO_IJAZAH_DIKLAT= "";
            $TGL_IJAZAH_DIKLAT= "";
            $LAMA_DIKLAT= "";
            $TANGGAL_MULAI_DIKLAT= "";
            $TANGGAL_SELESAI_DIKLAT= "";
            $ANGKATAN_DIKLAT= "";
            $RANGKING_DIKLAT= "";
            $NO_DS=1;
            $LAMA=0;
            foreach ($query5 as $row) {
                $STATUS_DIKLAT = $row->STATUS_DIKLAT;
                $NAMA_DIKLAT = $row->NAMA_DIKLAT;
                $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
                $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
                $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
                $LAMA_DIKLAT= $row->LAMA_DIKLAT;
                $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
                $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
                $ANGKATAN_DIKLAT= $row->ANGKATAN_DIKLAT;
                $RANGKING_DIKLAT= $row->RANGKING_DIKLAT;
                
               
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_DS;?></td>
                        <td>
                        <?php if($STATUS_DIKLAT==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_DIKLAT==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?PHP echo $NAMA_DIKLAT;?></td>
                <td><?PHP echo $INSTANSI_DIKLAT; ?></td>
                <td><?PHP echo $NO_IJAZAH_DIKLAT;?></td>
                <td><?PHP echo $TGL_IJAZAH_DIKLAT;?></td>
                <td><?PHP 
                
                        if($LAMA_DIKLAT>=518400){
                           $LAMA=$LAMA_DIKLAT/518400;
                           echo $LAMA." tahun";
                       }else if($LAMA_DIKLAT>=43200&&$LAMA_DIKLAT<518400){
                           $LAMA=$LAMA_DIKLAT/43200;
                           echo $LAMA." bulan";
                       }else if($LAMA_DIKLAT>=10080&&$LAMA_DIKLAT<43200){
                           $LAMA=$LAMA_DIKLAT/10080;
                           echo $LAMA." minggu";
                       }else if($LAMA_DIKLAT>=1440&&$LAMA_DIKLAT<10080){
                           $LAMA=$LAMA_DIKLAT/1440;
                           echo $LAMA." hari";
                       }else if($LAMA_DIKLAT>=60 && $LAMA_DIKLAT<1440){
                           $LAMA=$LAMA_DIKLAT/60;
                           echo $LAMA." jam";
                       }else if($LAMA_DIKLAT<60){
                           echo $LAMA_DIKLAT." menit";
                       }
                
                
                ?></td>
                <td><?PHP echo $TANGGAL_MULAI_DIKLAT;?></td>
                <td><?PHP echo $TANGGAL_SELESAI_DIKLAT;?></td>
                <td><?PHP echo  $ANGKATAN_DIKLAT;?></td>
                <td><?PHP echo $RANGKING_DIKLAT;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_diklat_struktural/'.$row->ID_DIKLAT)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_diklat'.'/'.$row->ID_DIKLAT.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_DS++; } ?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_diklat_fungsional/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT FUNGSIONAL</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>No STTPL</th>
                        <th>Tanggal STTPL</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Angkatan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
               <?php
               $NO_DF=1;
                foreach ($query6 as $row) {
                $STATUS_DIKLAT = $row->STATUS_DIKLAT;
                $NAMA_DIKLAT = $row->NAMA_DIKLAT;
                $JUDUL_DIKLAT = $row->JUDUL_DIKLAT;
                $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
                $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
                $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
                $LAMA_DIKLAT= $row->LAMA_DIKLAT;
                $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
                $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
                $ANGKATAN_DIKLAT= $row->ANGKATAN_DIKLAT;
                    
                    
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_DF;?></td>
                        <td>
                        <?php if($STATUS_DIKLAT==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_DIKLAT==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?PHP echo $NAMA_DIKLAT;?></td>
                <td><?PHP echo $JUDUL_DIKLAT;?></td>
                <td><?PHP echo $INSTANSI_DIKLAT; ?></td>
                <td><?PHP echo $NO_IJAZAH_DIKLAT;?></td>
                <td><?PHP echo $TGL_IJAZAH_DIKLAT;?></td>
                <td><?PHP 
                if($LAMA_DIKLAT>=518400){
                           $LAMA=$LAMA_DIKLAT/518400;
                           echo $LAMA." tahun";
                       }else if($LAMA_DIKLAT>=43200&&$LAMA_DIKLAT<518400){
                           $LAMA=$LAMA_DIKLAT/43200;
                           echo $LAMA." bulan";
                       }else if($LAMA_DIKLAT>=10080&&$LAMA_DIKLAT<43200){
                           $LAMA=$LAMA_DIKLAT/10080;
                           echo $LAMA." minggu";
                       }else if($LAMA_DIKLAT>=1440&&$LAMA_DIKLAT<10080){
                           $LAMA=$LAMA_DIKLAT/1440;
                           echo $LAMA." hari";
                       }else if($LAMA_DIKLAT>=60 && $LAMA_DIKLAT<1440){
                           $LAMA=$LAMA_DIKLAT/60;
                           echo $LAMA." jam";
                       }else if($LAMA_DIKLAT<60){
                           echo $LAMA_DIKLAT." menit";
                       }
                
                ?></td>
                <td><?PHP echo $TANGGAL_MULAI_DIKLAT;?></td>
                <td><?PHP echo $TANGGAL_SELESAI_DIKLAT;?></td>
                <td><?PHP echo  $ANGKATAN_DIKLAT;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_diklat_fungsional/'.$row->ID_DIKLAT)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_diklat'.'/'.$row->ID_DIKLAT.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_DF++; } ?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_diklat_teknis/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                    
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT TEKNIS</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>No Sertifikat</th>
                        <th>Tanggal Sertifikat</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
                 $NO_DT=1;
                foreach ($query7 as $row) {
                $JUDUL_DIKLAT = $row->JUDUL_DIKLAT;
                $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
                $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
                $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
                $LAMA_DIKLAT= $row->LAMA_DIKLAT;
                $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
                $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
                    
                    
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_DT;?></td>
                        <td><?PHP echo $JUDUL_DIKLAT;?></td>
                        <td><?PHP echo $INSTANSI_DIKLAT; ?></td>
                        <td><?PHP echo $NO_IJAZAH_DIKLAT;?></td>
                        <td><?PHP echo $TGL_IJAZAH_DIKLAT;?></td>
                        <td><?PHP 
                                if($LAMA_DIKLAT>=518400){
                                   $LAMA=$LAMA_DIKLAT/518400;
                                   echo $LAMA." tahun";
                               }else if($LAMA_DIKLAT>=43200&&$LAMA_DIKLAT<518400){
                                   $LAMA=$LAMA_DIKLAT/43200;
                                   echo $LAMA." bulan";
                               }else if($LAMA_DIKLAT>=10080&&$LAMA_DIKLAT<43200){
                                   $LAMA=$LAMA_DIKLAT/10080;
                                   echo $LAMA." minggu";
                               }else if($LAMA_DIKLAT>=1440&&$LAMA_DIKLAT<10080){
                                   $LAMA=$LAMA_DIKLAT/1440;
                                   echo $LAMA." hari";
                               }else if($LAMA_DIKLAT>=60 && $LAMA_DIKLAT<1440){
                                   $LAMA=$LAMA_DIKLAT/60;
                                   echo $LAMA." jam";
                               }else if($LAMA_DIKLAT<60){
                                   echo $LAMA_DIKLAT." menit";
                               }
                        ?></td>
                        <td><?PHP echo $TANGGAL_MULAI_DIKLAT;?></td>
                        <td><?PHP echo $TANGGAL_SELESAI_DIKLAT;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_diklat_teknis/'.$row->ID_DIKLAT)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_diklat'.'/'.$row->ID_DIKLAT.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                 <?php $NO_DT++; } ?>
            </table>
        </div>
    </div>
</div>
<?php }?>
<!--RIWAYAT TOEFL--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_toefl/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT BAHASA ASING</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                <?php 
                $NO_TOEFL=1;
                foreach ($query8 as $row) {
                $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
                $JENIS_PENDIDIKAN= $row->JENIS_PENDIDIKAN;
                $TAHUN_PENDIDIKAN = $row->TAHUN_PENDIDIKAN;
                $INSTANSI_PENDIDIKAN = $row->INSTANSI;
                $NO_IJAZAH = $row->NO_IJAZAH;
                $TGL_IJAZAH =$row->TGL_IJAZAH;
                $IPK =$row->IPK;
                    
                    
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_TOEFL;?></td>
                        <td>
                        <?php if($STATUS_PENDIDIKAN==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_PENDIDIKAN==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?PHP echo $JENIS_PENDIDIKAN;?></td>
                <td><?PHP echo $TAHUN_PENDIDIKAN; ?></td>
                <td><?PHP echo $INSTANSI_PENDIDIKAN; ?></td>
                <td><?PHP echo $NO_IJAZAH; ?></td>
                <td><?PHP echo $TGL_IJAZAH; ?></td>
                <td><?PHP echo $IPK; ?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_toefl/'.$row->ID_PENDIDIKAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_pendidikan'.'/'.$row->ID_PENDIDIKAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                 <?php $NO_PEND++; } ?>
            </table>
        </div>
    </div>
</div>
<?php if($STATUS_PEGAWAI=="PNS"){?>
<!--RIWAYAT PENUGASAN--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_penugasan/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PENUGASAN</h4> 
        </div>
        
        <div class="widgetcontent"style="text-transform:uppercase;" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Penugasan</th>
                        <th>Lokasi Penugasan</th>
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
                 <?php
            $JENIS_PENUGASAN = "";
            $LOKASI_PENUGASAN = "";
            $NO_SK_PENUGASAN= "";
            $TGL_SK_PENUGASAN = "";
            $TUJUAN_PENUGASAN = "";
            $BIAYA_PENUGASAN = "";
            $LAMA_PENUGASAN = "";
            $TAHUN_PENUGASAN ="";
            $KETERANGAN_PENUGASAN ="";
            $NO_TUGAS=1;
                
            foreach ($query9 as $row) {
                $JENIS_PENUGASAN =$row->JENIS_PENUGASAN;
                $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
                $NO_SK_PENUGASAN= $row->NO_SK_PENUGASAN;
                $TGL_SK_PENUGASAN = $row->TGL_SK_PENUGASAN;
                $TUJUAN_PENUGASAN = $row->TUJUAN_PENUGASAN;
                $BIAYA_PENUGASAN = $row->BIAYA_PENUGASAN;
                $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
                $TAHUN_PENUGASAN =$row->TAHUN_PENUGASAN;
                $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
                    
                    
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_TUGAS;?></td>
                        <td><?PHP echo $JENIS_PENUGASAN;?></td>
                        <td><?PHP echo $LOKASI_PENUGASAN;?></td>
                        <td><?PHP echo $NO_SK_PENUGASAN;?></td>
                        <td><?PHP echo $TGL_SK_PENUGASAN;?></td>
                        <td><?PHP echo $TUJUAN_PENUGASAN;?></td>
                        <td><?PHP echo $BIAYA_PENUGASAN;?></td>
                        <td><?PHP 
                            if($LAMA_PENUGASAN>=518400){
                               $LAMA=$LAMA_PENUGASAN/518400;
                               echo $LAMA." tahun";
                           }else if($LAMA_PENUGASAN>=43200&&$LAMA_PENUGASAN<518400){
                               $LAMA=$LAMA_PENUGASAN/43200;
                               echo $LAMA." bulan";
                           }else if($LAMA_PENUGASAN>=10080&&$LAMA_PENUGASAN<43200){
                               $LAMA=$LAMA_PENUGASAN/10080;
                               echo $LAMA." minggu";
                           }else if($LAMA_PENUGASAN>=1440&&$LAMA_PENUGASAN<10080){
                               $LAMA=$LAMA_PENUGASAN/1440;
                               echo $LAMA." hari";
                           }else if($LAMA_PENUGASAN>=60 && $LAMA_PENUGASAN<1440){
                               $LAMA=$LAMA_PENUGASAN/60;
                               echo $LAMA." jam";
                           }else if($LAMA_PENUGASAN<60){
                               echo $LAMA_PENUGASAN." menit";
                           }
                        ?></td>
                        <td><?PHP echo $TAHUN_PENUGASAN;?></td>
                        <td><?PHP echo $KETERANGAN_PENUGASAN;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_penugasan/'.$row->ID_PENUGASAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_penugasan'.'/'.$row->ID_PENUGASAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_PEND++; } ?>
            </table>
        </div>
    </div>
</div>
<?php }?>
<!--RIWAYAT SEMINAR--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_seminar/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SEMINAR</h4> 
        </div>
        
        <div class="widgetcontent"style="text-transform:uppercase;" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
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
                <?php
            $NAMA_PENUGASAN = "";
            $PERANAN = "";
            $INSTANSI_PENUGASAN= "";
            $NO_IJAZAH_PENUGASAN = "";
            $TGL_IJAZAH_PENUGASAN = "";
            $TGL_MULAI_PENUGASAN ="";
            $TGL_SELESAI_PENUGASAN ="";
            $NO_SEMINAR=1;
                
            foreach ($query10 as $row) {
                $NAMA_PENUGASAN =$row->NAMA_PENUGASAN;
                $PERANAN =$row->PERANAN;
                $INSTANSI_PENUGASAN= $row->INSTANSI_PENUGASAN;
                $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
                $NO_IJAZAH_PENUGASAN= $row->NO_IJAZAH_PENUGASAN;
                $TGL_IJAZAH_PENUGASAN = $row->TGL_IJAZAH_PENUGASAN;
                $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
                $TGL_MULAI_PENUGASAN =$row->TGL_MULAI_PENUGASAN;
                $TGL_SELESAI_PENUGASAN =$row->TGL_SELESAI_PENUGASAN;
                $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
                    
                    
            ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_SEMINAR;?></td>
                        <td><?PHP echo $NAMA_PENUGASAN;?></td>
                        <td><?PHP echo $PERANAN;?></td>
                        <td><?PHP echo $INSTANSI_PENUGASAN;?></td>
                        <td><?PHP echo $LOKASI_PENUGASAN;?></td>
                        <td><?PHP echo $NO_IJAZAH_PENUGASAN;?></td>
                        <td><?PHP echo $TGL_IJAZAH_PENUGASAN;?></td>
                        <td><?PHP 
                            
                        if($LAMA_PENUGASAN>=518400){
                               $LAMA=$LAMA_PENUGASAN/518400;
                               echo $LAMA." tahun";
                           }else if($LAMA_PENUGASAN>=43200&&$LAMA_PENUGASAN<518400){
                               $LAMA=$LAMA_PENUGASAN/43200;
                               echo $LAMA." bulan";
                           }else if($LAMA_PENUGASAN>=10080&&$LAMA_PENUGASAN<43200){
                               $LAMA=$LAMA_PENUGASAN/10080;
                               echo $LAMA." minggu";
                           }else if($LAMA_PENUGASAN>=1440&&$LAMA_PENUGASAN<10080){
                               $LAMA=$LAMA_PENUGASAN/1440;
                               echo $LAMA." hari";
                           }else if($LAMA_PENUGASAN>=60 && $LAMA_PENUGASAN<1440){
                               $LAMA=$LAMA_PENUGASAN/60;
                               echo $LAMA." jam";
                           }else if($LAMA_PENUGASAN<60){
                               echo $LAMA_PENUGASAN." menit";
                           }
                        ?></td>
                        <td><?PHP echo $TGL_MULAI_PENUGASAN;?></td>
                        <td><?PHP echo $TGL_SELESAI_PENUGASAN;?></td>
                        <td><?PHP echo $KETERANGAN_PENUGASAN;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_seminar/'.$row->ID_PENUGASAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_penugasan'.'/'.$row->ID_PENUGASAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_SEMINAR++; } ?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_organisasi/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORGANISASI</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                <?php 
                    $MASA_ORGANISASI = "";
                    $NAMA_ORGANIASAI = "";
                    $JABATAN_ORGANISASI= "";
                    $TAHUN_ORGANISASI = "";
                    $KETERANGAN_ORGANISASI = "";
                    $NO_ORG=1;
                        
                foreach ($query11 as $row) {
                    $JENIS_ORGANISASI =$row->JENIS_ORGANISASI;
                    $NAMA_ORGANISASI =$row->NAMA_ORGANISASI;
                    $JABATAN_ORGANISASI= $row->JABATAN_ORGANISASI;
                    $TAHUN_ORGANISASI = $row->TAHUN_ORGANISASI;
                    $KETERANGAN_ORGANISASI= $row->KETERANGAN_ORGANISASI;
                        
                ?>
                
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_ORG;?></td>
                        <td>
                            <?php 
                            if($JENIS_ORGANISASI==1){
                                echo "Sebelum Jadi Pegawai";
                            }else if($JENIS_ORGANISASI==2){
                                echo "Perguruan Tinggi";
                            }else if($JENIS_ORGANISASI==3){
                                echo "Selama Jadi Pegawai";
                            }  
                            ?>
                            
                        </td>
                        <td><?PHP echo $JENIS_ORGANISASI;?></td>
                        <td><?PHP echo $NAMA_ORGANISASI;?></td>
                        <td><?PHP echo $JABATAN_ORGANISASI;?></td>
                        <td><?PHP echo $TAHUN_ORGANISASI;?></td>
                        <td><?PHP echo $KETERANGAN_ORGANISASI;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_organisasi/'.$row->ID_ORGANISASI)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_organisasi'.'/'.$row->ID_ORGANISASI.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_ORG++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_alamat/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ALAMAT</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                        <th>Tahun Aktif</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php 
                    $STATUS_ALAMAT = "";
                    $TELEPON= "";
                    $FAX= "";
                    $KETERANGAN_ALAMAT= "";
                    $NO_ALAMAT=1;
                        
                foreach ($query12 as $row) {
                    $STATUS_ALAMAT =$row->STATUS_ALAMAT;
                    $ALAMAT =$row->ALAMAT;
                    $PROVINSI= $row->PROVINSI;
                    $KABUPATEN = $row->KABUPATEN;
                    $KELURAHAN= $row->KELURAHAN;
                    $KECAMATAN= $row->KECAMATAN;
                    $KODE_POS= $row->KODE_POS;
                    $TELEPON= $row->TELEPON;
                    $FAX= $row->FAX;
                    $TAHUN= $row->TAHUN_AKTIF;
                    $KETERANGAN_ALAMAT= $row->KETERANGAN_ALAMAT;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_ALAMAT;?></td>
                        <td>
                        <?php if($STATUS_ALAMAT==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_ALAMAT==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?PHP echo $ALAMAT;?></td>
                <td><?PHP echo $PROVINSI;?></td>
                <td><?PHP echo $KABUPATEN;?></td>
                <td><?PHP echo $KELURAHAN;?></td>
                <td><?PHP echo $KECAMATAN;?></td>
                <td><?PHP echo $KODE_POS;?></td>
                <td><?PHP echo $TELEPON;?></td>
                <td><?PHP echo $FAX;?></td>
                <td><?PHP echo $TAHUN;?></td>
                <td><?PHP echo $KETERANGAN_ALAMAT;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_alamat/'.$row->ID_ALAMAT)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_alamat'.'/'.$row->ID_ALAMAT.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
                <?php $NO_ALAMAT++; } ?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_pasangan/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PASANGAN</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
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
                <?php 
                    $STATUS_PASANGAN = "";
                    $NAMA_PASANGAN= "";
                    $TGL_LAHIR_PASANGAN= "";
                    $TEMPAT_LAHIR_PASANGAN= "";
                    $TGL_NIKAH= "";
                    $NO_KARISKARSU= "";
                    $TGL_KARISKARSU= "";
                    $PEKERJAAN_PASANGAN= "";
                    $KETERANGAN_PASANGAN= "";
                    $NO_PASANGAN=1;
                        
                foreach ($query13 as $row) {
                    $STATUS_PASANGAN = $row->STATUS_PASANGAN;
                    $NAMA_PASANGAN= $row->NAMA_PASANGAN;
                    $TGL_LAHIR_PASANGAN= $row->TGL_LAHIR_PASANGAN;
                    $TEMPAT_LAHIR_PASANGAN= $row->TEMPAT_LAHIR_PASANGAN;
                    $TGL_NIKAH= $row->TGL_NIKAH;
                    $NO_KARISKARSU= $row->NO_KARISKARSU;
                    $TGL_KARISKARSU= $row->TGL_KARISKARSU;
                    $PEKERJAAN_PASANGAN= $row->PEKERJAAN_PASANGAN;
                    $KETERANGAN_PASANGAN= $row->KETERANGAN_PASANGAN;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_PASANGAN;?></td>
                        <td><?PHP echo $STATUS_PASANGAN;?></td>
                        <td><?PHP echo $NAMA_PASANGAN;?></td>
                        <td><?PHP echo $TGL_LAHIR_PASANGAN;?></td>
                        <td><?PHP echo $TEMPAT_LAHIR_PASANGAN;?></td>
                        <td><?PHP echo $TGL_NIKAH;?></td>
                        <td><?PHP echo $NO_KARISKARSU;?></td>
                        <td><?PHP echo $TGL_KARISKARSU;?></td>
                        <td><?PHP echo $PEKERJAAN_PASANGAN;?></td>
                        <td><?PHP echo $KETERANGAN_PASANGAN;?></td>
                        
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_pasangan/'.$row->ID_PASANGAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_pasangan'.'/'.$row->ID_PASANGAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_PASANGAN++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_anak/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ANAK</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;" >
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
                <?php 
                    $STATUS_AK = "";
                    $NAMA_AK= "";
                    $TGL_LAHIR_AK= "";
                    $TEMPAT_LAHIR_AK= "";
                    $JENIS_KELAMIN_AK= "";
                    $PEKERJAAN_AK= "";
                    $KETERANGAN_AK= "";
                    $NO_AK=1;
                        
                foreach ($query14 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $JENIS_KELAMIN_AK= $row->JENIS_KELAMIN_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->KETERANGAN_AK;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_AK;?></td>
                        <td><?PHP echo $STATUS_AK;?></td>
                        <td><?PHP echo $NAMA_AK;?></td>
                        <td><?PHP echo $TGL_LAHIR_AK;?></td>
                        <td><?PHP echo $TEMPAT_LAHIR_AK;?></td>
                        <td><?PHP echo $JENIS_KELAMIN_AK;?></td>
                        <td><?PHP echo $PEKERJAAN_AK;?></td>
                        <td><?PHP echo $KETERANGAN_AK;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_anak/'.$row->ID_AK)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_ak'.'/'.$row->ID_AK.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_AK++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_saudara/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SAUDARA</h4> 
        </div>
        
        <div class="widgetcontent"style="text-transform:uppercase;" >
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
                <?php
                $NO_AK_S=1;
                    
                foreach ($query15 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $JENIS_KELAMIN_AK= $row->JENIS_KELAMIN_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->KETERANGAN_AK;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_AK_S;?></td>
                        <td><?PHP echo $STATUS_AK;?></td>
                        <td><?PHP echo $NAMA_AK;?></td>
                        <td><?PHP echo $TGL_LAHIR_AK;?></td>
                        <td><?PHP echo $TEMPAT_LAHIR_AK;?></td>
                        <td><?PHP echo $JENIS_KELAMIN_AK;?></td>
                        <td><?PHP echo $PEKERJAAN_AK;?></td>
                        <td><?PHP echo $KETERANGAN_AK;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_saudara/'.$row->ID_AK)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_ak'.'/'.$row->ID_AK.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_AK_S++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_orangtua/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORANG TUA</h4> 
        </div>
        
        <div class="widgetcontent"style="text-transform:uppercase;" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
                $NO_AK_O=1;
                    
                foreach ($query16 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->KETERANGAN_AK;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_AK_O;?></td>
                        <td><?php echo $STATUS_AK;?></td>
                        <td><?PHP echo $NAMA_AK;?></td>
                        <td><?PHP echo $TGL_LAHIR_AK;?></td>
                        <td><?PHP echo $TEMPAT_LAHIR_AK;?></td>
                        <td><?PHP echo $PEKERJAAN_AK;?></td>
                        <td><?PHP echo $KETERANGAN_AK;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_orangtua/'.$row->ID_AK)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_ak'.'/'.$row->ID_AK.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_AK_O++; }?>
            </table>
        </div>
    </div>
</div>
<?php if($STATUS_PEGAWAI=="PNS"){?>
<!--Riwayat Gaji Berkala--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_gaji_berkala/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT GAJI BERKALA</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
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
                <?php
                $NO_KGB=1;
                    
            foreach ($query20 as $row) {
                $STATUS_GAJI = $row->STATUS_GAJI;
                $TMT_GAJI = $row->TMT_GAJI;
                $NO_SK_GAJI = $row->NO_SK_GAJI;
                $TGL_SK_GAJI = $row->TGL_SK_GAJI;
                $TOTAL_GAJI = $row->TOTAL_GAJI;
                $KETERANGAN_GAJI =$row->KETERANGAN_GAJI;
                    
                $datetime1 = new DateTime($TMT_GAJI);
                $datetime2 = new DateTime();
                $interval = $datetime1->diff($datetime2);
                    
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $NO_KGB; ?></td>
                        <td>
                        <?php if($STATUS_GAJI==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_GAJI==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?php echo $TMT_GAJI;?></td>
                <td><?php echo $NO_SK_GAJI;?></td>
                <td><?php echo $TGL_SK_GAJI;?></td>
                <td><?php echo $interval->format('%y TAHUN');?></td>
                <td><?php echo $interval->format('%m BULAN')?></td>
                <td><?php echo $TOTAL_GAJI;?></td>
                <td><?php echo $KETERANGAN_GAJI;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_gaji_berkala/'.$row->ID_GAJI)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_gaji'.'/'.$row->ID_GAJI.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
            <?php $NO_KGB++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_penghargaan/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PENGHARGAAN</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penghargaan</th>
                        <th>Instansi</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
                $NO_PENGHARGAAN=1;
                $NAMA_PENGHARGAAN = "";
                $INSTANSI_PENGHARGAAN= "";
                $NO_SK_PENGHARGAAN= "";
                $TGL_SK_PENGHARGAAN= "";
                $TAHUN_PENGHARGAAN= "";
                $KETERANGAN_PENGHARGAAN= "";
                    
                foreach ($query18 as $row) {
                    $NAMA_PENGHARGAAN = $row->NAMA_PENGHARGAAN;
                    $INSTANSI_PENGHARGAAN= $row->INSTANSI_PENGHARGAAN;
                    $NO_SK_PENGHARGAAN= $row->NO_SK_PENGHARGAAN;
                    $TGL_SK_PENGHARGAAN= $row->TGL_SK_PENGHARGAAN;
                    $TAHUN_PENGHARGAAN= $row->TAHUN_PENGHARGAAN;
                    $KETERANGAN_PENGHARGAAN= $row->KETERANGAN_PENGHARGAAN;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_PENGHARGAAN;?></td>
                        <td><?PHP echo $NAMA_PENGHARGAAN;?></td>
                        <td><?PHP echo $INSTANSI_PENGHARGAAN;?></td>
                        <td><?PHP echo $NO_SK_PENGHARGAAN;?></td>
                        <td><?PHP echo $TGL_SK_PENGHARGAAN;?></td>
                        <td><?PHP echo $TAHUN_PENGHARGAAN;?></td>
                        <td><?PHP echo $KETERANGAN_PENGHARGAAN;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_penghargaan/'.$row->ID_LOG_PENGHARGAAN)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_penghargaan'.'/'.$row->ID_LOG_PENGHARGAAN.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_PENGHARGAAN++; }?>
            </table>
        </div>
    </div>
</div>
<?php }?>
<!--Riwayat Cuti & Izin--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_cuti/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT CUTI & IZIN</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Alasan</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <?php
                $NO_CUTI=1;
                    
            foreach ($query19 as $row) {
                $STATUS_CUTI = $row->STATUS_CUTI;
                $JENIS_CUTI = $row->JENIS_CUTI;
                $ALASAN_CUTI = $row->ALASAN_CUTI;
                $NO_SK_CUTI = $row->NO_SK_CUTI;
                $TGL_SK_CUTI = $row->TGL_SK_CUTI;
                $TGL_MULAI_CUTI = $row->TGL_MULAI_CUTI;
                $TGL_SELESAI_CUTI = $row->TGL_SELESAI_CUTI;
      
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $NO_KGB; ?></td>
                        <td>
                        <?php if($STATUS_CUTI==1){?>
                            <input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <?php }else if($STATUS_CUTI==0){?>
                <input type="checkbox"  disabled="disabled" /></td>
                        <?php }?>
                <td><?php echo $JENIS_CUTI;?></td>
                <td><?php echo $ALASAN_CUTI;?></td>
                <td><?php echo $NO_SK_CUTI;?></td>
                <td><?php echo $TGL_SK_CUTI;?></td>
                <td><?php echo $TGL_MULAI_CUTI;?></td>
                <td><?php echo $TGL_SELESAI_CUTI;?></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_cuti/'.$row->ID_CUTI)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_cuti'.'/'.$row->ID_CUTI.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                </tr>
                </tbody>
            <?php $NO_CUTI++; }?>
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
                    <li><a href="<?php echo base_url(); ?>pegawai/input_log_medis/<?php echo $NIP;?>"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                 <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT MEDIS</h4> 
        </div>
        
        <div class="widgetcontent" style="text-transform:uppercase;" >
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
                <?php
                $NO_MEDIS=1;
                $INDIKASI = "";
                $TINDAKAN= "";
                $TAHUN_PEMERIKSAAN= "";
                $KETERANGAN_MEDIS= "";
                    
                foreach ($query17 as $row) {
                    $INDIKASI = $row->INDIKASI;
                    $TINDAKAN= $row->TINDAKAN;
                    $TAHUN_PEMERIKSAAN= $row->TAHUN_PEMERIKSAAN;
                    $KETERANGAN_MEDIS= $row->KETERANGAN_MEDIS;
                ?>
                <tbody>
                    <tr>
                        <td><?PHP echo $NO_MEDIS;?></td>
                        <td><?PHP echo $INDIKASI;?></td>
                        <td><?PHP echo $TINDAKAN;?></td>
                        <td><?PHP echo $TAHUN_PEMERIKSAAN;?></td>
                        <td><?PHP echo $KETERANGAN_MEDIS;?></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/edit_log_medis/'.$row->ID_MEDIS)?>" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="<?php echo site_url('pegawai/delete_log_medis'.'/'.$row->ID_MEDIS.'/'.$NIP)?>" class="deleterow" onClick="return confirm('Hapus data?')"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
                <?php $NO_MEDIS++; }?>
            </table>
        </div>
    </div>
</div>
