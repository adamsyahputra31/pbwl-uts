<?php 
 
include 'koneksi.php';
session_start();
error_reporting(0);
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
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
            <li><a href="keranjang.php">Shopper</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </header>
     <!-- content -->
    <div class="section">
        <div class="container">
        <h3>Edit Product</h3>
        <div class="box">
          <form action="" method="POST" >
            <select name="kategori" class="input-control" required>
                <option value="">--Choose--</option>
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_katagori ORDER BY kategori_id DESC");
                    while($r = mysqli_fetch_array($kategori)){    
                ?>
                <option value="<?php echo $r['kategori_id'] ?>"<?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>><?php echo $r['nama_kategori'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value="<?php echo $p->namaproduk ?>" required>
            <input type="text" name="harga" placeholder="Harga" class="input-control" value="<?php echo $p->harga_produk ?>" required>
            <textarea name="deskripsi" class="input-control" placeholder="deskripsi" ><?php echo $p->deskripsi_produk ?></textarea>
          <input type="submit" name="submit" value="Submit" class="btn" >
        </form>
        <?php
            if(isset($_POST['submit'])){
                $kategori = $_POST['kategori'];
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];

                $update = mysqli_query($conn, "UPDATE tb_produk SET
                                        kategori_id = '".$kategori."',
                                        namaproduk = '".$nama."',
                                        harga_produk = '".$harga."',
                                        deskripsi_produk = '".$deskripsi."'
                                        WHERE produk_id = '".$p->produk_id."'
                                        ");
            }
            if($update){
                echo '<script>alert("Edit Data Berhasil")</script>';
                echo '<script>window.location="dataproduk.php"</script>';
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