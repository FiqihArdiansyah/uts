<?php
$conn = mysqli_connect('localhost', 'root', '', 'penjualan') or die ('gagal terhubung ke database kasihan');
$query_kelas = "select * from master_barang";
$tampil_kelas = mysqli_query($conn,$query_kelas); 
?>
<html>
<head>
    <title>tambah transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <a href="index.php">beranda</a>
    <form action="addtr.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>keterangan</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr> 
                <td>master_barang_id</td>
                <td>
					    <select name="master_barang_id" class="form-control">
					    	<option value="<?= @$id_master_barang ?>"> <?= @$nama_barang ?></option>
					    	<?php while($r=mysqli_fetch_assoc($tampil_kelas)){ ?>
					    		<option value="<?= $r['id_master_barang'] ?>"><?= $r['nama_barang'] ?></option>
					    	<?php } ?>
					    </select>
                </td>
            </tr>
            <tr> 
                <td>masuk</td>
                <td><input type="number" min="0" value="0" name="masuk">
            </td>
            </tr>
            <tr> 
                <td><input type="hidden" min="0" value="0" name="keluar"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $keterangan = $_POST['keterangan'];
        $master_barang_id = $_POST['master_barang_id'];
        $masuk = $_POST['masuk'];
        $keluar = $_POST['keluar'];
        
        // include database connection file
        include_once("config.php");
    
        $result = mysqli_query($mysqli, "INSERT INTO transaksi_barang(keterangan,master_barang_id,masuk,keluar) VALUES('$keterangan','$master_barang_id','$masuk','$keluar')");
    ?>
    <script>document.location='index.php';</script>
    <?php
    }
    ?>
</body>
</html>