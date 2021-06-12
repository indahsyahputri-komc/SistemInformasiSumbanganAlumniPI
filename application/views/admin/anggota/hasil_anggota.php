
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
<!-- </div>
<div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Anggota</h1>
                    <a href="<?php echo base_url();?>admin/anggota/tambah" class="btn btn-info btn-md">
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
        if($anggota->num_rows() > 0) {
        ?>
         <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td>ID.</td>
                    <td>Nama</td>
                    <td>Jabatan</td>
                    <td>Alamat</td>
                    <td>Option</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            // $no=0;
                foreach($anggota->result_array() as $i):
                   
                    // $no++;
                    $id=$i['id'];
                    $nama=$i['nama'];
                    $jabatan=$i['jabatan'];
                    $alamat=$i['alamat'];
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $jabatan;?></td>
                <td><?php echo $alamat;?></td>
                <td style="width: 150px;">
                    <a class="btn btn-md btn-info" href="<?php echo base_url('admin/anggota/edit/'.$i['id']);?>">Edit</a>
                    <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $id;?>" id="#modal_hapus"> Hapus</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <?php 
        foreach($anggota->result_array() as $row):
            $id=$row['id'];
            $nama=$row['nama'];
            $jabatan=$row['jabatan'];
            $alamat=$row['alamat'];
        ?>
     <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/anggota/hapus'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus data <b><?php echo $nama;?></b>?</p>
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