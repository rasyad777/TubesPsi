<!DOCTYPE html>
<html>
  <head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <div class="container">
      <div class="img">
        <img src="img/gbr.png" />
      </div>
      <div class="login-content">
      <form method="POST" action="">
          <h2 class="title">Registrasi akun anda disini!</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <input class="input" type="text" name="Nama" placeholder="Nama" required=""/>
            </div>
          </div>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <input class="input" type="email" name="email" placeholder="Email" required=""/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input class="input" type="password" name="password" placeholder="Sandi" required="">
            </div>
          </div>
          <a href="login.php">Sudah Memiliki Akun?</a>
          <input type="submit" class="btn" value="Registrasi" name="prosesreg">
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <?php
            include "koneksi.php";

            if(isset($_POST['prosesreg'])){
                mysqli_query($koneksi, "insert into users set
                Nama = '$_POST[Nama]',
                email = '$_POST[email]',
                password = '$_POST[password]'");
    
                echo "<meta http-equiv=refresh content=2;URL='login.php'>";
            }
        ?>
  </body>
 

</html>

