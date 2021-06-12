<body>
    <h2>Data Kas Masuk</h2><hr>

   
    
    <b><?php echo $ket; ?></b><br /><br />

    <!-- <a class="btn btn-md btn-success" href="<?php echo base_url();?>admin/Transaksi/cetak/" > <span class="glyphicon glyphicon-print"></span> Cetak PDF</a> -->



    <!-- <table border="1" cellpadding="8"> -->
        <div class="table-responsive ">
        <table class="table table-striped table-bordered table-hover">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jenis Sumbangan</th>
        <th>Qty</th>
        <th>Keterangan</th>
        <th>Email</th>
    </tr>
    <?php
    if( ! empty($kas_masuk)){
        // $no = 1;
        // foreach($kas_masuk as $data)
        foreach($kas_masuk->result_array() as $data){
            // $tanggal = date('d-m-Y', strtotime($data->tanggal));
            
            echo "<tr>";
            // echo "<td>".$tanggal."</td>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nim']."</td>";
            echo "<td>".$data['jenis_sumbangan']."</td>";
            echo "<td>".$data['qty']."</td>";
            echo "<td>".$data['keterangan']."</td>";
            echo "<td>".$data['email']."</td>";
            echo "</tr>";
            // $no++;
        }

        //         foreach($kas_masuk->result_array() as $data){
        //             $id=$data['id'];
        //             $nama=$data['nama'];
        //             $nim=$data['nim'];
        //             $jenis_sumbangan=$data['jenis_sumbangan'];
        //             $qty=$data['qty'];
        //             $keterangan=$data['keterangan'];
        //             $email=$data['email'];
            
        //     echo "<tr>";
        //     // echo "<td>".$tanggal."</td>";
        //     echo "<td>".$id."</td>";
        //     echo "<td>".$nama."</td>";
        //     echo "<td>".$nim."</td>";
        //     echo "<td>".$jenis_sumbangan."</td>";
        //     echo "<td>".$qty."</td>";
        //     echo "<td>".$keterangan."</td>";
        //     echo "<td>".$email."</td>";
        //     echo "</tr>";
        // }


    }

    ?>
    <a class="btn btn-md btn-success" href="<?php echo base_url('admin/Transaksi/cetak/'.$data['id']);?>">Cetak</a>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
</div>
</body>