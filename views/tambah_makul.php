<html>
	<head>
		<title>
			Tambah Mata Kuliah
		</title>
	</head>
	<body style="background-color: DarkSlateGray; padding-left: 250px; padding-right: 250px;">
		<h2 style="background-color: LightSeaGreen; padding-top: 10px; padding-bottom: 10px; padding-right: 5px; padding-left: 5px; margin: 0px; margin-top: 50px; color: white;" align="center" > Tambah Mata kuliah </h2>
		<form action="insert_atau_update_matkul" method="Post">
			<table border="0" align="center" style="background-color: LightSeaGreen; padding-top: 10px;padding-bottom: 10px; padding-left: :5px; padding-right: 5px; margin-top:50px; color: white">
				<tr>
					<td>Nama Mata Kuliah</td>
					<td>:</td>
					<td>
						<input type="text" size="30" name="mata_kuliah">
					</td>
				</tr>
				<tr>
				<td>Nilai</td>
				<td>:</td>
				<td>
					<input type="text" size="30" name="nilai">
				</td>
					</tr>
				<tr>
					<td>
						<br>
						<br>
						<input type="submit" name="submit" value="submit">
					</td>
				</tr>
			</tr>
			</table>
		</form>
	</body>
</html>