<?php          
    foreach ($query as $row) {
    $id_pasangan = $row->ID_PASANGAN;
    $nip = $row->NIP; 
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
<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT PASANGAN</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_pasangan') ?>" method="post">
                    
            <p>
                <label>Status</label>
                <span class="field"><select name="status" id="selection2" class="uniformselect" >
                        <option value="<?php echo $STATUS_PASANGAN?>"><?php echo $STATUS_PASANGAN?></option>
                        <option value="AKTIF">Aktif</option>
                        <option value="MENINGGAL">Meninggal</option>
                        <option value="CERAI">Cerai</option>      
                    </select></span>
            </p>    
                        
            <p>
                <label>Nama</label>
                <span class="field"><input type="text" name="nama" class="input-large" placeholder="" value="<?php echo $NAMA_PASANGAN?>"/></span>
            </p>
            <p>
                <label>Tempat Lahir</label>
                <span class="field"><input type="text" name="tempat_lahir" class="input-large" placeholder="" value="<?php echo $TEMPAT_LAHIR_PASANGAN?>"/></span>
            </p>
            <div class="par">
                <label>Tanggal Lahir</label>
                <span class="field"><input type="date" name="tanggal_lahir" class="input-xlarge" value="<?php echo $TGL_LAHIR_PASANGAN?>"/></span>
            </div>
            
            <div class="par">
                <label>Tanggal Nikah</label>
                <span class="field"><input type="date" name="tanggal_nikah" class="input-xlarge" value="<?php echo $TGL_NIKAH?>"/></span>
            </div>
            <p>
                <label>NO Kariskarsu</label>
                <span class="field"><input type="text" name="no_kariskarsu" class="input-small" placeholder="" value="<?php echo $NO_KARISKARSU?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Kariskarsu</label>
                <span class="field"><input type="date" name="tanggal_kariskarsu" class="input-xlarge" value="<?php echo $TGL_KARISKARSU?>"/></span>
            </div>
            <p>
                <label>Pekerjaan</label>
                <span class="field"><input type="text" name="pekerjaan" class="input-large" placeholder="" value="<?php echo $PEKERJAAN_PASANGAN?>"/></span>
            </p>
                        
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value=""><?php echo $KETERANGAN_PASANGAN?></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_pasangan" value="<?php echo $id_pasangan ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>
        </form>
    </div>
</div>  