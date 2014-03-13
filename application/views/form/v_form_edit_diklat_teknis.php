<?php          
    foreach ($query as $row) {
    $nip = $row->NIP;
    $ID_DIKLAT = $row->ID_DIKLAT;
    $ID_JNS_DIKLAT = $row->ID_JENIS_DIKLAT;
    $STATUS_DIKLAT = $row->STATUS_DIKLAT;
    $NM_DIKLAT = $row->NAMA_DIKLAT;
    $JUDUL_DIKLAT = $row->JUDUL_DIKLAT;
    $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
    $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
    $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
    $LAMA_DIKLAT= $row->LAMA_DIKLAT;
    $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
    $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
    $ANGKATAN_DIKLAT= $row->ANGKATAN_DIKLAT;
?>

<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT DIKLAT TEKNIS</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_diklat_teknis') ?>" method="post">
            <p>
                <label>Nama Diklat</label>
                <span class="field"><input type="text" name="nama_diklat" class="input-large" placeholder="" required="" value="<?php echo $JUDUL_DIKLAT;?>"/></span>
            </p>
                        
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" required="" value="<?php echo $INSTANSI_DIKLAT;?>"/></span>
            </p>
            <p>
                <label>NO Ijazah</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" value="<?php echo $NO_IJAZAH_DIKLAT;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Ijazah</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_ijazah" class="input-medium" value="<?php echo $TGL_IJAZAH_DIKLAT;?>"/></span>
            </div>
                        
            <p>
                <label>Lama</label>
                <?PHP 
                $LAMA=0;
                if($LAMA_DIKLAT>=518400){
                   $LAMA=$LAMA_DIKLAT/518400;
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
               }else if($LAMA_DIKLAT>=43200&&$LAMA_DIKLAT<518400){
                   $LAMA=$LAMA_DIKLAT/43200;
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
              <?php }else if($LAMA_DIKLAT>=10080&&$LAMA_DIKLAT<43200){
                   $LAMA=$LAMA_DIKLAT/10080;
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
               }else if($LAMA_DIKLAT>=1440&&$LAMA_DIKLAT<10080){
                   $LAMA=$LAMA_DIKLAT/1440;?>
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
               }else if($LAMA_DIKLAT>=60 && $LAMA_DIKLAT<1440){
                   $LAMA=$LAMA_DIKLAT/60;?>
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
               }else if($LAMA_DIKLAT<60){
                   ?>
                   <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA_DIKLAT;?>"/></span>
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
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" value="<?php echo $LAMA_DIKLAT;?>"/></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect">
                        <option value="">------</option>
                        <option value="1">Menit</option>
                        <option value="60">Jam</option>
                        <option value="1440">Hari</option>
                        <option value="43200">Bulan</option>
                        <option value="518400">Tahun</option>
                        
                    </select></span>
            </p><?php }?>
                
             <div class="par">
                <label>Tanggal Mulai</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_mulai" class="input-medium" value="<?php echo $TANGGAL_MULAI_DIKLAT;?>"/></span>
            </div> 
                        
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_selesai" class="input-medium" value="<?php echo $TANGGAL_SELESAI_DIKLAT;?>"/></span>
            </div>
                        
            <p class="stdformbutton">
                
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
            
            <input type="hidden" name="id_diklat" value="<?php echo $ID_DIKLAT ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?> 
        </form>
    </div>
</div>