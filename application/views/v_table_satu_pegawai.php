<script type="text/javascript">
    jQuery(document).ready(function(){
        /*                
		if(<?php echo $periode; ?> != <?php echo $periode_skrng; ?>){
			$('#target1').hide();
			$('#target2').show();
		}else{
			$('#target1').show();
			$('#target2').hide();
		}*/
		if('<?php echo $rekomendasi; ?>' != '<?php echo 'kosong'; ?>'){
			$('#target1').hide();
			$('#target2').show();
		}else{
			$('#target1').show();
			$('#target2').hide();
		}
			//$('#target1').show();
			//$('#target2').show();
		
    });
</script>


<?php
	$harga1 = $pilihan1;
	
	$jml = strlen($harga1);
	$rupiah1 = "";
	
	while($jml > 3){
		$rupiah1 = "." . substr($harga1,-3) . $rupiah1;
		$l = strlen($harga1) - 3;
		$harga1 = substr($harga1,0,$l);
		$jml = strlen($harga1);
	}
		$rupiah1 = $harga1 . $rupiah1 . ",-";
		
		
	$harga2 = $pilihan2;
	
	$jml = strlen($harga2);
	$rupiah2 = "";
	
	while($jml > 3){
		$rupiah2 = "." . substr($harga2,-3) . $rupiah2;
		$l = strlen($harga2) - 3;
		$harga2 = substr($harga2,0,$l);
		$jml = strlen($harga2);
	}
		$rupiah2 = $harga2 . $rupiah2 . ",-";
		
		
	$harga3 = $pilihan3;
	
	$jml = strlen($harga3);
	$rupiah3 = "";
	
	while($jml > 3){
		$rupiah3 = "." . substr($harga3,-3) . $rupiah3;
		$l = strlen($harga3) - 3;
		$harga3 = substr($harga3,0,$l);
		$jml = strlen($harga3);
	}
		$rupiah3 = $harga3 . $rupiah3 . ",-";
		
		// rekomendasi
	$mamas1 = $nilai1[0];
	$mamas2 = $nilai1[1];
	$mamas3 = $nilai1[2];
	$rata = ($nilai1[0] + $nilai1[1] + $nilai1[2])/3;
	$status = 0;
	if($mamas1 >= $mamas2 && $mamas2 >= $mamas3){ // turun turun
		$status=1;
	}else if($mamas1 >= $mamas2 && $mamas2 <= $mamas3){ // turun naik
		$status=2;
	}else if($mamas1 <= $mamas2 && $mamas2 <= $mamas3){ // naik naik
		$status=3;
	}else if($mamas1 <= $mamas2 && $mamas2 >= $mamas3){ // naik turun
		$status=4;
	} 
	/* 
		rata < 50 & 1
		rata < 50 & 2
		rata < 50 & 3
		rata < 50 & 4
		rata <= 75 & 1
		rata <= 75 & 2
		rata <= 75 & 3
		rata <= 75 & 4
		rata <= 85 & 1
		rata <= 85 & 2
		rata <= 85 & 3
		rata <= 85 & 4
		rata > 85 & 1
		rata > 85 & 2
		rata > 85 & 3
		rata > 85 & 4
	*/
	$rek = 0;
	
	$tanda1 = "";
	$tanda2 = "";
	$tanda3 = "";
	$tanda4 = "";
	$tanda5 = "";
	
	$centang1 = "";
	$centang2 = "";
	$centang3 = "";
	$centang4 = "";
	$centang5 = "";
	
	if($rata < 50 && $status == 1){
		// pecat
		$rek = 5;
		$tanda5 = "background-color:indianred; border-radius:3px;";
		$centang5 = 'checked="true"';
	}else if($rata < 50 && $status == 2){
		// tidak bonus
		$rek = 4;
		$tanda4 = "background-color:lightgreen; border-radius:3px;";
		$centang4 = 'checked="true"';
	}else if($rata < 50 && $status == 3){
		// bonus dikurangi kebutuhan perusahaan
		$rek = 3;
		$tanda3 = "background-color:lightgreen; border-radius:3px;";
		$centang3 = 'checked="true"';
	}else if($rata < 50 && $status == 4){
		// tidak bonus
		$rek = 4;
		$tanda4 = "background-color:lightgreen; border-radius:3px;";
		$centang4 = 'checked="true"';
	}else if($rata <= 75 && $status == 1){
		// tidak bonus
		$rek = 4;
		$tanda4 = "background-color:lightgreen; border-radius:3px;";
		$centang4 = 'checked="true"';
	}else if($rata <= 75 && $status == 2){
		// bonus dikurangi kbutuhan
		$rek = 3;
		$tanda3 = "background-color:lightgreen; border-radius:3px;";
		$centang3 = 'checked="true"';
	}else if($rata <= 75 && $status == 3){
		// bonus krangi rasio
		$rek = 2;
		$tanda2 = "background-color:lightgreen; border-radius:3px;";
		$centang2 = 'checked="true"';
	}else if($rata <= 75 && $status == 4){
		// bonus dikurangi kbutuhan
		$rek = 3;
		$tanda3 = "background-color:lightgreen; border-radius:3px;";
		$centang3 = 'checked="true"';
	}else if($rata <= 85 && $status == 1){
		// bonus dikurangi kbutuhan
		$rek = 3;
		$tanda3 = "background-color:lightgreen; border-radius:3px;";
		$centang3 = 'checked="true"';
	}else if($rata <= 85 && $status == 2){
		// bonus dikurangi rasio
		$rek = 2;
		$tanda2 = "background-color:lightgreen; border-radius:3px;";
		$centang2 = 'checked="true"';
	}else if($rata <= 85 && $status == 3){
		// bonus full
		$rek = 1;
		$tanda1 = "background-color:lightgreen; border-radius:3px;";
		$centang1 = 'checked="true"';
	}else if($rata <= 85 && $status == 4){
		// bonus dikurangi rasio
		$rek = 2;
		$tanda2 = "background-color:lightgreen; border-radius:3px;";
		$centang2 = 'checked="true"';
	}else if($rata > 85 && $status == 1){
		// bonus kurangi rasio
		$rek = 2;
		$tanda2= "background-color:lightgreen; border-radius:3px;";
		$centang2 = 'checked="true"';
	}else if($rata > 85 && $status == 2){
		// bonus full
		$rek = 1;
		$tanda1 = "background-color:lightgreen; border-radius:3px;";
		$centang1 = 'checked="true"';
	}else if($rata > 85 && $status == 3){
		// bonus full
		$rek = 1;
		$tanda1 = "background-color:lightgreen; border-radius:3px;";
		$centang1 = 'checked="true"';
	}else if($rata > 85 && $status == 4){
		// bonus full
		$rek = 1;
		$tanda1 = "background-color:lightgreen; border-radius:3px;";
		$centang1 = 'checked="true"';
	}
		
