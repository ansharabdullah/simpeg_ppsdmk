 <?php          
    foreach ($query as $row) {
   $id_gaji = $row->ID_GAJI;
    $nip = $row->NIP;  
    $STATUS_GAJI = $row->STATUS_GAJI;
    $TMT_GAJI = $row->TMT_GAJI;
    $NO_SK_GAJI = $row->NO_SK_GAJI;
    $TGL_SK_GAJI = $row->TGL_SK_GAJI;
    $TOTAL_GAJI = $row->TOTAL_GAJI;
    $KETERANGAN_GAJI =$row->KETERANGAN_GAJI;
    
?>  
<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT KENAIKAN GAJI BERKALA</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_gaji_berkala') ?>" method="post">
            <p>
                <label>Status Gaji</label>
                <span class="field">
                     <?php if ($STATUS_GAJI==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_GAJI==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
            
            <div class="par">
                <label>TMT</label>
                <span class="field"><input type="date" name="tmt" class="input-medium" value="<?php echo $TMT_GAJI?>"/></span>
            </div>
                
                
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required="" value="<?php echo $NO_SK_GAJI?>"/></span>
            </p>
                
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input type="date" name="tanggal_sk" class="input-medium" value="<?php echo $TGL_SK_GAJI?>"/></span>
            </div>  
  
            <div class="par">
                <label>Gaji</label>
                <div class="input-prepend">
                    <span class="add-on">Rp</span>
                    <input type="text" id="prependedInput" class="span2" name="gaji" value="<?php echo $TOTAL_GAJI?>"/>
                </div>
            </div>
                
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"><?php echo $KETERANGAN_GAJI?></textarea></span> 
            </p>
                
            <p class="stdformbutton">
                
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_gaji" value="<?php echo $id_gaji ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div> 