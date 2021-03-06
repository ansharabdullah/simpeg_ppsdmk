<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT DIKLAT STRUKTURAL</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_diklat_struktural') ?>" method="post">
            <p>
                <label>Status Diklat</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
                            
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
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
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" required=""/></span>
            </p>
                        
            <p>
                <label>NO Sertifikat</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" required=""/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Sertifikat</label>
                <span class="field"><input type="date" name="tanggal_ijazah" class="input-medium" /></span>
            </div>
                        
            <p>
                <label>Lama</label>
                <span class="field"><input type="text" name="lama" class="input-small" placeholder="" /></span>
                <span class="field"><select name="waktu" id="selection2" class="uniformselect" >
                        <option value="1">Menit</option>
                        <option value="2">Jam</option>
                        <option value="3">Hari</option>
                        <option value="4">Minggu</option>
                        <option value="4">Bulan</option>
                        <option value="5">Tahun</option>
                                        
                    </select></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Mulai</label>
                <span class="field"><input type="date" name="tanggal_mulai" class="input-medium" /></span>
            </div> 
                        
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input type="date" name="tanggal_selesai" class="input-medium" /></span>
            </div>
                        
            <p>
                <label>Angkatan</label>
                <span class="field"><input type="text" name="angkatan" class="input-small" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Rangking</label>
                <span class="field"><input type="text" name="rangking" class="input-small" placeholder="" /></span>
            </p>
<?php          
    foreach ($query as $row) {
    $id_pegawai = $row->id_pegawai;
    $nip = $row->nip;       
?>                         
                        
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
           
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>
        </form>
    </div>
</div>  