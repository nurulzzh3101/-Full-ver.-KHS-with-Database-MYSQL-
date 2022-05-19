<html>
	<head>
		<title>login mahasiswa</title>
	</head>

	<body style="background-color: DarkSlateGray; padding-left: 250px; padding-right: 250px;">
		<h2 style="background-color: LightSeaGreen; padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > BUAT AKUN </h2>
		<form action="insert_daftar" method="POST">
			<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 10px;padding-bottom: 10px; padding-left: :5px; padding-right: 5px; margin-top:10px; color: white">
				<h4 style="padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > silahkan isi nama, nim, dan password untuk membuat akun </h4>

				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<input type="text" size="20" name="nama" >
					</td>
				</tr>

				<tr>
					<td>NIM</td>
					<td>:</td>
					<td>
						<input type="text" size="20" name="nim" >
					</td>
				</tr>

				<tr>
					<td>Password</td>
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
				<input type="submit" name="submit" value="daftar">
					</td>
				</tr>
			</table>
		</form>

		
	</body>
</html>