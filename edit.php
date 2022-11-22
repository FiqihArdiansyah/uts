<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_master_barang = $_POST['id_master_barang'];
    
    $nama_barang=$_POST['nama_barang'];
    $harga=$_POST['harga'];
    $satuan=$_POST['satuan'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE master_barang SET nama_barang='$nama_barang',harga='$harga',satuan='$satuan' WHERE id_master_barang=$id_master_barang");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_master_barang = $_GET['id_master_barang'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM master_barang WHERE id_master_barang=$id_master_barang");
 
while($barang_data = mysqli_fetch_array($result))
{
    $nama_barang = $barang_data['nama_barang'];
    $harga = $barang_data['harga'];
    $satuan = $barang_data['satuan'];
}
?>
<html>
<head>	
    <title>Edit Barang Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <a href="index.php">beranda</a>
    <form name="update_barang" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>nama Barang</td>
                <td><input type="text" name="nama_barang" value=<?php echo $nama_barang;?>></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>satuan</td>
                <td><input type="text" name="satuan" value=<?php echo $satuan;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_master_barang" value=<?php echo $_GET['id_master_barang'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>