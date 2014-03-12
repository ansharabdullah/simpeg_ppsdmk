<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT TOEFL</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_toefl') ?>" method="post">
            <p>
                <label>Status TOEFL</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
                
            <p>
                <label>Jenis</label>
                <span class="field"><select name="jenis" id="selection2" class="uniformselect" >
                        <option value="-">---</option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="IELTS">IELTS</option>
                        <option value="GMAT">GMAT</option>
                                        
                    </select></span>
            </p>
            <p>
                <label>Tahun</label>
                <span class="field"><input type="number" name="tahun" class="input-small" placeholder="" required=""/></span>
            </p>
            <p>
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-small" placeholder="" /></span>
            </p>
                        
            <p>
                <label>NO Sertifikat</label>
                <span class="field"><input type="text" name="no_sertifikat" class="input-large" placeholder="" required=""/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal Sertifikat</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sertifikat" class="input-small" /></span>
            </div> 
                        
            <p>
                <label>Nilai/Skor</label>
                <span class="field"><input type="text" name="nilai" class="input-small" placeholder="" required=""/></span>
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