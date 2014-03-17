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

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT DIKLAT FUNGSIONAL</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_diklat') ?>" method="post">
            <p>
                <label>Status Diklat</label>
                <span class="field">
                    <?php if ($STATUS_DIKLAT==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_DIKLAT==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
            
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="<?php echo $ID_JNS_DIKLAT;?>"><?php echo $NM_DIKLAT;?></option>
                       <?php
                            foreach ($query2 as $row){
                                $id_jenis_diklat = $row->id_jenis_diklat;
                                $nama_diklat = $row->nama_diklat;
                        ?>
                        <option value="<?php echo $id_jenis_diklat;?>"><?php echo $nama_diklat;?></option>
                        <?php } ?>>
                            
                    </select></span>
            </p>
            <p>
                <label>Nama Diklat</label>
                <span class="field"><input type="text" name="nama_diklat" class="input-large" placeholder="" required="" value="<?php echo $JUDUL_DIKLAT?>"/></span>
            </p>
                
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" value="<?php echo $INSTANSI_DIKLAT?>"/></span>
            </p>
                
            <p>
                <label>NO STTPL</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" required="" value="<?php echo $NO_IJAZAH_DIKLAT;?>"/></span>
            </p>
                
            <div class="par">
                <label>Tanggal STTPL</label>
                <span class="field"><input type="date" name="tanggal_ijazah" class="input-medium" value="<?php echo $TGL_IJAZAH_DIKLAT;?>"/></span>
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
                <span class="field"><input type="date" name="tanggal_mulai" class="input-medium" value="<?php echo $TANGGAL_MULAI_DIKLAT;?>"/></span>
            </div> 
            
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input type="date" name="tanggal_selesai" class="input-medium" value="<?php echo $TANGGAL_SELESAI_DIKLAT;?>"/></span>
            </div>
            
            <p>
                <label>Angkatan</label>
                <span class="field"><input type="text" name="angkatan" class="input-small" placeholder="" value="<?php echo $ANGKATAN_DIKLAT;?>"/></span>
            </p>
                
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