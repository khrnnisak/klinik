<?php 
include('pasien/connection.php');
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
if (isset($_POST['jenisKelamin'])) {
    $jenisKelamin=$_POST['jenisKelamin'];
    $sql = "INSERT INTO `pasien` (`nama`,`alamat`,`jenisKelamin`,`telepon`) 
        values ('$nama', '$alamat', '$jenisKelamin', '$telepon' )";
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
}


if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>

