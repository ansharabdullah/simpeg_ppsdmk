<?php          
    foreach ($query as $row) {
    $ID_PENUGASAN = $row->ID_PENUGASAN;
    $nip = $row->NIP;       
    $ID_JENIS = $row->ID_JENIS_PENUGASAN;
    $JENIS =$row->JENIS_PENUGASAN;
    $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
    $NO_SK_PENUGASAN= $row->NO_SK_PENUGASAN;
    $TGL_SK_PENUGASAN = $row->TGL_SK_PENUGASAN;
    $TUJUAN_PENUGASAN = $row->TUJUAN_PENUGASAN;
    $BIAYA_PENUGASAN = $row->BIAYA_PENUGASAN;
    $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
    $TAHUN_PENUGASAN =$row->TAHUN_PENUGASAN;
    $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
?>            
    
<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT PENUGASAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_penugasan') ?>" method="post">
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                       <option value="<?php echo $ID_JENIS;?>"><?php echo $JENIS;?></option>
                        <?php
                            foreach ($query2 as $row){
                                $id_jenis_penugasan = $row->id_jenis_penugasan;
                                $jenis_penugasan = $row->jenis_penugasan;
                        ?>
                        <option value="<?php echo $id_jenis_penugasan;?>"><?php echo $jenis_penugasan;?></option>
                        <?php } ?>>
                        
                    </select></span>
            </p>
                
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-large" placeholder="" value="<?php echo $LOKASI_PENUGASAN;?>"/></span>
            </p>
                        
            <p>
                <label>NO SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" value="<?php echo $NO_SK_PENUGASAN;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-medium" value="<?php echo $TGL_SK_PENUGASAN;?>"/></span>
            </div> 
                        
            <p>
                <label>Tujuan Penugasan</label>
                <span class="field"><input type="text" name="tujuan" class="input-large" placeholder="" value="<?php echo $TUJUAN_PENUGASAN;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Biaya</label>
                <div class="input-prepend field">
                    <span class="add-on">Rp</span>
                    <input type="text" id="prependedInput" class="span2" name="biaya" value="<?php echo $BIAYA_PENUGASAN;?>"/>
                </div>
            </div>
                        
            <p>
                <label>Lama</label>
                <?PHP 
                $LAMA=0;
                if($LAMA_PENUGASAN>=518400){
                   $LAMA=$LAMA_PENUGASAN/518400;
                   ?>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="6">Tahun</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                        
                    </select></span>
                <?php
               }else if($LAMA_PENUGASAN>=43200&&$LAMA_PENUGASAN<518400){
                   $LAMA=$LAMA_PENUGASAN/43200;
                  ?>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="5">Bulan</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                        
                    </select></span>
              <?php }else if($LAMA_PENUGASAN>=10080&&$LAMA_PENUGASAN<43200){
                   $LAMA=$LAMA_PENUGASAN/10080;
                   ?>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="4">Minggu</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                            
                    </select></span>
                <?php
               }else if($LAMA_PENUGASAN>=1440&&$LAMA_PENUGASAN<10080){
                   $LAMA=$LAMA_PENUGASAN/1440;?>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="3">Hari</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                        
                    </select></span>
               <?php    
               }else if($LAMA_PENUGASAN>=60 && $LAMA_PENUGASAN<1440){
                   $LAMA=$LAMA_PENUGASAN/60;?>
                   <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="2">Jam</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                            
                    </select></span>
               <?php    
               }else if($LAMA_PENUGASAN<60){
                   ?>
                   <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA_PENUGASAN;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="1">Menit</option>
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="5">Bulan</option>
                        <option value="6">Tahun</option>
                            
                    </select></span>
                <?php
               }else{
                ?>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA_PENUGASAN;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="">------</option>
                        <option value="1">Menit</option>
                        <option value="60">Jam</option>
                        <option value="1440">Hari</option>
                        <option value="43200">Bulan</option>
                        <option value="518400">Tahun</option>
                        
                    </select></span>
            </p><?php }?>
            
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-small" placeholder="" value="<?php echo $TAHUN_PENUGASAN;?>"/></span>
            </p>
                        
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_PENUGASAN;?>"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <button class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </p>
            
        <input type="hidden" name="id_penugasan" value="<?php echo $ID_PENUGASAN ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>            
        </form>
    </div>
</div>