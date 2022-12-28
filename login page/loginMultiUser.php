<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['level']== 'admin'){
        header("location:../homeAdmin.html");
    }else if($row['level']== 'user'){
        header("location:../poli.html");
    }else{
    ?>
    <script language="JavaScript">
        alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
        document.location='index.php';
    </script>
    <?php
        }
    ?>
</body>
</html>