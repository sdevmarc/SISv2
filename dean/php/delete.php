<?php
$conn = mysqli_connect("localhost","root","","db_sis");

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    $id = $_GET['id'];
    $sql = "delete from enroll where id_number = '$id'";
    $result = mysqli_query($conn,$sql);
    echo "<script>alert('Record Deleted');</script>";
    header("location:search.php");
    exit();
}
?>