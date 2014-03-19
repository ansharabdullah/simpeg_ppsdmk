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
            
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>TABEL JUMLAH PEGAWAI <?php echo $title;?></h4>
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
	</colgroup>
	<thead>
		<tr>
			<th class="head0 center">No</th>
			<th class="head1 center">NIP</th>
			<th class="head0 center">NAMA PEGAWAI</th>
			<th class="head0 center">JENIS<br/>KELAMIN</th>
			<th class="head0 center">PENDIDIKAN<br/>TERAKHIR</th>
			<th class="head1 center">GOL</th>
			<th class="head1 center">JABATAN</th>
			<th class="head0 center">UNIT KERJA</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach($query1 as $row){
		$link = $row->NIP;
                $gelar_belakang = str_replace($row->GELAR_BELAKANG, " ", ",");
                $nama = $row->GELAR_DEPAN . " " . $row->NAMA_PEGAWAI . "" . $row->GELAR_BELAKANG;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row->NIP;?></td>
			<td><a href="<?php echo base_url();?>pegawai/biodata/<?php echo $link; ?>"><?php echo $nama;?></a></td>
			<td class="center"><?php echo $row->JENIS_KELAMIN;?></td>
			<td class="center"><?php echo $row->TINGKAT_PENDIDIKAN;?></td>
			<td class="center"><?php echo $row->GOLONGAN;?></td>
                        <td class="center"><?php echo strtoupper($row->JABATAN);?></td>
			<td class="center"><?php echo $row->NAMA_UNIT;?></td>
		</tr>
		<?php 
		$no++;
		} ?>
	</tbody>
</table>
</div>
</div>