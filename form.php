<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	


	<div class="form-group col-md-5 col-md-offset-3">
		<form action="index.php" method="post" >
		<table class="table">
			<tr>
			<div class="input-group">
			    <span class="input-group-addon">X1</span>
			   	<input id="msg" type="text" class="form-control" name="x0" placeholder="muda = 0 | paruh baya = 1 | tua = 2" >
			</div>
				</tr>
				<tr>
			<div class="input-group">
			    <span class="input-group-addon">X2</span>
			   	<input id="msg" type="text" class="form-control" name="x1" placeholder="gemuk = 0 | sangat gemuk = 1 | terlalu gemuk = 2">
			</div>
			</tr>

		    <input type="submit" value="Cek hipertensi" name="submit" class="btn btn-success" />
	
		</form>
		<br><br><br>
	</div>
</div>


</body>
</html>