<?php
    include "koneksi.php";

    $id = $_GET['id'];
    $query = "DELETE FROM dokter WHERE id='$id'";
    $result=mysqli_query($connect, $query);

    if($result){
        echo "<script> 
                    alert('Data berhasil dihapus');
                    document.location.href = 'dataDokter.php';
                </script>
            "; 
    }else{
        echo "<script> 
                    alert('Proses gagal, silahkan coba lagi');
                    document.location.href = 'dataDokter.php';
                </script>
                "  . mysqli_error($connect);
    }
?>