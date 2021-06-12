<!-- <div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Kas Masuk</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if($this->session->flashdata('errors')):?>
<?php echo $this->session->flashdata('errors')?>
<?php endif;?>
           <?php echo form_open('admin/kasmasuk/update') ?>

              
              <div class="form-group">
                <label for="text">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data_kas_masuk->nama?>">
                <input type="hidden" name="id" value="<?php echo $data_kas_masuk->id?>" >
              </div>

              <div class="form-group">
                <label for="text">NIM</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $data_kas_masuk->nim?>">
                <input type="hidden" name="id" value="<?php echo $data_kas_masuk->id?>" >
              </div>

              <div class="form-group">
                <label for="text">Jenis Sumbangan</label>
                <input type="text" name="jenis_sumbangan" class="form-control" value="<?php echo $data_kas_masuk->jenis_sumbangan?>">
              </div>

              <div class="form-group">
                <label for="text">Qty</label>
                <!-- <textarea name="keterangan" class="form-control" ></textarea> -->
                <input type="text" name="qty" class="form-control" value="<?php echo $data_kas_masuk->qty ?> ">
              </div>

              <div class="form-group">
                <label for="text">Keterangan</label>
                <!-- <textarea name="keterangan" class="form-control" ></textarea> -->
                <input type="text" name="keterangan" class="form-control" value="<?php echo $data_kas_masuk->keterangan ?> ">
              </div>

              <div class="form-group">
                <label for="text">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $data_kas_masuk->email?>">
                <input type="hidden" name="status" value="0" >
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
