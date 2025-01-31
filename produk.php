<?php
error_reporting(0);
include 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCC STORE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="countainer">
            <h1><a href="index.php">MCC STORE</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
    </header>

    <!--Search-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>
    <!--Product-->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                if($_GET['search'] != '' || $_GET['kat'] != ''){
                    $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                }
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                            while($p = mysqli_fetch_array($produk)){
                    ?>
                <a href="detail-produk.php?id=<?php echo $p['product_id'] ?> ">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?> ">
                        <p class="nama"><?php echo $p['product_name'] ?></p>
                        <p class="harga">Rp. <?php echo number_format($p['product_price'])  ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>

    <!--Footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p>Creative Center, Jl. Suha, Majalengka Wetan, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45411</p>
            <h4>Email</h4>
            <p>Ekrafmjl@gmail.com</p>
            <h4>No. Telp</h4>
            <p>+62 823 120 016 95</p>
            <small>Copyright &copy; 2024 - Majalengka Creative Center Store.</small>
        </div>
    </div>
</body>

</html>