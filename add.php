<html>
<head>
    <title>tambah barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <a href="index.php">beranda</a>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>satuan</td>
                <td><input type="text" name="satuan"></td>
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
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $satuan = $_POST['satuan'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO master_barang(nama_barang,harga,satuan) VALUES('$nama_barang','$harga','$satuan')");
        
        ?>
        <script>
        document.location='index.php';
        </script>
        <?php
    }
    ?>
</body>
</html>