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
		<h1>TABEL PERKIRAAN PENSIUN PEGAWAI PPSDMK </h1>
	</div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL PERINGATAN <?php echo $title; ?></h4>
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
                <th class="head0 center">BAGIAN/BIDANG/<br>KELOMPOK FUNSGIONAL</th>
                <th class="head0 center">UMUR</th>
                <th class="head0 center">SISA <br />KE PENSIUN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query as $row) {
                $link = $row->NIP;
                
                $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
                $nama = $q->GELAR_DEPAN . " " . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;

                if ($row->PENSIUN < 12 && $row->PENSIUN > 3) {
                    $warna = "#FFF467";
                } else {
                    $warna = "#F26D7D";
                }
                ?>
                <tr style="background-color: <?php echo $warna ?>;">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->NIP; ?></td>
                    <td><a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $link; ?>"><?php echo $nama; ?></a></td>
                    <td class="center"><?php echo $row->JENIS_KELAMIN; ?></td>
                    <td class="center"><?php echo $row->GOLONGAN; ?>/<?php echo $row->JABATAN; ?></td>
                    <td class="center"><?php echo $row->NAMA_UNIT; ?></td>
                    <td class="center"><?php echo $row->UMUR; ?></td>
                    <td class="center"><b><?php echo $row->PENSIUN; ?> </b>BULAN</td>  
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <div style="margin-top:10px; width:300px; height:23px; border:solid 1px gray; border-radius:5px; float:right; margin-right:2px; font-size:11px;">
        <table style="width:100%;">
            <tr>
                <td><div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:#FFF467; border-radius:2px; width:30px; height:10px; float:left;">
        </div></td>
                <td>< 12 Bulan Pensiun</td>
                <td><div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:#F26D7D; border-radius:2px; width:30px; height:10px; float:left;">
        </div></td>
                <td>< 3 Bulan Pensiun</td>
            </tr>
        </table>
        <br />
    </div>
</div>