<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT PENUGASAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_penugasan') ?>" method="post">
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                       <?php
                            foreach ($query2 as $row){
                                $id_jenis_penugasan = $row->id_jenis_penugasan;
                                $jenis_penugasan = $row->jenis_penugasan;
                        ?>
                        <option value="<?php echo $id_jenis_penugasan;?>"><?php echo $jenis_penugasan;?></option>
                        <?php } ?>>
                        
                    </select></span>
            </p>
                
            <p>
                <label>Lokasi</label>
                <span class="field"><input type="text" name="lokasi" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>NO SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" /></span>
            </p>
                        
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-medium" /></span>
            </div> 
                        
            <p>
                <label>Tujuan Penugasan</label>
                <span class="field"><input type="text" name="tujuan" class="input-large" placeholder="" /></span>
            </p>
                        
            <div class="par">
                <label>Biaya</label>
                <div class="input-prepend field">
                    <span class="add-on">Rp</span>
                    <input type="text" id="prependedInput" class="span2" name="biaya"/>
                </div>
            </div>
                            
            <p>
                        
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
            
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-small" placeholder="" /></span>
            </p>
                        
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