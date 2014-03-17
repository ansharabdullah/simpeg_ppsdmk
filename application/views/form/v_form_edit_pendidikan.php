<?php          
    foreach ($query as $row) {
    $nip = $row->NIP;
    $ID_PENDIDIKAN = $row->ID_PENDIDIKAN;
    $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
    $TINGKAT_PENDIDIKAN = $row->TINGKAT_PENDIDIKAN;
    $NAMA_SEKOLAH= $row->NAMA_SEKOLAH;
    $LOKASI = $row->LOKASI;
    $FAKULTAS = $row->FAKULTAS;
    $JURUSAN = $row->JURUSAN;
    $NO_IJAZAH = $row->NO_IJAZAH;
    $TGL_IJAZAH =$row->TGL_IJAZAH;
    $IPK =$row->IPK;
?> 

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT PENDIDIKAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_pendidikan') ?>" method="post">
            <p>
                <label>Status Pendidikan</label>
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
                <label>Tingkat</label>
                <span class="field"><select name="tingkat" id="selection2" class="uniformselect" >
                        <option value="<?php echo $TINGKAT_PENDIDIKAN;?>"><?php echo $TINGKAT_PENDIDIKAN;?></option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                                        
                    </select></span>
            </p>
                        
            <p>
                <label>Nama Sekolah</label>
                <span class="field"><input type="text" name="nama_sekolah" class="input-large" placeholder="" value="<?php echo $NAMA_SEKOLAH;?>"></span>
            </p>
                        
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-xxlarge" placeholder="" value="<?php echo $LOKASI;?>"/></span>
            </p>
                        
            <p>
                <label>Fakultas</label>
                <span class="field"><input type="text" name="fakultas" class="input-large" placeholder="" value="<?php echo $FAKULTAS;?>"/></span>
            </p>
                        
            <p>
                <label>Jurusan</label>
                <span class="field"><input type="text" name="jurusan" class="input-large" placeholder="" value="<?php echo $JURUSAN;?>"/></span>
            </p>
                        
            <p>
                <label>NO Ijazah</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" value="<?php echo $NO_IJAZAH;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Ijazah</label>
                <span class="field"><input type="date" name="tanggal_ijazah" class="input-medium" value="<?php echo $TGL_IJAZAH;?>" /></span>
            </div> 
      
            <p>
                <label>IPK</label>
                <span class="field"><input type="text" name="ipk" class="input-large" placeholder="" value="<?php echo $IPK;?>"/></span>
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