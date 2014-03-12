<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PPSDMK</title>
        
        <!--icon-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/shamcey/images/logi1.png">
        
        <!--shamcey-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/shamcey/css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/shamcey/css/responsive-tables.css">
        
        <!-- highcharts -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/highcharts-3.0.7/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/highcharts-3.0.7/js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/highcharts-3.0.7/js/highcharts-more.js"></script>
        <script src="<?php echo base_url(); ?>assets/highcharts-3.0.7/js/modules/exporting.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/modernizr.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/responsive-tables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/flot/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.confirm.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.confirm.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
    </head>
    
    <body>
        
        <div class="mainwrapper">
            
            <div class="header">
                <div class="logo" style="margin-top:-10px;">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/shamcey/images/logo_ppsdmk.png" alt="" width="85%" /></a>
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
                                <li><a href="<?php echo base_url(); ?>pegawai/seluruh_pegawai"><strong>Daftar Seluruh Pegawai (DSP)</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>pegawai/DUK"><strong>Daftar Urut Kepegawaian (DUK)</strong></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                                <span class="head-icon head-bar"></span>
                                <span class="headmenu-label">Grafik</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-header">Grafik Jumlah Pegawai</li>
                                <li><a href="<?php echo base_url(); ?>grafik/semua_bagian"><strong>Bagian</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>grafik/semua_golongan"><strong>Golongan</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>grafik/semua_pendidikan"><strong>Pendidikan</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>grafik/semua_jenjang_umur"><strong>Jenjang Umur</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>grafik/semua_status_pegawai"><strong>Status Kepegawaian</strong></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                                <span class="head-icon head-archive"></span>
                                <span class="headmenu-label">Peringatan</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-header">Peringatan</li>
                                <li><a href="<?php echo base_url(); ?>pegawai/persetujuan"><strong>Persetujuan</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>pegawai/kenaikan_pangkat"><strong>Kenaikan Pangkat</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>pegawai/kenaikan_gaji_berkala"><strong>Kenaikan Gaji Berkala</strong></a></li>
                                <li><a href="<?php echo base_url(); ?>pegawai/pegawai_pensiun"><strong>Pegawai Pensiun</strong></a></li>
                            </ul>
                        </li>
                        
                        <li class="right">
                            <div class="userloggedinfo">
                                <?php
                                foreach ($query as $q) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $q->FOTO; ?>" alt="<?php echo $q->NIP; ?>" />
                                    <div class="userinfo">
                                        <h5><?php echo $q->NAMA_PEGAWAI; ?></h5>
                                        <h5><small><?php echo $q->NIP; ?></small></h5>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>pegawai/biodata/<?php echo $q->NIP; ?>">Ubah Data Pribadi</a></li>
                                            <li><a href="<?php echo base_url(); ?>pegawai/pengaturan_akun/<?php echo $q->NIP; ?>">Pengaturan Akun</a></li>
                                            <li><a href="<?php echo base_url(); ?>login/logout">Keluar</a></li>
                                        </ul>
                                    </div>
<?php } ?>
                            </div>
                        </li>
                    </ul><!--headmenu-->
                </div>
            </div>
            
            
            <div class="maincontent">
                <div class="maincontentinner">
                    
