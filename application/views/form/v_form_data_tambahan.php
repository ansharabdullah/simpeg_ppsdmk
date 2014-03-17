<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">DATA TAMBAHAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_data_tambahan') ?>" method="post">
            
            <p>
                <label>NO Kartu Pegawai</label>
                <span class="field"><input type="text" name="no_kartu_pegawai" class="input-large" placeholder="" /></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Kartu Pegawai</label>
                <span class="field"><input type="date" name="tanggal_kartu_pegawai" class="input-small" /></span>
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
                        
            <div class="par">
                <label>Tanggal Askes</label>
                <span class="field"><input type="date" name="tanggal_askes" class="input-small" /></span>
            </div> 
                        
                        
            <p>
                <label>Kode Wilayah ASKES</label>
                <span class="field"><input type="text" name="kode_wilayah_askes" class="input-medium" placeholder="" /></span>
            </p>
                        
            <p>
                <label>NO Hadphone</label>
                <span class="field"><input type="number" name="no_handphone" class="input-medium" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Email</label>
                <span class="field"><input type="email" name="email" id="email2" class="input-medium" /></span>
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
<?php          
    foreach ($query as $row) {
    $id_pegawai = $row->id_pegawai;
    $nip = $row->nip;       
?>                         
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>           
        </form>
    </div>
</div>   