?>

<div id="target1">
<div id="dashboard-right" class="span4" style="width:49%;">
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span>Rekomendasi Tindakan: <?php echo $title;?></h4>
<div class="widgetcontent">
	<form action="<?php echo base_url();?>manager/keputusan" method="post">
		<table style="font-size:14px; margin-top:15px; margin-left:30px;">
			<tr>
				<td>1.</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td style="width:700px; padding-left:5px; <?php echo $tanda1; ?>">Bonus utuh (Rp. <?php echo $rupiah1; ?>)</td>
				<td><input type="radio" name="rekomendasi" value="Bonus utuh (Rp. <?php echo $rupiah1; ?>)" <?php echo $centang1; ?>></td>
			</tr>
			<tr height="10"></tr>
			<tr>
				<td>2.</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td style="padding-left:5px; <?php echo $tanda2; ?>">Bonus dikurangi rasio jumlah yang kinerjanya di bawah rata-rata (Rp. <?php echo $rupiah2; ?>)</td>
				<td><input type="radio" name="rekomendasi" value="Bonus dikurangi rasio jumlah yang kinerjanya di bawah rata-rata (Rp. <?php echo $rupiah2; ?>)" <?php echo $centang2; ?>></td>
			</tr>
			<tr height="10"></tr>
			<tr>
				<td>3.</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td style="padding-left:5px; <?php echo $tanda3; ?>">Bonus dikurangi lagi kebutuhan perusahaan 20% (Rp. <?php echo $rupiah3; ?>)</td>
				<td><input type="radio" name="rekomendasi" value="Bonus dikurangi lagi kebutuhan perusahaan 20% (Rp. <?php echo $rupiah3; ?>)" <?php echo $centang3; ?>></td>
			</tr>
			<tr height="10"></tr>
			<tr>
				<td>4.</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td style="padding-left:5px; <?php echo $tanda4; ?>">Tidak dapat bonus (Rp. 0,-)</td>
				<td><input type="radio" name="rekomendasi" value="Tidak dapat bonus (Rp. 0,-)" <?php echo $centang4; ?>></td>
			</tr>
			<tr height="10"></tr>
			<tr>
				<td>5.</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td style="padding-left:5px; <?php echo $tanda5; ?>">Pecat</td>
				<td><input type="radio" name="rekomendasi" value="Pecat" <?php echo $centang5; ?>></td>
			</tr>
			<tr height="20"></tr>
			<tr>
				<td><input type="hidden" name="nama" value="<?php echo $title; ?>"></td>
				<td><input type="hidden" name="periode" value="<?php echo $periode; ?>"></td>
				<td colspan="2" align="right"><button class="btn btn-primary" style="width:50px;">Pilih</button></td>
			</tr>
		</table>
	</table>
<div style="margin-top:-35px; width:120px; height:23px; border:solid 1px gray; border-radius:5px; float:left; margin-left:55px; font-size:11px;">
<div style="margin-top:6px; margin-left:6px; margin-right:8px; background-color:lightgreen; border-radius:2px; width:30px; height:10px; float:left;">
</div>Rekomendasi
</div>
</div>
</div>
</div>

<div id="target2">
<div id="dashboard-right" class="span4" style="width:49%;">
<h4 class="widgettitle"><span class="icon-ok icon-white"></span>Tindakan: <?php echo $title;?>&nbsp;&nbsp;&nbsp;(<?php echo $periode; ?>)</h4>
<div class="widgetcontent" style="padding-bottom:40px;">
	<table style="font-size:14px; margin-top:15px; margin-left:30px;">
		<tr>
			<td style="font-size:17px; font-style:italic;"><strong><?php echo $rekomendasi;?></strong></td>
			<?php // echo "Setiap tindakan yang kita lakukan hari ini, akan berdampak pada apapun yang terjadi di masa yang akan datang";?>
		</tr>
	</table>
</div>
</div>
</div>
