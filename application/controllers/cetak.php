<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cetak extends CI_Controller {

    public function index() {
        
    }

    public function cetak_pegawai($nip) {
        $query = $this->m_pegawai->get_pegawai($nip);
        $query2 = $this->m_pegawai->get_log_jabatan($nip);
        $query3 = $this->m_pegawai->get_log_kepangkatan($nip);
        $query4 = $this->m_pegawai->get_log_pendidikan($nip);
        $query5 = $this->m_pegawai->get_log_diklat_struktural($nip);
        $query6 = $this->m_pegawai->get_log_diklat_fungsional($nip);
        $query7 = $this->m_pegawai->get_log_diklat_teknis($nip);
        $query8 = $this->m_pegawai->get_log_toefl($nip);
        $query9 = $this->m_pegawai->get_log_penugasan($nip);
        $query10 = $this->m_pegawai->get_log_seminar($nip);
        $query11 = $this->m_pegawai->get_log_organisasi($nip);
        $query12 = $this->m_pegawai->get_log_alamat($nip);
        $query13 = $this->m_pegawai->get_log_pasangan($nip);
        $query14 = $this->m_pegawai->get_log_anak($nip);
        $query15 = $this->m_pegawai->get_log_saudara($nip);
        $query16 = $this->m_pegawai->get_log_orang_tua($nip);
        $query17 = $this->m_pegawai->get_log_medis($nip);
        $query18 = $this->m_pegawai->get_log_penghargaan($nip);
        $query19 = $this->m_pegawai->get_log_cuti($nip);
        $query20 = $this->m_pegawai->get_log_gaji($nip);

        $this->load->view("form/cetak_pegawai", array('query' => $query, 'query2' => $query2, 'query3' => $query3, 'query4' => $query4, 'query5' => $query5, 'query6' => $query6,
            'query7' => $query7, 'query8' => $query8, 'query9' => $query9, 'query10' => $query10, 'query11' => $query11,
            'query12' => $query12, 'query13' => $query13, 'query14' => $query14, 'query15' => $query15, 'query16' => $query16, 'query17' => $query17, 'query18' => $query18,
                'query19' => $query19, 'query20' => $query20));
    }

    public function cetak_DUK_word() {
        $query = $this->m_pegawai->get_duk();
        echo"<html
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
                        font-size: 10.0 pt;
                        text-align: right;
                    }


                    @page Section1{
                        size: 29.7cm 21cm;
                        margin: 2cm 1cm 2cm 1cm;
                        mso-page-orientation: landscape;
                        mso-footer:f1;
                    }
                    div.Section1 { page:Section1;}
                </style>
            </head>
            <body>
                <div class='Section1'>
                    <center><h2>DAFTAR URUT KEPANGKATAN PEGAWAI NEGERI SIPIL<br>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN</h2></center><br />
                    <table border='1'>
                        <th rowspan=2  bgcolor='#CCCCCC'>NO</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>NAMA / NIP</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>PANGKAT / GOLONGAN</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>TMT PANGKAT</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>JABATAN</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>TMT JABATAN</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>MASA KERJA</th>
                            <th colspan=3 bgcolor='#CCCCCC'>PENDIDIKAN</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>TGL_LAHIR</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>USIA</th>
                            <th rowspan=2 bgcolor='#CCCCCC'>KET.</th></tr>
                            <tr><th bgcolor='#CCCCCC'>INSTANSI</th>
                            <th bgcolor='#CCCCCC'>TAHUN LULUS</th>
                            <th bgcolor='#CCCCCC'>TIGKAT IJAZAH</th></tr>
                        </thead>
                        <tbody>";
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DUK PPSDMK.doc");
        $i = 1;
        foreach ($query as $q) {
            $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
            
            $date1 = $q->TMT_CPNS; 
            $date2 = date('Y-m-d'); 
            $diff = abs(strtotime($date2) - strtotime($date1)); 
            $years_masakerja = floor($diff / (365*60*60*24)); 
            $months_masakerja = floor(($diff - $years_masakerja * 365*60*60*24) / (30*60*60*24)); 
            $days_masakerja = floor(($diff - $years_masakerja * 365*60*60*24 - $months_masakerja*30*60*60*24)/ (60*60*24));
            
            $date1 = $q->TGL_LAHIR; 
            $date2 = date('Y-m-d'); 
            $diff = abs(strtotime($date2) - strtotime($date1)); 
            $years_usia = floor($diff / (365*60*60*24)); 
            $months_usia = floor(($diff - $years_usia * 365*60*60*24) / (30*60*60*24)); 
            $days_usia = floor(($diff - $years_usia * 365*60*60*24 - $months_usia*30*60*60*24)/ (60*60*24));
            
            echo "<tr>"
                    . "<td>$i</td>"
                    . "<td>$nama / $q->NIP</td>
                            <td>$q->NAMA_PANGKAT /<br> $q->GOLONGAN</td>
                            <td>$q->TMT_GOLONGAN</td>
                            <td>$q->JABATAN</td>
                            <td>$q->TMT_JABATAN</td>
                            <td>$years_masakerja thn / $months_masakerja bln</td>
                            <td>$q->NAMA_SEKOLAH</td>
                            <td>$q->TAHUN_PENDIDIKAN</td>
                            <td>$q->TINGKAT_PENDIDIKAN</td>
                            <td>$q->TGL_LAHIR</td>
                            <td>$years_usia thn / $months_usia bln</td>
                            <td></td>"
                    . "</tr>";
            $i++;
        }
        echo"</tbody>
                    </table>
                    <br clear=all style='mso-special-character:line-break;' />
                </body>
            </html>";
    }

    public function cetak_DSP_word() {
        $query = $this->m_pegawai->get_dsp();
        echo"<html
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
                        size: 29.7cm 21cm;
                        margin: 2cm 1cm 2cm 1cm;
                        mso-page-orientation: landscape;
                        mso-footer:f1;
                    }
                    div.Section1 { page:Section1;}
                </style>
            </head>
            <body>
                <div class='Section1'>
                    <center><h2>DAFTAR SELURUH PEGAWAI NEGERI SIPIL<br>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN</h2></center><br />
                    <table border=1>
                        
                        <tbody>";
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DSP PPSDMK.doc");
        $no = 1;
        $bagian = '';
        foreach ($query as $q) {
            $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
            if ($bagian != $q->BAGIAN && $no > 1) {
                echo "<tr><td colspan='5'><b>$q->NAMA_UNIT</b></tr>";
            }

            echo "<tr>";
            if ($q->BAGIAN > 0) {
                if ($q->LEVEL > 1) {
                    echo "<td colspan=$q->LEVEL></td>
                    <td>$q->JABATAN</td>
                    <td>$nama /<br>$q->NIP</td>";
                    if ($q->LEVEL == 2) {
                        echo "<td ></td>";
                    }
                } else {
                    echo "<td colspan=1></td>
                    <td>$q->JABATAN</td>
                    <td>$nama /<br>$q->NIP</td>
                    <td colspan=2></td>";
                }
            } else {
                echo "
                 <td colspan=3>$q->JABATAN</td>
                 <td>$nama /<br>$q->NIP</td>
                 <td></td>";
            }
            echo "</tr>";
            /*
              echo "<tr>
              <td>$no</td>
              <td colspan=$q->LEVEL>$nama /<br>$q->NIP</td>
              <td>$q->NAMA_PANGKAT / $q->GOLONGAN</td>
              <td>$q->JABATAN</td>
              <td>$q->BAGIAN</td>
              <td>$q->SUBBAGIAN</td>
              <td>$q->LEVEL</td>
              <td></td>
              </tr>";
             * 
             */
            $no++;
            $bagian = $q->BAGIAN;
        }
        echo"</tbody>
                    </table>
                    <br clear=all style='mso-special-character:line-break;' />
                </body>
            </html>";
    }

    public function cetak_DUK_spreadsheet() {
        $table = $display = "";
        $fn = "DUK PPSDMK";
        $query = $this->m_pegawai->get_duk();
        $table .= '<table><tr><td colspan=13><center><h3>DAFTAR URUT KEPANGKATAN PEGAWAI NEGERI SIPIL<br>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA KEMETROLOGIAN</h3><center></td></tr></table><br>'
                . '<table border="1" cellpadding="0" cellspacing="0" id="ctbl"><tr>';
        $table .= '<th rowspan=2  bgcolor="#CCCCCC">NO</th>
                            <th rowspan=2 bgcolor="#CCCCCC">NAMA / NIP</th>
                            <th rowspan=2 bgcolor="#CCCCCC">PANGKAT / GOLONGAN</th>
                            <th rowspan=2 bgcolor="#CCCCCC">TMT PANGKAT</th>
                            <th rowspan=2 bgcolor="#CCCCCC">JABATAN</th>
                            <th rowspan=2 bgcolor="#CCCCCC">TMT JABATAN</th>
                            <th rowspan=2 bgcolor="#CCCCCC">MASA KERJA</th>
                            <th colspan=3 bgcolor="#CCCCCC">PENDIDIKAN</th>
                            <th rowspan=2 bgcolor="#CCCCCC">TGL_LAHIR</th>
                            <th rowspan=2 bgcolor="#CCCCCC">USIA</th>
                            <th rowspan=2 bgcolor="#CCCCCC">KET.</th></tr>
                            <tr><th bgcolor="#CCCCCC">INSTANSI</th>
                            <th bgcolor="#CCCCCC">TAHUN LULUS</th>
                            <th bgcolor="#CCCCCC">TIGKAT IJAZAH</th></tr>';
        $i = 1;
        foreach ($query as $q) {
            $gelar_belakang = str_replace($q->GELAR_BELAKANG, " ", ",");
            $nama = $q->GELAR_DEPAN . "" . $q->NAMA_PEGAWAI . "" . $q->GELAR_BELAKANG;
            
            $date1 = $q->TMT_CPNS; 
            $date2 = date('Y-m-d'); 
            $diff = abs(strtotime($date2) - strtotime($date1)); 
            $years_masakerja = floor($diff / (365*60*60*24)); 
            $months_masakerja = floor(($diff - $years_masakerja * 365*60*60*24) / (30*60*60*24)); 
            $days_masakerja = floor(($diff - $years_masakerja * 365*60*60*24 - $months_masakerja*30*60*60*24)/ (60*60*24));
            
            $date1 = $q->TGL_LAHIR; 
            $date2 = date('Y-m-d'); 
            $diff = abs(strtotime($date2) - strtotime($date1)); 
            $years_usia = floor($diff / (365*60*60*24)); 
            $months_usia = floor(($diff - $years_usia * 365*60*60*24) / (30*60*60*24)); 
            $days_usia = floor(($diff - $years_usia * 365*60*60*24 - $months_usia*30*60*60*24)/ (60*60*24));
            
            $display .= "<tr>"
                    . "<td>$i</td>"
                    . "<td>$nama / $q->NIP</td>
                            <td>$q->NAMA_PANGKAT /<br> $q->GOLONGAN</td>
                            <td>$q->TMT_GOLONGAN</td>
                            <td>$q->JABATAN</td>
                            <td>$q->TMT_JABATAN</td>
                            <td>$years_masakerja thn / $months_masakerja bln</td>
                            <td>$q->NAMA_SEKOLAH</td>
                            <td>$q->TAHUN_PENDIDIKAN</td>
                            <td>$q->TINGKAT_PENDIDIKAN</td>
                            <td>$q->TGL_LAHIR</td>
                            <td>$years_usia thn / $months_usia bln</td>
                            <td></td>"
                    . "</tr>";
            $i++;
        }
        $table .= $display;
        $table .= '</td></tr></table>';


        header("Content-type: application/x-msdownload");
        # replace excelfile.xls with whatever you want the filename to default to
        header("Content-Disposition: attachment; filename=$fn.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $table;
    }

}
