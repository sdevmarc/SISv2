<?php
try {
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];

    if ($user_role == 'Admin') {
        session_unset();
        session_destroy();
        header('location: /dbfiles/ias/sisv2/main/php/login.php');
        exit();
    } else if ($user_role == 'Adsas') {
        $sql = "update tbl_users set isactive = 0 where username = '$username'";
        $result = mysqli_query($conn, $sql);

        session_unset();
        session_destroy();
        header('location: /dbfiles/ias/sisv2/main/php/login.php');
        exit();
    } else if ($user_role == 'Dean') {
        $sql = "update tbl_users set isactive = 0 where username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        session_unset();
        session_destroy();
        header('location: /dbfiles/ias/sisv2/main/php/login.php');
        exit();
    }
} catch (Exception $e) {
    header('location: /dbfiles/ias/sisv2/main/php/login.php');
    exit();
} finally {
    mysqli_close($conn);
}





?>