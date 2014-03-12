<div class="pageheader">
    <div class="pageicon"><span class="iconfa-hand-down"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>PERSETUJUAN</h1>
    </div>
</div><!--pageheader-->

<h4 class="widgettitle" ><span class="icon-list-alt icon-white"></span>Form Pengaturan Akun</h4>
<div class="widgetcontent" >
    <form id="myForm" name="myForm" class="stdform" action=<?php echo base_url(); ?>pegawai/ubah_akun method="post" onsubmit="return confirm('Apakah anda yakin?')">


        <h3 class="subtitle">PENGATURAN PASSWORD</h3>
        <?php
        if ($msg != 1) {
            echo "<font color=red size='4'>*) " . $msg . "</font>";
        }
        ?>
        <p><input type="hidden" name="nip" value="<?php echo $NIP; ?>" /></p>
        <p><input type="password" name="password_lama" class="input-block-level" placeholder="Password Lama Anda" required /></p>
        <p><input type="password" name="password_baru" class="input-block-level" placeholder="Password Baru Anda" required/></p>
        <p><input type="password" name="password_konfirmasi" class="input-block-level" placeholder="Masukan Kembali Password Baru Anda" required=""/></p>

        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn">Cancel</button>

    </form>         
</div><!--regcontent-->


</div>