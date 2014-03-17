<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT ORGANISASI</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_organisasi') ?>" method="post">
                    
            <p>
                <label>KD_STAT_ORGANISASI</label>
                <span class="field"><select name="kd_stat_organisasi" id="selection2" class="uniformselect" >
                        <option value="">----------</option>
                        <option value="1">Sebelum Jadi Pegawai</option>
                        <option value="2">Perguruan Tinggi</option>
                        <option value="3">Selama Jadi Pegawai</option>
                                        
                    </select></span>
            </p>    
                        
            <p>
                <label>Nama Organisasi</label>
                <span class="field"><input type="text" name="nama_organisasi" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Jabatan</label>
                <span class="field"><input type="text" name="jabatan" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-small" placeholder="" /></span>
            </p>
                        
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