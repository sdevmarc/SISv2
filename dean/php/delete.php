<?php
$conn = mysqli_connect("localhost", "root", "", "db_sisv2");
date_default_timezone_set('Asia/Shanghai');
$time = time();
$currentTime = date('Y-m-d H:i:s', $time); // Format as 'YYYY-MM-DD HH:MM:SS'

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /dbfiles/ias/sisv2/main.php/logout.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];

    if ($user_role == 'Admin') {
        if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
            header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
            ob_end_flush();
            exit();
        } else {
            $_SESSION['last_login_timestamp'] = time();

            $id = $_GET['id'];
            $sql = "delete from dean where id_number = '$id'";
            $result = mysqli_query($conn, $sql);

            $sql = "select * from tbl_users where username = ?";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "insert into tbl_audit_log (id_audit_user, message, date) values (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $name = strtoupper($username);
            $message = '[DEAN] ' . $name . ' deleted a student at ' . $currentTime;
            $stmt->bind_param('iss', $id, $message, $currentTime);
            $stmt->execute();
            $stmt->close();

            header("location:search.php");
            exit();
        }
    } else if ($user_role == 'Adsas') {
        header("location: /dbfiles/ias/sisv2/main/php/error.php");
        exit();
    } else if ($user_role == 'Dean') {
        if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
            header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
            ob_end_flush();
            exit();
        } else {
            $_SESSION['last_login_timestamp'] = time();
            
            $id = $_GET['id'];
            $sql = "delete from dean where id_number = '$id'";
            $result = mysqli_query($conn, $sql);

            $sql = "select * from tbl_users where username = ?";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "insert into tbl_audit_log (id_audit_user, message, date) values (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $name = strtoupper($username);
            $message = '[DEAN] ' . $name . ' deleted a student at ' . $currentTime;
            $stmt->bind_param('iss', $id, $message, $currentTime);
            $stmt->execute();
            $stmt->close();

            header("location:search.php");
            exit();
        }
    }
}
