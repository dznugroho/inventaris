<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<div class="col-sm-4 col-md-offset-4">
		<h4>Upload dengan Codeigniter dan Ajax</h4>
			<form class="form-horizontal" id="submit">
				<div class="form-group">
					<input type="text" name="nama" class="form-control" placeholder="Judul">
				</div>
				<div class="form-group">
					<input type="file" name="file">
				</div>

				<div class="form-group">
					<button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
				</div>
			</form>	
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').submit(function(e){
		    e.preventDefault(); 
		         $.ajax({
		             url:'<?php echo base_url();?>index.php/asek/do_upload',
		             type:"post",
		             data:new FormData(this),
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  alert("Upload Image Berhasil.");
		           }
		         });
		    });
		

	});
	
</script>
</body>
</html>