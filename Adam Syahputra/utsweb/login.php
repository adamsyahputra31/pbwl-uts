<?php 
if (isset($_POST['login'])) {
session_start();
error_reporting(0);
include 'koneksi.php';
$user = $_POST['username'];
$pass = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".$pass."'");
if(mysqli_num_rows($cek) > 0){
    $d = mysqli_fetch_object($cek);
    $_SESSION['status_login'] = true;
    $_SESSION['a_global'] = $d;
    $_SESSION['id'] = $d->admin_id;
    echo '<script>window.location="index.php"</script>';
}else{
    echo '<script>alert("Username atau Password Anda Salah!")</script>';
}
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body id ="bg-login">
    <div class="box-login">
        <h2>The Miracle of Shoes</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" class="input-control">
            <input type="password" name="password" placeholder="password" class="input-control">
            <input type="submit" name="login" value="login" class="btn">
        </form>
    </div>
</body>
</html>