<?php          
    foreach ($query as $row) {
    $nip = $row->NIP; 
    $ID_PENUGASAN = $row->ID_PENUGASAN;
    $NAMA_PENUGASAN =$row->NAMA_PENUGASAN;
    $PERANAN =$row->PERANAN;
    $INSTANSI_PENUGASAN= $row->INSTANSI_PENUGASAN;
    $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
    $NO_IJAZAH_PENUGASAN= $row->NO_IJAZAH_PENUGASAN;
    $TGL_IJAZAH_PENUGASAN = $row->TGL_IJAZAH_PENUGASAN;
    $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
    $TGL_MULAI_PENUGASAN =$row->TGL_MULAI_PENUGASAN;
    $TGL_SELESAI_PENUGASAN =$row->TGL_SELESAI_PENUGASAN;
    $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
?> 

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT SEMINAR</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_seminar') ?>" method="post">
                
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="<?php echo $NAMA_PENUGASAN?>"><?php echo $NAMA_PENUGASAN?></option>
                        <option value="Simposium">Simposium</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Rapat">Rapat</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Temu Wicara">Temu Wicara</option>
                        <option value="Temu Karya">Temu Karya</option>
                        <option value="Sosialisasi">Sosialisasi</option>
                        <option value="Pameran">Pameran</option>
                        <option value="Diskusi">Diskusi</option>
                        <option value="Pengalaman Lainnya">Pengalaman Lainnya</option>
                    </select></span>
            </p>    
                
            <p>
                <label>Peranan</label>
                <span class="field"><input type="text" name="peranan" class="input-large" placeholder="" value="<?php echo $PERANAN?>"/></span>
            </p>
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" value="<?php echo $INSTANSI_PENUGASAN?>"/></span>
            </p>
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-large" placeholder="" value="<?php echo $LOKASI_PENUGASAN?>"/></span>
            </p>
                
            <p>
                <label>NO Ijazah</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" value="<?php echo $NO_IJAZAH_PENUGASAN?>"/></span>
            </p>
                
            <div class="par">
                <label>Tanggal Ijazah</label>
                <span class="field"><input type="date" name="tanggal_ijazah" class="input-xlarge" value="<?php echo $TGL_IJAZAH_PENUGASAN?>"/></span>
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
            
                
            <div class="par">
                <label>Tanggal Mulai</label>
                <span class="field"><input type="date" name="tanggal_mulai" class="input-medium" value="<?php echo $TGL_MULAI_PENUGASAN;?>"/></span>
            </div> 
                
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input type="date" name="tanggal_selesai" class="input-medium" value="<?php echo $TGL_SELESAI_PENUGASAN;?>"/></span>
            </div>
                
                
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_PENUGASAN;?>"></textarea></span> 
            </p>
                
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_penugasan" value="<?php echo $ID_PENUGASAN ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>  
        </form>
    </div>
</div>