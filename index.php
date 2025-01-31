<?php
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
                <li>
                    <p>|</p>
                </li>
                <li><a href="login.php">Login</a></li>
    </header>

    <!--Search-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>
    <hr>
    <!--Category-->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php 
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if(mysqli_num_rows($kategori) > 0){
                    while($k = mysqli_fetch_array($kategori)){
                ?>
                <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                    <div class="col-5">
                        <img src="img/ikon-kategori.png" width="50px" style="margin-bottom:5px; margin-top:10px;">
                        <p><?php echo $k['category_name'] ?></p>
                    </div>
                </a>
                <?php }}else{?>
                <p>Kategori Tidak Ada</p>
                <?php }?>
            </div>
        </div>
        <!--Product-->
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
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

    <!--Footer-->
    <div class="footer">
        <div class="container">
            <img src="img/MCC.png" alt="">
            <p>📌 Creative Center, Jl. Suha, Majalengka Wetan, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45411
            </p>
            <p>📧 Ekrafmjl@gmail.com</p>
            <p>☎️ +62 823 120 016 95</p>
        </div>
        <img src="img/indo.svg" alt="" class="imgf">
        <hr>
        <div class="ft"><small>Copyright &copy; 2024 - Majalengka Creative Center Store.</small></div>
    </div>
</body>

</html>