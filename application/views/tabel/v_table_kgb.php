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
		<h1>TABEL PERKIRAAN KENAIKAN GAJI BERKALA PEGAWAI PPSDMK</h1>
	</div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL PERINGATAN PERKIRAAN <?php echo $title; ?></h4>
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
                <th class="head0 center">JENIS<br/>KELAMIN</th>
                <th class="head1 center">GOL/<br>JABATAN</th>
                <th class="head0 center">UNIT KERJA</th>
                <th class="head0 center">KGB</th>
                <th class="head0 center">SISA KE<br />KGB SELANJUTNYA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query as $q) {
                $link = $q->NIP;

                $tmt_tahun = substr($q->NIP, 8, 4);
                $tmt_bulan = substr($q->NIP, 12, 2);

                if (substr($tmt_bulan, 0, 1) == 0) {
                    $tmt_bulan = substr($tmt_bulan, 1, 1);
                }
                
                // kgb yang akan datang
                $tmt_tgl = $tmt_tahun . "-" . $tmt_bulan . "-01";
                if ($tmt_tahun % 2 == 0 && date('Y') % 2 == 0 && $tmt_bulan <= date('m')) {
                    $kgb = date('Y') + 2 . "-" . $tmt_bulan . "-01";
                } else if ($tmt_tahun % 2 == 0 && date('Y') % 2 == 0 && $tmt_bulan > date('m')) {
                    $kgb = date('Y') . "-" . $tmt_bulan . "-01";
                } else if ($tmt_tahun % 2 == 0 && date('Y') % 2 != 0) {
                    $kgb = date('Y') + 1 . "-" . $tmt_bulan . "-01";
                } else if ($tmt_tahun % 2 != 0 && date('Y') % 2 == 0) {
                    $kgb = date('Y') + 1 . "-" . $tmt_bulan . "-01";
                } else if ($tmt_tahun % 2 != 0 && date('Y') % 2 != 0 && $tmt_bulan <= date('m')) {
                    $kgb = date('Y') + 2 . "-" . $tmt_bulan . "-01";
                } else if ($tmt_tahun % 2 != 0 && date('Y') % 2 != 0 && $tmt_bulan > date('m')) {
                    $kgb = date('Y') . "-" . $tmt_bulan . "-01";
                }
                $yad = new DateTime($kgb);
                $now = new DateTime(date('Y-m-d'));
                $diff = $now->diff($yad);
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
                        <td><a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $link; ?>"><?php echo $q->NAMA_PEGAWAI; ?></a></td>
                        <td class="center"><?php echo $q->JENIS_KELAMIN; ?></td>
                        <td class="center"><?php echo $q->GOLONGAN; ?>/<?php echo $q->JABATAN; ?></td>
                        <td class="center"><?php echo $q->NAMA_UNIT; ?></td>
                        <td class="center"><?php echo $kgb; ?></td>
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
                <td>< 12 Bulan KGB</td>
                <td><div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:#F26D7D; border-radius:2px; width:30px; height:10px; float:left;">
                    </div></td>
                <td>< 3 Bulan KGB</td>
            </tr>
        </table>
        <br />
    </div>
</div>