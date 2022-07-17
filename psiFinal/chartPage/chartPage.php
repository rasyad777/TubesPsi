<!doctype html>

<?php
 include "../loginDanRegistrasiPage/koneksi.php";

 $ambildatatransaksi = mysqli_query($koneksi,"select * from transaksi");
 $transaksi = mysqli_query($koneksi,"select status_transaksi from transaksi");

 $pemasukan= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pemasukan'AND month(tanggal_transaksi) = MONTH(CURDATE())");
 $jumlah_pemasukkan = mysqli_fetch_assoc($pemasukan);
 $pengeluaran= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pengeluaran'AND month(tanggal_transaksi) = MONTH(CURDATE())");
 $jumlah_pengeluaran = mysqli_fetch_assoc($pengeluaran);
 $saldo=$jumlah_pemasukkan['jumlah']-$jumlah_pengeluaran['jumlah'];
 
 $pemasukan_seluruh= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pemasukan'");
 $jumlah_pemasukkan_seluruh = mysqli_fetch_assoc($pemasukan_seluruh);
 $pengeluaran_seluruh= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pengeluaran'");
 $jumlah_pengeluaran_seluruh = mysqli_fetch_assoc($pengeluaran_seluruh);
 $saldo_seluruh=$jumlah_pemasukkan_seluruh['jumlah']-$jumlah_pengeluaran_seluruh['jumlah'];


 
 if (isset($_POST['submit'])) {
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
   


		$pemasukan_seluruh_periodis= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pemasukan' AND tanggal_transaksi BETWEEN '$date1' and '$date2'");
		$jumlah_pemasukkan_seluruh_periodis= mysqli_fetch_assoc($pemasukan_seluruh_periodis);
		$pengeluaran_seluruh_periodis= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pengeluaran' AND tanggal_transaksi BETWEEN '$date1' and '$date2'");
		$jumlah_pengeluaran_seluruh_periodis = mysqli_fetch_assoc($pengeluaran_seluruh_periodis);
		$saldo_seluruh_periodis=$jumlah_pemasukkan_seluruh_periodis['jumlah']-$jumlah_pengeluaran_seluruh_periodis['jumlah'];
}
   
   ?>





<html lang="en">

  
  <head>
    <script type="text/javascript" src="Chart.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!--my Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    
    <!--My CSS-->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Chart Page</title>
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #3fe1b8 ;">
        <div class="container">
        <a class="navbar-brand" href="#">Nony.ku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="../homePage/homePage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../transactionPage/menuTransaksi.php">Transaction</a>
            <a class="nav-item nav-link active" href="" >Chart</a>
            <a class="nav-item nav-link disabled" href="../loginDanRegistrasiPage/logout.php" id="logout" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
            <a class="nav-item nav-link" href=><img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/></a>
          </div>
        </div>
    
       
        
    </div>
      </nav>
    <!--Navbar akhir-->
<br>
    <center>
          <h3>Diagram Transaksi</h3>
      	<div style="width: 750px;height: 300px">
		      <canvas id="myChart"></canvas>
      	</div>
    </center>
<br>
  <div class="card mt-5">
   <div class="card-body mx-auto">
    <form method="POST" action="" class="form-inline mt-3">
     <label for="date1">Periode :</label>
	 <input type="date" name="date1" id="date1" class="form-control mr-2">
     <label for="date2">-</label>
	 <input type="date" name="date2" id="date2" class="form-control mr-2">
     <button type="submit" name="submit" class="btn btn-primary">Cari</button>
    </form>

    
   </div>
  </div>
  <br>
 
  
    <center>
          <h3>Diagram Transaksi Periodis</h3>
      	<div style="width: 750px;height: 300px">
		      <canvas id="myChartPerbulan"></canvas>
      	</div>
    </center>
       
        <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pengeluaran","Pemasukan","Saldo"],
				datasets: [{
					data: [
            <?php echo $jumlah_pengeluaran_seluruh['jumlah']?>,
            <?php echo $jumlah_pemasukkan_seluruh['jumlah']?>,
            <?php echo $saldo_seluruh?>,

            ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChartPerbulan").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pengeluaran","Pemasukan","Saldo"],
				datasets: [{
					data: [
            <?php echo $jumlah_pengeluaran_seluruh_periodis['jumlah']?>,
            <?php echo $jumlah_pemasukkan_seluruh_periodis['jumlah']?>,
            <?php echo $saldo_seluruh_periodis?>,

            ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

</body>
</html>