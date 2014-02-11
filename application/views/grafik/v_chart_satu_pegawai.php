<script type="text/javascript">
$(function () {

	$('#container1').highcharts({
	            
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
	        min: 0,
			max: 100
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
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            subtitle: {
                text: 'Perkembangan Kinerja'
            },
            xAxis: {
                categories: [<?php echo '"'.implode('", "',$tgl).'"'; ?>]
            },
            yAxis: {
                title: {
                    text: 'Rentang Nilai'
                },
                labels: {
                    formatter: function() {
                        return this.value 
                    }
                },
				max: 100,
				min: 0
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                },
				series: {
					cursor: 'pointer',
					point: {
						events: {
							click: function() {									
								var nama = this.category;
								//nama = nama.toLowerCase(); 
								window.location.href = '<?php echo base_url(); ?>admin/pegawai/<?php echo str_replace(" ", "_", $title); ?>/' + nama; 
							}
						}
					}
				}
            },
            series: [{
                name: 'Nilai',
                marker: {
                    symbol: 'square'
                },
                data: [<?php echo implode(', ',$nilai1); ?>]
    
            }]
        });
    });
    

</script>
		
<div class="pageheader">
	<div class="pageicon"><span class="iconfa-user"></span></div>
	<div class="pagetitle">
		<h5>.</h5>
                <h1>Data Pegawai</h1>
	</div>
</div>

<!-- biodata -->
<div id="dashboard-left" class="span8" style="width:40%;">
	<div class="widgetbox">
		<h4 class="widgettitle"><span class="icon-book icon-white"></span>Biodata: <?php echo $title;?><a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
		<div class="widgetcontent" style="padding:20px 50px 20px 50px;">
			<div style="width:100%">
				<?php foreach($biodata as $row){?>
					<br />
						<table style="font-size:14px; margin-left:-10px;">
						<tr>
							<td>
							&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url(); ?>assets/shamcey/images/photos/foto_profil.png" style="width:100px; height:100px; border:1px solid gray;"/>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr height="20"></tr>
						<tr>
							<td>NIP (Nomor Induk Pegawai)</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->NIP;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->NAMA_PEGAWAI;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->TEMPAT_LAHIR;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->TANGGAL_LAHIR;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->JENIS_KELAMIN;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Alamat</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->ALAMAT;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>No. Kontak</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td>0<?php echo $row->NO_KONTAK;?></td>
						</tr>
						<tr height="8"></tr>
						<tr>
							<td>Divisi</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;</td>
							<td><?php echo $row->NAMA_DIVISI;?></td>
						</tr>
						<tr height="8"></tr>
					</table>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div id="dashboard-right" class="span4" style="width:53%; margin-left:28px;">
	<div class="widgetbox">
		<h4 class="widgettitle"><span class="icon-tasks icon-white"></span>Riwayat Pendidikan : <?php echo $title;?><a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
		<div class="widgetcontent" style="padding:10px 50px 10px 50px">
			<div style="width:100%">
				<!-- spyderchart -->
				<!--<div id="container1" style="min-width: 400px; max-width: 600px; height: 400px; margin: 0 auto;"></div>-->
			</div>
		</div>
	</div>
</div>

<div id="dashboard-right" class="span4" style="width:95%;">
<h4 class="widgettitle"><span class="icon-user icon-white"></span>Riwayat Pelatihan : <?php echo $title;?></h4>
<div class="widgetcontent">
	<!-- <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->
</div>
</div>