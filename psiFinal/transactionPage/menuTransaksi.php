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
    <link rel="stylesheet" href="css/style.css">

    <title>Transaction Page</title>
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
          <a class="nav-item nav-link " href="../homePage/homePage.php">Home</a>
          <a class="nav-item nav-link active" href="../transactionPage/menuTransaksi.php">Transaction<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="../chartPage/chartPage.php" >Chart</a>
          <a class="nav-item nav-link disabled" href="../loginDanRegistrasiPage/logout.php" id="logout" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
          <a class="nav-item nav-link" href=><img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/></a>
          </div>
        </div>
    </div>
      </nav>
    <!--Navbar akhir-->

    <section class="jumbotron">
        <div class="containero">
  <!-- <center><button style=background-color:#67BDE8>Update</button>
          <button style=background-color:#67BDE8>Hapus</button>
          <button style=background-color:#67BDE8>Tambah</button></center> -->
  
          <p id="teksHP"><img class="imgHP" src="images/book.png">Catatan Transaksi</p>
          <br>
          <a href="tambahTransaksi.php" class="tbl-hijauHP">+ Tambah Transaksi</a>
          <br><br>    
          <table border="5" cellpadding="10" width="100%" align = "center">
          <!-- <table class="tableHP"> -->
          <!-- <thead> -->
            <tr class="tr-head" align = "center" >
              <td bgcolor="#14C38E">No</td>
              <td bgcolor="#14C38E">Status</td>
              <td bgcolor="#14C38E">Tanggal Transaksi</td>
              <td bgcolor="#14C38E">Saldo</td>
              <td bgcolor="#14C38E">Deskripsi</td>
              <td colspan="2" bgcolor="#14C38E">Aksi</td>
          <!-- </thead> -->
            </tr>
          <!-- <tbody> -->

            <?php
            include "koneksi.php";
            include "../loginDanRegistrasiPage/session.php";

            $ambildatatransaksi = mysqli_query($koneksi,"select * from transaksi");
            $transaksi = mysqli_query($koneksi,"select status_transaksi from transaksi");
            $pemasukan= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pemasukan'");
            $jumlah_pemasukkan = mysqli_fetch_assoc($pemasukan);
            $pengeluaran= mysqli_query($koneksi, "select SUM(saldo_transaksi) as jumlah from transaksi where status_transaksi = 'pengeluaran'");
            $jumlah_pengeluaran = mysqli_fetch_assoc($pengeluaran);

              $i=0;
            while($tampiltransaksi = mysqli_fetch_array($ambildatatransaksi)){
              $i=$i+1;
              echo "
                
                <tr>
                    <td data-label='No'>$i</td>
                    <td data-label='Status'>$tampiltransaksi[status_transaksi]</td>
                    <td data-label='Tanggal Transaksi'>$tampiltransaksi[tanggal_transaksi]</td>
                    <td data-label='Saldo Transaksi'>$tampiltransaksi[saldo_transaksi]</td>
                    <td data-label='Deskripsi'>$tampiltransaksi[deskripsi_transaksi]</td>
                    <td data-label='Hapus'>
                    <div class='d-grid gap-1'style='text-align:center;'>
                    <a href='?kodetransaksi=$tampiltransaksi[id_transaksi]'>
                    <button class='btn btn-primary me-md-2' type='button'>Hapus</button></a>
                    <a href='ubahTransaksi.php?kodetransaksi=$tampiltransaksi[id_transaksi]'>
                    <button class='btn btn-primary' type='button'>Edit</button></a>
                    </div>
                    </td>
                </tr>";
                

            }
            $saldo=$jumlah_pemasukkan['jumlah']-$jumlah_pengeluaran['jumlah'];
                echo"<tr>
                        <td> Pemasukan : </td>
                        <td> Rp $jumlah_pemasukkan[jumlah]</td>
                        <td> Pengeluaran : </td>
                        <td> Rp $jumlah_pengeluaran[jumlah]</td>
                        <td> Saldo : </td>
                        <td> Rp $saldo</td>
                      </tr>"
                    
            ?>
        <!-- </tbody> -->
        </table>
      
        <?php
        include "koneksi.php";

        if(isset($_GET['kodetransaksi'])){
        mysqli_query($koneksi,"delete  from transaksi where id_transaksi='$_GET[kodetransaksi]'");
    
        echo "Data berhasil dihapus";
        echo "<meta http-equiv=refresh content=2;URL='menuTransaksi.php'>";

          }
        ?>
        <div class="card mt-5">
   <div class="card-body mx-auto">

   <form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal">
			<input type="submit" value="FILTER">
		  </form>
  

    
   </div>
  </div>
  <br>
        
      
      <table border="5" cellpadding="10" width="100%" align = "center">
          <!-- <table class="tableHP"> -->
          <!-- <thead> -->
            <tr class="tr-head" align = "center" >
              <td bgcolor="#14C38E">No</td>
              <td bgcolor="#14C38E">Status</td>
              <td bgcolor="#14C38E">Tanggal Transaksi</td>
              <td bgcolor="#14C38E">Saldo</td>
              <td bgcolor="#14C38E">Deskripsi</td>

          <!-- </thead> -->
            </tr>
          <!-- <tbody> -->

            <?php
            include "koneksi.php";
            
            if(isset($_GET['tanggal'])){
              $tgl = $_GET['tanggal'];
              $ambildatatransaksi  = mysqli_query($koneksi,"select * from transaksi where tanggal_transaksi='$tgl'");
            

              $i=0;
            while($tampiltransaksi = mysqli_fetch_array($ambildatatransaksi)){
              $i=$i+1;
              echo "
                
                <tr>
                    <td data-label='No'>$i</td>
                    <td data-label='Status'>$tampiltransaksi[status_transaksi]</td>
                    <td data-label='Tanggal Transaksi'>$tampiltransaksi[tanggal_transaksi]</td>
                    <td data-label='Saldo Transaksi'>$tampiltransaksi[saldo_transaksi]</td>
                    <td data-label='Deskripsi'>$tampiltransaksi[deskripsi_transaksi]</td>
                    
                </tr>";
            }
                

            }
            

                    
            ?>
        <!-- </tbody> -->
        </table>
        <br>
     
    </section>
        
    
      </div>
    </section> 
  </body>
<</html>
            