<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT ALAMAT</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_alamat') ?>" method="post">
            <p>
                <label>Status Alamat</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
            <p>
                <label>Alamat</label>
                <span class="field"><input type="text" name="alamat" class="input-large" placeholder="" required=""/></span>
            </p>
            <p>
                <label>Provinsi</label>
                <span class="field"><input type="text" name="provinsi" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Kota/Kabupaten</label>
                <span class="field"><input type="text" name="kabupaten" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Kelurahan</label>
                <span class="field"><input type="text" name="kelurahan" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Kecamatan</label>
                <span class="field"><input type="text" name="kecamatan" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Kode POS</label>
                <span class="field"><input type="text" name="kode_pos" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Telepon</label>
                <span class="field"><input type="text" name="telepon" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>FAX</label>
                <span class="field"><input type="text" name="fax" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Tahun Aktif</label>
                <span class="field"><input type="text" name="tahun" class="input-large" placeholder="" /></span>
            </p>
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan"></textarea></span> 
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