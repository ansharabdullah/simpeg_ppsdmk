<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>
<div class="pageheader">
	<div class="pageicon"><span class="iconfa-group"></span></div>
	<div class="pagetitle">
		<h5>.</h5>
		<h1>TABEL <?php echo $link?></h1>
	</div>
</div>          
<h4 class="widgettitle"><span class="icon-list-alt icon-white"></span><?php echo $title;?></h4>
<div class="widgetcontent" style="padding-bottom:50px;">
    <a href="<?php echo base_url();?>pegawai/cetak_<?php echo $link?>" class=" btn btn-success btn-rounded "><i class="iconfa-print icon-white"></i> Cetak</a>
    <table class="table table-bordered table-infinite" id="dyntable2">
	<colgroup>
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
	</colgroup>
	<thead>
    <tr>
        <th class="head0 center">NO</th>
        <th class="head1 center">NAMA / NIP</th>
        <th class="head0 center">PANGKAT / GOLONGAN</th>
        <th class="head1 center">TMT PANGKAT</th>
        <th class="head0 center">JABATAN</th>
        <th class="head1 center">TMT JABATAN</th>
        <th class="head0 center">TGL_LAHIR</th>
        <th class="head1 center">KET.</th>
    </tr>
    </thead>
</thead>
<tbody>
    <?php
    $no = 1;
    foreach ($query as $q) {
        $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
        $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
        echo "<tr>
                    <td>$no</td>
                    <td>$nama /<br>$q->NIP</td>
                    <td>$q->NAMA_PANGKAT / $q->GOLONGAN</td>
                    <td>$q->TMT_GOLONGAN</td>
                    <td>$q->JABATAN</td>
                    <td>$q->TMT_JABATAN</td>
                    <td>$q->TGL_LAHIR</td>
                    <td></td>
                </tr>";
        $no++;
    }?>