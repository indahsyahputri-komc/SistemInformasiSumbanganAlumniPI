<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
/*            width: 850px;*/

		}
		table td {
			word-wrap:break-word;
            font-size: 12px;
            height: 40px;
            text-align: center;
            width: 100px;
		}
        table th{
            text-align: center;
        }
	</style>
</head>
<body>
    <!-- <b><?php echo $ket; ?></b><br /><br /> -->
    
    <b><h2 align="center">Bukti Transaksi</h2></b>
    <p align="justify" style="font-size: 12px;">Bukti transaksi ini menerangkan bahwa data dibawah ini : </p>
    <br>
 
	<table border="0" cellpadding="10px" align="left" cellspacing="10px">
	<tr>
<!-- 		<th>No</th> -->
		<th>Nama</th>
		<th width="150px">NIM</th>
		<th>Jenis Sumbangan</th>
		<th>Jumlah</th>
		<th width="200px">Keterangan</th>
		<th>Email</th>
	</tr>

    <?php
    if( ! empty($kas_masuk)){
    	// $no = 1;
    	// foreach($kas_masuk as $data){
     //        // $tanggal = date('d-m-Y', strtotime($data->tanggal));

    	// 	echo "<tr>";
    	// 	// echo "<td>".$tanggal."</td>";
    	// 	echo "<td>".$data->nama."</td>";
    	// 	echo "<td>".$data->nim."</td>";
    	// 	echo "<td>".$data->jenis_sumbangan."</td>";
    	// 	echo "<td>".$data->qty."</td>";
    	// 	echo "<td>".$data->keterangan."</td>";
    	// 	echo "<td>".$data->email."</td>";
    	// 	echo "</tr>";
    	// 	$no++;
    	foreach($kas_masuk->result_array() as $data){
            // $tanggal = date('d-m-Y', strtotime($data->tanggal));
            
            echo "<tr>";
            // echo "<td>".$tanggal."</td>";
            // echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nim']."</td>";
            echo "<td>".$data['jenis_sumbangan']."</td>";
            echo "<td>".$data['qty']."</td>";
            echo "<td>".$data['keterangan']."</td>";
            echo "<td>".$data['email']."</td>";
            echo "</tr>";
            // $no++;
        
    	}
    }
    ?>
	</table>
    <br>
    <p align="justify" style="font-size: 12px; ">Benar telah melakukan sumbangan kepada Teknologi Informasi Universitas Sumatera Utara pada :</p>
<?php
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

echo "Tanggal : ";
echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

echo "<br>";

?>
<?php echo "Penerima : ";?>
<?php echo $this->session->userdata('first_name'); ?> <?php echo $this->session->userdata('last_name'); ?>
	
<br>
<p align="justify" style="font-size: 12px;">Terima Kasih Atas Sumbangan Anda. </p>
<br>
<table align="right">
    <tr>
        <td align="center">Medan, <?php echo tgl_indo(date('Y-m-d'));?></td>
    </tr>
    <!-- <tr>
        <td></td>
    </tr> -->
    <tr>
        <td>ttd.</td>
    </tr>
    <!-- <tr>
        <td></td>
    </tr> -->
    <tr>
        <td>
            <?php echo $this->session->userdata('first_name'); ?> <?php echo $this->session->userdata('last_name'); ?>
        </td>
    </tr>
</table>
</body>
</html>
