<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id_master_barang = $_GET['id_master_barang'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM master_barang WHERE id_master_barang=$id_master_barang");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>