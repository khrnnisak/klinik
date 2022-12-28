<?php include('connection.php');?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
        <title>Daftar Pasien</title>
        <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="styleHome.css">
        <link href="css/bootstrap5.0.1.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css"/>
        
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
        <img src="../img/dokter.png">
        <div class="btn"><a href="../logout.php">Log out</a></div>
    </div>
  <div class="container-fluid">
    <h2 class="text-center">Data Pasien</h2>
    <p class="datatable design text-center">Klinik Kita Bersama</p>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
         <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal"   class="btn btn-success btn-sm" >Tambah Pasien</a>
         <a href="reset.php" class="btn btn-success btn-sm" >Reset</a>
       </div>
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
         <table id="example" class="table">
          <thead>
            <th>Id</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Options</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="js/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
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
          'url':'fetch_data.php',
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
    $(document).on('submit','#updateUser',function(e){
      e.preventDefault();
       //var tr = $(this).closest('tr');
       var telepon= $('#teleponField').val();
       var nama= $('#nameField').val();
       var jenisKelamin= $('#jenisKelaminField').val();
       var alamat= $('#alamatField').val();
       var trid= $('#trid').val();
       var id= $('#id').val();
       if(telepon != '' && nama != '' && jenisKelamin != '' && alamat != '' )
       {
         $.ajax({
           url:"update_user.php",
           type:"post",
           data:{telepon:telepon,nama:nama,jenisKelamin:jenisKelamin,alamat:alamat,id:id},
           success:function(data)
           {
             var json = JSON.parse(data);
             var status = json.status;
             if(status=='true')
             {
              table =$('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(nama);
              // table.cell(parseInt(trid) - 1,2).data(alamat);
              // table.cell(parseInt(trid) - 1,3).data(jenisKelamin);
              // table.cell(parseInt(trid) - 1,4).data(telepon);
              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' +id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='"+trid+"']");
              row.row("[id='" + trid + "']").data([id,nama,alamat,jenisKelamin,telepon,button]);
              $('#exampleModal').modal('hide');
            }
            else
            {
              alert('failed');
            }
          }
        });
       }
       else {
        alert('Harap isi semua data');
      }
    });
    $('#example').on('click','.editbtn ',function(event){
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#exampleModal').modal('show');

     $.ajax({
      url:"get_single_data.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#nameField').val(json.nama);
       $('#alamatField').val(json.alamat);
       $('#jenisKelaminField').val(json.jenisKelamin);
       $('#teleponField').val(json.telepon);
       $('#id').val(id);
       $('#trid').val(trid);
     }
   })
   });

    $(document).on('click','.deleteBtn',function(event){
       var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Apakah Anda yakin ingin menghapus data ini ? "))
      {
      $.ajax({
        url:"delete_user.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
            //table.fnDeleteRow( table.$('#' + id)[0] );
             //$("#example tbody").find(id).remove();
             //table.row($(this).closest("tr")) .remove();
             $("#"+id).closest('tr').remove();
          }
          else
          {
            alert('Failed');
            return;
          }
        }
      });
      }
      else
      {
        return null;
      }


    })
 </script>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateUser" action="update_user.php">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="nameField" class="col-md-3 form-label">Nama</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamatField" class="col-md-3 form-label">Alamat</label>
            <div class="col-md-9">
              <input type="alamat" class="form-control" id="alamatField" name="alamat">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jenisKelaminField" class="col-md-3 form-label">JenisKelamin</label>
            <div class="col-md-9">
              <select name="jenisKelamin" id="jenisKelaminField">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              
            </div>
          </div>
          <div class="mb-3 row">
            <label for="teleponField" class="col-md-3 form-label">Telepon</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="teleponField" name="Telepon">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Add user Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addUser" action="add_user.php">
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
            <select name="jenisKelamin" id="addJenisKelaminField">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addTeleponField" class="col-md-3 form-label">Telepon</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addTeleponField" name="Telepon">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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