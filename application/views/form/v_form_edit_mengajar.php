<?php
foreach ($query as $row) {
    $MATA_PELAJARAN = $row->MATA_PELAJARAN;
    $INSTANSI_AKADEMIS = $row->INSTANSI_AKADEMIS;
    $TAHUN_MULAI= $row->TAHUN_AWAL_AKADEMIS;
    $TAHUN_SELESAI= $row->TAHUN_AKHIR_AKADEMIS;
    $KETERANGAN_AKADEMIS= $row->KETERANGAN_AKADEMIS;
    $STATUS_AKADEMIS=$row->STATUS_AKADEMIS;
    $LAMA_MENGAJAR=$TAHUN_SELESAI-$TAHUN_MULAI;
    $ID_AKADEMIS = $row->ID_AKADEMIS;
    $nip = $row->NIP;
?>

<div class="widgetbox box" style="text-transform:uppercase;">
    <h4 class="widgettitle">RIWAYAT MENGAJAR</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_mengajar') ?>" method="post">
            <p>
                <label>Status Mengajar</label>
                <span class="field">
                    <?php if ($STATUS_AKADEMIS==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_AKADEMIS==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>        
            <p>
                <label>Mata Pelajaran</label>
                <span class="field"><input type="text" name="mata_pelajaran" class="input-large" placeholder="" value="<?php echo $MATA_PELAJARAN;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Instansi</label>
                <span class="field"><input type="text" name="instansi" class="input-medium" value="<?php echo $INSTANSI_AKADEMIS;?>"/></span>
            </div> 
            <div class="par">
                <label>Tahun Mulai</label>
                <span class="field"><input type="text" name="tahun_mulai" class="input-medium" value="<?php echo $TAHUN_MULAI;?>" /></span>
            </div> 
            <div class="par">
                <label>Tahun Selesai</label>
                <span class="field"><input type="text" name="tahun_selesai" class="input-medium" value="<?php echo $TAHUN_SELESAI;?>"/></span>
            </div> 
              <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value=""><?php echo $KETERANGAN_AKADEMIS;?></textarea></span> 
            </p>                         
            <p class="stdformbutton"> 
                <a href="<?php echo site_url('pegawai/biodata/'.$nip) ?>" class="btn">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>             
            </p>
            <input type="hidden" name="id_akademis" value="<?php echo $ID_AKADEMIS ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>   