<?php 
 
include 'koneksi.php';
 error_reporting(0);
session_start();
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
            <li><a href="profil.php">Profile</a></li>
            <li><a href="datakategori.php">Category</a></li>
            <li><a href="dataproduk.php">Product</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </header>
     <!-- content -->
    <div class="section">
        <div class="container">
        <h3>Add Data Order</h3>
        <div class="box">
          <form action="" method="POST" >
            <select name="product" class="input-control" required>
                <option value="">--Choose--</option>
                <?php
                    $product = mysqli_query($conn, "SELECT * FROM tb_produk ORDER BY produk_id DESC");
                    while($r = mysqli_fetch_array($product)){    
                ?>
                <option value="<?php echo $r['produk_id'] ?>"><?php echo $r['namaproduk'] ?></option>
                <?php } ?>
            </select>
            <input type="number" name="jumlah" placeholder="Jumlah Barang" class="input-control" required>
            <textarea name="keterangan" class="input-control" placeholder="keterangan"></textarea>
          <input type="submit" name="submit" value="Submit" class="btn" >
        </form>
        <?php
            if(isset($_POST['submit'])){
              //menampung inputan dari form
                $product = $_POST['product'];
                $jumlah = $_POST['jumlah'];
                $keterangan = $_POST['keterangan'];
                $insert = mysqli_query($conn, "INSERT INTO tb_order VALUES(
                    null,
                    '".$product."',
                     '".$jumlah."',
                     '".$keterangan."'
                    )");
            }
            if($insert){
                echo '<script>alert("Add Data Successfully")</script>';
                echo '<script>window.location="order.php"</script>';
            }else{
                echo mysqli_error($conn);
            }
        ?>
        </div>
        </div>
    </div>
    
     <!-- footer -->
     <footer>
         <div class="container">
             <small>Copyright &copy; 2022 - The Miracle TD </small>
         </div>
     </footer>
</body>
</html>