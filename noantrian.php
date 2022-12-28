<html>
    <head>
        <title>Antrian</title>
        <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="styleHome.css">
    </head>
    <body>   
        <div class="hd">
            <img src="img/dokter.png">
        <div class="btn"><a href="logout.php">Log out</a></div>
        <div class="content">
            <div class="antri">
                <div class="hd">
                    <h1>Nomor Antrian</h1>
                </div>
                <?php
                    include "koneksi.php";
                        
                    $query = "SELECT MAX(id) FROM pasien";
                    $result=mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="box">
                    <?php
                        echo $row['MAX(id)'];?>
                    <p><b>Harap tunggu hingga giliran anda tiba.</b></p>
                </div>
            </div>
        </div>
    </body>
</html>