<?php          
    foreach ($query as $row) {
    $id_penghargaan = $row->ID_LOG_PENGHARGAAN;
    $nip = $row->NIP;    
    $NAMA_PENGHARGAAN = $row->NAMA_PENGHARGAAN;
    $INSTANSI_PENGHARGAAN= $row->INSTANSI_PENGHARGAAN;
    $NO_SK_PENGHARGAAN= $row->NO_SK_PENGHARGAAN;
    $TGL_SK_PENGHARGAAN= $row->TGL_SK_PENGHARGAAN;
    $TAHUN_PENGHARGAAN= $row->TAHUN_PENGHARGAAN;
    $KETERANGAN_PENGHARGAAN= $row->KETERANGAN_PENGHARGAAN;
?> 
<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT PENGHARGAAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_penghargaan') ?>" method="post">
                    
            <p>
                <label>Nama Penghargaan</label>
                <span class="field"><input type="text" name="nama" class="input-large" placeholder="" value="<?php echo $NAMA_PENGHARGAAN?>" /></span>
            </p>    
                        
                        
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" value="<?php echo $INSTANSI_PENGHARGAAN?>"/></span>
            </p>
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" value="<?php echo $NO_SK_PENGHARGAAN?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-small" value="<?php echo $TGL_SK_PENGHARGAAN?>"/></span>
            </div> 
                        
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-large" placeholder="" value="<?php echo $TAHUN_PENGHARGAAN?>"/></span>
            </p>
                        
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_PENGHARGAAN?>"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_penghargaan" value="<?php echo $id_penghargaan ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>