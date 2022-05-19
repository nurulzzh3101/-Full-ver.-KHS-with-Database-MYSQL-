<?php
class m_user extends CI_Model
{
	function check_user($nim,$pswd){
	$hostname="localhost";
	$db_user="root";
	$db_password="";
	$selected_db = "db_pw2";
	
	$conn=mysqli_connect($hostname,$db_user,$db_password,$selected_db) or die ("connection failed".mysqli_connect_error());

	$sql = "SELECT nim,nama,status from username where nim='$nim' and password='$pswd' ";

	$result = $conn->query($sql);
	return $result;
	}

	function check_nim($nim){
		$sql = "SELECT nim FROM username where nim = '$nim'";
		$result = $this->db->query($sql)->result_array();

		return $result;
	}

	function update_username_nama($nama,$nim){
		$sql = "UPDATE username SET nama = '$nama' where nim = '$nim'";
		$result = $this->db->query($sql);

		return $result;
	}

	function update_username_password($pswd,$nim){
		$sql = "UPDATE username set password='$pswd' where nim = '$nim'";
		$result = $this->db->query($sql);

		return $result;
	}

	function update_mhs_nama($nama,$nim){
		$sql = "UPDATE mhs set nama='$nama' where nim = '$nim'";
		$result = $this->db->query($sql);

		return $result;
	}

	function insert_username($nim,$nama,$pswd){
		$sql = "INSERT INTO username (nim,nama,password) values ('$nim','$nama','$pswd')";
		$result = $this->db->query($sql);

		return $result;
	}

	function insert_mhs($nim,$nama){
		$sql = "INSERT INTO mhs (nim,nama,ipk) 
				values ('$nim','$nama','0')";
		$result = $this->db->query($sql);
		return $result;
	}

	function get_khs_mhs($nim){
		$query2 = "SELECT mata_kuliah.id,mata_kuliah.nama_mk, nilai.nilai_mk FROM mata_kuliah,nilai WHERE nilai.id_matakuliah=mata_kuliah.id and nilai.nim='$nim' ";

		return $this->db->query($query2)->result_array();
	}
	
	function check_nilai($nim,$id_mk,$i){
		$sql = "SELECT nim from nilai where nim='$nim' and id_matakuliah ='$id_mk[$i]'";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	function update_nilai_mhs($nilai_mk,$nim,$id_mk,$i){
		$sql="UPDATE nilai set nilai_mk = '$nilai_mk[$i]' where nim='$nim' and id_matakuliah = '$id_mk[$i]'";
		$result = $this->db->query($sql);
		return $result;
	}

	function insert_nilai_mhs($nilai_mk,$nim,$id_mk,$i){
		$sql = "INSERT into nilai(nim,id_matakuliah,nilai_mk) values (
					'$nim' , '$id_mk[$i]' , '$nilai_mk[$i]'
					) ";
		$result = $this->db->query($sql);
		return $result;
	}

	function check_nim_mhs($nim){
		$sql = " SELECT nim from mhs where nim='$nim'";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	function update_ipk_mhs($nim,$akhir){
		$query1 = "UPDATE mhs set ipk='$akhir' where nim='$nim'";
		$result = $this->db->query($query1);
		return $result;
	}

	function insert_ipk_mhs($nim,$nama,$akhir){
		$sql = "INSERT into mhs (nim,nama,ipk) values ('$nim','$nama','$akhir')";
		$result = $this->db->query($sql);
		return $result;
	}

	function hapus_khs ($nim,$id_matakuliah){
		$query = "DELETE from nilai where nim = '$nim' and id_matakuliah='$id_matakuliah' ";
		$this->db->query($query);
		//$query1 = "DELETE from mata_kuliah where id='$id_matakuliah' ";
		//$this->db->query($query1);
	}

	function get_nilai($nim){
		$sql = "SELECT nilai_mk from nilai where nim = '$nim'";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	function insert_matkul($nim,$mata_kuliah,$nilai){
		$sql = " INSERT into mata_kuliah(nama_mk) values('$mata_kuliah')";
		$this->db->query($sql);

		$id_matakuliah = $this->db->insert_id();

		$sql = " INSERT into nilai(nim,id_matakuliah,nilai_mk) values('$nim','$id_matakuliah','$nilai')";
		$this->db->query($sql);
	}
}
?>