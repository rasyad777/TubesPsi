<!DOCTYPE html>

<?php
session_start();
include "koneksi.php";
?>

<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet" />
</head>
  <body>
    <div class="container">
      <div class="img">
        <img src="img/gbr.png" />
      </div>
      <div class="login-content">
        <form method="POST" action="">
          <h2 class="title">Silahkan Login dengan akun anda!</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              
			  <input type="text" placeholder="Email"  name="email" required>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              
			  <input type="password" placeholder="Sandi"  name="password" required>
            </div>
          </div>
          <a href="Registrasi.php">Tidak Memiliki Akun?</a>
          <input type="submit" class="btn" value="login" name="proseslog">
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <?php
            if(isset($_POST['proseslog'])){
            $sql = mysqli_query($koneksi, "select * from users where email = '$_POST[email]'
            and password = '$_POST[password]'");

            $cek = mysqli_num_rows($sql);
                if($cek > 0){
                    $_SESSION['Nama'] = $_POST['Nama'];
					          $_SESSION['email'] = $_POST['email'];
					          $_SESSION['password'] = $_POST['password'];
                    echo "<meta http-equiv=refresh content=0;URL='../homePage/homePage.php'>";
                }else{
                  echo "<p align=center><b> Username atau Password salah </b></p>";
                  echo "<meta http-equiv=refresh content=2;URL='login.php'>";
                    }
            }

        ?>
  </body>

</html>