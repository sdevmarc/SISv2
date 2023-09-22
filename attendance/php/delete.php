<?php
$conn = mysqli_connect("localhost","root","","db_sis");

$id = $_GET['id'];
$sql = "delete from dsas where id_dsas = '$id'";
$result = mysqli_query($conn,$sql);
echo "<script>alert('Record Deleted');</script>";
header("location:search.php");
exit();



?>