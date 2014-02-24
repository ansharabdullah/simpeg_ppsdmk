<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'JUMLAH PEGAWAI'
            },
            subtitle: {
                text: '<?php echo $title;?>'
            },
            xAxis: {
                categories: [<?php echo '"' . implode('","', $x) . '"'; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' ORANG'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'LAKI_LAKI',
                data: [<?php echo implode(', ', $y1); ?>]
            }, {
                name: 'PEREMPUAN',
                data: [<?php echo implode(', ', $y2); ?>]
            }]
        });
    });
    

</script>
<div class="pageheader">
    <div class="pageicon"><span class="iconfa-tasks"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>GRAFIK <?php echo $title; ?></h1>
    </div>
</div>
<h4 class="widgettitle"><span class="icon-tasks icon-white"></span>TABEL JUMLAH PEGAWAI <?php echo $title; ?></h4>
<div class="widgetcontent">
    <div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
</div>