<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome-message');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function daftar()
	{
		$this->load->view('daftar');
	}

	public function home()
	{
		$nim=$_COOKIE["nim"];
		$this->load->model('m_user');
		$x['data_mhs']=$this->m_user->get_khs_mhs($nim);
		$this->load->view('cetak_khs',$x);
	}

	public function hapus()
	{
		$nim=$_COOKIE["nim"];
		$id_makul = $_POST['id_makul'];
		$this->load->model('m_user');
		$this->m_user->hapus_khs($nim,$id_makul);

		$result = $this->m_user->get_nilai($nim);
		$hasil=0;
		for ($i=0; $i <sizeof($result) ; $i++) { 
			if ($result[$i]['nilai_mk']>85 && $result[$i]['nilai_mk']<=100) {
				$konversi_nilai=4;
			}
			else if ($result[$i]['nilai_mk']>70 && $result[$i]['nilai_mk']<=85) {
				$konversi_nilai=3;
			}
			else if ($result[$i]['nilai_mk']>55 && $result[$i]['nilai_mk']<=70) {
				$konversi_nilai=2;
			}
			else if ($result[$i]['nilai_mk']>45 && $result[$i]['nilai_mk']<=55) {
				$konversi_nilai=1;
			}
			else if ($result[$i]['nilai_mk']<=45) {
				$konversi_nilai=0;
			}
			$hasil= $hasil + $konversi_nilai;
		}
		$akhir = $hasil/sizeof($result);

		$this->m_user->update_ipk_mhs($nim,$akhir);

		redirect('Welcome/home','refresh');
	}

	public function edit()
	{
		$this->load->view('edit_page');
	}

	public function check_login()
	{
			$this->load->helper('url');
			$this->load->model('m_user');

			if (isset($_POST['submit'])) {
			$nim = $_POST['nim'];
			$pswd=$_POST['pswd'];
			$result = $this->m_user->check_user($nim,$pswd);
			
			if ($result->num_rows >0) {
				while ($row = mysqli_fetch_array($result)) {

					//cookie
					$cookie_name = "nim";
					$cookie_value = $row["nim"];
					setcookie($cookie_name,$cookie_value, time()+(86400),"/"); //86400 = 1day

					$cookie_name ="nama";
					$cookie_value = $row["nama"];
					setcookie($cookie_name,$cookie_value, time()+(86400),"/"); //86400 = 1day

					$cookie_name = "connected";
					$cookie_value = "1";
					setcookie($cookie_name, $cookie_value, time() +(86400),"/");
					//session
					//session_start();
					//$_SESSION["nama"]=$row["nama"];
					//$_SESSION["nim"]=$row["nim"];

					redirect('Welcome/home','refresh');
				}
			}
			else{
				redirect('Welcome/login','refresh');
			}
		}
		else{
			redirect('Welcome/login','refresh');
		}
	}


public function insert_daftar()
	{
		$this->load->model('m_user');
		if (isset($_POST['submit'])) {
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$pswd = $_POST['pswd'];
			$result = $this->m_user->check_nim($nim);


			if (sizeof($result)>0) {
				$this->m_user->update_username_nama($nama,$nim);
				$this->m_user->update_username_password($pswd,$nim);
				$this->m_user->update_mhs_nama($nama,$nim);
			}
			else{
				$this->m_user->insert_username($nim,$nama,$pswd);
				$this->m_user->insert_mhs($nim,$nama);
			}

			redirect('Welcome/login','refresh');
		}
		else{
			redirect('Welcome/login','refresh');
		}
	}

	public function logout()
	{
		$cookie_name = "connected";
		$cookie_value = "0";
			setcookie($cookie_name, $cookie_value, time() +(86400),"/");
			redirect('Welcome/login','refresh');
	}

	public function edit_page(){
		$this->load->view('edit_page');
	}

	public function insert_nilai(){
		$this->load->model('m_user');

		if (isset($_POST['submit'])) {
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$nilai_mk = $_POST['nilai'];
			$id_mk = $_POST['id_makul'];
			$hasil=0;
			$result = $this->m_user->check_nim($nim);

			if (sizeof($result)>0) {
				$this->m_user->update_username_nama($nama,$nim);
				$this->m_user->update_mhs_nama($nama,$nim);
				$cookie_name = "nama";
				$cookie_value = $nama;

				setcookie($cookie_name,$cookie_value, time()+(86400),"/");
			}
			else{
				$this->m_user->insert_username($nim,$nama);
				$this->m_user->insert_mhs($nim,$nama);
			}

			for ($i=0; $i <sizeof($id_mk) ; $i++) { 
				$result = $this->m_user->check_nilai($nim,$id_mk,$i);

				if (sizeof($result)>0) {
					$this->m_user->update_nilai_mhs($nilai_mk,$nim,$id_mk,$i);
				}
				else{
					$this->m_user->insert_nilai_mhs($nilai_mk,$nim,$id_mk,$i);
				}

				if ($nilai_mk[$i]>85&&$nilai_mk[$i]<=100) {
					$konversi_nilai =4;
				}
				else
				if ($nilai_mk[$i]>70&&$nilai_mk[$i]<=85) {
					$konversi_nilai =3;
				}	
				else
				if ($nilai_mk[$i]>55&&$nilai_mk[$i]<=70) {
					$konversi_nilai =2;
				}
				else
				if ($nilai_mk[$i]>45&&$nilai_mk[$i]<=55) {
					$konversi_nilai = 1;
				}
				else
				if ($nilai_mk[$i]<=45) {
					$konversi_nilai =0;
				}
				
				$hasil = $hasil+$konversi_nilai;
				}


				$akhir=$hasil/sizeof($id_mk);

				$result=$this->m_user->check_nim_mhs($nim);
				if (sizeof($result)>0) {
					$this->m_user->update_ipk_mhs($nim,$akhir);
				}
				else{
					$this->m_user->insert_ipk_mhs($nim,$nama,$akhir);
				}
				redirect('Welcome/home','refresh');
			}
		
		else{
			redirect('Welcome/edit_page','refresh');
		}
	}

	public function tambah_makul()
	{
		$this->load->view('tambah_makul');
	}

	public function insert_atau_update_matkul(){
		$this->load->model('m_user');
		$nim = $_COOKIE["nim"];
		$mata_kuliah = $_POST['mata_kuliah'];
		$nilai = $_POST['nilai'];
		$this->m_user->insert_matkul($nim,$mata_kuliah,$nilai);

		$result = $this->m_user->get_nilai($nim);
		$hasil=0;
		for ($i=0; $i <sizeof($result) ; $i++) { 
			if ($result[$i]['nilai_mk']>85 && $result[$i]['nilai_mk']<=100) {
				$konversi_nilai=4;
			}
			else if ($result[$i]['nilai_mk']>70 && $result[$i]['nilai_mk']<=85) {
				$konversi_nilai=3;
			}
			else if ($result[$i]['nilai_mk']>55 && $result[$i]['nilai_mk']<=70) {
				$konversi_nilai=2;
			}
			else if ($result[$i]['nilai_mk']>45 && $result[$i]['nilai_mk']<=55) {
				$konversi_nilai=1;
			}
			else if ($result[$i]['nilai_mk']<=45) {
				$konversi_nilai=0;
			}
			$hasil= $hasil + $konversi_nilai;
		}
		$akhir = $hasil/sizeof($result);

		$this->m_user->update_ipk_mhs($nim,$akhir);
		redirect('Welcome/home','refresh');
	}
}