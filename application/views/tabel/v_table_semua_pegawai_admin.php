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

    function konfirmasi() {
        var a = bootbox.alert("Periksa folder download anda");
        setTimeout(function() { 
            a.modal('hide');
        },3000);
    }
</script>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-group"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Daftar Seluruh Pegawai</h1>
    </div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Tabel Daftar Seluruh Pegawai</h4>
<div class="widgetcontent">
    <a href="<?php echo base_url(); ?>pegawai/input_biodata" class=" btn btn-success btn-rounded "><i class="iconfa-plus-sign icon-white"></i> Tambah Data Pegawai</a>
    <a href="<?php echo base_url(); ?>pegawai/cetak_DSP" class=" btn btn-success btn-rounded " onclick=" return konfirmasi()"><i class="iconfa-print icon-white"></i> Cetak DSP</a>
    <table class="table table-bordered table-infinite" id="dyntable2">
        <colgroup>
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
        </colgroup>
        <thead>
            <tr>
                <th class="head0 center">NO</th>
                <th class="head0 center">NIP</th>
                <th class="head1 center">NAMA PEGAWAI</th>
                <th class="head0 center">JENIS KELAMIN</th>
                <th class="head0 center">PENDIDIKAN TERAKHIR</th>
                <th class="head1 center">UNIT</th>
                <th class="head1 center">JABATAN</th>
                <th class="head0 right">Aksi</th>
                <th class="head0 center"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query as $row) {
                $link = $row->NIP;
                $id = $row->ID_PEGAWAI;
                ?>
                <tr class="gradeX">
                    <td class="center"><?php echo $no; ?></td>
                    <td class="center"><?php echo $row->NIP; ?></td>
                    <td><a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $link; ?>"><?php echo strtoupper($row->NAMA_PEGAWAI); ?></td>
                    <td class="center"><?php echo $row->JENIS_KELAMIN; ?></td>
                    <td class="center"><?php echo $row->TINGKAT_PENDIDIKAN; ?></td>
                    <td><?php echo $row->NAMA_UNIT; ?></td>
                    <td><?php echo strtoupper($row->JABATAN); ?></td>
                    <td class="center"><a href="<?php echo base_url(); ?>pegawai/edit_biodata/<?php echo $id; ?>">Edit</a></td>
                    <td class="center"><a href="<?php echo site_url('pegawai/delete_pegawai' . '/' . $row->ID_PEGAWAI . '/' . $link) ?>" class="">Hapus</a></td>
                </tr>
                <?php $no++;
            } ?>		
        </tbody>
    </table>
    <br />
</div>