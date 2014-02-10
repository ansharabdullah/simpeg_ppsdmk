<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supervisor extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
		
		if(!$this->session->userdata('user')){
			$this->load->view("v_login");
		}else if($this->session->userdata('user')=="supervisor"){
			$this->load->view("admin/v_header");
		}else if($this->session->userdata('user')=="manager"){		
			redirect(base_url()."manager");
		}else{
			$this->load->view("v_login");
		}		
    }
    	
	public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url());
    }
	
	public function index()
    {		
		$query = $this->m_pegawai->get_all_pegawai();			
		$this->load->view("admin/v_table_semua_pegawai",array('query' => $query));
		$this->load->view("admin/v_footer");		
    }
	
	public function input_nilai($nama){
		$nama_pegawai = str_replace("_", " ", $nama);		
		$query1 = $this->m_pegawai->get_pegawai($nama_pegawai);
		$query2 = $this->m_pegawai->get_periode();
		
		$cek_penilaian = $this->m_pegawai->cekPenilaian($nama_pegawai,$query2);
		
		$this->load->view("admin/v_input_nilai",array('biodata' => $query1,'periode' => $query2, 'nama' => $nama_pegawai, 'cek' => $cek_penilaian));
		$this->load->view("admin/v_footer");
	}
        
        public function input_biodata(){
		
		$this->load->view("admin/v_form_input_biodata");
		$this->load->view("admin/v_footer");
	}
	
	public function submit_input_nilai(){
		$id_pegawai = $this->input->post('nama');
		$id_periode = $this->input->post('periode');
		$kejujuran = $this->input->post('kejujuran');
		$tanggung_jawab = $this->input->post('tanggung_jawab');
		$loyalitas = $this->input->post('loyalitas');
		$kepemimpinan = $this->input->post('kepemimpinan');
		$perencanaan = $this->input->post('perencanaan');
		$organisasi = $this->input->post('organisasi');
		$komunikasi = $this->input->post('komunikasi');
		$adaptasi = $this->input->post('adaptasi');
		$berbagi_informasi = $this->input->post('berbagi_informasi');
		
		/* proses ahp */
		$nilai = array();
        $nilai[0] = $this->input->post('kejujuran');
        $nilai[1] = $this->input->post('tanggung_jawab');
        $nilai[2] = $this->input->post('loyalitas');
        $nilai[3] = $this->input->post('kepemimpinan');
        $nilai[4] = $this->input->post('perencanaan');
        $nilai[5] = $this->input->post('organisasi');
        $nilai[6] = $this->input->post('komunikasi');
        $nilai[7] = $this->input->post('adaptasi');
        $nilai[8] = $this->input->post('berbagi_informasi');
		
		$nilai2 = array();
        for ($i = 0; $i < 9; $i++) {
            if ($nilai[$i] <= 50) {
                $nilai2[$i] = 4;
            } else if ($nilai[$i] <= 75 && $nilai[$i] > 50) {
                $nilai2[$i] = 3;
            } else if ($nilai[$i] <= 85 && $nilai[$i] > 75) {
                $nilai2[$i] = 2;
            } else {
                $nilai2[$i] = 1;
            }
        }

        $ahp = $this->ahp($nilai2);		
		/* Akhir AHP */
				
		$query = $this->m_pegawai->insert_penilaian($id_pegawai, $id_periode, $kejujuran,$tanggung_jawab,$loyalitas,$kepemimpinan,$perencanaan,$organisasi,$komunikasi,$adaptasi,$berbagi_informasi,$ahp);
				
		
		redirect(base_url().'supervisor/');		
	}	
        
	
    public function hitungAHPKriteria($a, $b, $c, $d) {
        //menghitung pair comparation matrix
        $pair_matriks = array();
        $pair_matriks[0][0] = $a;
        $pair_matriks[0][1] = $b;
        $pair_matriks[0][2] = $c;
        $pair_matriks[1][0] = $pair_matriks[0][0] / $pair_matriks[0][1];
        $pair_matriks[1][1] = 1;
        $pair_matriks[1][2] = $d;
        $pair_matriks[2][0] = $pair_matriks[0][0] / $pair_matriks[0][2];
        $pair_matriks[2][1] = $pair_matriks[0][0] / $pair_matriks[1][2];
        $pair_matriks[2][2] = 1;
        $pair_matriks[3][0] = 0;
        $pair_matriks[3][1] = 0;
        $pair_matriks[3][2] = 0;


        for ($i = 0; $i < 3; $i ++) {
            for ($j = 0; $j < 3; $j ++) {
                //pembagi
                $pair_matriks[3][$j] = $pair_matriks[3][$j] + $pair_matriks[$i][$j];
            }
        }

        //menghitung priority vector
        $x = array();
        $x[0] = 0;
        $x[1] = 0;
        $x[2] = 0;
        for ($i = 0; $i < 3; $i ++) {
            for ($j = 0; $j < 3; $j ++) {
                $x[$i] = $x[$i] + ($pair_matriks[$i][$j] / $pair_matriks[3][$j]);
            }
            $x[$i] = $x[$i] / 3;
        }

        $ax = array();
        for ($i = 0; $i < 3; $i ++) {
            $ax[$i] = 0;
            for ($j = 0; $j < 3; $j ++) {
                $ax[$i] = ($pair_matriks[$i][$j] * $x[$j]) + $ax[$i];
            }
        }

        //menghitung CR
        $average = 0;
        for ($i = 0; $i < 3; $i++) {
            $average = $average + ($ax[$i] / $x[$i]);
        }
        $average = $average / 3;

        $ci = ($average - 3) / 2;
        $cr = $ci / 0.58;

        if ($cr < 0.1) {
            return $x;
        } else {
            return 0;
        }
    }

    public function hitungAHPNilai($a, $b, $c, $d, $e, $f, $g) {
        //menghitung pair comparation matrix
        $pair_matriks = array();
        $pair_matriks[0][0] = $a;
        $pair_matriks[0][1] = $b;
        $pair_matriks[0][2] = $c;
        $pair_matriks[0][3] = $d;
        $pair_matriks[1][0] = $pair_matriks[0][0] / $pair_matriks[0][1];
        $pair_matriks[1][1] = 1;
        $pair_matriks[1][2] = $e;
        $pair_matriks[1][3] = $f;
        $pair_matriks[2][0] = $pair_matriks[0][0] / $pair_matriks[0][2];
        $pair_matriks[2][1] = $pair_matriks[0][0] / $pair_matriks[1][2];
        $pair_matriks[2][2] = 1;
        $pair_matriks[2][3] = $g;
        $pair_matriks[3][0] = $pair_matriks[0][0] / $pair_matriks[0][3];
        $pair_matriks[3][1] = $pair_matriks[0][0] / $pair_matriks[1][3];
        $pair_matriks[3][2] = $pair_matriks[0][0] / $pair_matriks[2][3];
        $pair_matriks[3][3] = 1;
        $pair_matriks[4][0] = 0;
        $pair_matriks[4][1] = 0;
        $pair_matriks[4][2] = 0;
        $pair_matriks[4][3] = 0;


        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                //pembagi
                $pair_matriks[4][$j] = $pair_matriks[4][$j] + $pair_matriks[$i][$j];
            }
        }

        //menghitung priority vector
        $x = array();
        $x[0] = 0;
        $x[1] = 0;
        $x[2] = 0;
        $x[3] = 0;
        for ($i = 0; $i < 4; $i ++) {
            for ($j = 0; $j < 4; $j ++) {
                $x[$i] = $x[$i] + ($pair_matriks[$i][$j] / $pair_matriks[4][$j]);
            }
            $x[$i] = $x[$i] / 4;
        }

        $ax = array();
        for ($i = 0; $i < 4; $i ++) {
            $ax[$i] = 0;
            for ($j = 0; $j < 4; $j ++) {
                $ax[$i] = ($pair_matriks[$i][$j] * $x[$j]) + $ax[$i];
            }
        }

        //menghitung CR
        $average = 0;
        for ($i = 0; $i < 4; $i++) {
            $average = $average + ($ax[$i] / $x[$i]);
        }
        $average = $average / 4;

        $ci = ($average - 4) / 3;
        $cr = $ci / 0.9;

        if ($cr < 0.1) {
            return $x;
        } else {
            return 0;
        }
    }

    public function ahp($nilai) {
        $kriteria = array();
        $kriteria[0] = $this->hitungAHPKriteria(1, 2, 3, 1.5);

        $subkriteria = array();
        $subkriteria[0] = $this->hitungAHPKriteria(1, 2, 3, 1.5);
        $subkriteria[1] = $this->hitungAHPKriteria(1, 4, 3, 0.5);
        $subkriteria[2] = $this->hitungAHPKriteria(1, 0.33, 0.25, 0.5);

        $arrayNilai = array();
        $arrayNilai = $this->hitungAHPNilai(1, 2, 5, 6, 3, 5, 3);

        $bobot = $this->hitungBobot($kriteria, $subkriteria, $arrayNilai);
        $ahp = array();
        $count = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($k = 0; $k < 3; $k++) {
                $ahp[$count] = $bobot[$i % 3][($nilai[$k] - 1)][$k];
                $count++;
            }
        }

        $hasilAHP = 0;
        for ($i = 0; $i < 9; $i++) {
            $hasilAHP += $ahp[$i];
        }
        $hasilAHP = $hasilAHP * 100 / 0.5093665768194;
        return $hasilAHP;
    }

    public function hitungBobot($kriteria, $subkriteria, $arrayNilai) {
        $bobot = array();

        for ($k = 0; $k < 3; $k ++) {
            for ($i = 0; $i < 4; $i ++) {
                for ($j = 0; $j < 3; $j ++) {
                    $bobot[$k][$i][$j] = $kriteria[0][$k] * $subkriteria[$k][$j] * $arrayNilai[$i];
                }
            }
        }
        return $bobot;
    }

    public function aaa() {
        $nilai = array();
        $nilai[0] = 4;
        $nilai[1] = 4;
        $nilai[2] = 4;
        $nilai[3] = 4;
        $nilai[4] = 4;
        $nilai[5] = 4;
        $nilai[6] = 4;
        $nilai[7] = 4;
        $nilai[8] = 4;

        $nilai_total = $this->ahp($nilai);
    }

}