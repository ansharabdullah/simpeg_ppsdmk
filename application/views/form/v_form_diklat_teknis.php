<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT DIKLAT TEKNIS</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_diklat_teknis') ?>" method="post">
            <p>
                <label>Nama Diklat</label>
                <span class="field"><input type="text" name="nama_diklat" class="input-large" placeholder="" required=""/></span>
            </p>
                        
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" required=""/></span>
            </p>
            <p>
                <label>NO Ijazah</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" /></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Ijazah</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_ijazah" class="input-medium" /></span>
            </div>
                        
            <p>
                <label>Lama</label>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" /></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect" >
                        <option value="menit">Menit</option>
                        <option value="jam">Jam</option>
                        <option value="hari">Hari</option>
                        <option value="bulan">Bulan</option>
                        <option value="tahun">Tahun</option>
                                        
                    </select></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Mulai</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_mulai" class="input-small" /></span>
            </div> 
                        
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_selesai" class="input-small" /></span>
            </div>
                        
            <p class="stdformbutton">
                <button class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </p>
<?php          
    foreach ($query as $row) {
    $id_pegawai = $row->id_pegawai;
    $nip = $row->nip; 
?>            
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?> 
        </form>
    </div>
</div>