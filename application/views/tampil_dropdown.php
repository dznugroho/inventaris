<!DOCTYPE html>
<html>
<head>
	<title>Dropdown Chained</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 
<select name="bidang" id="bidang">
	<option> - Pilih Bidang -</option>
	<?php
		foreach ($dropdown->result() as $baris) {
			echo "<option value='".$baris->kode_bidang."'>".$baris->nama_bidang."</option>";
		
		}
	?>
</select>
 
 
<select name="subbidang" id="subbidang"></select>
<script type="text/javascript">
	$(document).ready(function(){
		$('#bidang').on('change', function(){
			var kode_bidang = $('#bidang').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url('index.php/dropdown/tampil_chained') ?>',
			    data: { 'id' : kode_bidang },
				success: function(data){
				    $("#subbidang").html(data);
				}
			})
		})
	})
</script>
 
 
</body>
</html>