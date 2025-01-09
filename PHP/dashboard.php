<?php
   session_start();
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
            <h3>Dasboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?> Di Toko Ini</h4>
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