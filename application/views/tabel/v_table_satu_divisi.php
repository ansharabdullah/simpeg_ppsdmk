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
            
<div id="dashboard-left" class="span8" style="width:95.5%;">
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL JUMLAH PEGAWAI <?php echo $title;?></h4>
<div class="widgetcontent" style="padding-bottom:50px;">
<table id="dyntable" class="table table-bordered responsive">
	<colgroup>
		<col class="con0" style="align: center; width: 4%" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
	</colgroup>
	<thead>
		<tr>
			<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
			<th class="head0">No</th>
			<th class="head1">NIP</th>
			<th class="head0">Nama Pegawai</th>
			<th class="head0">Jenis Kelamin</th>
			<th class="head0">PEND.AKHIR</th>
			<th class="head1">Golongan</th>
			<th class="head1">Jabatan</th>
			<th class="head1">UNIT KERJA</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach($query1 as $row){
		$link = $row->NIP;
		?>
		<tr>
		  <td><span class="center">
			<input type="checkbox" />
		  </span></td>
			<td><?php echo $no;?></td>
			<td><?php echo $row->NIP;?></td>
			<td><a href="<?php echo base_url();?>pegawai/biodata/<?php echo $link; ?>"><?php echo $row->NAMA_PEGAWAI;?></a></td>
			<td class="center"><?php echo $row->JENIS_KELAMIN;?></td>
			<td class="center"><?php echo $row->TINGKAT_PENDIDIKAN;?></td>
			<td class="center"><?php echo $row->GOLONGAN;?></td>
			<td class="center"><?php echo $row->JABATAN;?></td>
			<td class="center"><?php echo $row->NAMA_UNIT;?></td>
		</tr>
		<?php 
		$no++;
		} ?>
	</tbody>
</table>
</div>
</div>
</div>