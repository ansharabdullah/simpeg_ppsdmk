<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT MENGAJAR</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_mengajar') ?>" method="post">
            <p>
                <label>Status Mengajar</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>        
            <p>
                <label>Mata Pelajaran</label>
                <span class="field"><input type="text" name="mata_pelajaran" class="input-large" placeholder=""/></span>
            </p>
                        
            <div class="par">
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-medium" /></span>
            </div> 
            <div class="par">
                <label>Tahun Mulai</label>
                <span class="field"><input type="text" name="tahun_mulai" class="input-medium" /></span>
            </div> 
            <div class="par">
                <label>Tahun Selesai</label>
                <span class="field"><input type="text" name="tahun_selesai" class="input-medium" /></span>
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
                <button type="submit" class="btn btn-primary">Save</button>
                            
            </p>
         
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>   