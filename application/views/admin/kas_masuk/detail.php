
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- HEADER -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Latihan Passing Data</title>
  <style>
.trash{padding:2px; border:1px solid red; margin-left:10px; background-color:red; color:#fff}
td{padding:5px}
</style>
   
</head>
<script>
$('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','delete-cover.php?id='+id);
})
</script>
<body>
    <h1> Menampilkan Data</h1>

     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">

<?php echo form_open('admin/Transaksi/cetak') ?>           
            <tr>
            <!--     <td>No</td> -->
                <td>Nama</td>
                <td><strong><?php echo htmlentities($data_nama, ENT_QUOTES, 'UTF-8');?></strong></td>
              </tr>
              <tr>
                <td>NIM</td>
                <td><strong><?php echo htmlentities($data_nim, ENT_QUOTES, 'UTF-8');?></strong></td>
              </tr>
              <tr>
                <td>Jenis Sumbangan</td>
                <td><strong><?php echo htmlentities($data_jenis_sumbangan, ENT_QUOTES, 'UTF-8');?></strong></td>
              </tr>
              <tr>
                <td>Qty</td>
                <td><strong><?php echo htmlentities($data_qty, ENT_QUOTES, 'UTF-8');?></strong></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><strong><?php echo htmlentities($data_keterangan, ENT_QUOTES, 'UTF-8');?></strong></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><strong><?php echo htmlentities($data_email, ENT_QUOTES, 'UTF-8');?></strong></td>
                <!-- <td>Aksi</td> -->
            </tr>
              <!-- <button type="submit" class="btn btn-md btn-success">Approve</button> -->
              <button type="submit" class="btn btn-md btn-warning">Cetak Bukti Transaksi</button>

              <?php echo form_close() ?>
     
<!-- <tr>
<td><strong><?php echo htmlentities($data_nama, ENT_QUOTES, 'UTF-8');?></strong></td>
<td><strong><?php echo htmlentities($data_nim, ENT_QUOTES, 'UTF-8');?></strong></td>
<td><strong><?php echo htmlentities($data_jenis_sumbangan, ENT_QUOTES, 'UTF-8');?></strong></td>
<td><strong><?php echo htmlentities($data_qty, ENT_QUOTES, 'UTF-8');?></strong></td>
<td><strong><?php echo htmlentities($data_keterangan, ENT_QUOTES, 'UTF-8');?></strong></td>
<td><strong><?php echo htmlentities($data_email, ENT_QUOTES, 'UTF-8');?></strong></td>
</tr> -->
</table>

  


</body>

</html> 

