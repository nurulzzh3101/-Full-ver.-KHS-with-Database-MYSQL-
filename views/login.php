<?php defined('BASEPATH') or exit ('No direct script access allowed');
?>
<html>
	<head>
		<title>login mahasiswa</title>
	</head>

	<body style="background-color: DarkSlateGray; padding-left: 250px; padding-right: 250px;">
		<h2 style="background-color: LightSeaGreen; padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > LOGIN </h2>
		<div class="box" style="background-color: Lavender; padding-right: 5px; padding-left: 5px; padding-top: 10px; padding-bottom: 10px;">

			
		<form action="check_login" method="POST">
			<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 10px;padding-bottom: 10px; padding-left: :5px; padding-right: 5px; margin-top:10px; color: white">

				<tr>
					<td>NIM</td>
					<td>:</td>
					<td>
						<input type="text" size="20" name="nim" >
					</td>
				</tr>

				<tr>
					<td>Password </td>
					<td>:</td>
					<td>
						<input type="text" size="20" name="pswd" >
					</td>
				</tr>
			</table>
			<br>
			<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 5px;padding-bottom: 5px; padding-left: 5px; padding-right: 5px; margin-top:10px; color: white">
				<tr>
					<td>
				<input type="submit" name="submit" value="login">
					</td>
				</tr>
			</table>
		</form>

		<form method="post" action="daftar">
		<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 5px;padding-bottom: 5px; padding-left: 5px; padding-right: 5px; margin-top:10px; color: white">
			<h5 style="padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: black;" align="center" > belum punya akun ? klik daftar </h5>
		<tr>
			<td>
				<input type="submit" value="Daftar" name="submit">
			</td>
		</tr>
	</table>
	</form>
	</body>
</html>