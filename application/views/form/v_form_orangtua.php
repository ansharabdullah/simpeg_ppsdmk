<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT ORANG TUA</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_orangtua') ?>" method="post">
                    
            <p>
                <label>Status</label>
                <span class="field"><select name="status" id="selection2" class="uniformselect" >
                        <option value="bapak kandung">Bapak Kandung</option>
                        <option value="ibu kandung">Ibu Kandung</option>
                        <option value="bapak mertua">Bapak Mertua</option>
                        <option value="ibu mertua">Ibu Mertua</option>
                    </select></span>
            </p>    
                        
            <p>
                <label>Nama</label>
                <span class="field"><input type="text" name="nama" class="input-large" placeholder="" /></span>
            </p>
                        
                        
            <div class="par">
                <label>Tanggal Lahir</label>
                <span class="field"><input  type="date" name="tanggal_lahir" class="input-xlarge" /></span>
            </div>
            <p>
                <label>Tempat Lahir</label>
                <span class="field"><input type="text" name="tempat_lahir" class="input-large" placeholder="" /></span>
            </p>
                        
            <p>
                <label>Pekerjaan</label>
                <span class="field"><input type="text" name="pekerjaan" class="input-large" placeholder="" /></span>
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