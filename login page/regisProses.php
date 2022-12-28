<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
    include "koneksi.php";

    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    $sql = "INSERT INTO user(username, email, password)
            VALUES('$username', '$email', '$password')";

    if(mysqli_query($connect, $sql)){
        ?>
    <script language="JavaScript">
        alert('Pendaftaran berhasil! Silahkan masuk kembali');
    document.location='index.php';
    </script>
        <?php
    }else{
        ?>
    <script language="JavaScript">
        alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
        document.location='index.php';
    </script>
        <?php
        }
        mysqli_close($connect);
    ?>
</body>
</html>
