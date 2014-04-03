        <script type="text/javascript">
            jQuery(document).ready(function(){
                
                //content slider
                jQuery('#slidercontent').bxSlider({
                    prevText: '',
                    nextText: ''
                });
                
                //slim scroll
                jQuery('#scroll1').slimscroll({
                    color: '#666',
                    size: '10px',
                    width: 'auto',
                    height: '450px'
                });
            });
        </script>
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-home"></span></div>
    <div class="pagetitle">
        <h5></h5>
        <h1>HOME</h1>
    </div>
</div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
        <div class="row-fluid">
            <div id="dashboard-right" class="span5">
                <div class="alert alert-block">
                    <button data-dismiss="alert" class="close" type="button">&times;</button>
                    <h4>Selamat Datang di Halaman Pegawai!</h4>
                    <p style="margin: 8px 0">PUSAT PENGEMBANGAN SUMBERDAYA MANUSIA KEMETROLOGIAN<br>Jl. Jalan Daeng Mohammad Ardiwinata (Cihanjuang) KM 3,4 Parongpong, Bandung</p>
                </div><!--alert-->
                <br />          
                <h4 class="widgettitle">Kalender</h4>
                <div class="widgetcontent nopadding">
                    <div id="datepicker"></div>
                </div>
            </div><!--span8-->
             <br />
            <div id="dashboard-right" class="span7">     
                <ul id="slidercontent">
                    <li>
                        <div class="slide_wrap">
                            <div class="slide_content">
                               <img src="<?php echo base_url(); ?>/assets/images/1.jpg" alt="" style="margin-left: -60px"/>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide_wrap">
                            <div class="slide_content">
                                <img src="" alt="" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>  
        </div><!--maincontentinner-->
    </div><!--maincontent-->
