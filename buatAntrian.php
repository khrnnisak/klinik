
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
        <title>Dokter THT</title>
        <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="styleHome.css">
        <link href="pasien/css/bootstrap5.0.1.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="pasien/css/datatables-1.10.25.min.css"/>
        
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
    <div class="hd">
        <img src="img/dokter.png">
        <div class="btn"><a href="logout.php">Log out</a></div>
    </div>
  <div class="container-fluid">
  <h2 class="text-center">Jadwal Dokter THT</h2>
    <p class="datatable design text-center">Klinik Kita Bersama</p>
       </div>
       <div class="container">
            <div class="tabel">
                <table class="table table-bordered tabel-striped table-hover">
                    <tr class="table-info">
                        <th>Nama Dokter</th>
                        <th>Hari Praktek</th>
                        <th>Jam Praktek</th>
                        
                    </tr>
                    <?php
                        include "koneksi.php";

                        $query = "SELECT d.namaDokter, j.hari, j.jampraktek 
                                    FROM jadwal j 
                                    INNER JOIN dokter d on d.id = j.idDokter 
                                    WHERE d.spesialis = 'THT';";
                        $result=mysqli_query($connect, $query);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $i = 1;
                    ?>
                    <tr>
                        
                        <td> <?php echo $row["namaDokter"] ?></td>
                        <td> <?php echo $row["hari"] ?></td>
                        <td> <?php echo $row["jampraktek"] ?></td>
                    </tr>
                    <?php
                            }
                        }else{
                        }
                    ?>
                </table>
                <div class="row">
                  <div class="container">
                    <div class="btnAdd">
                    <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal"   class="btn btn-success btn-sm" >Buat Antrian</a> </div>
                  </div>
                </div>
              </div>
        </div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="pasien/js/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
<script src="pasien/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" src="pasien/js/dt-1.10.25datatables.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'pasien/fetch_data.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[5],
          'orderable' :false,
        }]
      });
    } );
    $(document).on('submit','#addUser',function(e){
      e.preventDefault();
      var telepon= $('#addTeleponField').val();
      var nama= $('#addUserField').val();
      var jenisKelamin= $('#addJenisKelaminField').val();
      var alamat= $('#addAlamatField').val();
      if(telepon != '' && nama != '' && jenisKelamin != '' && alamat != '' )
      {
       $.ajax({
         url:"add_user.php",
         type:"post",
         data:{telepon:telepon,nama:nama,jenisKelamin:jenisKelamin,alamat:alamat},
         success:function(data)
         {
           var json = JSON.parse(data);
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#example').DataTable();
            mytable.draw();
            $('#addUserModal').modal('hide');
          }
          else
          {
            alert('failed');
          }
        }
      });
     }
     else {
      alert('Fill all the required fields');
    }
  });
 </script>

<!-- Add user Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addUser" action="">
          <div class="mb-3 row">
            <label for="addUserField" class="col-md-3 form-label">Nama</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addUserField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addAlamatField" class="col-md-3 form-label">Alamat</label>
            <div class="col-md-9">
              <input type="alamat" class="form-control" id="addAlamatField" name="alamat">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addJenisKelaminField" class="col-md-3 form-label">JenisKelamin</label>
            <div class="col-md-9">
              <input type="radio" name="jenisKelamin" id="addJenisKelaminField" value="Laki-laki"> Laki-laki<br>
              <input type="radio" name="jenisKelamin" id="addJenisKelaminField" value="Perempuan"> Perempuan<br>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addTeleponField" class="col-md-3 form-label">Telepon</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addTeleponField" name="Telepon">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="footer">
            <p>Copyright Klinik Kita Bersama</p>
</div>
</body>
</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>