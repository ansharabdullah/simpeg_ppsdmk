<?php          
    foreach ($query as $row) {
    $nip = $row->NIP;
    $ID_ALAMAT = $row->ID_ALAMAT;
    $STATUS_ALAMAT =$row->STATUS_ALAMAT;
    $ALAMAT =$row->ALAMAT;
    $PROVINSI= $row->PROVINSI;
    $KABUPATEN = $row->KABUPATEN;
    $KELURAHAN= $row->KELURAHAN;
    $KECAMATAN= $row->KECAMATAN;
    $KODE_POS= $row->KODE_POS;
    $TELEPON= $row->TELEPON;
    $FAX= $row->FAX;
    $TAHUN= $row->TAHUN_AKTIF;
    $KETERANGAN_ALAMAT= $row->KETERANGAN_ALAMAT;
?>  
<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT ALAMAT</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_alamat') ?>" method="post">
            <p>
                <label>Status Alamat</label>
                <span class="field">
                    <?php if ($STATUS_ALAMAT==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_ALAMAT==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
            <p>
                <label>Alamat</label>
                <span class="field"><input type="text" name="alamat" class="input-large" placeholder="" required="" value="<?php echo $ALAMAT?>"/></span>
            </p>
            <p>
                <label>Provinsi</label>
                <span class="field"><input type="text" name="provinsi" class="input-large" placeholder="" value="<?php echo $PROVINSI?>"/></span>
            </p>
            <p>
                <label>Kota/Kabupaten</label>
                <span class="field"><input type="text" name="kabupaten" class="input-large" placeholder="" value="<?php echo $KABUPATEN?>"/></span>
            </p>
            <p>
                <label>Kelurahan</label>
                <span class="field"><input type="text" name="kelurahan" class="input-large" placeholder="" value="<?php echo $KELURAHAN?>"/></span>
            </p>
            <p>
                <label>Kecamatan</label>
                <span class="field"><input type="text" name="kecamatan" class="input-large" placeholder="" value="<?php echo $KECAMATAN?>"/></span>
            </p>
            <p>
                <label>Kode POS</label>
                <span class="field"><input type="text" name="kode_pos" class="input-large" placeholder="" value="<?php echo $KODE_POS?>"/></span>
            </p>
            <p>
                <label>Telepon</label>
                <span class="field"><input type="text" name="telepon" class="input-large" placeholder="" value="<?php echo $TELEPON?>"/></span>
            </p>
            <p>
                <label>FAX</label>
                <span class="field"><input type="text" name="fax" class="input-large" placeholder="" value="<?php echo $FAX?>"/></span>
            </p>
            <p>
                <label>Tahun Aktif</label>
                <span class="field"><input type="text" name="tahun" class="input-large" placeholder="" value="<?php echo $TAHUN?>"/></span>
            </p>
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_ALAMAT?>"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <button class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </p>
          
            <input type="hidden" name="id_alamat" value="<?php echo $ID_ALAMAT?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>
        </form>
    </div>
</div>