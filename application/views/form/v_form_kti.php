<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT KARYA TULIS ILMIAH</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_kti') ?>" method="post">
                    
            <p>
                <label>Judul Karya Tulis</label>
                <span class="field"><input type="text" name="judul" class="input-large" placeholder="" /></span>
            </p>    
                        
                        
            <p>
                <label>Peranan</label>
               <span class="field"><select name="peranan" id="selection2" class="uniformselect" >
                        <option value="">----------</option>
                        <option value="PENULIS">PENULIS</option>
                        <option value="PEMBIMBING">PEMBIMBING</option>
                        <option value="PEMBIMBING">PENGUJI</option>
                    </select></span>
            </p>
             <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" /></span>
            </p>             
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-large" placeholder="" /></span>
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