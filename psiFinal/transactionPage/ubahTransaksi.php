<!DOCTYPE html>

<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"select * from transaksi where id_transaksi='$_GET[kodetransaksi]'");
$data=mysqli_fetch_array($sql);

?>

<html lang="en">

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nony.Ku</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="css/style_TE.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">

</head>
<body>
	<!-- main -->
    <div class="container">
		<div class="container-left">
		  <img src="images/g10.png" >

	    </div>
		<div class="container-right">
		  <h2>Ubah Transaksi</h2>
          <form action="" method="POST">
            <div class="input">
                <label for="status">Status</label>
                <select id="status" name="status_transaksi">
                    <option value="pengeluaran">Pengeluaran</option>
                    <option value="pemasukan">Pemasukan</option>
                </select>
                <br>
                <label>Tanggal Transaksi</label>
				<input type="date" name="tanggal_transaksi" required="" value="<?php echo $data['tanggal_transaksi'] ?>">
                <input type="text" name="saldo_transaksi" placeholder="Saldo Transaksi" required="" value="<?php echo $data['saldo_transaksi'] ?>">
                <br>
                <label for="deskripsi">Deskripsi</label>
                <textarea cols="60" rows="10" id="deskripsi" name="deskripsi_transaksi"><?php echo $data['deskripsi_transaksi'] ?></textarea>
            </div>		  	
            <input class="tbl-TE" type="submit" value="simpan" name="prosesubah">
            <a href="menuTransaksi.php"><input class="tbl-TE btn-back" type="button" value="kembali" name="kembali"></a>
            <br>
        </form>
        <br>
        
        <?php
        include "koneksi.php";

        if(isset($_POST['prosesubah'])){
            mysqli_query($koneksi, "update transaksi set  
            status_transaksi = '$_POST[status_transaksi]',
            tanggal_transaksi = '$_POST[tanggal_transaksi]',
            deskripsi_transaksi = '$_POST[deskripsi_transaksi]',
            saldo_transaksi = '$_POST[saldo_transaksi]'
            where id_transaksi='$_GET[kodetransaksi]'");

            echo "Data transaksi telah diubah";
            echo "<meta http-equiv=refresh content=1;URL='menuTransaksi.php'>";
        }

        ?>
    </div>
</body>
</html>