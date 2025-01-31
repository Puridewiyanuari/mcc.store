<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login | MCC STORE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
</head>

<body id="bg-Login">
    <div class="box-Login">
        <img src="img/MCC.PNG" width="100px">
        <hr>
        <h2>Login Admin</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="username" class="input-control">
            <input type="password" name="pass" placeholder="password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <p class="lgn"><a href="index.php">← Kembali ke Beranda</a></p>
        <?php
            if(isset($_POST['submit'])) {
                session_start();
                include 'db.php';
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM my_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0) {
                 $d = mysqli_fetch_object($cek);
                  $_SESSION['status_login'] = true;
                  $_SESSION['a_global'] = $d;
                  $_SESSION['id'] = $d->admin_id;
                    echo '<script>window.location="dashboard.php"</script>';

                }else{
                echo '<script>alert("username atau password Anda Salah!")</script>';
            }
            }
            ?>

    </div>
</body>

</html>