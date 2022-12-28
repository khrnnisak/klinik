<?php 
include('connection.php');
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenisKelamin = $_POST['jenisKelamin'];
$telepon = $_POST['telepon'];
$id = $_POST['id'];

$sql = "UPDATE `pegawai` SET  `nama`='$nama' , `alamat`= '$alamat', 
`jenisKelamin`='$jenisKelamin',  `telepon`='$telepon' WHERE id='$id' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
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

