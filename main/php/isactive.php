<?php
try {
    ob_start();
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "db_sisv2");
    if (!isset($_SESSION['username'])) {
        header('Location: logout.php');
        exit();
    } else {
        $username = $_SESSION['username'];
        $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_role = $row['user_role'];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                echo "<script>alert('Please search first!')</script>";
                header("Location: /dbfiles/ias/sisv2/main/php/error.php"); // You can create an error.php page
                exit();
            } else {
                if ($user_role == 'Admin') {
                    $id = $_GET['id'];
                    $sql = "update tbl_users set isactive = 1 where id = '$id'";
                    $result = mysqli_query($conn, $sql);

                    $sql = "delete from tbl_online_request where id_user = '$id'";
                    $result = mysqli_query($conn, $sql);

                    header("refresh:0; url=/dbfiles/ias/sisv2/main/php/manage.php");
                    ob_end_flush();
                    exit();
                } else if ($user_role == 'Adsas') {
                    echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
                    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
                    header("location: /dbfiles/ias/sisv2/main/php/error.php");
                    ob_end_flush();
                    exit();
                } else if ($user_role == 'Dean') {
                    echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
                    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
                    header("location: /dbfiles/ias/sisv2/main/php/error.php");
                    ob_end_flush();
                    exit();
                }
            }
        }
    }
} catch (Exception $e) {
    echo "<script>slert('Error Encountered!')</script>";
}
finally {
    mysqli_close($conn);
}
?>