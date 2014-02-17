<!-- DATA UTAMA-->
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-pencil"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>Input Data Pegawai</h1>
    </div>
</div><!--pageheader-->

<div class="tabs-left">
    <div class="tab-content">
        
        <div class="widgetbox box">
            <h4 class="widgettitle">DATA UTAMA</h4>
            <div class="widgetcontent nopadding">
                <form class="stdform stdform2" action=<?php echo base_url();?>pegawai/biodata_tes method="post">
                    
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
                        <span class="field"><input id="datepicker" type="date" name="tanggal_lahir" class="input-medium" /></span>
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
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_cpns" class="input-medium" /></span>
                    </div> 
                    
                    <div class="par">
                        <label>TMT PNS</label>
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_pns" class="input-medium" /></span>
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
    
</div><!--tab-content-->
</div><!--tabs-left-->