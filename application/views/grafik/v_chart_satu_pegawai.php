<script type="text/javascript">
    $(function () {
        
        $('#container1').highcharts({
            
            chart: {
                polar: true,
                type: 'area'
            },
	    
            title: {
                text: '<?php echo $title; ?>',
                x: -80
            },
	    
            pane: {
                size: '80%'
            },
	    
            xAxis: {
                categories: [<?php echo '"'.implode('","',$subkriteria).'"'; ?>],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },	
            
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0,
                max: 100
            },
	    
            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
            },
	    
            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 70,
                layout: 'vertical'
            },
	    
            series: [{
                    name: 'Penilaian',
                    data: [<?php echo implode(', ',$nilai); ?>],
                    pointPlacement: 'on'
                }]
            
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            subtitle: {
                text: 'Perkembangan Kinerja'
            },
            xAxis: {
                categories: [<?php echo '"'.implode('", "',$tgl).'"'; ?>]
            },
            yAxis: {
                title: {
                    text: 'Rentang Nilai'
                },
                labels: {
                    formatter: function() {
                        return this.value 
                    }
                },
                max: 100,
                min: 0
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                },
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {									
                                var nama = this.category;
                                //nama = nama.toLowerCase(); 
                                window.location.href = '<?php echo base_url(); ?>admin/pegawai/<?php echo str_replace(" ", "_", $title); ?>/' + nama; 
                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Nilai',
                    marker: {
                        symbol: 'square'
                    },
                    data: [<?php echo implode(', ',$nilai1); ?>]
                    
                }]
        });
    });
    
    
</script>

<div class="pageheader">
    <div class="pageicon"><span class="iconfa-user"></span></div>
    <div class="pagetitle">
        <h5>.</h5>
        <h1>Data Pegawai </h1>
            
    </div>
</div>

<!-- biodata -->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-pencil"></i> &nbsp;Edit Data</a></li>
                </ul>
            </div>
            
            <h4 class="widgettitle"><span class="icon-book icon-white"></span>BIODATA</h4>
        </div>
            
            
            
        <div class="widgetcontent" >
		<?php foreach($biodata as $row){?>
            <br />
                
            <div class="row-fluid">    
                <img src="<?php echo base_url(); ?>assets/shamcey/images/photos/foto_profil.png"  class="pull-right"/></center>
                
                <div class="span9">
                    <table class="table table-bordered table-invoice">
                        <tr>
                            <td class="width30">NIP/NIP Lama</td>
                            <td><?php echo $row->NIP;?> / </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?php echo $row->NAMA_PEGAWAI;?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td><?php echo $row->TEMPAT_LAHIR;?>, <?php echo $row->TANGGAL_LAHIR;?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $row->JENIS_KELAMIN;?></td>
                        </tr>
                        <tr>
                            <td>TMT CPNS/Masa Kerja</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Pangkat/Gol.Ruang/TMT</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td></td>
                        </tr>
                            
                        <tr>
                            <td>Agama</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Alamat Rumah</td>
                            <td><?php echo $row->ALAMAT;?></td>
                        </tr>
                        <tr>
                            <td>No Handphone</td>
                            <td>0<?php echo $row->NO_KONTAK;?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td></td>
                        </tr>
                    </table>
				<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--RIWAYAT JABATAN--->

<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT JABATAN</h4>
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>TMT</th>
                        <th>Pejabat</th>
                        <th>Angka Kredit</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT KEPANGKATAN--->

<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT KEPANGKATAN</h4>
        </div>
            
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Pangkat/Golongan</th>
                        <th>Jenis Kenaikan</th>
                        <th>TMT Golongan</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Masa Kerja Tahun</th>
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Pejabat</th>
                        <th>Peraturan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT PENDIDIKAN--->

<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PENDIDIKAN</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Tingkat</th>
                        <th>Status</th>
                        <th>Nama Sekolah</th>
                        <th>Lokasi</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Pimpinan</th>
                        <th>IPK</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT Diklat Struktural--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT STRUKTURAL</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Instansi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Angkatan</th>
                        <th>Rangking</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT Diklat FUNGSIONAL--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT FUNGSIONAL</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Angkatan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT Diklat TEKNIS--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT DIKLAT TEKNIS</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>Lokasi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT TOEFL--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TOEFL</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Instansi</th>
                        <th>No Sertifikat</th>
                        <th>Tanggal Sertifikat</th>
                        <th>Nilai</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT TUGAS KE LUAR NEGERI--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TUGAS KE LUAR NEGERI</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Negara</th>
                        <th>No SK</th>
                        <th>Tanggal SK</th>
                        <th>Tujuan</th>
                        <th>Biaya</th>
                        <th>Lama</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--RIWAYAT SEMINAR--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SEMINAR</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Seminar</th>
                        <th>Nama Seminar</th>
                        <th>Peranan</th>
                        <th>Instansi</th>
                        <th>Lokasi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--RIWAYAT Organisasi--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORGANISASI</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Masa Organisasi</th>
                        <th>Nama Organisasi</th>
                        <th>Jabatan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Alamat--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ALAMAT</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kode POS</th>
                        <th>TELEPON</th>
                        <th>FAX</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Pasangan--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT PASANGAN</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Nikah</th>
                        <th>Nomor Kariskarsu</th>
                        <th>Tanggal Kariskarsu</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--Riwayat Anak--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ANAK</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Saudara--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT SAUDARA</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Orang Tua--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT ORANG TUA</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Gaji Berkala--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT GAJI BERKALA</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>TMT</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Masa Kerja Tahun</th>
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Tanda Jasa--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT TANDA JASA</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tanda Jasa</th>
                        <th>Instansi</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Riwayat Medis--->
<div id="dashboard-right">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="iconfa-th"></i> &nbsp; Aksi <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="iconfa-plus"></i> &nbsp;Tambah Data</a></li>
                </ul>
                <a class="close">&times;</a> <a class="minimize">&#8211;</a>
            </div>
            
            <h4 class="widgettitle"><span class="icon-tasks icon-white"></span>RIWAYAT MEDIS</h4> 
        </div>
        
        <div class="widgetcontent" >
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Indikasi</th>
                        <th>Tindakan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centeralign"><a href="" class="editprofileform"><span class="icon-pencil"></span></a></td>
                        <td class="centeralign"><a href="" class="deleterow"><span class="icon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>