<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT PENDIDIKAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_pendidikan') ?>" method="post">
            <p>
                <label>Status Pendidikan</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
                
            <p>
                <label>Tingkat</label>
                <span class="field"><select name="tingkat" id="selection2" class="uniformselect" >
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
                <span class="field"><input type="text" name="nama_sekolah" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-xxlarge" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Fakultas</label>
                <span class="field"><input type="text" name="fakultas" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Jurusan</label>
                <span class="field"><input type="text" name="jurusan" class="input-large" placeholder="" /></span>
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
                <label>IPK</label>
                <span class="field"><input type="text" name="ipk" class="input-large" placeholder="" /></span>
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