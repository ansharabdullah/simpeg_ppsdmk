<script type="text/javascript">
    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            xAxis: {
                categories: [<?php echo '"' . implode('", "', $nama_pegawai) . '"'; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                max: 100,
                min: 0,
                title: {
                    text: 'Jumlah Pegawai',
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' '
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
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
                                nama = nama.replace(" ", "_");
                                nama = nama.replace(" ", "_");
                                nama = nama.replace(" ", "_");
                                //nama = nama.toLowerCase(); 
                                window.location.href = '<?php echo base_url(); ?>pegawai/biodata/' + nama ;
                            }
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Jumlah Pegawai',
                    data: [<?php echo implode(', ', $rerata); ?>]
                }]
        });



//pie chart
        $('#containerpie').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Rasio Kinerja <?php echo $title; ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Jumlah',
                    data: [
                        ['Baik', <?php echo $jumlah_baik; ?>],
                        {
                            name: 'Di bawah rata-rata',
                            color: 'indianred',
                            y: <?php echo $jumlah_jahat; ?>,
                            sliced: true,
                            selected: true
                        }
                    ]
                }]
        });


    });


</script>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-tasks"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Statistik <?php echo $title; ?></h1>
    </div>
</div>
    <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>Jumlah Pegawai <?php echo $title; ?></h4>
    <div class="widgetcontent">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
<!--
<div id="dashboard-right" class="span4" style="width:38%; margin-left:28px;">
    <h4 class="widgettitle"><span class="icon-adjust icon-white"></span>Rasio Kinerja <?php echo $title; ?></h4>
    <div class="widgetcontent">
        <div id="containerpie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div> -->