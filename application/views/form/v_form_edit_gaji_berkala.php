<?php          
    foreach ($query as $row) {
    $id_kepangkatan = $row->ID_KEPANGKATAN;
    $nip = $row->NIP;  
    $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
    $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
    $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
    $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
    $GAJI = $row->BESAR_GAJI;
    $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;
    $MASA_KERJA_GOLONGAN = $row->MASA_KERJA_GOLONGAN;
?> 
<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT KENAIKAN GAJI BERKALA</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_gaji_berkala') ?>" method="post">
            <p>
                <label>Status Gaji</label>
                <span class="field">
                     <?php if ($STATUS_KEPANGKATAN==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_KEPANGKATAN==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
            
            <div class="par">
                <label>TMT</label>
                <span class="field"><input type="date" name="tmt" class="input-medium" value="<?php echo $TMT_GOLONGAN_KEPANGKATAN?>"/></span>
            </div>
                
                
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required=""/><?php echo $NO_SK_KEPANGKATAN?></span>
            </p>
                
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input type="date" name="tanggal_sk" class="input-medium" value="<?php echo $TGL_SK_KEPANGKATAN?>"/></span>
            </div>  
                
           <p>
                <label>Masa Kerja Bulan</label>
                <span class="field"><input type="number" name="bulan" class="input-small" placeholder="" required="" value="<?php echo $MASA_KERJA_GOLONGAN?>"/></span>
            </p>

                
            <div class="par">
                <label>Gaji</label>
                <div class="input-prepend">
                    <span class="add-on">Rp</span>
                    <input type="text" id="prependedInput" class="span2" name="gaji" value="<?php echo $GAJI?>"/>
                </div>
            </div>
                
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_KEPANGKATAN?>"></textarea></span> 
            </p>
                
            <p class="stdformbutton">
                
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_kepangkatan" value="<?php echo $id_kepangkatan ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div> 