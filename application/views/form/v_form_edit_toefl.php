 <?php          
    foreach ($query as $row) {
    $nip = $row->NIP;
    $ID_PENDIDIKAN = $row->ID_PENDIDIKAN;
    $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
    $JENIS_PENDIDIKAN= $row->JENIS_PENDIDIKAN;
    $TAHUN_PENDIDIKAN = $row->TAHUN_PENDIDIKAN;
    $INSTANSI_PENDIDIKAN = $row->INSTANSI;
    $NO_IJAZAH = $row->NO_IJAZAH;
    $TGL_IJAZAH =$row->TGL_IJAZAH;
    $IPK =$row->IPK;
?> 

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT BAHASA ASING</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_toefl') ?>" method="post">
              <p>
                <label>Status</label>
                <span class="field">
                    <?php if ($STATUS_PENDIDIKAN==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_PENDIDIKAN==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
                
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="<?php echo $JENIS_PENDIDIKAN;?>"><?php echo $JENIS_PENDIDIKAN;?></option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="IELTS">IELTS</option>
                        <option value="GMAT">GMAT</option>
                                        
                    </select></span>
            </p>
            <p>
                <label>Tahun</label>
                <span class="field"><input type="number" name="tahun" class="input-small" placeholder="" required="" value="<?php echo $TAHUN_PENDIDIKAN;?>"/></span>
            </p>
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-small" placeholder="" value="<?php echo $INSTANSI_PENDIDIKAN;?>"/></span>
            </p>
                        
            <p>
                <label>NO Sertifikat</label>
                <span class="field"><input type="text" name="no_sertifikat" class="input-large" placeholder="" required="" value="<?php echo $NO_IJAZAH;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Sertifikat</label>
                <span class="field"><input  type="date" name="tanggal_sertifikat" class="input-small" value="<?php echo $TGL_IJAZAH;?>"/></span>
            </div> 
                        
            <p>
                <label>Nilai/Skor</label>
                <span class="field"><input type="text" name="nilai" class="input-small" placeholder="" required="" value="<?php echo $IPK;?>"/></span>
            </p>
                        
                        
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
                
            </p>
           
            <input type="hidden" name="id_pendidikan" value="<?php echo $ID_PENDIDIKAN ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>  
        </form>
    </div>
</div>  