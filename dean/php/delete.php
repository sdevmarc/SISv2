<?php
$conn = mysqli_connect("localhost","root","","db_sis");

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];
    
    if ($user_role == 'admin') {
        // echo "<script>alert('Welcome Admin!')</script>";
    } else if ($user_role == 'adsas') {
        header('Location: /dbfiles/ias/sisv2/main/php/dashboard.php');
        exit();
    } else if ($user_role == 'enroll') {
        $id = $_GET['id'];
        $sql = "delete from enroll where id_number = '$id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Record Deleted');</script>";
        header("location:search.php");
        exit();
    } 
}
?>