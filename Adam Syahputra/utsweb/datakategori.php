<?php
    include 'koneksi.php';
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
            <li><a href="datakategori.php">Category</a></li>
            <li><a href="dataproduk.php">Product</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </header>
     <!-- content -->
    <div class="section">
        <div class="container">
        <h3>Category</h3>
        <div class="box">
            <p><a href="tambahkategori.php">Add Category</a></p>
           <table cellspacing="0" class="table">
               <thead>
                   <tr>
                       <th width="60px">No</th>
                       <th >Category</th>
                       <th width="200px">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_katagori ORDER BY kategori_id DESC");
                    while($row = mysqli_fetch_array($kategori)){
                   ?>
                   <tr>
                       <td><?php echo $no++ ?></td>
                       <td><?php echo $row['nama_kategori'] ?></td>
                       <td>
                           <a href="editkategori.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> || 
                           <a href="hapuskategori.php?id=<?php echo $row['kategori_id'] ?>" onclick= "return confirm('Are you sure delete this data?')" >Delete</a>                      
                        </td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table> 
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