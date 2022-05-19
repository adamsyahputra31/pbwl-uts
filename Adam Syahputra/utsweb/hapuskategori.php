<?php
    include 'koneksi.php';
    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_katagori WHERE kategori_id = '".$_GET['id']."' ");
        echo '<script>window.location="datakategori.php"</script>'; 
    }
?>