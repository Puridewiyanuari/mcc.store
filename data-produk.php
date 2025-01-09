<?php
   session_start();
   include 'db.php';
   if($_SESSION['status_login'] !=true){
    echo '<script>window.location="login.php"</script>';
   }
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
            <h1><a href="dashboard.php">MCC STORE</a></h1>
            <ul>
                <li><a href="dashboard.php">Dasboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
    </header>
    <div class="section">
        <div class="countainer">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-Produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id)
                    ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk)>0){
                    while($row = mysqli_fetch_array($produk)){
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td><?php echo $row['product_name']?></td>
                            <td>Rp. <?php echo number_format($row['product_price'])?></td>
                            <td><a href="produk/<?php echo $row['product_image']?>" target="_blank"> <img
                                        src="produk/<?php echo $row['product_image']?>" width="60px"></a></td>
                            <td><?php echo ($row['product_status'] == 0)? 'Tidak aktif': 'Aktif'; ?></td>
                            <td>

                                <a href="edit-produk.php?id=<?php echo $row['product_id']?>">Edit </a> || <a
                                    href="proses-hapus.php?idp=<?php echo $row['product_id']?>"
                                    onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else {?>
                        <tr>
                            <td colspan="7">Tidak Ada Data</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <footer>
        <div class="countainer">
            <div class="cr">
                <small>Copyright &copy; 2024 - MCC STORE</small>
            </div>
        </div>

    </footer>
</body>

</html>