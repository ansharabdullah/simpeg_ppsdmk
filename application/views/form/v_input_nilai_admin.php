<script>   
	
	function ubah10(){
		var x = document.getElementById("val10");
		jQuery("#slider10").slider({
			value: x.value
		});
	} 
	function ubah11(){
		var x = document.getElementById("val11");
		jQuery("#slider11").slider({
			value: x.value
		});
	} 
	function ubah12(){
		var x = document.getElementById("val12");
		jQuery("#slider12").slider({
			value: x.value
		});
	}
	function ubah13(){
		var x = document.getElementById("val13");
		jQuery("#slider13").slider({
			value: x.value
		});
	}
	function ubah14(){
		var x = document.getElementById("val14");
		jQuery("#slider14").slider({
			value: x.value
		});
	} 
	function ubah15(){
		var x = document.getElementById("val15");
		jQuery("#slider15").slider({
			value: x.value
		});
	} 
	function ubah16(){
		var x = document.getElementById("val16");
		jQuery("#slider16").slider({
			value: x.value
		});
	}
	function ubah17(){
		var x = document.getElementById("val17");
		jQuery("#slider17").slider({
			value: x.value
		});
	} 
	function ubah18(){
		var x = document.getElementById("val18");
		jQuery("#slider18").slider({
			value: x.value
		});
	}	
	
	function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }

        return true;
    }	
       
</script>          

		  <div class="pageheader">
				<div class="pageicon"><span class="iconfa-edit"></span></div>
				<div class="pagetitle">
					<h5>.</h5>
					<h1>Input Nilai Pegawai</h1>
				</div>
			</div>
		   
			<!-- biodata -->
			
			<div id="dashboard-left" class="span8" style="width:95.5%;">
				<div class="widgetbox">
					<h4 class="widgettitle"><span class="icon-book icon-white"></span>Biodata<a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
					<div class="widgetcontent" style="padding:10px 50px 30px 50px">
						<div style="width:100%">
							<?php 
							$id_pegawai = 0;
							foreach($biodata as $row){
							$id_pegawai = $row->ID_PEGAWAI;
							?>
								<br />
								<img src="<?php echo base_url(); ?>assets/shamcey/images/photos/foto_profil.png" style="width:150px; height:150px; border:1px solid gray; "/>
									<table style="font-size:14px; margin-left:200px; margin-top:-160px;">
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
			
			<?php if($cek == "kosong"){ ?>
			<!-- penilaian -->
			<div id="dashboard-right" class="span4" style="width:95.5%;">
            <h4 class="widgettitle"><span class="icon-edit icon-white"></span>Input Nilai</h4>
			<div class="widgetcontent" style="padding-bottom:65px;">
				<div style="padding:20px 40px;">
                <form class="stdform" action="<?php echo base_url(); ?>supervisor/submit_input_nilai" method="post">
				<input type="hidden" name="nama" class="input-large" value="<?php echo $id_pegawai;?>"  />
				<div style="margin-left:65px; margin-top:-25px;">
					<p><font style="font-size:15px;">Periode Penilaian : <font style="font-weight:bold;"><?php echo $periode; ?></font></font></p>
					<span class="field">
					<input type="hidden" name="periode" class="input-large" value="<?php echo $periode;?>"  />
					</span>
				</div>
				<div class="row-fluid">
					<div style="float:left; margin-left:66px; font-size:18px;">				
                        <br />
						PERILAKU
                        <br />
                        <div class="pargroup" style=" margin-top:5px; width:300px; font-size:14px;">   
                            <div class="par" style="height:60px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Kejujuran</p>
                                <input id="val10" type="number" min="1" max="100" name="kejujuran" class="input-small" onchange="ubah10()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider10" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:60px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Tanggung Jawab</p>
                                <input id="val11" type="number" min="1" max="100" name="tanggung_jawab" class="input-small" onchange="ubah11()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider11" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:40px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Loyalitas</p>
                                <input id="val12" type="number" min="1" max="100" name="loyalitas" class="input-small" onchange="ubah12()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider12" style="width:210px; float:right;"></div>
                            </div>
                                   
                        </div><!--pargroup-->
                    </div>
					<div style="float:left; margin-left:50px; font-size:18px;">
                        <br />
						MANAJEMEN
                        <br />
                        <div class="pargroup" style=" margin-top:5px; width:300px; font-size:14px;">   
                            <div class="par" style="height:60px;">
								<p style="float:left; width:250px; margin-top:-20px;">Kepemimpinan</p>
								<input id="val13" type="number" min="1" max="100" name="kepemimpinan" class="input-small" onchange="ubah13()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider13" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:60px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Perencanaan</p>
                                <input id="val14" type="number" min="1" max="100" name="perencanaan" class="input-small" onchange="ubah14()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider14" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:40px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Organisasi</p>
								<input id="val15" type="number" min="1" max="100" name="organisasi" class="input-small" onchange="ubah15()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider15" style="width:210px; float:right;"></div>
                            </div>
                                   
                        </div><!--pargroup-->
                    </div>
					<div style="float:left; margin-left:50px; font-size:18px;">
                        <br />
						KERJASAMA
                        <br />
                        <div class="pargroup" style=" margin-top:5px; width:300px; font-size:14px;">   
							<div class="par" style="height:60px;">
								<p style="float:left; width:250px; margin-top:-20px;">Komunikasi</p>
                                <input id="val16" type="number" min="1" max="100" name="komunikasi" class="input-small" onchange="ubah16()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider16" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:60px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Adaptasi</p>
                                <input id="val17" type="number" min="1" max="100" name="adaptasi" class="input-small" onchange="ubah17()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider17" style="width:210px; float:right;"></div>
                            </div>
							<div class="par" style="height:40px;">
                                <p style="float:left; width:250px; margin-top:-20px;">Berbagi Informasi</p>
                                <input id="val18" type="number" min="1" max="100" name="berbagi_informasi" class="input-small" onchange="ubah18()" onkeypress="return isNumberKey(event)" style="width:40px; float:left;"/>
                                <div id="slider18" style="width:210px; float:right;"></div>
                            </div>
                                   
                        </div><!--pargroup-->
                    </div>
				</div>
				<p class="stdformbutton" style="float:right; margin-right:70px;">
					<button class="btn btn-primary">Simpan</button>
                </p>
				</div>
				</form>
			</div>
			</div>
			<?php } ?>
		
			