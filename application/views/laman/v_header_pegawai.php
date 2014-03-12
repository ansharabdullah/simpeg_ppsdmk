<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SIMPEG PPSDMK</title>
            
        <!--icon-->
        <link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/shamcey/images/logi1.png">
            
        <link rel="stylesheet" href="<?php echo base_url();?>assets/shamcey/css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/shamcey/css/style.default_.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/shamcey/css/responsive-tables.css">
            
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/responsive-tables.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/bootstrap-fileupload.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.autogrow-textarea.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/charCount.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/ui.spinner.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/modernizr.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/forms.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/prettify/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.jgrowl.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/jquery.alerts.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/shamcey/js/elements.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-ui-1.10.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/fullcalendar.min.js"></script>
    </head>
        
    <body>
        
        <div>
            <div class="mainwrapper">
                
                <div class="header">
                    <div class="logo" style="margin-top:-10px;">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/shamcey/images/logo_ppsdmk.png" alt="" width="85%" /></a>
                    </div>
                     <?php
                                foreach ($query as $q) {
                                    ?>
                    <div class="headerinner">
                        <ul class="headmenu">
                            
                            
                            <li>
                                <a href="<?php echo base_url(); ?>pegawai/info_pegawai/<?php echo $q->NIP; ?>">
                                    <span class="head-icon head-users"></span>
                                    <span class="headmenu-label">Biodata</span>
                                </a>
                            </li>
                            
                            
                            <li>
                                <a herf="">
                                    <span class="head-icon head-archive"></span>
                                    <span class="headmenu-label">Peringatan</span>
                                </a>
                            </li>
                            <li class="right">
                                    <div class="userloggedinfo">
                                        
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
                        
                        