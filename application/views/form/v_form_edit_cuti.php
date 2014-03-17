 <?php
 foreach($query as $row) {
    $STATUS_CUTI = $row->STATUS_CUTI;
    $JENIS_CUTI = $row->JENIS_CUTI;
    $ALASAN_CUTI = $row->ALASAN_CUTI;
    $NO_SK_CUTI = $row->NO_SK_CUTI;
    $TGL_SK_CUTI = $row->TGL_SK_CUTI;
    $TGL_MULAI_CUTI = $row->TGL_MULAI_CUTI;
    $TGL_SELESAI_CUTI = $row->TGL_SELESAI_CUTI;
    $nip = $row->NIP;
    $id_cuti = $row->ID_CUTI;
      
?>

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT CUTI</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_cuti') ?>" method="post">
            <p>
                <label>Status</label>
                <span class="field">
                    <?php if ($STATUS_CUTI==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_CUTI==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>    
            <p>
                <label>JENIS</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="<?php echo $JENIS_CUTI;?>"><?php echo $JENIS_CUTI;?></option>
                        <option value="CUTI TAHUNAN">CUTI TAHUNAN</option>
                        <option value="CUTI BESAR">CUTI BESAR</option>
                        <option value="CUTI DI LUAR TANGGUNGAN NEGARA">CUTI DI LUAR TANGGUNGAN NEGARA</option>
                        <option value="CUTI ALASAN PENTING">CUTI ALASAN PENTING</option>
                                        
                    </select></span>
            </p>
            <p>
                <label>Alasan</label>
                <span class="field"><input type="text" name="alasan" class="input-large" placeholder="" value="<?php echo $ALASAN_CUTI?>"/></span>
            </p>
            <p>
                <label>NOMOR SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" value="<?php echo $NO_SK_CUTI?>"/></span>
            </p>
            <div class="par">
                <label>TANGGAL SK</label>
                <span class="field"><input type="date" name="tgl_sk" class="input-medium" value="<?php echo $TGL_SK_CUTI?>"/></span>
            </div> 
            <div class="par">
                <label>TANGGAL MULAI</label>
                <span class="field"><input type="date" name="tgl_mulai" class="input-medium" value="<?php echo $TGL_MULAI_CUTI?>"/></span>
            </div> 
                
            <div class="par">
                <label>TANGGAL SELESAI</label>
                <span class="field"><input type="date" name="tgl_selesai" class="input-medium" value="<?php echo $TGL_SELESAI_CUTI?>"/></span>
            </div>            
                                
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
                
            <input type="hidden" name="id_cuti" value="<?php echo $id_cuti ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>