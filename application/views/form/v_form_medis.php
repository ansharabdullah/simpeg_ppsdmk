<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT MEDIS</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_medis') ?>" method="post">
                    
            <p>
                <label>Indikasi</label>
                <span class="field"><input type="text" name="indikasi" class="input-large" placeholder="" /></span>
            </p>    
                        
                        
            <p>
                <label>Tindakan</label>
                <span class="field"><input type="text" name="tindakan" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <button class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </p>
<?php          
    foreach ($query as $row) {
    $id_pegawai = $row->id_pegawai;
    $nip = $row->nip;       
?>            
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>