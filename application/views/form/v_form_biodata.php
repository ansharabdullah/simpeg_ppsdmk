<script type="text/javascript">
    jQuery(document).ready(function(){
        
        // Smart Wizard 	
        jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
        jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
        
        function onFinishCallback(){
            alert('Tambah Data?');
            $('form').submit();
        } 
        
        jQuery('select, input:checkbox').uniform();
        
    });
</script>
    
<!-- DATA UTAMA-->
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-pencil"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>Input Data Pegawai</h1>
    </div>
</div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
        <form class="stdform" method="post" action="<?php echo site_url('Pegawai/input_pegawai')?>" enctype="multipart/form-data">
            <div id="wizard" class="wizard">
                <br />
                <ul class="hormenu">
                    <li>
                        <a href="#wiz1step1">
                            <span class="h2">Tahap 1</span>
                            <span class="label">Data Utama</span>
                        </a>
                    </li>
                    <li>
                        <a href="#wiz1step2">
                            <span class="h2">Tahap 2</span>
                            <span class="label">Jabatan dan Kepangkatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#wiz1step3">
                            <span class="h2">Tahap 3</span>
                            <span class="label">Pendidikan</span>
                        </a>
                    </li>
                </ul>
                <div id="wiz1step1" class="formwiz">
                    <h4 class="widgettitle">DATA UTAMA</h4>     
                    <p>
                        <label>NIP</label>
                        <span class="field"><input type="number" name="nip" class="input-large" placeholder="" required=""/></span>
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
                        <span class="field"><input type="text" name="nama_pegawai" class="input-large" placeholder="" required=""/></span>
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
                        <span class="field"><input type="date" name="tgl_lahir" class="input-medium" /></span>
                    </div> 
                        
                    <p>
                        <label>Jenis Kelamin</label>
                        <span class="field"><select name="jenis_kelamin" id="selection2" class="uniformselect" >
                                <option value="">--</option>
                                <option value="LAKI-LAKI">Laki-laki</option>
                                <option value="PEREMPUAN">Perempuan</option>
                            </select></span>
                    </p>
                    <p>
                        <label>Alamat</label>
                         <span class="field"><textarea cols="40" rows="3" class="span5" name="alamat"></textarea></span> 
                    </p>
                    <p>
                        <label>Kecamatan</label>
                        <span class="field"><input type="text" name="kecamatan" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Kelurahan</label>
                        <span class="field"><input type="text" name="kelurahan" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Kota/Kabupaten</label>
                        <span class="field"><input type="text" name="kabupaten" class="input-large" placeholder="" /></span>
                    </p>
                    <p>
                        <label>Provinsi</label>
                        <span class="field"><input type="text" name="provinsi" class="input-large" placeholder="" /></span>
                    </p>
                    <div class="par">
                        <label>TMT CPNS</label>
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_cpns" class="input-medium" /></span>
                    </div> 
                        
                    <div class="par">
                        <label>TMT PNS</label>
                        <span class="field"><input id="datepicker" type="date" type="text" name="tmt_pns" class="input-medium" /></span>
                    </div> 
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
                    <p>
                        <label>Status</label>
                        <span class="field"><select name="status_pegawai" id="selection2" class="uniformselect" >
                                <option value="">--</option>
                                <option value="PNS">PNS</option>
                                <option value="NON PNS">NON PNS</option>
                            </select></span>
                    </p>
                    <?php echo  form_open_multipart('pegawai/uploadImage')?>
                    <p>
                        <label>Foto</label>
                        <span class="field"><input type="file" name="userfile" required=""></span> 
                    </p>
                    <p>
                        <label>Keterangan</label>
                        <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
                    </p>
                        
                </div> <!--wizard 1-->
                    
                    
                <div id="wiz1step2" class="formwiz">
                    <h4 class="widgettitle">Tahap 2: Jabatan dan Kepangkatan</h4>
                        
                    <p>
                        <label>Jabatan</label>
                        <span class="field"><select name="jabatan" id="selection2" class="uniformselect" required="">
                       <?php
                            foreach ($query as $row){
                                $nama_jabatan = $row->jabatan;
                                $id_jenis_jabatan = $row->id_jenis_jabatan;  
                        ?>
                                <option value="<?php echo $id_jenis_jabatan;?>"><?php echo $nama_jabatan; ?></option>
                        <?php } ?>
                            </select></span>
                    </p>
                        
                    <p>
                        <label>Unit Kerja</label>
                        <span class="field"><select name="unit_kerja" id="selection2" class="uniformselect" required="">
                        <?php
                            foreach ($query2 as $row){
                                $id_unit = $row->id_unit;
                                $nama_unit = $row->nama_unit;
                        ?>
                                <option value="<?php echo $id_unit; ?>"><?php echo $nama_unit; ?></option>
                                 <?php } ?>
                            </select></span>
                    </p>
                        
                    <p>
                        <label>Golongan</label>
                        <span class="field"><select name="golongan" id="selection2" class="uniformselect" >
                        <?php
                            foreach ($query3 as $row){
                                $golongan = $row->golongan;
                                $id_golongan = $row->id_jenis_golongan;
                                $nama_pangkat = $row->nama_pangkat;
                        ?>
                                <option value="<?php echo $id_golongan;?>"><?php echo $golongan;?>/<?php echo $nama_pangkat; ?></option>
                        <?php } ?>
                            </select></span>
                    </p>
                        
                </div><!--#wiz1step2-->
                    
                <div id="wiz1step3">
                    <h4 class="widgettitle">Tahap 3: Pendidikan</h4>
                        
                    <p>
                        <label>Status Pendidikan Terakhir</label>
                        <span class="field"><select name="pendidikan" id="selection2" class="uniformselect" >
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select></span>
                    </p>
                    <p>
                        <label>Nama Sekolah</label>
                        <span class="field"><input type="text" name="nama_sekolah" class="input-large" placeholder="" /></span>
                    </p>
                </div><!--#wiz1step3-->
            </div><!--#wizard-->
        </form>
        <div class="clearfix"></div><br /><br />