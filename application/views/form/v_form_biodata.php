

<!-- DATA UTAMA-->
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-pencil"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>Input Data Pegawai</h1>
    </div>
</div><!--pageheader-->

<div class="tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#lA">Biodata</a></li>
        <li><a data-toggle="tab" href="#lB">Data Tambahan</a></li>
        <li><a data-toggle="tab" href="#lC">Riwayat Jabatan</a></li>
        <li><a data-toggle="tab" href="#lD">Riwayat Pangkat</a></li>
        <li><a data-toggle="tab" href="#lE">Riwayat Pendidikan</a></li>
        <li><a data-toggle="tab" href="#lF">Riwayat Diklat Struktural</a></li>
        <li><a data-toggle="tab" href="#lG">Riwayat Diklat Fungsional</a></li>
        <li><a data-toggle="tab" href="#lH">Riwayat Diklat Teknis</a></li>
        <li><a data-toggle="tab" href="#lI">Riwayat TOEFL</a></li>
        <li><a data-toggle="tab" href="#lJ">Riwayat Tugas Ke Luar Negeri</a></li>
        <li><a data-toggle="tab" href="#lK">Riwayat Seminar</a></li>
        <li><a data-toggle="tab" href="#lL">Riwayat Organisasi</a></li>
        <li><a data-toggle="tab" href="#lM">Riwayat Alamat</a></li>
        <li><a data-toggle="tab" href="#lN">Riwayat Pasangan</a></li>
        <li><a data-toggle="tab" href="#lO">Riwayat Anak</a></li>
        <li><a data-toggle="tab" href="#lP">Riwayat Orang Tua</a></li>
        <li><a data-toggle="tab" href="#lQ">Riwayat Saudara</a></li>
        <li><a data-toggle="tab" href="#lR">Riwayat Gaji Berkala</a></li>
        <li><a data-toggle="tab" href="#lS">Riwayat Tanda Jasa</a></li>
        <li><a data-toggle="tab" href="#lT">Riwayat Medis</a></li>
       
    </ul>
    <div class="tab-content">
        <div id="lA" class="tab-pane active">
            <div class="widgetbox box">
            <h4 class="widgettitle">DATA UTAMA</h4>
            <div class="widgetcontent nopadding">
                <form class="stdform stdform2" action="" method="post">

                    <p>
                        <label>NIP</label>
                        <span class="field"><input type="text" name="nip" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>NIP Lama</label>
                        <span class="field"><input type="text" name="nip_lama" class="input-large" placeholder="" /></span>
                    </p>

                    <p>
                        <label>Gelar Depan</label>
                        <span class="field"><input type="text" name="gelar_depan" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Nama</label>
                        <span class="field"><input type="text" name="nama" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Gelar Belakang</label>
                        <span class="field"><input type="text" name="gelar_belakang" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Tempat Lahir</label>
                        <span class="field"><input type="text" name="tempat_lahir" class="input-large" placeholder="" /></span>
                    </p>


                    <div class="par">
                        <label>Tanggal Lahir</label>
                        <span class="field"><input id="datepicker" type="text" name="tanggal_lahir" class="input-small" /></span>
                    </div> 

                    <p>
                        <label>Jenis Kelamin</label>
                        <span class="field"><select name="jenis_kelamin" id="selection2" class="uniformselect" >
                                <option value="">--</option>
                                <option value="A">Laki-laki</option>
                                <option value="B">Perempuan</option>
                            </select></span>
                    </p>

                    <p>
                        <label>Agama</label>
                        <span class="field"><select name="agama" id="selection2" class="uniformselect" >
                                <option value="">--</option>
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
                                <option value="">--</option>
                                <option value="kawin">Kawin</option>
                                <option value="belum_kawin">Belum Kawin</option>
                                <option value="cerai_hidup">Cerai Hidup</option>
                                <option value="cerai_mati">Cerai Mati</option>
                            </select></span>
                    </p>


                    <!-- id="datepicker" cuma bisa dipake sekali? kalo yang kedua kali ga mau muncul kalendernya-->
                    <div class="par">
                        <label>TMT CPNS</label>
                        <span class="field"><input id="datepicker" type="text" name="tmt_cpns" class="input-small" /></span>
                    </div> 

                    <div class="par">
                        <label>TMT PNS</label>
                        <span class="field"><input id="datepicker" type="text" name="tmt_pns" class="input-small" /></span>
                    </div> 

                    <p>
                        <label>Pendidikan Awal</label>
                        <span class="field"><select name="pendidikan_awal" id="selection2" class="uniformselect" >
                                <option value="">--</option>

                            </select></span>
                    </p>


                    <p>
                        <label>Keterangan</label>
                        <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
                    </p>

                    <p>
                        <label>Status</label>
                        <span class="field"><select name="status" id="selection2" class="uniformselect" >
                                <option value="">--</option>
                                <option value="pns">PNS</option>
                            </select></span>
                    </p>

                    <p class="stdformbutton">
                        <button class="btn btn-primary">Save</button>
                        <button type="reset" class="btn">Cancel</button>
                    </p>
                </form>
            </div>
        </div>
        </div>
        <div id="lB" class="tab-pane">
            <div class="widgetbox box">
            <h4 class="widgettitle">DATA TAMBAHAN</h4>
            <div class="widgetcontent nopadding">
                <form class="stdform stdform2" action="" method="post">
                    
                    <p>
                        <label>NO Kartu Pegawai</label>
                        <span class="field"><input type="text" name="no_kartu_pegawai" class="input-large" placeholder="" /></span>
                    </p>
                    
                    <div class="par">
                        <label>Tanggal Kartu Pegawai</label>
                        <span class="field"><input id="datepicker" type="text" name="tanggal_kartu_pegawai" class="input-small" /></span>
                    </div> 
                   
                    
                    <p>
                        <label>NO KTP</label>
                        <span class="field"><input type="text" name="no_ktp" class="input-medium" placeholder="" /></span>
                    </p>
                    
                    <p>
                        <label>NPWP</label>
                        <span class="field"><input type="text" name="npwp" class="input-medium" placeholder="" /></span>
                    </p>
                    
                    <p>
                        <label>NO ASKES</label>
                        <span class="field"><input type="text" name="no_askes" class="input-medium" placeholder="" /></span>
                    </p>
                    
                    <!-- id="datepicker" cuma bisa dipake sekali? kalo yang kedua kali ga mau muncul kalendernya-->
                    <div class="par">
                        <label>Tanggal Askes</label>
                        <span class="field"><input id="datepicker" type="text" name="tanggal_askes" class="input-small" /></span>
                    </div> 
       
                    
                    <p>
                        <label>Kode Wilayah ASKES</label>
                        <span class="field"><input type="text" name="kode_wilayah_askes" class="input-medium" placeholder="" /></span>
                    </p>
                    
                    <p>
                        <label>NO Hadphone</label>
                        <span class="field"><input type="text" name="no_handphone" class="input-medium" placeholder="" /></span>
                    </p>
                    
                    <p>
                        <label>Email</label>
                        <span class="field"><input type="text" name="email" id="email2" class="input-medium" /></span>
                    </p>
                    <p>
                        <label>Golongan Darah</label>
                        <span class="field"><select name="golongan_darah" id="selection2" class="uniformselect" >
                                <option value="">--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select></span>
                    </p>
                    <p>
                        <label>Rambut</label>
                        <span class="field"><input type="text" name="rambut" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Bentuk Muka</label>
                        <span class="field"><input type="text" name="bentuk_muka" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Warna Kulit</label>
                        <span class="field"><input type="text" name="warna_kulit" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Tinggi Badan</label>
                        <span class="field"><input type="text" name="tinggi_badan" class="input-small" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Berat Badan</label>
                        <span class="field"><input type="text" name="berat_badan" class="input-small" placeholder="" /></span>
                    </p>    
                    <p>
                        <label>Ciri Khas</label>
                        <span class="field"><input type="text" name="ciri_khas" class="input-xxlarge" placeholder="" /></span>
                    </p>  
                    <p>
                        <label>Cacat Tubuh</label>
                        <span class="field"><input type="text" name="cacat_tubuh" class="input-xxlarge" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Bahasa Asing</label>
                        <span class="field"><input type="text" name="bahasa_asing" class="input-xlarge" placeholder="" /></span>
                    </p>
                    
                    <p>
                        <label>Hobi</label>
                        <span class="field"><textarea cols="40" rows="3" class="span5" name="hobi"></textarea></span> 
                    </p>
                    
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Save</button>
                        <button type="reset" class="btn">Cancel</button>
                    </p>
                </form>
            </div>
        </div>
        </div>
        <div id="lC" class="tab-pane">
            <p>What up girl, this is Section C.</p>
        </div>
    </div><!--tab-content-->
</div><!--tabs-left-->

