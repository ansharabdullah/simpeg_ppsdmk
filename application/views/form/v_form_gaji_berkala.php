<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT KENAIKAN GAJI BERKALA</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_gaji_berkala') ?>" method="post">
            <p>
                <label>Status Gaji</label>
                <span class="field">
                    <input type="checkbox" name="status" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="status" value="0"/>Tidak Aktif<br />
                </span>
            </p>
            
            <div class="par">
                <label>TMT</label>
                <span class="field"><input id="datepicker" type="date" name="tmt" class="input-small" /></span>
            </div>
                
                
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" /></span>
            </p>
                
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-small" /></span>
            </div> 
                
            <div class="par">
                <label>Masa Kerja</label>
                <span class="field"><input id="datepicker" type="text" name="masa_kerja" class="input-small" /></span>
            </div> 
                
            <p>
                <label>Bulan</label>
                <span class="field"><input type="text" name="bulan" class="input-large" placeholder="" /></span>
            </p>
                
            <div class="par">
                <label>Gaji</label>
                <div class="input-prepend">
                    <span class="add-on">Rp</span>
                    <input type="text" id="prependedInput" class="span2" name="gaji"/>
                </div>
            </div>
                
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
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