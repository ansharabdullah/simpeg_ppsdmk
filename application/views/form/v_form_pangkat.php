<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT PANGKAT</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_insert_log_pangkat') ?>" method="post">
            <p>
                <label>Status Pangkat</label>
                <span class="field">
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                </span>
            </p>
                
            <p>
                <label>Golongan</label>
                <span class="field"><select name="golongan" id="selection2" class="uniformselect" >
                        <?php
                            foreach ($query2 as $row){
                                $golongan = $row->golongan;
                                $id_golongan = $row->id_jenis_golongan;
                                $nama_pangkat = $row->nama_pangkat;
                        ?>
                        <option value="<?php echo $id_golongan;?>"><?php echo $golongan;?>/<?php echo $nama_pangkat; ?></option>
                        <?php } ?>
                    </select></span>
            </p>
            
            <p>
                <label>Jenis Kenaikan</label>
                <span class="field"><select name="jenis_kenaikan" id="selection2" class="uniformselect" >
                        <option value="CPNS">CPNS</option>
                        <option value="PNS">PNS</option>
                        <option value="REGULER">REGULER</option>
                        <option value="PENYESUAIAN IJAZAH">Penyesuaian Ijazah</option>
                        <option value="PILIHAN">Pilihan</option>
                        <option value="PENGABDIAN">Pengabdian</option>
                        <option value="ANUMERTA">Anumerta</option>
                        <option value="BERKALA">Berkala</option>
                        <option value="PENYESUAIAN MASA KERJA">Penyesuaian Masa Kerja</option>
                    </select></span>
            </p>
            
            <div class="par">
                <label>TMT</label>
                <span class="field"><input  type="date" name="tmt" class="input-medium" /></span>
            </div>
            
            
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required=""/></span>
            </p>
            
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input  type="date" name="tanggal_sk" class="input-medium" /></span>
            </div> 
            
            <p>
                <label>Masa Kerja Bulan</label>
                <span class="field"><input type="text" name="bulan" class="input-small" placeholder="" required=""/></span>
            </p>
            
            <p>       
                <label>Gaji</label>
                <span class="field"><input type="text" name="gaji" class="input-medium" placeholder="" required=""/></span>
            </p>
                
            <p>
                <label>Peraturan</label>
                <span class="field"><input type="text" name="peraturan" class="input-large" placeholder="" /></span>
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