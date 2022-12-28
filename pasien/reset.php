<?php
    include "../koneksi.php";

    
    $query = "TRUNCATE TABLE pasien";
    $result=mysqli_query($connect, $query);

    if($result){
        echo "<script> 
                    alert('Data berhasil direset');
                    document.location.href = 'index.php';
                </script>
            "; 
    }else{
        echo "<script> 
                    alert('Proses gagal, silahkan coba lagi');
                    document.location.href = 'index.php';
                </script>
                "  . mysqli_error($connect);
    }
?>