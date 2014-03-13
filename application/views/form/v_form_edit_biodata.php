<?php foreach ($query as $row) {
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
<!-- DATA UTAMA-->
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-pencil"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>EDIT BIODATA</h1>
    </div>
</div><!--pageheader-->

<div class="tabs-left">
    <div class="tab-content">
        
        <div class="widgetbox box">
            <h4 class="widgettitle">DATA UTAMA</h4>
            <div class="widgetcontent nopadding">
                <form class="stdform stdform2" action="<?php echo base_url();?>pegawai/proses_edit_biodata" enctype="multipart/form-data" method="post">
                    
                    <p>
                        <label>NIP</label>
                        <span class="field"><input type="number" name="nip" class="input-large" placeholder="" value="<?php echo $NIP ?>"/></span>
                    </p>
                    <p>
                        <label>NIP Lama</label>
                        <span class="field"><input type="text" name="nip_lama" class="input-large" placeholder="" value="<?php echo $NIP_LAMA ?>"/></span>
                    </p>
                    
                    <p>
                        <label>Gelar Depan</label>
                        <span class="field"><input type="text" name="gelar_depan" class="input-large" placeholder="" value="<?php echo $GELAR_DEPAN ?>"/></span>
                    </p>
                    <p>
                        <label>Nama</label>
                        <span class="field"><input type="text" name="nama_pegawai" class="input-large" placeholder="" value="<?php echo $NAMA_PEGAWAI?>"/></span>
                    </p>
                    <p>
                        <label>Gelar Belakang</label>
                        <span class="field"><input type="text" name="gelar_belakang" class="input-large" placeholder="" value="<?php echo $GELAR_BELAKANG ?>"/></span>
                    </p>
                    <p>
                        <label>Tempat Lahir</label>
                        <span class="field"><input type="text" name="tempat_lahir" class="input-large" placeholder="" value="<?php echo $TEMPAT_LAHIR ?>"/></span>
                    </p>
                    
                    
                    <div class="par">
                        <label>Tanggal Lahir</label>
                        <span class="field"><input id="datepicker" type="date" name="tgl_lahir" class="input-medium" value="<?php echo $TGL_LAHIR ?>"/></span>
                    </div> 
                    
                    <p>
                        <label>Jenis Kelamin</label>
                        <span class="field"><select name="jenis_kelamin" id="selection2" class="uniformselect" >
                                <option value="<?php echo $JENIS_KELAMIN ?>"><?php echo $JENIS_KELAMIN?></option>
                                <option value="LAKI-LAKI">Laki-laki</option>
                                <option value="PEREMPUAN">Perempuan</option>
                            </select></span>
                    </p>
                    
                    <p>
                        <label>Agama</label>
                        <span class="field"><select name="agama" id="selection2" class="uniformselect" >
                                <option value="<?php echo $AGAMA ?>"><?php echo $AGAMA?></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select></span>
                    </p>
                    
                    <p>
                        <label>Status Perkawinan</label>
                        <span class="field"><select name="status_perkawinan" id="selection2" class="uniformselect" >
                                <option value="<?php echo $STATUS_PERKAWINAN ?>"><?php echo $STATUS_PERKAWINAN?></option>
                                <option value="kawin">Kawin</option>
                                <option value="belum_kawin">Belum Kawin</option>
                                <option value="cerai_hidup">Cerai Hidup</option>
                                <option value="cerai_mati">Cerai Mati</option>
                            </select></span>
                    </p>
                    
                    <div class="par">
                        <label>TMT CPNS</label>
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_cpns" class="input-medium" value="<?php echo $TMT_CPNS ?>"/></span>
                    </div> 
                    
                    <div class="par">
                        <label>TMT PNS</label>
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_pns" class="input-medium" value="<?php echo $TMT_PNS ?>"/></span>
                    </div> 
                    <p>
                        <label>Keterangan</label>
                        <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN ?>"></textarea></span> 
                    </p>
                    
                    <p>
                        <label>Status</label>
                        <span class="field"><select name="status_pegawai" id="selection2" class="uniformselect" >
                                <option value="<?php echo $STATUS_PEGAWAI ?>"><?PHP echo $STATUS_PEGAWAI?></option>
                                <option value="PNS">PNS</option>
                                <option value="NON PNS">NON PNS</option>
                            </select></span>
                    </p>
                    <p>
                        <label>Foto</label>
                        <span class="field"><input type="file" name="userfile" value="<?php echo $FOTO ?>" required=""></span> 
                    </p>
                    <p>
                        <label>NO Kartu Pegawai</label>
                        <span class="field"><input type="text" name="no_kartu_pegawai" class="input-large" placeholder="" value="<?php echo $NO_KARTU_PEGAWAI ?>"/></span>
                    </p>
                    
                    <div class="par">
                        <label>Tanggal Kartu Pegawai</label>
                        <span class="field"><input id="datepicker" type="date" name="tanggal_kartu_pegawai" class="input-small" value="<?php echo $TGL_KARTU_PEGAWAI?>"/></span>
                    </div> 
                    
                    
                    <p>
                        <label>NO KTP</label>
                        <span class="field"><input type="text" name="no_ktp" class="input-medium" placeholder="" value="<?php echo $NO_KTP ?>"/></span>
                    </p>
                    
                    <p>
                        <label>NPWP</label>
                        <span class="field"><input type="text" name="npwp" class="input-medium" placeholder="" value="<?php echo $NO_NPWP ?>"/></span>
                    </p>
                    
                    <p>
                        <label>NO ASKES</label>
                        <span class="field"><input type="text" name="no_askes" class="input-medium" placeholder="" value="<?php echo $NO_ASKES ?>"/></span>
                    </p>
                    
                    <div class="par">
                        <label>Tanggal Askes</label>
                        <span class="field"><input id="datepicker" type="date" name="tanggal_askes" class="input-small" value="<?php echo $TGL_ASKES ?>"/></span>
                    </div> 
                    
                    
                    <p>
                        <label>Kode Wilayah ASKES</label>
                        <span class="field"><input type="text" name="kode_wilayah_askes" class="input-medium" placeholder="" value="<?php echo $KODE_WILAYAH_ASKES ?>" /></span>
                    </p>
                    
                    <p>
                        <label>NO Hadphone</label>
                        <span class="field"><input type="number" name="no_handphone" class="input-medium" placeholder="" value="<?php echo $NO_HANDPHONE ?>"/></span>
                    </p>
                    
                    <p>
                        <label>Email</label>
                        <span class="field"><input type="email" name="email" id="email2" class="input-medium" value="<?php echo $EMAIL ?>"/></span>
                    </p>
                    <p>
                        <label>Golongan Darah</label>
                        <span class="field"><select name="golongan_darah" id="selection2" class="uniformselect" >
                                <option value="<?php echo $GOL_DARAH ?>"><?php echo $GOL_DARAH?></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select></span>
                    </p>
                    <p>
                        <label>Rambut</label>
                        <span class="field"><input type="text" name="rambut" class="input-large" placeholder="" value="<?php echo $RAMBUT ?>"/></span>
                    </p>
                    <p>
                        <label>Bentuk Muka</label>
                        <span class="field"><input type="text" name="bentuk_muka" class="input-large" placeholder="" value="<?php echo $BENTUK_MUKA ?>"/></span>
                    </p>
                    <p>
                        <label>Warna Kulit</label>
                        <span class="field"><input type="text" name="warna_kulit" class="input-large" placeholder="" value="<?php echo $WARNA_KULIT ?>"/></span>
                    </p>
                    <p>
                        <label>Tinggi Badan</label>
                        <span class="field"><input type="text" name="tinggi_badan" class="input-small" placeholder="" value="<?php echo $TINGGI_BADAN ?>" /></span>
                    </p>
                    <p>
                        <label>Berat Badan</label>
                        <span class="field"><input type="text" name="berat_badan" class="input-small" placeholder="" value="<?php echo $BERAT_BADAN ?>"/></span>
                    </p>    
                    <p>
                        <label>Ciri Khas</label>
                        <span class="field"><input type="text" name="ciri_khas" class="input-xxlarge" placeholder="" value="<?php echo $CIRI_KHAS ?>"/></span>
                    </p>  
                    <p>
                        <label>Cacat Tubuh</label>
                        <span class="field"><input type="text" name="cacat_tubuh" class="input-xxlarge" placeholder="" value="<?php echo $CACAT_TUBUH ?>"/></span>
                    </p>
                    <p>
                        <label>Bahasa Asing</label>
                        <span class="field"><input type="text" name="bahasa_asing" class="input-xlarge" placeholder="" value="<?php echo $BAHASA_ASING ?>"/></span>
                    </p>
                    
                    <p>
                        <label>Hobi</label>
                        <span class="field"><textarea cols="40" rows="3" class="span5" name="hobi" value="<?php echo $HOBI ?>"></textarea></span> 
                    </p>
                    
                    <p class="stdformbutton">
                        
                        <a href="<?php echo site_url('pegawai/biodata/'.$NIP) ?>" class="btn">Cancel</a>
                        <button class="btn btn-primary">Save</button>
                    </p>         
                    <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
                    <input type="hidden" name="nip" value="<?php echo $NIP ?>"/>         
                </form>
            </div>
        </div>   
        
    </div><!--tab-content-->
</div><!--tabs-left-->

