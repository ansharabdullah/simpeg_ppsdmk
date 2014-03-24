<script type="text/javascript">
    jQuery(document).ready(function() {
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0, 'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });

        jQuery('#dyntable2').dataTable({
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });

    });
</script>
<div class="pageheader">
	<div class="pageicon"><span class="iconfa-group"></span></div>
	<div class="pagetitle">
		<h5>.</h5>
		<h1>TABEL PERKIRAAN KENAIKAN PANGKAT PEGAWAI PPSDMK</h1>
	</div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL PERINGATAN PERKIRAAN <?php echo $title; ?> "REGULER"</h4>
<div class="widgetcontent" style="padding-bottom:50px;">
    <table class="table table-bordered table-infinite" id="dyntable2">
        <colgroup>
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>
        <thead>
            <tr>
                <th class="head0 center">No</th>
                <th class="head1 center">NIP</th>
                <th class="head0 center">NAMA PEGAWAI</th>
                <th class="head0 center">PANGKAT/<br/>GOLONGAN</th>
                <th class="head0 center">BAGIAN/BIDANG/<br>KELOMPOK FUNSGIONAL</th>
                <th class="head0 center">TMT TERAKHIR</th>
                <th class="head0 center">PERKIRAAN <br >KP</th>
                <th class="head0 center">SISA KE<br >KP SELANJUTNYA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query as $q) {
                $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
                $nama = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
                $link = $q->NIP;
                //echo $q->TMT_GOLONGAN . " - ";
                $tmt = new DateTime($q->TMT_GOLONGAN);
                $kp = strtotime(date("Y-m-d", strtotime($q->TMT_GOLONGAN)) . " +4 year");
                //echo date('Y-m-d',$kp) . "<br>";
                if (date('Y-m-d', $kp) <= date('Y-m-d')) {
                    $kp = $tmt->getTimestamp();
                    $y = date('Y') + 1;
                    $m = date('m', $kp);
                    $d = date('d', $kp);
                    $kp = $y . '-' . $m . '-' . $d;
                    $kp = strtotime(date("Y-m-d", strtotime($kp)));
                }

                $kp_yad = new DateTime(date('Y-m-d', $kp));
                $now = new DateTime(date('Y-m-d'));
                $diff = $now->diff($kp_yad);
                $sisa_tahun = $diff->y;
                $sisa_bulan = $diff->m;
                $sisa_hari = $diff->d;

                if ($sisa_tahun == 0 && $sisa_bulan <= 3) {
                    $warna = "#F26D7D";
                } else if ($sisa_tahun == 0 && $sisa_bulan > 3) {
                    $warna = "#FFF467";
                } else {
                    $warna = "#FFF";
                }

                if ($sisa_tahun < 1) {
                    ?>
                    <tr style="background-color: <?php echo $warna ?>;">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q->NIP; ?></td>
                        <td><a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $link; ?>"><?php echo $nama; ?></a></td>
                        <td class="center"><?php echo $q->GOLONGAN; ?>/<?php echo $q->NAMA_PANGKAT; ?></td>
                        <td class="center"><?php echo $q->NAMA_UNIT; ?></td>
                        <td class="center"><?php echo $q->TMT_GOLONGAN; ?></td>  
                        <td class="center"><?php echo date('Y-m-d', $kp); ?></td>
                        <td class="center"><b><?php echo $sisa_tahun . " tahun - " . $sisa_bulan . " bulan - " . $sisa_hari . " hari"; ?> </b></td>  
                    </tr>
                    <?php
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
    <div style="margin-top:10px; width:300px; height:23px; border:solid 1px gray; border-radius:5px; float:right; margin-right:2px; font-size:11px;">
        <table style="width:100%;">
            <tr>
                <td><div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:#FFF467; border-radius:2px; width:30px; height:10px; float:left;">
                    </div></td>
                <td>< 12 Bulan KP</td>
                <td><div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:#F26D7D; border-radius:2px; width:30px; height:10px; float:left;">
                    </div></td>
                <td>< 3 Bulan KP</td>
            </tr>
        </table>
        <br />
    </div>
</div>