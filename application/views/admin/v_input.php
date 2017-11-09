<!DOCTYPE html>
<html>
<head>
	<title>INPUT SPEK PC</title>
</head>
<body>
	<center>
		<h1>SPEK PC</h1>
		<h3>Tambah data baru</h3>
	</center>
	<form action="<?php echo base_url(). 'crud/tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>ID</td>
				<td><input type="text" name="ID"></td>
			</tr>
			<tr>
				<td>PROCESSOR</td>
				<td><input type="text" name="PROCESSOR"></td>
			</tr>
			<tr>
				<td>RAM</td>
				<td><input type="text" name="RAM"></td>
			</tr>
			<tr>
				<td>HARDDISK</td>
				<td><input type="text" name="HDD"></td>
			</tr>
			<tr>
				<td>GRAPHICS_CARD</td>
				<td><input type="text" name="VGA"></td>
			</tr>
			<tr>
				<td>MONITOR</td>
				<td><input type="text" name="MONITOR"></td>
			</tr>
			<tr>
				<td>STATUS</td>
				<td><input type="text" name="STATUS"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
</body>
</html>