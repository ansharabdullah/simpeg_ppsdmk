<div class="pageheader">
    <div class="pageicon"><span class="iconfa-check"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>PERSETUJUAN</h1>
    </div>
</div><!--pageheader-->
<h4 class="widgettitle"><span class="icon-check icon-white"></span>Daftar Perubahan Riwayat Pegawai</h4>
<div class="widgetcontent nopadding">
    <ul class="commentlist">
        <?php
        for ($i = 0; $i < $jml; $i++) {
            ?>
            <li>
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $data ['photo'][$i]; ?>" alt="" class="pull-left" />
                <div class="comment-info">
                    <h4><a href="<?php echo base_url() ?>pegawai/biodata/<?php echo $data['nip'][$i] ?>"><?php echo $data ['nama'][$i]; ?></a></h4>
                    <h5> <b>Tanggal :</b>  <?php echo $data ['tgl'][$i]; ?></h5>
                    <p> <b>Keterangan : </b><?php echo $data ['ket'][$i]; ?></p>
                    <p> <b>Detail : </b><br /><?php echo $data ['detail'][$i]; ?></p>
                    <p>
                        <a href="<?php echo base_url(); ?>pegawai/acc/<?php echo $data['id_log'][$i] . "/" . $data['ket_id'][$i]; ?>" class="btn btn-success btn-small" onclick="return confirm('Apakah Anda Yakin?')"><span class="icon-thumbs-up icon-white"></span> Setuju</a>
                        <a href="<?php echo base_url(); ?>pegawai/reject/<?php echo $data['id_log'][$i] . "/" . $data['ket_id'][$i]; ?>" class="btn btn-small" onclick="return confirm('Apakah Anda Yakin?')"><span class="icon-thumbs-down"></span> Tolak</a>
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