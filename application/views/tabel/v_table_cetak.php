<html
    xmlns:o='urn:schemas-microsoft-com:office:office'
    xmlns:w='urn:schemas-microsoft-com:office:word'
    xmlns='http://www.w3.org/TR/REC-html40'>
    <head>
        <title>DUP PPSDMK</title>
        <!--[if gte mso 9]-->
        <xml>
            <w:WordDocument>
                <w:View>Print</w:View>
                <w:Zoom>90</w:Zoom>
                <w:DoNotOptimizeForBrowser/>
            </w:WordDocument>
        </xml>
        <!-- [endif]-->
        <style>
            p.MsoFooter, li.MsoFooter, div.MsoFooter{
                margin: 0cm;
                margin-bottom: 0001pt;
                mso-pagination:widow-orphan;
                font-size: 12.0 pt;
                text-align: right;
            }


            @page Section1{
                size: 21cm 29.7cm;
                margin: 2cm 1cm 2cm 1cm;
                mso-page-orientation: potrait;
                mso-footer:f1;
            }
            div.Section1 { page:Section1;}
        </style>
    </head>
    <body>
        <div class='Section1'>
            <h1>DPU</h1>
            <table border="1">
                <tr class="head-archive">
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA PEGAWAI</th>
                    <th>JENIS KELAMIN</th>
                    <th>PENDIDIKAN TERAKHIR</th>
                    <th>UNIT</th>
                    <th>JABATAN</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $row) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->NIP; ?></td>
                            <td><?php echo strtoupper($row->NAMA_PEGAWAI); ?></td>
                            <td><?php echo $row->JENIS_KELAMIN; ?></td>
                            <td><?php echo $row->TINGKAT_PENDIDIKAN; ?></td>
                            <td><?php echo $row->NAMA_UNIT; ?></td>
                            <td><?php echo strtoupper($row->JABATAN); ?></td>
                        </tr>
                        <?php $no++;
                    }
                    ?>		
                </tbody>
            </table>
            <br clear=all style='mso-special-character:line-break;' />
    </body>
</html>
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=DSP.doc");
?>