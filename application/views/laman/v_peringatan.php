<div class="pageheader">
    <div class="pageicon"><span class="iconfa-check"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>PERINGATAN</h1>
    </div>
</div><!--pageheader-->
<h4 class="widgettitle"><span class="icon-check icon-white"></span>PERINGATAN PEGAWAI</h4>
<div class="widgetcontent nopadding">
    <ul class="commentlist">
        <?php
        for ($i = 0; $i < $jml; $i++) {
            ?>
            <li>
                <div class="comment-info">
                    <h4><?php echo $data ['judul'][$i]; ?></h4>
                    <h5> <b>Waktu :</b>  <?php echo $data ['waktu'][$i]; ?></h5>
                    <p>
                        <a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $data['nip'][$i];?>" class="btn btn-success btn-small"><span class="icon-thumbs-up icon-white"></span> Perbaharui</a>
                    </p>
                </div>
            </li>
        <?php }
        if($i==0){
            echo"<br><center><h4>data tidak ditemukan</h4></center>";
        }
        ?>
        <li></li>
    </ul>
</div>