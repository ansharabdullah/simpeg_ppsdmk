<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
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
		<h1>Daftar Pegawai</h1>
	</div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Tabel Daftar Pegawai</h4>
<div class="widgetcontent">
    <a href="<?php echo base_url();?>pegawai/input_biodata" class=" btn btn-success btn-rounded "><i class="iconfa-plus-sign icon-white"></i> Tambah Data Pegawai</a>
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
			<th class="head0">NO</th>
			<th class="head0">NIP</th>
			<th class="head1">NAMA PEGAWAI</th>
			<th class="head0">JENIS KELAMIN</th>
			<th class="head1">TTL</th>
			<th class="head0">BAGIAN</th>
			<th class="head0">Aksi</th>
			<th class="head0"></th>
		</tr>
	</thead>
	<tbody>
		<?php 
                $no=1;
                foreach($query as $row){
		$link = $row->NAMA_PEGAWAI;
		$link = str_replace(" ", "_", $link);
		?>
		<tr class="gradeX">
			<td class="center"><?php echo $no; ?></td>
			<td class="center"><?php echo $row->NIP; ?></td>
			<td><a href="<?php echo base_url();?>pegawai/biodata/<?php echo $link; ?>"><?php echo $row->NAMA_PEGAWAI; ?></td>
			<td class="center"><?php echo $row->JENIS_KELAMIN; ?></td>
			<td class="center"><?php echo $row->TANGGAL_LAHIR; ?></td>
			<td class="center"><?php echo $row->NAMA_DIVISI; ?></td>
                        <td class="center"><a href="<?php echo base_url();?>pegawai/input_biodata">Edit</a></td>
			<td class="center"><a href="#" class="">Hapus</a></td>
		</tr>
		<?php $no++; } ?>		
	</tbody>
</table>
<br />
</div>