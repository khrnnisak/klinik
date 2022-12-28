<?php
    include "koneksi.php";

    $id = $_GET['idPegawai'];
    $query = "DELETE FROM pegawai WHERE id='$id'";
    $result=mysqli_query($connect, $query);

    if($result){
        echo "<script> 
                    alert('Data berhasil dihapus');
                    document.location.href = 'dataPegawai.php';
                </script>
            "; 
    }else{
        echo "<script> 
                    alert('Proses gagal, silahkan coba lagi');
                    document.location.href = 'dataPegawai.php';
                </script>
                "  . mysqli_error($connect);
    }
?>