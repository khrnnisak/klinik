<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM pasien ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE nama like '%".$search_value."%'";
    $sql .= " OR alamat like '%".$search_value."%'";
    $sql .= " OR jenisKelamin like '%".$search_value."%'";
    $sql .= " OR telepon like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
    $sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  ".$start.", ".$length;
}   

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['nama'];
    $sub_array[] = $row['alamat'];
    $sub_array[] = $row['jenisKelamin'];
    $sub_array[] = $row['telepon'];
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
    $data[] = $sub_array;
}

$output = array(
    'draw'=> intval($_POST['draw']),
    'recordsTotal' =>$count_rows ,
    'recordsFiltered'=>   $total_all_rows,
    'data'=>$data,
);
echo  json_encode($output);


