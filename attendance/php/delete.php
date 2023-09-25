<?php
$conn = mysqli_connect("localhost","root","","db_sisv2");

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];

    if ($user_role == 'Admin') {
        $id = $_GET['id'];
        $sql = "delete from dsas where id_dsas = '$id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Record Deleted');</script>";
        header("location:search.php");
        exit();
    } else if ($user_role == 'Adsas') {
        $id = $_GET['id'];
        $sql = "delete from dsas where id_dsas = '$id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Record Deleted');</script>";
        header("location:search.php");
        exit();
    } else if ($user_role == 'Dean') {
        header("location: /dbfiles/ias/sisv2/main/php/error.php");
        exit();
    } 
}
?>

