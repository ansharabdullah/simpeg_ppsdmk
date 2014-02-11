				<script type="text/javascript">
$(function () {

	$('#container').highcharts({
	            
	    chart: {
	        polar: true,
	        type: 'area'
	    },
	    
	    title: {
	        text: '<?php echo $title; ?>',
	        x: -80
	    },
	    
	    pane: {
	    	size: '80%'
	    },
	    
	    xAxis: {
	        categories: [<?php echo '"'.implode('","',$subkriteria).'"'; ?>],
	        tickmarkPlacement: 'on',
	        lineWidth: 0
	    },
	        
	    yAxis: {
	        gridLineInterpolation: 'polygon',
	        lineWidth: 0,
	        min: 0
	    },
	    
	    tooltip: {
	    	shared: true,
	        pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
	    },
	    
	    legend: {
	        align: 'right',
	        verticalAlign: 'top',
	        y: 70,
	        layout: 'vertical'
	    },
	    
	    series: [{
	        name: 'Penilaian',
	        data: [<?php echo implode(', ',$nilai); ?>],
	        pointPlacement: 'on'
	    }]
	
	});
});
		</script>
		
		<div class="pageheader">
			<div class="pageicon"><span class="iconfa-user"></span></div>
			<div class="pagetitle">
				<h5>.</h5>
				<h1>Detail Pegawai</h1>
			</div>
		</div>
			<!-- biodata -->
			<div id="dashboard-left" class="span8" style="width:40%;">
				<div class="widgetbox">
					<h4 class="widgettitle"><span class="icon-book icon-white"></span>Biodata: <?php echo $title;?><a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
					<div class="widgetcontent" style="padding:10px 50px 10px 50px; ">
						<div style="width:100%">
							<?php foreach($biodata as $row){?>
								<br />
									<table style="font-size:14px; margin-left:-10px;">
									<tr>
										<td style="border: solid 1px #0866c6; padding-top:7px; padding-bottom:2px; padding-right:8px;">&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url(); ?>assets/shamcey/images/photos/foto_profil.png" style="width:200px; height:200px; border:1px solid #fff;"/></td>
										<td></td>
										<td></td>
									</tr>
									<tr height="30"></tr>
									<tr>
										<td>NIP (Nomor Induk Pegawai)</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->NIP;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Nama Lengkap</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->NAMA_PEGAWAI;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Tempat Lahir</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->TEMPAT_LAHIR;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Tanggal Lahir</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->TANGGAL_LAHIR;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->JENIS_KELAMIN;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Alamat</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->ALAMAT;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>No. Kontak</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td>0<?php echo $row->NO_KONTAK;?></td>
									</tr>
									<tr height="10"></tr>
									<tr>
										<td>Divisi</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
										<td><?php echo $row->NAMA_DIVISI;?></td>
									</tr>
									<tr height="10"></tr>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div id="dashboard-right" class="span4" style="width:53%;">
				<div class="widgetbox">
					<h4 class="widgettitle"><span class="icon-tasks icon-white"></span>Grafik Kinerja: <?php echo $title;?><a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
					<div class="widgetcontent" style="padding:10px 50px 10px 50px">
						<div style="width:100%">
							<!-- spyderchart -->
							<div id="container" style="min-width: 400px; max-width: 600px; height: 400px; margin: 0 auto;"></div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- table penilaian -->
			<div id="dashboard-right" class="span4" style="width:95%;">
				<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Tabel Kinerja Pegawai: <?php echo $title;?></h4>
				<div class="widgetcontent">
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
								<th class="head1">KATEGORI PENILAIAN</th>
								<th class="head0">NILAI</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0; $no=1;
							foreach($query as $row){?>
							<tr class="gradeX">
								<td><?php echo $no; ?></td>
								<td><?php echo $row->subkriteria; ?></td>
								<td class="center"><?php echo $row->nilai; ?></td>
							</tr>
							<?php $no++; $total = $total +  $row->nilai; } ?>
							
							<tr class="gradeX">
								<td colspan="2" class="center"><strong>NILAI TOTAL</strong></td>
								<td class="center"><strong><?php echo $total; ?></strong></td>
							</tr>
							<tr class="gradeX">
								<td colspan="2" class="center"><strong>REKOMENDASI BONUS</strong></td>
								<td class="center" style="font-size:24px; color:green;"><strong>
								<?php
									$harga = $bonus;
									
									$jml = strlen($harga);
									$rupiah = "";
									
									while($jml > 3){
										$rupiah = "." . substr($harga,-3) . $rupiah;
										$l = strlen($harga) - 3;
										$harga = substr($harga,0,$l);
										$jml = strlen($harga);
									}
										$rupiah = $harga . $rupiah . ",-";
										
								?>
								Rp.<?php echo $rupiah; ?>
								</strong></td>
							</tr>

						</tbody>
					</table>
					</div>
				</div>