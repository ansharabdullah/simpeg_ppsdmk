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
		<h1>Daftar Seluruh Pegawai</h1>
	</div>
</div>
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Tabel Daftar Seluruh Pegawai</h4>
<div class="widgetcontent" style="padding-bottom:50px;">
<table class="table table-bordered table-infinite" id="dyntable2">
	<colgroup>
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
	</colgroup>
	<thead>
		<tr>
			<th class="head1">NO</th>
			<th class="head0">NIP</th>
			<th class="head1">NAMA PEGAWAI</th>
			<th class="head0">JENIS KELAMIN</th>
			<th class="head0">DIVISI</th>
			<th class="head0">RATA-RATA</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($query as $row){
		$rerata = $row->rerata;
		$link = $row->nama_pegawai;
		$link = str_replace(" ", "_", $link);
		$warna1 = "";
		$warna3 = "";
                
		if($row->rerata<=50){
			$warna1 = "indianred";
			$warna3 = "whitesmoke";
		}
		 ?>
		<tr class="gradeX" style="background-color:<?php echo $warna1; ?>;">
			<td class="center"><?php echo $no; ?></td>
			<td class="center"><?php echo $row->nip; ?></td>
			<td><a style="color:<?php echo $warna3; ?>;" href="<?php echo base_url();?>pegawai/pegawai/<?php echo $link; ?>/<?php echo $periode; ?>"><?php echo $row->nama_pegawai; ?></td>
			<td class="center"><?php echo $row->jenis_kelamin; ?></td>
			<td class="center"><?php echo $row->nama_divisi; ?></td>
			<td class="center"><?php echo !empty($rerata) ? $rerata : '0';?></td>
		</tr>
		<?php $no++; } ?>		
	</tbody>
</table>
<div style="margin-top:10px; width:143px; height:23px; border:solid 1px gray; border-radius:5px; float:right; margin-right:2px; font-size:11px;">
<div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:indianred; border-radius:2px; width:30px; height:10px; float:left;">
</div>Di bawah rata-rata
<br />
</div>
</div>