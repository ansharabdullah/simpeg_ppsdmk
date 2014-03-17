<?php

 foreach ($query as $q) {
        echo"<html
            xmlns:o='urn:schemas-microsoft-com:office:office'
            xmlns:w='urn:schemas-microsoft-com:office:word'
            xmlns='http://www.w3.org/TR/REC-html40'>
            <head>
                <title>DATA PEGAWAI $q->nip</title>
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
                        size:29.7cm 21cm ;
                        margin: 2cm 2cm 2cm 2cm;
                        mso-page-orientation: landscape;
                        mso-footer:f1;
                    }
                    table{
                        border-collapse:collapse;
                        width:100%;
                    }
                    table, th, td{
                        border: 1px solid black;
                    }
                    .img{
                        width:160px;
                        height:145px;
                    }
                    #pegawai{
                        width:100%;
                        border-collapse:collapse;
                    }
                    #pegawai td, #pegawai th {
                        font-size:1em;
                        border:1px solid #000000;
                        padding:3px 7px 2px 7px;
                    }
                    #pegawai th {
                        font-size:1.1em;
                        text-align:left;
                        padding-top:5px;
                        padding-bottom:4px;
                        background-color:#BFBFBF;
                        color:#000000;
                        text-align:center;
                    }
                    #pegawai tr.alt td {
                        color:#000000;
                        background-color:#EAF2D3;
                    }
                    
                    div.Section1 { page:Section1;}
                </style>
            </head>
            <body>
                <div id='pegawai'>
                <div class='Section1'>
                    <center><h2>BIODATA & RIWAYAT PEGAWAI <br></h2></center><br />
                    <table>
                        <tr>
                            <td colspan = '3'><b><center>DATA UTAMA</center></b></td>
                        </tr>";
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DATA PEGAWAI $q->nip.doc");
        
            //$gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->gelar_depan . ". " . $q->nama_pegawai . "," . $q->gelar_belakang;
            $alamat = $q->alamat." KELURAHAN ".$q->kelurahan." KECAMATAN ".$q->kecamatan." KABUPATEN ".$q->kabupaten." PROVINSI ".$q->provinsi;
            $foto = base_url()."assets/images/".$q->foto;
            echo "<tr>
                            <td>NIP/NIP Lama</td>
                            <td>$q->nip/$q->nip_lama</td>
                            <td rowspan='13'><img src='".$foto."' class='img'/></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>$nama</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>$q->tempat_lahir, $q->tgl_lahir</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>$q->jenis_kelamin</td>
                        </tr>
                        <tr>
                            <td>TMT CPNS</td>
                            <td>$q->tmt_cpns</td>
                        </tr>
                        <tr>
                            <td>TMT PNS</td>
                            <td>$q->tmt_pns</td>
                        </tr>
                        <tr>
                            <td>Pangkat/Gol.Ruang/TMT</td>
                            <td>$q->nama_pangkat/$q->golongan/$q->tmt_golongan </td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>$q->jabatan</td>
                        </tr>
                        
                        <tr>
                            <td>Agama</td>
                            <td>$q->agama</td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td>$q->status_perkawinan</td>
                        </tr>
                        <tr>
                            <td>Alamat Rumah</td>
                            <td>$alamat</td>
                        </tr>
                        <tr>
                            <td>STATUS</td>
                            <td>$q->status_pegawai</td>
                        </tr>
                        <tr>
                            <td>KETERANGAN</td>
                            <td>$q->keterangan</td>
                        </tr>
                     </table>
                    <br clear=all style='mso-special-character:line-break;' />
                <table border=1>
                        <tr>
                            <td colspan = '2'><b><center>DATA TAMBAHAN</center></b></td>
                        </tr>
                        <tr>
                            <td>TANGGAL KARTU PEGAWAI/NO_KARTU_PEGAWAI</td>
                            <td><$q->tgl_kartu_pegawai/$q->no_kartu_pegawai</td>
                        </tr>
                        <tr>
                            <td>NO KTP</td>
                            <td>$q->no_ktp</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>$q->no_npwp</td>
                        </tr>
                        <tr>
                            <td>NO ASKES/TANGGAL ASKES/KODE WILAYAH ASKES</td>
                            <td>$q->no_askes/$q->tgl_askes/$q->kode_wilayah_askes</td>
                        </tr>
                        <tr>
                            <td>NO HANDPHONE</td>
                            <td>$q->no_handphone</td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td>$q->email</td>
                        </tr>
                        <tr>
                            <td>GOLONGAN DARAH</td>
                            <td>$q->gol_darah</td>
                        </tr>
                        
                        <tr>
                            <td>RAMBUT</td>
                            <td>$q->rambut</td>
                        </tr>
                        <tr>
                            <td>BENTUK MUKA</td>
                            <td>$q->bentuk_muka</td>
                        </tr>
                        <tr>
                            <td>WARNA KULIT</td>
                            <td>$q->warna_kulit</td>
                        </tr>
                        <tr>
                            <td>TINGGI BADAN/BERAT BADAN</td>
                            <td>$q->tinggi_badan/$q->berat_badan</td>
                        </tr>
                        <tr>
                            <td>CIRI KHAS</td>
                            <td>$q->ciri_khas</td>
                        </tr>
                        <tr>
                            <td>CACAT TUBUH</td>
                            <td>$q->cacat_tubuh</td>
                        </tr>
                        <tr>
                            <td>BAHASA ASING</td>
                            <td>$q->bahasa_asing</td>
                        </tr>
                        <tr>
                            <td>HOBI</td>
                            <td>$q->hobi</td>
                        </tr>
                    </table>
                    <br clear=all style='mso-special-character:line-break;' />
            ";
        }
         
        echo"
               <center><h3>RIWAYAT JABATAN</h3></center>
               <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>TMT</th>
                    </tr>
                </thead>";
        $NO=1;
        foreach ($query2 as $row) {
                $STATUS_JABATAN = $row->STATUS_JABATAN;
                $NAMA_JABATAN = $row->JABATAN;
                $NAMA_UNIT_KERJA = $row->NAMA_UNIT;
                $NO_SK_JABATAN = $row->NO_SK_JABATAN;
                $TGL_SK_JABATAN = $row->TGL_SK_JABATAN;
                $TMT_JABATAN = $row->TMT_JABATAN;
        echo"
                <tbody>
                    <tr>
                        <td>$NO</td>
                        <td> ";
                        if($STATUS_JABATAN==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_JABATAN==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
              echo "
                        <td>$NAMA_JABATAN</td>
                        <td>$NAMA_UNIT_KERJA</td>
                        <td>$NO_SK_JABATAN</td>
                        <td>$TGL_SK_JABATAN</td>
                        <td>$TMT_JABATAN</td>
                    </tr>";
        $NO++;}
              echo"
                </tbody>
                </table>
                 <br clear=all style='mso-special-character:line-break;' />
                ";
                
               
        
        
        
         echo"
             <center><h3>RIWAYAT KEPANGKATAN</h3></center>
            <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Pangkat/Golongan</th>
                        <th>Jenis Kenaikan</th>
                        <th>TMT Golongan</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Masa Kerja Bulan</th>
                        <th>Gaji</th>
                        <th>Peraturan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
              $NO_KP=1;
        foreach ($query3 as $row) {
                $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
                $PANGKAT = $row->NAMA_PANGKAT;
                $GOLONGAN_KEPANGKATAN = $row->GOLONGAN;
                $JENIS_KENAIKAN = $row->JENIS_KENAIKAN;
                $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
                $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
                $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
                $GAJI = $row->BESAR_GAJI;
                $PERATURAN =$row->PERATURAN;
                $MASA_KERJA_GOLONGAN=$row->MASA_KERJA_GOLONGAN;
                $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;  
         echo"
                 <tbody>
                    <tr>
                        <td>$NO_KP</td>
                        <td>
                        ";
                        if($STATUS_KEPANGKATAN==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_KEPANGKATAN==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td>$PANGKAT/$GOLONGAN_KEPANGKATAN</td>
                <td>$JENIS_KENAIKAN</td>
                <td>$TMT_GOLONGAN_KEPANGKATAN</td>
                <td>$NO_SK_KEPANGKATAN</td>
                <td>$TGL_SK_KEPANGKATAN</td>
                <td>$MASA_KERJA_GOLONGAN BULAN</td>
                <td>$GAJI</td>
                <td>$PERATURAN</td>
                <td>$KETERANGAN_KEPANGKATAN</td>
                </tr>";
        $NO_KP++;}
              echo"
                </tbody>
                </table>
                 <br clear=all style='mso-special-character:line-break;' />
                ";
                
        
        
       
         echo"
           <center><h3>RIWAYAT PENDIDIKAN</h3></center>
            <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aktif</th>
                        <th>Tingkat</th>
                        <th>Nama Sekolah</th>
                        <th>Lokasi</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>IPK</th>
                    </tr>
                </thead>";
          $NO_PEND=1;
        foreach ($query4 as $row) {
                $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
                $TINGKAT_PENDIDIKAN = $row->TINGKAT_PENDIDIKAN;
                $NAMA_SEKOLAH= $row->NAMA_SEKOLAH;
                $LOKASI = $row->LOKASI;
                $FAKULTAS = $row->FAKULTAS;
                $JURUSAN = $row->JURUSAN;
                $NO_IJAZAH = $row->NO_IJAZAH;
                $TGL_IJAZAH =$row->TGL_IJAZAH;
                $IPK =$row->IPK;
         echo"
                <tbody> 
                    <tr>
                        <td>$NO_PEND</td>
                        <td>
                        ";
                        if($STATUS_PENDIDIKAN==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_PENDIDIKAN==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td>$TINGKAT_PENDIDIKAN</td>
                <td>$NAMA_SEKOLAH</td>
                <td>$LOKASI</td>
                <td>$FAKULTAS</td>
                <td>$JURUSAN</td>
                <td>$NO_IJAZAH</td>
                <td>$TGL_IJAZAH</td>
                <td>$IPK</td>
                </tr>";
        $NO_PEND++;}
         echo"       
                </tbody>
         </table>
                 <br clear=all style='mso-special-character:line-break;' />
       ";
               
        
                
        echo " 
                <center><h3>RIWAYAT DIKLAT STRUKTURAL</h3></center>
                <table border='1'>
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
                    </tr>
                </thead>
                <tbody>";
        $NO_DS=1;
        foreach ($query5 as $row) {
                $STATUS_DIKLAT = $row->STATUS_DIKLAT;
                $NAMA_DIKLAT = $row->NAMA_DIKLAT;
                $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
                $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
                $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
                $LAMA_DIKLAT= $row->LAMA_DIKLAT;
                $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
                $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
                $ANGKATAN_DIKLAT= $row->ANGKATAN_DIKLAT;
                $RANGKING_DIKLAT= $row->RANGKING_DIKLAT;   
        echo"
                 
                    <tr>
                        <td>$NO_DS</td>
                         <td>
                        ";
                        if($STATUS_DIKLAT==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_DIKLAT==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td>$NAMA_DIKLAT</td>
                <td>$INSTANSI_DIKLAT</td>
                <td>$NO_IJAZAH_DIKLAT</td>
                <td>$TGL_IJAZAH_DIKLAT</td>
                <td>$LAMA_DIKLAT</td>
                <td>$TANGGAL_MULAI_DIKLAT</td>
                <td>$TANGGAL_SELESAI_DIKLAT</td>
                <td>$ANGKATAN_DIKLAT</td>
                <td>$RANGKING_DIKLAT</td>
                 </tr>";
        $NO_DS++;} echo" 
                </tbody>
          </table>
                 <br clear=all style='mso-special-character:line-break;' />
       ";
                  
        
        
        $NO_DF=1;
        
        echo "
            <center><h3>RIWAYAT DIKLAT FUNGSIONAL</h3></center>
            <table border='1'>
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
                    </tr>
                </thead>
             <tbody>";
        foreach ($query6 as $row) {
            $STATUS_DIKLAT = $row->STATUS_DIKLAT;
            $NAMA_DIKLAT = $row->NAMA_DIKLAT;
            $JUDUL_DIKLAT = $row->JUDUL_DIKLAT;
            $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
            $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
            $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
            $LAMA_DIKLAT= $row->LAMA_DIKLAT;
            $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
            $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;
            $ANGKATAN_DIKLAT= $row->ANGKATAN_DIKLAT;
        echo "
                    <tr>
                        <td>$NO_DF</td>
                       <td>
                        ";
                        if($STATUS_DIKLAT==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_DIKLAT==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td>$NAMA_DIKLAT</td>
                <td>$JUDUL_DIKLAT</td>
                <td>$INSTANSI_DIKLAT</td>
                <td>$NO_IJAZAH_DIKLAT</td>
                <td>$TGL_IJAZAH_DIKLAT</td>
                <td>$LAMA_DIKLAT</td>
                <td>$TANGGAL_MULAI_DIKLAT</td>
                <td>$TANGGAL_SELESAI_DIKLAT</td>
                <td>$ANGKATAN_DIKLAT</td>
        </tr> "; $NO_DF++;}
           echo "
                </tbody>    
           </table>
                 <br clear=all style='mso-special-character:line-break;' />
       ";
                    
        
        
         
         echo"
                <center><h3>RIWAYAT DIKLAT TEKNIS</h3></center>
                <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Diklat</th>
                        <th>Instansi</th>
                        <th>No Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Lama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>";
              $NO_DT=1;
         foreach ($query7 as $row) {
                $JUDUL_DIKLAT = $row->JUDUL_DIKLAT;
                $INSTANSI_DIKLAT= $row->INSTANSI_DIKLAT;
                $NO_IJAZAH_DIKLAT= $row->NO_IJAZAH_DIKLAT;
                $TGL_IJAZAH_DIKLAT=$row->TGL_IJAZAH_DIKLAT;
                $LAMA_DIKLAT= $row->LAMA_DIKLAT;
                $TANGGAL_MULAI_DIKLAT= $row->TGL_MULAI_DIKLAT;
                $TANGGAL_SELESAI_DIKLAT= $row->TGL_SELESAI_DIKLAT;  
         echo"
                
                    <tr>
                        <td>$NO_DT</td>
                        <td>$JUDUL_DIKLAT</td>
                        <td>$INSTANSI_DIKLAT</td>
                        <td>$NO_IJAZAH_DIKLAT</td>
                        <td>$TGL_IJAZAH_DIKLAT</td>
                        <td>$LAMA_DIKLAT</td>
                        <td>$TANGGAL_MULAI_DIKLAT</td>
                        <td>$TANGGAL_SELESAI_DIKLAT</td>
                    </tr>";
         $NO_DT++;}
              echo"    
              </tbody>
               </table>
                 <br clear=all style='mso-special-character:line-break;' />
       ";                
         
         
         echo"
             <center><h3>RIWAYAT TOEFL</h3></center>
            <table border='1'>
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
                    </tr>
                </thead>
                <tbody>";
         
         $NO_TOEFL=1;
         foreach ($query8 as $row) {
                $STATUS_PENDIDIKAN = $row->STATUS_PENDIDIKAN_TERAKHIR;
                $JENIS_PENDIDIKAN= $row->JENIS_PENDIDIKAN;
                $TAHUN_PENDIDIKAN = $row->TAHUN_PENDIDIKAN;
                $INSTANSI_PENDIDIKAN = $row->INSTANSI;
                $NO_IJAZAH = $row->NO_IJAZAH;
                $TGL_IJAZAH =$row->TGL_IJAZAH;
                $IPK =$row->IPK;
          
          echo "<tr>
                        <td>$NO_TOEFL</td>
                        <td>
                        ";
                        if($STATUS_PENDIDIKAN==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_PENDIDIKAN==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td>$JENIS_PENDIDIKAN</td>
                <td>$TAHUN_PENDIDIKAN</td>
                <td>$INSTANSI_PENDIDIKAN</td>
                <td>$NO_IJAZAH</td>
                <td>$TGL_IJAZAH</td>
                <td>$IPK</td>
               
         </tr> "; $NO_PEND++;} echo"
                </tbody> 
            </table>
             <br clear=all style='mso-special-character:line-break;' />";
                
         
         
         echo"
             <center><h3>RIWAYAT PENUGASAN</h3></center>
             <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Penugasan</th>
                        <th>Lokasi Penugasan</th>
                        <th>No SK</th>
                        <th>Tanggal SK</th>
                        <th>Tujuan</th>
                        <th>Biaya</th>
                        <th>Lama</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>";
         $NO_TUGAS=1;
         foreach ($query9 as $row) {
                $JENIS_PENUGASAN =$row->JENIS_PENUGASAN;
                $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
                $NO_SK_PENUGASAN= $row->NO_SK_PENUGASAN;
                $TGL_SK_PENUGASAN = $row->TGL_SK_PENUGASAN;
                $TUJUAN_PENUGASAN = $row->TUJUAN_PENUGASAN;
                $BIAYA_PENUGASAN = $row->BIAYA_PENUGASAN;
                $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
                $TAHUN_PENUGASAN =$row->TAHUN_PENUGASAN;
                $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
         
                echo"
                    <tr>
                        <td>$NO_TUGAS</td>
                        <td>$JENIS_PENUGASAN</td>
                        <td>$LOKASI_PENUGASAN</td>
                        <td>$NO_SK_PENUGASAN</td>
                        <td>$TGL_SK_PENUGASAN</td>
                        <td>$TUJUAN_PENUGASAN</td>
                        <td>$BIAYA_PENUGASAN</td>
                        <td>$LAMA_PENUGASAN</td>
                        <td>$TAHUN_PENUGASAN</td>
                        <td>$KETERANGAN_PENUGASAN</td>
         </tr>";$NO_TUGAS++;}
                echo"
                </tbody>
                </table>
                 <br clear=all style='mso-special-character:line-break;' />
                ";  
         
         
         echo"
            <center><h3>RIWAYAT SEMINAR</h3></center> 
            <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
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
                    </tr>
                </thead><tbody>";
         $NO_SEMINAR=1;
         foreach ($query10 as $row) {
                $NAMA_PENUGASAN =$row->NAMA_PENUGASAN;
                $PERANAN =$row->PERANAN;
                $INSTANSI_PENUGASAN= $row->INSTANSI_PENUGASAN;
                $LOKASI_PENUGASAN = $row->LOKASI_PENUGASAN;
                $NO_IJAZAH_PENUGASAN= $row->NO_IJAZAH_PENUGASAN;
                $TGL_IJAZAH_PENUGASAN = $row->TGL_IJAZAH_PENUGASAN;
                $LAMA_PENUGASAN = $row->LAMA_PENUGASAN;
                $TGL_MULAI_PENUGASAN =$row->TGL_MULAI_PENUGASAN;
                $TGL_SELESAI_PENUGASAN =$row->TGL_SELESAI_PENUGASAN;
                $KETERANGAN_PENUGASAN =$row->KETERANGAN_PENUGASAN;
         echo"
                    <tr>
                        <td>$NO_SEMINAR</td>
                        <td>$NAMA_PENUGASAN</td>
                        <td>$PERANAN</td>
                        <td>$INSTANSI_PENUGASAN</td>
                        <td>$LOKASI_PENUGASAN</td>
                        <td>$NO_IJAZAH_PENUGASAN</td>
                        <td>$TGL_IJAZAH_PENUGASAN</td>
                        <td>$LAMA_PENUGASAN</td>
                        <td>$TGL_MULAI_PENUGASAN</td>
                        <td>$TGL_SELESAI_PENUGASAN</td>
                        <td>$KETERANGAN_PENUGASAN</td> 
                    </tr>";
         $NO_SEMINAR++;}
                echo"
                </tbody>
            </table>
             <br clear=all style='mso-special-character:line-break;' />";
         
         
         echo "<center><h3>RIWAYAT ORGANISASI</h3></center> 
             <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Masa Organisasi</th>
                        <th>Nama Organisasi</th>
                        <th>Jabatan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
         $NO_ORG=1;
         foreach ($query11 as $row) {
            $JENIS_ORGANISASI =$row->JENIS_ORGANISASI;
            $NAMA_ORGANISASI =$row->NAMA_ORGANISASI;
            $JABATAN_ORGANISASI= $row->JABATAN_ORGANISASI;
            $TAHUN_ORGANISASI = $row->TAHUN_ORGANISASI;
            $KETERANGAN_ORGANISASI= $row->KETERANGAN_ORGANISASI;
         
            echo "<tbody>
                    <tr>
                        <td>$NO_ORG</td>
                        <td>$JENIS_ORGANISASI</td>
                        <td>$NAMA_ORGANISASI</td>
                        <td>$JABATAN_ORGANISASI</td>
                        <td>$TAHUN_ORGANISASI</td>
                        <td>$KETERANGAN_ORGANISASI</td>
         </tr>"; $NO_ORG++;}
                    echo "
                </tbody>
            </table>        
            <br clear=all style='mso-special-character:line-break;' />";        

         echo "<center><h3>RIWAYAT ALAMAT</h3></center>
             <table border='1'>
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
                        <th>Tahun Aktif</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
                $NO_ALAMAT=1;
                        
                foreach ($query12 as $row) {
                    $STATUS_ALAMAT =$row->STATUS_ALAMAT;
                    $ALAMAT =$row->ALAMAT;
                    $PROVINSI= $row->PROVINSI;
                    $KABUPATEN = $row->KABUPATEN;
                    $KELURAHAN= $row->KELURAHAN;
                    $KECAMATAN= $row->KECAMATAN;
                    $KODE_POS= $row->KODE_POS;
                    $TELEPON= $row->TELEPON;
                    $FAX= $row->FAX;
                    $TAHUN= $row->TAHUN_AKTIF;
                    $KETERANGAN_ALAMAT= $row->KETERANGAN_ALAMAT;
                echo "
                    <tbody>
                    <tr>
                        <td> $NO_ALAMAT</td>
                        <td>
                        ";
                        if($STATUS_ALAMAT==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_ALAMAT==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                        <td>$ALAMAT</td>
                        <td>$PROVINSI</td>
                        <td>$KABUPATEN</td>
                        <td>$KELURAHAN</td>
                        <td>$KECAMATAN</td>
                        <td>$KODE_POS</td>
                        <td>$TELEPON</td>
                        <td>$FAX</td>
                        <td>$TAHUN</td>
                        <td>$KETERANGAN_ALAMAT</td>
                </tr>";$NO_ALAMAT++;}echo"
                
                </tbody>
            </table>
             <br clear=all style='mso-special-character:line-break;' />";
          
          echo "
              <center><h3>RIWAYAT PASANGAN</h3></center>
            <table border='1'>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Nikah</th>
                        <th>Nomor Kariskarsu</th>
                        <th>Tanggal Kariskarsu</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
          $NO_PASANGAN=1;
           foreach ($query13 as $row) {
                    $STATUS_PASANGAN = $row->STATUS_PASANGAN;
                    $NAMA_PASANGAN= $row->NAMA_PASANGAN;
                    $TGL_LAHIR_PASANGAN= $row->TGL_LAHIR_PASANGAN;
                    $TEMPAT_LAHIR_PASANGAN= $row->TEMPAT_LAHIR_PASANGAN;
                    $TGL_NIKAH= $row->TGL_NIKAH;
                    $NO_KARISKARSU= $row->NO_KARISKARSU;
                    $TGL_KARISKARSU= $row->TGL_KARISKARSU;
                    $PEKERJAAN_PASANGAN= $row->PEKERJAAN_PASANGAN;
                    $KETERANGAN_PASANGAN= $row->KETERANGAN_PASANGAN;
                   
                    echo "<tbody>
                    <tr>
                        <td>$NO_PASANGAN</td>
                        <td>$STATUS_PASANGAN</td>
                        <td>$NAMA_PASANGAN</td>
                        <td>$TGL_LAHIR_PASANGAN</td>
                        <td> $TEMPAT_LAHIR_PASANGAN</td>
                        <td>$TGL_NIKAH</td>
                        <td>$NO_KARISKARSU</td>
                        <td>$TGL_KARISKARSU</td>
                        <td>$PEKERJAAN_PASANGAN</td>
                        <td>$KETERANGAN_PASANGAN</td>
           </tr>";$NO_PASANGAN++;}
           echo"
                </tbody>
                
            </table>
            <br clear=all style='mso-special-character:line-break;' />";
           
           
           echo "<center><h3>RIWAYAT ANAK</h3></center>
           <table border='1'>
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
                    </tr>
                </thead>";
           $NO_AK=1;
           foreach ($query14 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $JENIS_KELAMIN_AK= $row->JENIS_KELAMIN_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->STATUS_AK;
           
                    echo "<tbody>
                    <tr>
                        <td>$NO_AK</td>
                        <td>$STATUS_AK</td>
                        <td>$NAMA_AK</td>
                        <td> $TGL_LAHIR_AK</td>
                        <td>$TEMPAT_LAHIR_AK</td>
                        <td>$JENIS_KELAMIN_AK</td>
                        <td>$PEKERJAAN_AK</td>
                        <td> $KETERANGAN_AK</td>
           </tr>";$NO_AK++;}
                    echo "
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
           
           
           echo "<center><h3>RIWAYAT SAUDARA</h3></center> 
               <table border='1'>
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
                    </tr>
                </thead>";
           $NO_AK_S=1;
           foreach ($query15 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $JENIS_KELAMIN_AK= $row->JENIS_KELAMIN_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->STATUS_AK;
           echo "
                <tbody>
                    <tr>
                        <td>$NO_AK_S</td>
                        <td>$STATUS_AK</td>
                        <td>$NAMA_AK</td>
                        <td>$TGL_LAHIR_AK</td>
                        <td>$TEMPAT_LAHIR_AK</td>
                        <td>$JENIS_KELAMIN_AK</td>
                        <td>$PEKERJAAN_AK</td>
                        <td>$KETERANGAN_AK</td>
           </tr>";$NO_AK_S++; }echo "
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
           
                      
           
           echo "<center><h3>RIWAYAT ORANG TUA</h3></center> 
               <table border='1'>
               <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
            $NO_AK_O=1;
                    
                foreach ($query16 as $row) {
                    $STATUS_AK = $row->STATUS_AK;
                    $NAMA_AK= $row->NAMA_AK;
                    $TGL_LAHIR_AK= $row->TGL_LAHIR_AK;
                    $TEMPAT_LAHIR_AK= $row->TEMPAT_LAHIR_AK;
                    $PEKERJAAN_AK= $row->PEKERJAAN_AK;
                    $KETERANGAN_AK= $row->STATUS_AK;
                    
                    echo" <tbody>
                    <tr>
                        <td>$NO_AK_S</td>
                        <td>$STATUS_AK</td>
                        <td>$NAMA_AK</td>
                        <td>$TGL_LAHIR_AK</td>
                        <td>$TEMPAT_LAHIR_AK</td>
                        <td>$PEKERJAAN_AK</td>
                        <td>$KETERANGAN_AK</td>
                </tr>";$NO_AK_O++;}echo"
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
                    
                
                
           echo "<center><h3>RIWAYAT GAJI BERKALA</h3></center> 
               <table border='1'>     
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
                    </tr>
                </thead>"; 
           $NO_KGB=1;
                    
            foreach ($query3 as $row) {
                $STATUS_KEPANGKATAN = $row->STATUS_KEPANGKATAN;
                $TMT_GOLONGAN_KEPANGKATAN = $row->TMT_GOLONGAN;
                $NO_SK_KEPANGKATAN = $row->NO_SK_GOLONGAN;
                $TGL_SK_KEPANGKATAN = $row->TGL_SK_GOLONGAN;
                $GAJI = $row->BESAR_GAJI;
                $KETERANGAN_KEPANGKATAN =$row->KETERANGAN_KEPANGKATAN;
                    
                $datetime1 = new DateTime($TMT_GOLONGAN_KEPANGKATAN);
                $datetime2 = new DateTime();
                $interval = $datetime1->diff($datetime2);
                $tahun = $interval->format('%y TAHUN');
                $bulan = $interval->format('%m BULAN');
                echo "
               <tbody>
                    <tr>
                        <td><?php echo $NO_KGB; ?></td>
                         <td>
                        ";
                        if($STATUS_KEPANGKATAN==1){
                            echo"<input type='checkbox' checked='checked' disabled='disabled' /></td>";
                        }else if($STATUS_KEPANGKATAN==0){
                            echo"<input type='checkbox'  disabled='disabled' /></td>";
                        }
                        echo "
                <td> $TMT_GOLONGAN_KEPANGKATAN</td>
                <td>$NO_SK_KEPANGKATAN</td>
                <td>$TGL_SK_KEPANGKATAN</td>
                <td>$tahun</td>
                <td>$bulan</td>
                <td> $GAJI</td>
                <td>$KETERANGAN_KEPANGKATAN</td>
            </tr>";$NO_KGB++;}echo"
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
                
            
            
             echo "<center><h3>RIWAYAT PENGHARGAAN</h3></center> 
               <table border='1'>     
               <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penghargaan</th>
                        <th>Instansi</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                    </tr>
                </thead> ";
             $NO_PENGHARGAAN=1;
             foreach ($query18 as $row) {
                    $NAMA_PENGHARGAAN = $row->NAMA_PENGHARGAAN;
                    $INSTANSI_PENGHARGAAN= $row->INSTANSI_PENGHARGAAN;
                    $NO_SK_PENGHARGAAN= $row->NO_SK_PENGHARGAAN;
                    $TGL_SK_PENGHARGAAN= $row->TGL_SK_PENGHARGAAN;
                    $TAHUN_PENGHARGAAN= $row->TAHUN_PENGHARGAAN;
                    $KETERANGAN_PENGHARGAAN= $row->KETERANGAN_PENGHARGAAN;
             
              echo "<tbody>
                    <tr>
                        <td>$NO_PENGHARGAAN</td>
                        <td>$NAMA_PENGHARGAAN</td>
                        <td>$INSTANSI_PENGHARGAAN</td>
                        <td>$NO_SK_PENGHARGAAN</td>
                        <td>$TGL_SK_PENGHARGAAN</td>
                        <td> $TAHUN_PENGHARGAAN</td>
                        <td>$KETERANGAN_PENGHARGAAN</td>
             </tr>";$NO_PENGHARGAAN++;} echo "
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
                    
             
             
             echo "<center><h3>RIWAYAT MEDIS</h3></center> 
               <table border='1'>     
               <thead>
                    <tr>
                        <th>No.</th>
                        <th>Indikasi</th>
                        <th>Tindakan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>";
             $NO_MEDIS=1;
              foreach ($query17 as $row) {
                    $INDIKASI = $row->INDIKASI;
                    $TINDAKAN= $row->TINDAKAN;
                    $TAHUN_PEMERIKSAAN= $row->TAHUN_PEMERIKSAAN;
                    $KETERANGAN_MEDIS= $row->KETERANGAN_MEDIS;
              
                    echo "
                    <tbody>
                    <tr>
                        <td>$NO_MEDIS</td>
                        <td>$INDIKASI</td>
                        <td>$TINDAKAN</td>
                        <td>$TAHUN_PEMERIKSAAN</td>
                        <td>$KETERANGAN_MEDIS</td>
              </tr>";$NO_MEDIS++;}
                    echo"
                </tbody>
            </table><br clear=all style='mso-special-character:line-break;' />";
                    
              
           
        echo"
                    </div>
                   </div>
                </body>
            </html>";



