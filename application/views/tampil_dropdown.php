<!DOCTYPE html>
<html>
<head>
	<title>Dropdown Chained</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 
<select name="bidang" id="bidang">
	<option> - Pilih Pelanggan -</option>
	<?php
		foreach ($dropdown->result() as $baris) {
 
			echo "<option value='".$baris->kode_bidang."'>".$baris->nama_bidang."</option>";
		}
	?>
</select>
 
 
 
<select name="barang" id="barang">
	<option> - Pilih Barang -</option>
</select>
 
 
</body>
</html>