<?php
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] !== true){
        echo '<script>window.location="login.php"</script>';
        error_reporting(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>The Miracle of Shoes</title>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">The Miracle of Shoes</a></h1>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="datakategori.php">Category</a></li>
            <li><a href="dataproduk.php">Product</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </header>
     <!-- content -->
    <div class="section">
        <div class="container">
        <h3>Dashboard</h3>
        <div class="box">
            <h4 style="text-align : center">Welcome <?php echo $_SESSION['a_global']->username ?> To The Miracle of Shoes</h4>
            <p style="text-align : center">Please take a look our product</p>
            <img src="kolek.jpg" align-items="center" width="1050px" height="500px">
        </div>
        </div>
    </div>
    
     <!-- footer -->
     <footer>
         <div class="container">
             <small>Copyright &copy; 2022 - Miracle of TD </small>
         </div>
     </footer>
</body>
</html>