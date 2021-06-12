<!-- <div id="page-wrapper"> -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if($this->session->flashdata('errors')):?>
<?php echo $this->session->flashdata('errors')?>
<?php endif;?>
           <?php echo form_open('admin/anggota/update') ?>

              
              <div class="form-group">
                <label for="text">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data_anggota->nama?>">
                <input type="hidden" name="id" value="<?php echo $data_anggota->id?>" >
              </div>

              <div class="form-group">
                <label for="text">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="<?php echo $data_anggota->jabatan?>">
              </div>

              <div class="form-group">
                <label for="text">Alamat</label>
                <!-- <textarea name="alamat" class="form-control" ></textarea> -->
                <input type="text" name="alamat" class="form-control" value="<?php echo $data_anggota->alamat?>">
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
