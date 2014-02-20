<script type="text/javascript">
    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            xAxis: {categories: [<?php echo '"' . implode('", "', $jbtn) . '"'; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
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
                    
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Jabatan',
                    data: [<?php echo implode(', ', $jml); ?>]
                }]
        });
    });


</script>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-tasks"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>GRAFIK <?php echo $title; ?></h1>
        jbtn<?php print_r($jbtn); ?>
        jml<?php print_r($jml); ?>
    </div>
</div>
<h4 class="widgettitle"><span class="icon-tasks icon-white"></span>TABEL JUMLAH PEGAWAI <?php echo $title; ?></h4>
<div class="widgetcontent">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>