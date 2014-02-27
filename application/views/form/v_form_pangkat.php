<div class="widgetbox box">
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
                            foreach ($query3 as $row){
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
                       <?php
                            foreach ($query2 as $row){
                                $id_jenis_kenaikan = $row->id_jenis_kenaikan;
                                $jenis_kenaikan = $row->jenis_kenaikan;
                        ?>
                        <option value="<?php echo $id_jenis_kenaikan;?>"><?php echo $jenis_kenaikan;?></option>
                        <?php } ?>>
                    </select></span>
            </p>
                
            <div class="par">
                <label>TMT</label>
                <span class="field"><input id="datepicker" type="date" name="tmt" class="input-medium" /></span>
            </div>
                
                
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required=""/></span>
            </p>
                
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-medium" /></span>
            </div> 
                
            <div class="par">
                <label>Masa Kerja Tahun</label>
                <span class="field"><input type="number" name="masa_kerja" class="input-small" required=""/></span>
            </div> 
                
            <p>
                <label>Masa Kerja Bulan</label>
                <span class="field"><input type="number" name="bulan" class="input-small" placeholder="" required=""/></span>
            </p>
                
            <p>       
                <label>Gaji</label>
                <span class="field"><select name="gaji" id="selection2" class="uniformselect" >
                    <?php
                           foreach ($query4 as $row){
                                $id_kategori_gaji = $row->id_kategori_gaji;
                                $besar_gaji= $row->besar_gaji;
                                $gaji = number_format($besar_gaji,2,',','.');
                        ?>
                        <option value="<?php echo $id_kategori_gaji;?>"><?php echo "Rp ".$gaji;?></option>
                        <?php } ?>>
                    </select></span>
            </p>
            
            <p>
                <label>Peraturan</label>
                <span class="field"><input type="text" name="peraturan" class="input-large" placeholder="" /></span>
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