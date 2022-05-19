<?php
	$status = $_COOKIE["connected"];
	if (!isset($_COOKIE["connected"]) || $status=="0")
	{
		header("Location: login.php");
	}
	else if (isset ($_COOKIE["connected"]) || $status=="1")
	{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input </title>
	<style type="text.css">
	</style>
	<style>
		
	</style>
</head>
<body style="background-color: DarkSlateGray; padding-left: 250px; padding-right: 250px;">
	<h2 style="background-color: LightSeaGreen; padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > Kartu Hasil Study </h2>
	<div class="box" style="background-color: Lavender; padding-right: 5px; padding-left: 5px; padding-top: 10px; padding-bottom: 10px;">

	<form method="post" action="logout">
		<table border="0" align="center">
		<tr>
			<td>
				<input type="submit" value="Logout" name="submit">
			</td>
		</tr>
	</table>
	</form>
	
	
	

	<!-- pucuk -->
	<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 10px;padding-bottom: 10px; padding-left: :5px; padding-right: 5px; margin-top:10px; color: white">
	<tr>
		<td>Nama : </td>
		<td>
			<input type="text" size="30" name="nama" value="<?php echo $_COOKIE["nama"];?>" readonly>
			<!--SESSION
			<input type="text" size="30" name="nama" value="<?php session_start(); echo $_SESSION["nama"];?>" readonly>
			-->
		</td>
		<td><br></td>
		<td>NIM : </td>
		<td>
			<input type="text" size="30" name="nim" value="<?php echo $_COOKIE["nim"]; ?>" readonly>
			<!--SESSION
			<input type="text" size="30" name="nama" value="<?php session_start(); echo $_SESSION["nim"];?>" readonly>
			-->
		</td>
	</tr>
	</table>
	<!-- end pucuk -->

	<br>
	<br>

	<!-- input nilai and mk -->
	<table border="0" align="center" style="">
		<tr valign="center" align="center" style="background-color: Salmon; color: white; ">
			<td>No</td>
			<td>Mata Kuliah</td>
			<td>Nilai</td>
			<td>Aksi</td>
		</tr>


		<?php
		$nomor =1;
		$hasil=0;
		$nim=$_COOKIE['nim'];
		foreach ($data_mhs as $key => $row) :
			
		?>

		<tr>
			<td>
				<?php
				echo $nomor;
				?>
			</td>
			<td>
				<input type="text" size="30" name="mk[]" value="<?php echo $row["nama_mk"];?>" readonly>
			</td>
			<td>
			<?php
			$konversi ="E";
			if($row['nilai_mk']>85&&($row['nilai_mk']<=100)){
				$konversi="A";
			}
			else if(($row['nilai_mk']<=85)&&($row['nilai_mk']>70)){
					$konversi="B";
			}
			else if(($row['nilai_mk']<=70)&&($row['nilai_mk']>55)){
					$konversi="C";
			}
			else if(($row['nilai_mk']<=55)&&($row['nilai_mk']>45)){
					$konversi="D";
			}
			else if($row['nilai_mk']<=45){
					$konversi="E";
						 		
			}
			?>

			<input type="text" size="10" name="nilai[]" value="<?php echo $konversi; ?>" readonly>

			</td>
			<td>
				<form method ="post" action="hapus">
					<table border="0" align="left">
						<tr>
							<td>
								<input type="submit" value="hapus" name="submit">
								<input type="text" size="30" name="id_makul" value="<?php echo $row["id"];?>" hidden>
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<?php
			$nomor++;
		endforeach
		?>
		</tr>

		<tr class="footer" bgcolor="LightSalmon">
				<td colspan="2" style="color: black;" align="center"><b>Nilai Indeks Prestasi Kumulatif</b></td>
				<td style="text-align: center;font-weight: bold;text-align: left; color: black; text-align: center;">
					<?php

				$hostname="localhost";
				$db_user="root";
				$db_password="";
				$selected_db = "db_pw2";
				
 			 	$conn=mysqli_connect($hostname, $db_user, $db_password, $selected_db) or die("Connection failed".mysqli_connect_error());
			
					 $query="SELECT ipk FROM mhs WHERE nim='$nim'";
				 	 $result4=mysqli_query($conn,$query);
				 	 $select=mysqli_fetch_array($result4);
				 	 printf("%.2f",$select[0]);
					?>
				</td>
	</table>
	
	<!-- end input nilai n mk -->

	<br>

	<!-- tombol submit -->
	
	<!-- end tombol submit -->
	<?php mysqli_close($conn); ?>
	

	<form method="post" action="edit_page">
		<table border="0" align="center">
		<tr>
			<td>
				<input type="submit" value="edit khs" name="submit">
			</td>
		</tr>
	</table>
	</form>
	
	<form method="post" action="tambah_makul">
		<table border="0" align="center">
			<tr>
				<td>
					<input type="submit" value="
					tambah mata kuliah" name="submit" style="padding-right: 150px; ">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php } ?>