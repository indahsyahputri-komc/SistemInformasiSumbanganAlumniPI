<!-- <div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Transaksi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<!--             <?php echo form_open('admin/Transaksi/awal') ?> --> 
              
              <div class="form-group">
                <label for="text">Nama</label>
                <?php echo $data_kas_masuk->nama ?>
                <input type="hidden" name="id" value="<?php echo $data_kas_masuk->id?>" >
              </div>

              <div class="form-group">
                <label for="text">NIM</label>
                <?php echo $data_kas_masuk->nim ?>
                <input type="hidden" name="id" value="<?php echo $data_kas_masuk->id?>" >
              </div>

              <div class="form-group">
                <label for="text">Jenis Sumbangan</label>
                <?php echo $data_kas_masuk->jenis_sumbangan ?>
              </div>

              <div class="form-group">
                <label for="text">Qty</label>
                <!-- <textarea name="keterangan" class="form-control" ></textarea> -->
                <?php echo $data_kas_masuk->qty ?> 
              </div>

              <div class="form-group">
                <label for="text">Keterangan</label>
                <!-- <textarea name="keterangan" class="form-control" ></textarea> -->
                <?php echo $data_kas_masuk->keterangan ?> 
              </div>

              <div class="form-group">
                <label for="text">Email</label>
                <?php echo $data_kas_masuk->email?>
                <input type="hidden" name="id" value="<?php echo $data_kas_masuk->id?>" >
              </div>

             <!--  <button type="submit" class="btn btn-md btn-success">Approve</button> -->
              <!-- <button type="submit" class="btn btn-md btn-success">Cetak Bukti Transaksi</button> -->
            <?php echo form_close() ?>
                
            <!-- /.row -->
            
            <!-- /.row -->
        </div>

        <!--BATAS ISI-->

<!--     </div> -->
    <!-- /#wrapper -->

    <!-- jQuery -->
