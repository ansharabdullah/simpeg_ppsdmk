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

<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Tabel Kinerja Divisi</h4>
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
                <th class="head0">No</th>
                <th class="head1">Nama Bagian</th>
                <th class="head0">Jumlah Pegawai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query as $row) {
                $link = $row->NAMA_UNIT;
                $link = strtolower($link);
                $link = str_replace(" ", "_", $link);
                ?>
                <tr>
                    <td><span class="center">
                            <input type="checkbox" />
                        </span></td>
                    <td><?php echo $no; ?></td>
                    <td><a href="<?php echo base_url(); ?>grafik/bagian/<?php echo $link; ?>"><?php echo $row->NAMA_UNIT; ?></a></td>
                    <td class="center"><?php echo $row->JUMLAH; ?></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</div>