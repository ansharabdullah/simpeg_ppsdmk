<script type="text/javascript">
    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'JUMLAH PEGAWAI'
            },
            subtitle: {
                text: '<?php echo $subtitle?>'
            },
            xAxis: {
                categories: [<?php echo '"' . implode('","', $x) . '"'; ?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:f}<br></b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var nama = this.category;
                                nama = nama.replace(" ", "_");
                                nama = nama.replace(" ", "_");
                                nama = nama.replace(" ", "_");
                                nama = nama.toLowerCase();
                                location.href = '<?php echo base_url(),"",$alamat; ?>/' + nama;
                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Jumlah Pegawai ',
                    data: [<?php echo implode(', ', $y); ?>]
                }]
        });
    });
</script>
  <script type="text/javascript">
            jQuery(document).ready(function(){
                
                //content slider
                jQuery('#slidercontent').bxSlider({
                    prevText: '',
                    nextText: '',
                    
                });
                
                //slim scroll
                jQuery('#scroll1').slimscroll({
                    color: '#666',
                    size: '10px',
                    width: 'auto',
                    height: '350px' 
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
            <div id="dashboard-right">     
                <ul id="slidercontent">
                    <li>
                        <div class="slide_wrap">
                            <div class="slide_content">
                                <center><img src="<?php echo base_url(); ?>/assets/images/1.jpg" alt="" style="margin-left: -110px"/></center>
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
            <br/>
            
                
            
            
            
            
            
            <br/> 
            <div id="dashboard-right" class="span6">
                
                <h4 class="widgettitle"><span class="icon-signal icon-white"></span>GRAFIK SEMUA BAGIAN PPSDMK</h4>
                <div class="widgetcontent">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div><!--span8-->
                
            <div id="dashboard-right" class="span5">
                
                <div class="alert alert-block">
                    <button data-dismiss="alert" class="close" type="button">&times;</button>
                    <h4>Selamat Datang di Halaman Manager!</h4>
                    <p style="margin: 8px 0">PUSAT PENGEMBANGAN SUMBERDAYA MANUSIA KEMETROLOGIAN<br>Jl. Jalan Daeng Mohammad Ardiwinata (Cihanjuang) KM 3,4 Parongpong, Bandung</p>
                </div><!--alert-->
                    
                <h4 class="widgettitle">Kalender</h4>
                <div class="widgetcontent nopadding">
                    <div id="datepicker"></div>
                </div>
            </div>  
        </div>  
    </div><!--maincontentinner-->
</div><!--maincontent-->