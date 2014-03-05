<?php          
    foreach ($query as $row) {
    $id_jabatan_1 = $row->ID_JABATAN;
    $id_jenis_jabatan_1 = $row->ID_JENIS_JABATAN;
    $nip = $row->NIP;
    $status_jabatan=$row->STATUS_JABATAN;
    $jabatan = $row->JABATAN;
    $nama_unit_1 = $row->NAMA_UNIT;
    $id_unit_1 = $row->ID_UNIT;
    $no_sk_jabatan=$row->NO_SK_JABATAN;
    $tgl_sk_jabatan = $row->TGL_SK_JABATAN;
    $tmt_jabatan=$row->TMT_JABATAN;
    
?>            
            

<div class="widgetbox box">
    <h4 class="widgettitle">RIWAYAT JABATAN</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" action="<?php echo site_url('Pegawai/proses_edit_log_jabatan') ?>" method="post">
            <p>
                <label>Status Jabatan</label>
                <span class="field">
                    <?php if ($status_jabatan==1){?>
                    <input type="checkbox" name="aktif" checked="checked" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" value="0"/>Tidak Aktif<br />
                    <?php }else if($status_jabatan==0){?>
                    <input type="checkbox" name="aktif" value="1"/>Aktif &nbsp;
                    <input type="checkbox" name="aktif" checked="checked" value="0"/>Tidak Aktif<br />
                    <?php }?>
                </span>
            </p>
                            
            <p>
                <label>Jabatan</label>
                <span class="field"><select name="jabatan" id="selection2" class="uniformselect" >
                        <option value="<?php echo $id_jenis_jabatan_1;?>"><?php echo $jabatan?></option>
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
                        <option value="<?php echo $id_unit_1;?>"><?php echo $nama_unit_1?></option>
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
                <span class="field"><input type="text" name="no_sk" class="input-large" placeholder="" required="" value="<?php echo $no_sk_jabatan;?>"/></span>
            </p>
                        
            <div class="par">
                <label>Tanggal SK</label>
                <span class="field"><input type="date" name="tanggal_sk" class="input-medium" value="<?php echo $tgl_sk_jabatan;?>"/></span>
            </div> 
                        
            <div class="par">
                <label>TMT</label>
                <span class="field"><input type="date" name="tmt" class="input-medium" value="<?php echo $tmt_jabatan;?>"/></span>
            </div>
                        
            <p class="stdformbutton"> 
                <button type="reset" class="btn">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
                            
            </p>      
            <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan_1 ?>"/>
            <input type="hidden" name="nip" value="<?php echo $nip ?>"/>
            <?php }  ?>
        </form>
    </div>
</div>   