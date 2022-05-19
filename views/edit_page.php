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
	<title>Input</title>
	<style type="text.css">
	</style>
	<style>
		
	</style>
</head>
<body style="background-color: DarkSlateGray; padding-left: 250px; padding-right: 250px;">
	<h2 style="background-color: LightSeaGreen; padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > EDIT Kartu Hasil Study </h2>
	<div class="box" style="background-color: Lavender; padding-right: 5px; padding-left: 5px; padding-top: 10px; padding-bottom: 10px;">

	<form method="post" action="insert_nilai">
		<?php 
				$hostname="localhost";
				$db_user="root";
				$db_password="";
				$selected_db = "db_pw2";
	
 			 	$conn=mysqli_connect($hostname, $db_user, $db_password, $selected_db) or die("Connection failed".mysqli_connect_error());
				
				?>

	<!-- pucuk -->
	<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 10px;padding-bottom: 10px; padding-left: :5px; padding-right: 5px; margin-top:10px; color: white">
	<tr>
		<td>Nama : </td>
		<td>
			<input type="text" size="30" name="nama" value="<?php echo $_COOKIE["nama"];?>" >
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
		</tr>

		<?php
		$hostname="localhost";
		$db_user="root";
		$db_password="";
		$selected_db = "db_pw2";
	
		$conn = mysqli_connect($hostname, $db_user, $db_password, $selected_db) or die ("connection failed".mysqli_connect_error());
		$query2 = "SELECT id,nama_mk FROM mata_kuliah";
		$result = $conn->query($query2) or die ($conn->error);
		$nomor =1;
		?>

		<?php
		while ($row = $result-> fetch_assoc()) {
		
		?>

		<tr>
			<td><?php echo $nomor;?></td>
			<td>
				<input type="text" size="30" name="mk[]" value="<?php echo $row["nama_mk"]; ?>" readonly>
			</td>
			<td>
				<input type="text" size="10" name="nilai[]">
			</td>
			<input type="text" size="10" name="id_makul[]" value="<?php echo $row["id"]; ?>" hidden>
		</tr>

		<?php
			$nomor++;
		}
		?>
	</table>
	
	<!-- end input nilai n mk -->

	<br>

	<!-- tombol submit -->
	<table border="0" align="center">
		<tr>
			<td>
				<input type="submit" value="simpan" name="submit">
			</td>
		</tr>
	</table>
	<!-- end tombol submit -->
	<?php mysqli_close($conn); ?>
	</form>
</body>
</html>
<?php } ?>