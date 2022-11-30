<?php
require "koneksi.php";
session_start();
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "admin" && $password == "admin123"){
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $result["nama"];
        $_SESSION['username'] = $result['username'];
        $_SESSION['role'] = 'admin';
        echo "
        <script>
            document.location.href = 'beranda-admin.php';
        </script>
        ";
    }else{
        $query = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
        $result = mysqli_fetch_assoc($query);
        $username = $result['username'];
        if(password_verify($password,$result['password'])){
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['nama'] = $result["nama"];
            $_SESSION['username'] = $result['username'];
            $_SESSION['role'] = 'user';
            echo "
            <script>
                alert('Selamat Datang $username');
                document.location.href = 'beranda.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Username dan Password Salah');
                document.location.href = 'login.php';
            </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Form Login</title>
</head>
<body>
    <div class="header">
        <div class="nama-header"><a href="index.php" style="text-decoration: none;">Laundry Express</a></div>
        <div class="list-header">
            <ul>
                <li><button id="switch"><img src="images/night-mode.png" width="50px" height="50px"></button></li>
            </ul>  
        </div>
    </div>
    <div class="loginBox">
        <div class="login">
            <center>
                <div class="coba-login"><center><img src="images/log-in.png" width="200px" height="150px"></center></div>
                <form action="" method="post">
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" class="login-item"> <br> <br>
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" class="login-item"> <br> <br>
                <p>Belum punya akun ? <a href="regis.php" style="text-decoration: none;">Daftar</a></p> <br> <br>
                <input type="submit" name="submit" value="LOGIN" class="button-login">
                </form>
            </center>
        </div>
    </div>
    <script src="javascript/jquery.js"></script>
</body>
</html>