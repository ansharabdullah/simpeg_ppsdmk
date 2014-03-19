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

<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL <?php echo strtoupper($judul); ?></h4>
<div class="widgetcontent" style="padding-bottom:50px;">
    <table id="dyntable" class="table table-bordered responsive">
        <colgroup>
            <col class="con0" style="align: center; width: 4%" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>
        <thead>
            <tr>
                <th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                <th class="head0 center">No</th>
                <?php
                if ($status == 1) {
                    echo "<th class='head1 center'>Nama Bagian</th>
                <th class='head0 center'>Jumlah Pegawai</th>";
                } else if ($status == 2) {
                    echo "<th class='head1 center'>Nama Golongan</th>
                <th class='head0 center'>Jumlah Pegawai</th>";
                } else if ($status == 3) {
                    echo "<th class='head1 center'>Nama Pendidikan Terakhir</th>
                <th class='head0 center'>Jumlah Pegawai</th>";
                } else if ($status == 4) {
                    echo "<th class='head1 center'>Jenjang Umur</th>
                <th class='head0 center'>Jumlah Pegawai</th>";
                } else if ($status == 5) {
                    echo "<th class='head1 center'>Status Kepegawaian</th>
                <th class='head0 center'>Jumlah Pegawai</th>";
                } else if ($status == 6) {
                    echo "<th class='head1 center'>Bulan</th>
                <th class='head0 center'>Jumlah Cuti</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $label = 0;
            $no = 1;
            foreach ($query as $row) {
                $kolom1 = '';
                $kolom2 = '';
                if ($status == 1) {
                    $link = "grafik/bagian/$row->NAMA_UNIT";
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = $row->NAMA_UNIT;
                    $kolom2 = $row->JUMLAH;
                } else if ($status == 2) {
                    $link = "grafik/golongan/$row->GOLONGAN";
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = $row->GOLONGAN;
                    $kolom2 = $row->JUMLAH;
                } else if ($status == 3) {
                    $link = "grafik/pendidikan/$row->TINGKAT_PENDIDIKAN";
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = $row->TINGKAT_PENDIDIKAN;
                    $kolom2 = $row->JUMLAH;
                } else if ($status == 4) {
                    $link = "grafik/jenjang_umur/$row->UMUR";
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = $row->UMUR;
                    $kolom2 = $row->JUMLAH;
                } else if ($status == 5) {
                    $link = "grafik/status_pegawai/$row->STATUS_PEGAWAI";
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = strtoupper($row->STATUS_PEGAWAI);
                    $kolom2 = $row->JUMLAH;
                } else if ($status == 6) {
                    $link = "grafik/cuti/" . $row['bulan'];
                    $link = strtolower($link);
                    $link = str_replace(" ", "_", $link);
                    $kolom1 = strtoupper($row['bulan']);
                    $kolom2 = $row['jumlah'];
                    $label = 1;
                    //echo $row['bulan'];
                }
                ?>
                <tr>
                    <td><span class="center">
                            <input type="checkbox" />
                        </span></td>
                    <td class="center"><?php echo $no; ?></td>
                    <td class="center"> <?php if ($label == 1) {echo $kolom1;}else{?><a href="<?php echo base_url(); ?><?php echo $link; ?>"><?php echo $kolom1; }?></a></td>
                    <td class="center"><b><?php echo $kolom2; ?></b>&nbsp &nbsp <?php
                            if ($label == 1) {
                                echo"Cuti";
                            } else {
                                echo"Orang";
                            }
                            ?></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</div>