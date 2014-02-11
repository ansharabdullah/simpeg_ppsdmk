<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PT. Semprot Packaging</title>

<!--icon-->
<link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/shamcey/images/logi1.png">

<!--shampey-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/shamcey/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/shamcey/css/responsive-tables.css">

<!-- highcharts -->
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts-3.0.7/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/highcharts-3.0.7/js/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/highcharts-3.0.7/js/highcharts-more.js"></script>
<script src="<?php echo base_url();?>assets/highcharts-3.0.7/js/modules/exporting.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/responsive-tables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/custom.js"></script>

</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo" style="margin-top:-10px;">
            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/shamcey/images/logo_ppsdmk.png" alt="" width="85%" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="head-icon head-users"></span>
                    <span class="headmenu-label">Pegawai</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Daftar Pegawai</li>
                        <li><a href="<?php echo base_url(); ?>pegawai/seluruh_pegawai"><strong>Daftar Seluruh Pegawai</strong></a></li>
                        <li><a href="<?php echo base_url(); ?>pegawai/seluruh_pegawai"><strong>Cetak DUK</strong></a></li>
                        <li><a href="<?php echo base_url(); ?>pegawai/seluruh_pegawai"><strong>Cetak DSP</strong></a></li>
                     </ul>
                </li>
                
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="head-icon head-bar"></span>
                    <span class="headmenu-label">Grafik</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Grafik Jumlah Pegawai</li>
                        <li><a href="<?php echo base_url();?>grafik/semua_bagian"><strong>Bagian</strong></a></li>
                        <li><a href="<?php echo base_url();?>grafik/bagian/divisi_marketing"><strong>Jabatan</strong></a></li>
                        <li><a href="<?php echo base_url();?>grafik/bagian/divisi_hrd"><strong>Golongan</strong></a></li>
                        <li><a href="<?php echo base_url();?>grafik/bagian/divisi_finansial"><strong>Pendidikan</strong></a></li>
                        <li><a href="<?php echo base_url();?>grafik/bagian/divisi_operasional"><strong>Jenjang Umur</strong></a></li>
                        <li><a href="<?php echo base_url();?>grafik/bagian/divisi_it"><strong>Status Kepegawaian</strong></a></li>
                    </ul>
                </li>
                
               <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="head-icon head-archive"></span>
                    <span class="headmenu-label">Peringatan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Peringatan</li>
                        <li><a href="<?php echo base_url();?>pegawai"><strong>Persetujuan</strong></a></li>
                        <li><a href="<?php echo base_url();?>pegawai"><strong>Kenaikan Pangkat</strong></a></li>
                        <li><a href="<?php echo base_url();?>pegawai"><strong>Kenaikan Gaji Berkala</strong></a></li>
                        <li><a href="<?php echo base_url();?>pegawai"><strong>Pegawai Pensiun</strong></a></li>
                    </ul>
                </li>
			
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?php echo base_url();?>assets/shamcey/images/photos/foto_profil.png" alt="" />
                        <div class="userinfo">
                            <h5>Manager</h5>
                            <h5><small>admin@ppsdmk.com</small></h5>
                            <ul>
                                <li><a href="<?php echo base_url();?>login/logout">Ubah Data Pribadi</a></li>
                                <li><a href="<?php echo base_url();?>pegawai/pengaturan_akun">Pengaturan Akun</a></li>
                                <li><a href="<?php echo base_url();?>login/logout">Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>

    
    <div class="maincontent">
        <div class="maincontentinner">
                
