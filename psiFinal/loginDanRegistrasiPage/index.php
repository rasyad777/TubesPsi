<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: ./index.php");
    die();
}
?>

<!DOCTYPE html>
<html>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<link rel="stylesheet" href="css/styleid.css">
</head>

<body>
	<div class="container">
		<div class="container-left">
		  <img src="img/gbr.png" alt="form-login" >
		  
		</div>
		<div class="container-right">
			<h3 id="judul">Catat Keuangan UKM dengan Nony.Ku!!!</h3>
			<button class="btn btn-primary" type="button" onclick="window.location.href='registrasi.php'">Registrasi</button>
			<button class="btn btn-primary" type="button" onclick="window.location.href='login.php'">Masuk</button>
		 
		</div>
	</div>
	

        </div>
    
</body>
</html>