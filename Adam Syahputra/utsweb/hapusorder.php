<?php
    include 'koneksi.php';
    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_order WHERE order_id = '".$_GET['id']."' ");
        echo '<script>window.location="order.php"</script>'; 
    }
?>