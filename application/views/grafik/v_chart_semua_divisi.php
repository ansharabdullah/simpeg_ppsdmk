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
                text: 'Seluruh Bagian'
            },
            xAxis: {
                categories: [<?php echo '"' . implode('","', $nama_bagian) . '"'; ?>]
            },
            yAxis: {
                max: 30,
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
                                nama = nama.toLowerCase();
                                location.href = '<?php echo base_url(); ?>grafik/perbagian/' + nama;
                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Jumlah Pegawai ',
                    data: [<?php echo implode(', ', $jumlah_pegawai); ?>]
                }]
        });
    });
</script>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-signal"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Statistik Jumlah Pegawai Seluruh Bagian PPSDMK</h1>
    </div>
</div>
<h4 class="widgettitle"><span class="icon-signal icon-white"></span>Statistik Jumlah Pegawai Seluruh Bagian PPSDMK</h4>
<div class="widgetcontent">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>