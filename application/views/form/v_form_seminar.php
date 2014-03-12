<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT SEMINAR</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_seminar') ?>" method="post">
                
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="">------</option>
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
                <span class="field"><input type="text" name="peranan" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-large" placeholder="" /></span>
            </p>
                
            <p>
                <label>NO Ijazah</label>
                <span class="field"><input type="text" name="no_ijazah" class="input-large" placeholder="" /></span>
            </p>
                
            <div class="par">
                <label>Tanggal Ijazah</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_ijazah" class="input-xlarge" /></span>
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
                <span class="field"><input id="datepicker" type="date" name="tanggal_mulai" class="input-small" /></span>
            </div> 
                
            <div class="par">
                <label>Tanggal Selesai</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_selesai" class="input-small" /></span>
            </div>
                
                
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
            </p>
                
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