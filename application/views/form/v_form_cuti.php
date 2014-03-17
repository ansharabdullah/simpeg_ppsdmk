<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT CUTI</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_cuti') ?>" method="post">
            <p>
                <label>STATUS</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>AKTIF &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>TIDAK AKTIF<br />
                </span>
            </p>      
            <p>
                <label>JENIS</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="">----------</option>
                        <option value="CUTI TAHUNAN">CUTI TAHUNAN</option>
                        <option value="CUTI BESAR">CUTI BESAR</option>
                        <option value="CUTI DI LUAR TANGGUNGAN NEGARA">CUTI DI LUAR TANGGUNGAN NEGARA</option>
                        <option value="CUTI ALASAN PENTING">CUTI ALASAN PENTING</option>
                                        
                    </select></span>
            </p>
            <p>
                <label>Alasan</label>
                <span class="field"><input type="text" name="alasan" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>NOMOR SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" /></span>
            </p>
            <div class="par">
                <label>TANGGAL SK</label>
                <span class="field"><input type="date" name="tgl_sk" class="input-medium" /></span>
            </div> 
            <div class="par">
                <label>TANGGAL MULAI</label>
                <span class="field"><input type="date" name="tgl_mulai" class="input-medium" /></span>
            </div> 
                
            <div class="par">
                <label>TANGGAL SELESAI</label>
                <span class="field"><input type="date" name="tgl_selesai" class="input-medium" /></span>
            </div>            
            
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