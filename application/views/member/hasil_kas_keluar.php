
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
                    <h1 class="page-header">Dashboard</h1>
                    <!-- <a href="http://localhost/pdf_imk_fix/index.php/kaskeluar/tambah" class="btn btn-info btn-md">
                    <span class="glyphicon glyphicon-plus"></span> Tambah
                </a> -->
<!-- </div> -->
    <!-- /#wrapper -->
                <!-- /.col-lg-12 -->
            </div>
<div class="col-lg-12 ">
        <h4><!-- <?php echo $title; ?></h4><hr class="line-title"> -->
        <?php 
        if($kas_keluar->num_rows() > 0) {
        ?>
         <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td>No Kwitansi</td>
                <td>Tanggal</td>
                <td>Jumlah Uang</td>
                <td>Keterangan</td>
                <!-- <td>Aksi</td> -->
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($kas_keluar->result_array() as $i):
                    $no_kwitansi=$i['no_kwitansi'];
                    $tanggal=$i['tanggal'];
                    $jlh_uang=$i['jlh_uang'];
                    $keterangan=$i['keterangan'];
            ?>
            <tr>
                <td><?php echo $no_kwitansi;?></td>
                <td><?php echo $tanggal;?></td>
                <td><?php echo $jlh_uang;?></td>
                <td><?php echo $keterangan;?></td>
                <!-- <td style="width: 150px;">
                    <a class="btn btn-md btn-info" href="<?php //echo base_url('index.php/kaskeluar/edit/'.$i['no_kwitansi']);?>">Edit</a>
                    <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $no_kwitansi;?>" id="#modal_hapus"> Hapus</a>
                </td> -->
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <?php 
        foreach($kas_keluar->result_array() as $row):
            $no_kwitansi=$row['no_kwitansi'];
            $tanggal=$row['tanggal'];
            $jlh_uang=$row['jlh_uang'];
            $keterangan=$row['keterangan'];
        ?>
     <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $no_kwitansi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/kaskeluar/hapus'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $tanggal;?></b>?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="no_kwitansi" value="<?php echo $no_kwitansi;?>">
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