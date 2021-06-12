<!DOCTYPE html>

<html>

  <head>

    <title>Kirim Email</title>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <form action="<?php echo base_url('index.php/Sendemail/kirimemail') ?>" method="post" enctype="multipart/form-data">

          <div style="margin-top: 15%;" class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="text-center">
                    <h1 style="color:white" class="h3 mb-4 mt-4"> Message</h1>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="form-group">
                      <label for="pesan" style="color:black">Pesan Anda :</label>
                      <textarea class="form-control" name="pesan" rows="6" style="width:100%"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="form-group ">
                      <label for="username" style="padding-left:1px;color:black">Ketikan Email Anda</label>
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Email Anda..." name="email" value="<?php echo set_value('username') ?>">
                      <br>
                      <input type="file" style="height:45px" class="form-control form-control-user" id="" name="uploaded_file">
                    </div>
                    <button type="submit" style="background:#0099ff !important;border-color:#0099ff !important" class="btn btn-primary btn-user btn-block shadow">
                      Kirim Sekarang
                    </button>
                    <br>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>