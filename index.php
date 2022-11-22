<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result1 = mysqli_query($mysqli, "SELECT * FROM master_barang ");
$result2 = mysqli_query($mysqli, "SELECT id_transaksi_barang, nama_barang, SUM(masuk) - SUM(keluar) AS stok FROM master_barang JOIN transaksi_barang ON master_barang.id_master_barang = transaksi_barang.master_barang_id GROUP BY master_barang.id_master_barang");
?>
 
<html>
<head>    
    <title>UTS</title>
    
</head>
 
<body>
<a href="add.php"><button>Tambah Barang</button></a>
 
    <table width='80%' border=1>
 
    <tr>
    <th>nama barang</th> <th>harga</th> <th>satuan</th> <th>pengaturan</th>
    </tr>
    <?php  
    while($barang_data = mysqli_fetch_array($result1)) {         
        echo "<tr>";
        echo "<td>".$barang_data['nama_barang']."</td>";
        echo "<td>".$barang_data['harga']."</td>";
        echo "<td>".$barang_data['satuan']."</td>";    
        echo "<td><a href='edit.php?id_master_barang=$barang_data[id_master_barang]'>Edit</a> | <a href='delete.php?id_master_barang=$barang_data[id_master_barang]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    <br>
    <a href="addtr.php"><button>Barang masuk</button></a>
    <a href="exit.php"><button>Barang Keluar</button></a>
 
    <table width='80%' border=1>
 
    <tr>
    <th>nama barang</th> <th>stok</th>
    </tr>
    <?php  
    while($transaksi_data = mysqli_fetch_array($result2)) {         
        echo "<tr>";
        echo "<td>".$transaksi_data['nama_barang']."</td>";
        echo "<td>".$transaksi_data['stok']."</td>";
    }
    ?>
    </table>
</body>
</html>