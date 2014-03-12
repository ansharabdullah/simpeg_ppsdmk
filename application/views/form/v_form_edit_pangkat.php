<?php          
    foreach ($query as $row) {
    $ID_KEPANGKATAN = $row->ID_KEPANGKATAN;
    $nip = $row->NIP; 
    $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
    $ID_JENIS_GOL = $row->ID_JENIS_GOLONGAN;
    $PANGKAT = $row->NAMA_PANGKAT;
    $GOLONGAN_KEPANGKATAN = $row->GOLONGAN;
    $JENIS_KENAIKAN_1 = $row->JENIS_KENAIKAN;
    $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
    $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
    $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
    $BESAR_GAJI = $row->GAJI_GOLONGAN;
    $PERATURAN =$row->PERATURAN;
    $MASA_KERJA_GOLONGAN=$row->MASA_KERJA_GOLONGAN;
    $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;
?> 

<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT PANGKAT</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_pangkat') ?>" method="post">
            <p>
                <label>Status Pangkat</label>
                <span class="field">
                     <?php if ($STATUS_KEPANGKATAN==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($STATUS_KEPANGKATAN==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
            
            <p>
                <label>Golongan</label>
                <span class="field"><select name="golongan" id="selection2" class="uniformselect" >
                        <option value="<?php echo $ID_JENIS_GOL;?>"><?php echo $GOLONGAN_KEPANGKATAN;?>/<?php echo $PANGKAT; ?></option>
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
                        <option value="<?php echo $JENIS_KENAIKAN_1;?>"><?php echo $JENIS_KENAIKAN_1;?></option>
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
                <span class="field"><input id="datepicker" type="date" name="tmt" class="input-medium" value="<?php echo $TMT_GOLONGAN_KEPANGKATAN?>"/></span>
            </div>
                
                
            <p>
                <label>No SK</label>
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required="" value="<?php echo $NO_SK_KEPANGKATAN?>"/></span>
            </p>
                
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input id="datepicker" type="date" name="tanggal_sk" class="input-medium" value="<?php echo $TGL_SK_KEPANGKATAN?>"/></span>
            </div>      
            <p>
                <label>Masa Kerja Bulan</label>
                <span class="field"><input type="number" name="bulan" class="input-small" placeholder="" required="" value="<?php echo $MASA_KERJA_GOLONGAN?>"/></span>
            </p>
                
            <p>       
                <label>Gaji</label>
                      <span class="field"><input type="text" name="gaji" class="input-small" placeholder="" required="" value="<?php echo $BESAR_GAJI?>"/>
            </p>
            
            <p>
                <label>Peraturan</label>
                <span class="field"><input type="text" name="peraturan" class="input-large" placeholder="" value="<?php echo $PERATURAN?>"/></span>
            </p>
            <p>
                <label>Keterangan</label>
                <span class="field"><textarea cols="40" rows="3" class="span5" name="keterangan" value="<?php echo $KETERANGAN_KEPANGKATAN?>"></textarea></span> 
            </p>
                        
            <p class="stdformbutton">
                <button class="btn btn-primary">Save</button>
                <button type="reset" class="btn">Cancel</button>
            </p>
           
            <input type="hidden" name="id_kepangkatan" value="<?php echo $ID_KEPANGKATAN ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
<?php }  ?>
        </form>
    </div>
</div>