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
        <h3>Order Data</h3>
        <div class="box">
            <p><a href="tambahorder.php">Add Order</a></p>
           <table border="1" cellspacing="0" class="table">
               <thead>
                   <tr>
                       <th width="60px">No</th>
                       <th>Product Code</th>
                       <th>Count Product</th>
                       <th>Information</th>
                       <th width="150px">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   $no = 1;
                   $order = mysqli_query($conn, "SELECT * FROM tb_order ORDER BY order_id DESC");
                   if(mysqli_num_rows($order) > 0){
                   while($row = mysqli_fetch_array($order)){
                   ?>
                   <tr>
                       <td><?php echo $no++ ?></td>
                       <td>KHR-<?php echo $row['produk_id'] ?></td>
                       <td><?php echo $row['jumlahbarang']?> pcs</td>
                       <td><?php echo $row['keterangan'] ?></td>

                       <td>
                           <a href="editorder.php?id=<?php echo $row['order_id'] ?>"> Edit</a> || 
                           <a href="hapusorder.php?id=<?php echo $row['order_id'] ?>" onclick= "return confirm('hapus data ini?')" >Delete</a>                      
                        </td>
                   </tr>
                   <?php }}else{ ?>
                       <tr>
                       <td colspan="8"> Data is Empty </td>
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