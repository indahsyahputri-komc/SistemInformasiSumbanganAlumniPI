
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
<!-- <script>
function myFunction() {
    var x = document.getElementById("Btn");
    x.disabled = true;

}

// (function() {
//     // $('form > input#cek').keyup(function() {
//     //     var empty = false;
//     //     $('form > input').each(function() {
//     //         if ($(this).val() == '') {
//     //             empty = true;
//     //         }
//     //     });

        
//     });
// // })
// ()

</script> -->
<body>
<!-- </div>
<div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sumbangan</h1>
                    <a href="<?php echo base_url();?>admin/kasmasuk/tambah" class="btn btn-info btn-md">
                    <span class="glyphicon glyphicon-plus"></span> Tambah
                </a>
<!-- </div> -->
    <!-- /#wrapper -->
                <!-- /.col-lg-12 -->
            </div>
<div class="col-lg-12 ">
    <?php echo $this->session->flashdata('notif') ?>
        <h4><!-- <?php echo $title; ?></h4><hr class="line-title"> -->
        <?php 
        if($kas_masuk->num_rows() > 0) {
        ?>
         <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>NIM</td>
                <td>Jenis Sumbangan</td>
                <td>Qty</td>
                <td>Keterangan</td>
                <td>Email</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($kas_masuk->result_array() as $i):
                    $id=$i['id'];
                    $nama=$i['nama'];
                    $nim=$i['nim'];
                    $jenis_sumbangan=$i['jenis_sumbangan'];
                    $qty=$i['qty'];
                    $keterangan=$i['keterangan'];
                    $email=$i['email'];
                    $status=$i['status'];
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $nim;?></td>
                <td><?php echo $jenis_sumbangan;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $keterangan;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $status;?></td>

                <td style="width: 200px;">
                    <a class="btn btn-md btn-success" href="<?php echo base_url('admin/kasmasuk/detail/'.$i['id']);?>">Detail</a>
                    <a class="btn btn-md btn-info" href="<?php echo base_url('admin/kasmasuk/edit/'.$i['id']);?>">Edit</a>
                    <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $id;?>" id="#modal_hapus"> Hapus</a>
                    <a class="btn btn-md btn-warning" id="cek" onclick="myFunction2()"  href="<?php echo base_url('admin/Transaksi/awal/'.$i['id']);?>" <?php if($i['status'] == "0"){echo "disabled='disabled'";} ?>>Cetak</a>
                    <!-- <button class="btn btn-md btn-primary" type="button" id="Btn" onclick="myFunction()" <?php if($i['status'] == "1"){echo "disabled='disabled'";} ?> >Approve</button> -->
                    <a class="btn btn-md btn-primary" <?php if($i['status'] == "1"){echo "disabled='disabled'";} ?> <?php echo $id;?> href="<?php echo base_url('admin/kasmasuk/status_verifikasi/'.$i['id']);?>">Approve</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <?php 
        foreach($kas_masuk->result_array() as $row):
            $id=$row['id'];
            $nama=$row['nama'];
            $nim=$row['nim'];
            $jenis_sumbangan=$row['jenis_sumbangan'];
            $qty=$row['qty'];
            $keterangan=$row['keterangan'];
            $email=$row['email'];
        ?>
     <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kasmasuk/hapus'?>">
                <div class="modal-body">
                    <!-- <p>Anda yakin mau menghapus data tanggal <b><?php echo $tanggal;?></b>?</p> -->
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
        <?php
        echo "$pagination";

        }else{
            echo "Maaf data belum ada";    
        }
        ?>

        

    </div>
</div>
</body>

</html>