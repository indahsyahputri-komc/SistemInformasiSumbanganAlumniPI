<!DOCTYPE html>
<html>

<head>
  <title>
    Halaman Sumbangan </title>
    
<!-- <div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Isi Data Sumbangan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if($this->session->flashdata('errors')):?>
<?php echo $this->session->flashdata('errors')?>
<?php endif;?>
<?php echo $this->session->flashdata('msg'); ?>
           <?php echo form_open('member/kasmasuk/simpan') ?>

              <div class="form-group">
                <label for="text">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
              </div>

              <div class="form-group">
                <label for="text">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
              </div>

              <div class="form-group">
                <label for="text">Jenis Sumbangan</label>
                <input type="text" name="jenis_sumbangan" class="form-control" placeholder="Isikan jenis sumbangan">
              </div>

              <div class="form-group">
                <label for="text">Qty</label>
                <input type="text" name="qty" class="form-control" placeholder="Isikan jumlah sumbangan">
              </div>

              <div class="form-group">
                <label for="text">Keterangan</label>
                <textarea name="keterangan" class="form-control" placeholder="Isikan Keterangan"></textarea>
              </div>

              <div class="form-group">
                <label for="text">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
              </div>

              <button type="submit" class="btn btn-md btn-success">Simpan</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button>
            <?php echo form_close() ?>
                
            <!-- /.row -->
            
            <!-- /.row -->
        </div>

        <!--BATAS ISI-->

<!--     </div> -->
    <!-- /#wrapper -->

    <!-- jQuery -->
