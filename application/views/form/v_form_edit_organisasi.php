<?php          
    foreach ($query as $row) {
    $ID_ORGANISASI = $row->ID_ORGANISASI;
    $ID_JENIS_ORGANISASI = $row->ID_JENIS_ORGANISASI;
    $nip = $row->NIP;   
    $JENIS_ORGANISASI =$row->JENIS_ORGANISASI;
    $NAMA_ORGANISASI =$row->NAMA_ORGANISASI;
    $JABATAN_ORGANISASI= $row->JABATAN_ORGANISASI;
    $TAHUN_ORGANISASI = $row->TAHUN_ORGANISASI;
    $KETERANGAN_ORGANISASI= $row->KETERANGAN_ORGANISASI;
?>       
<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT ORGANISASI</h4>
    <div class="widgetcontent nopadding">
            <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_organisasi') ?>" method="post">
                    
            <p>
                <label>KD_STAT_ORGANISASI</label>
                <span class="field"><select name="kd_stat_organisasi" id="selection2" class="uniformselect" >
                        <option value="<?php echo $ID_JENIS_ORGANISASI?>"><?php echo $JENIS_ORGANISASI?></option>
                        <option value="1">Sebelum Jadi Pegawai</option>
                        <option value="2">Perguruan Tinggi</option>
                        <option value="3">Selama Jadi Pegawai</option>
                                        
                    </select></span>
            </p>    
                        
            <p>
                <label>Nama Organisasi</label>
                <span class="field"><input type="text" name="nama_organisasi" class="input-large" placeholder="" value="<?php echo $NAMA_ORGANISASI?>"/></span>
            </p>
            <p>
                <label>Jabatan</label>
                <span class="field"><input type="text" name="jabatan" class="input-large" placeholder="" value="<?php echo $JABATAN_ORGANISASI?>"/></span>
            </p>
            <p>
                <label>Tahun</label>
                <span class="field"><input type="text" name="tahun" class="input-small" placeholder="" value="<?php echo $TAHUN_ORGANISASI?>"/></span>
            </p>
                        
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_ORGANISASI?>"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button class="btn btn-primary">Save</button>
            </p>
     
            <input type="hidden" name="id_organisasi" value="<?php echo $ID_ORGANISASI ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>
        </form>
    </div>
</div>  