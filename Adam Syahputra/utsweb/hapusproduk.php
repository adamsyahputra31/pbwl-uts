<?php
    include 'koneksi.php';
    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
        echo '<script>window.location="dataproduk.php"</script>'; 
    }
?>