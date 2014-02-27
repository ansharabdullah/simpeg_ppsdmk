<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT JABATAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_jabatan') ?>" method="post">
            <p>
                <label>Status Jabatan</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
                            
            <p>
                <label>Jabatan</label>
                <span class="field"><select name="jabatan" id="selection2" class="uniformselect" >
                       <?php
                            foreach ($query2 as $row){
                                $nama_jabatan = $row->jabatan;
                                $id_jenis_jabatan = $row->id_jenis_jabatan;  
                        ?>
                        <option value="<?php echo $id_jenis_jabatan;?>"><?php echo $nama_jabatan; ?></option>
                        <?php } ?>
                    </select></span>
            </p>
                        
            <p>
                <label>Unit Kerja</label>
                <span class="field"><select name="unit_kerja" id="selection2" class="uniformselect" >
                        <?php
                            foreach ($query3 as $row){
                                $id_unit = $row->id_unit;
                                $nama_unit = $row->nama_unit;
                        ?>
                        <option value="<?php echo $id_unit; ?>"><?php echo $nama_unit; ?></option>
                                 <?php } ?>
                    </select></span>
            </p>              
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required="" /></span>
            </p>
                        
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input type="date" name="tanggal_sk" class="input-medium" /></span>
            </div> 
                        
            <div class="par">
                <label>TMT</label>
                <span class="field"><input type="date" name="tmt" class="input-medium" /></span>
            </div>
                        
            <p class="stdformbutton"> 
                <button type="reset" class="btn">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
                            
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