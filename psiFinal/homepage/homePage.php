<?php
 include "../loginDanRegistrasiPage/koneksi.php";
 include "../loginDanRegistrasiPage/session.php";

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



?>



<!doctype html>
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

    <title>HomePage</title>
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
            <a class="nav-item nav-link active" href="../homePage/homePage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../transactionPage/menuTransaksi.php">Transaction</a>
            <a class="nav-item nav-link" href="../chartPage/chartPage.php" >Chart</a>
            <a class="nav-item nav-link disabled" href="../loginDanRegistrasiPage/logout.php" id="logout" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
            <a class="nav-item nav-link" href=><img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/>

            </a>
          </div>
        </div>
    </div>
      </nav>
    <!--Navbar akhir-->

    <!--Tabel-->
    <div class="container">
      <div class="row">
        <div class="logo"><img src="gbr.png" alt="logo" width=520px; height=500px;></div>
        <div class="kolom">
          <p id="selamat"><b>Selamat datang <label id="user"></label> di Nony.ku </b></p>
                <h3>Pembukuan keuangan UKM-mu dengan mudah dan efisien </h3>
                <p>
          <p>
                   <table id = "tabelInfo">
                        <tr height = "50px">
                            <td><b>Pemasukan</b></td>
                            <td><b> :</b></td>
                            <td><b> Rp <?php echo "$jumlah_pemasukkan[jumlah]"?></b></td>
                          </tr>
                          <tr height = "50px">
                            <td><b>Pengeluaran</td>
                            <td><b> :</b></td>
                            <td><b>Rp <?php echo "$jumlah_pengeluaran[jumlah]"?></b></td>
                          </tr>
                          <tr height = "50px">
                            <td><b>Saldo</b></td>
                            <td><b> :</b></td>
                            <td><b>Rp <?php echo "$saldo"?></b></td>
                    </table>
                </p> 
                <!--footer-->
                <footer>Copyright© <a href="?">Nony.Ku</a> - 2022</footer>
  
        </div>
        
    </div>
   
   

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>