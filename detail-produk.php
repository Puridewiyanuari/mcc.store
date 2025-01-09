<?php
error_reporting(0);
include 'db.php';

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'" );
$p = mysqli_fetch_object($produk);
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
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!--Product Detail-->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="50%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price)  ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo $p->product_description ?></p>
                    <p><a href="https://api.whatsapp.com/send?phone=++6281390668479&text=Hai, Saya tertarik dengan produk Anda."
                            target="_blank">Hubungi
                            via WhatsApp
                            <img src="img/WA.JPG" width="50px">
                        </a></p>
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