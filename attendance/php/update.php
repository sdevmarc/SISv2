<?php
ob_start();
date_default_timezone_set('Asia/Shanghai');
$time = time();
$currentTime = date('Y-m-d H:i:s', $time); // Format as 'YYYY-MM-DD HH:MM:SS'

session_start();
$conn = mysqli_connect("localhost", "root", "", "db_sisv2");

if (!isset($_SESSION['username'])) {
    header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];

    if ($user_role == 'Dean') {
        header("refresh:0; url=/dbfiles/ias/sisv2/main/php/error.php");
        ob_end_flush();
        exit();
    } else {
        if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
            header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
            ob_end_flush();
            exit();
        } else {
            $_SESSION['last_login_timestamp'] = time();

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    echo "<script>alert('Please search first!')</script>";
                    header("Location: /dbfiles/ias/sisv2/attendance/php/search.php"); // You can create an error.php page
                    exit();
                } else {
                    $id_number = $_GET['id'];
                    $sql = "select * from dsas where id_dsas = '$id_number'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | ADSAS</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/attendance/css/update.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section>
        <div class="wrapper">
            <div class="leftbar">
                <div class="leftbar-content">
                    <div class="dashboard">
                        <a href="/dbfiles/ias/sisv2/main/php/dashboard.php">DASHBOARD</a>
                    </div>
                    <div class="dean">
                        <div class="title">
                            DEAN
                        </div>
                        <div class="navDean">
                            <a href="/dbfiles/ias/sisv2/dean/php/search.php">SEARCH</a>
                            <a href="/dbfiles/ias/sisv2/dean/php/create.php">ADD ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/dean/php/update.php">UPDATE ADMISSION</a>
                        </div>
                    </div>
                    <div class="attendance">
                        <div class="title">
                            ATTENDANCE
                        </div>
                        <div class="navAttendance">
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">SEARCH</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/create.php">ADD ADMISSION</a>
                            <a href="">UPDATE ADMISSION</a>
                        </div>
                    </div>
                    <div class="settings">
                        <div class="title">
                            SETTINGS
                        </div>
                        <div class="navSettings">
                            <a href="">MANAGE PROFILE</a>
                            <div class="subSettings">
                                <a href="/dbfiles/ias/sisv2/main/php/audit.php">AUDIT LOG</a>
                                <a href="/dbfiles/ias/sisv2/main/php/manage.php">MANAGE</a>
                                <a href="">MANAGE UI</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="design">
                    <div class="box box-1"></div>
                    <div class="box box-2"></div>
                </div>

            </div>
            <div class="container">
                <div class="header">
                    <div class="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="title">
                        UPDATE ADMISSION
                    </div>
                </div>
                <div class="contents">
                    <div class="update-form">
                        <?php
                        $id_number = $_GET['id'];
                        $sql = "select * from dsas inner join dean on dsas.id_dsas_student_no = dean.id_number where id_dsas = '$id_number'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="" method="post">
                            <div class="box birth-box">
                                <div class="title">
                                    DATE*
                                </div>
                                <input value="<?php echo $row['date'];  ?>" name="date" type="date">
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    TYPE*
                                </div>
                                <select name="type" id="type">
                                    <option value="Late" <?php if ($row['type'] == 'Late') echo 'selected'; ?>>
                                        Late
                                    </option>
                                    <option value="Absent" <?php if ($row['type'] == 'Absent') echo 'selected'; ?>>
                                        Absent
                                    </option>
                                </select>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Reason
                                </div>
                                <input value="<?php echo $row['reason'];  ?>" id="reason" name="reason" placeholder="Reason" type="text">
                                <i id="editReason" class='bx bxs-edit'></i>
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    Remarks*
                                </div>
                                <select name="remarks" id="remarks">
                                    <option value="Excused" <?php if ($row['remarks'] == 'Excused') echo 'selected'; ?>>
                                        Excused
                                    </option>
                                    <option value="Unexcused" <?php if ($row['remarks'] == 'Unexcused') echo 'selected'; ?>>
                                        Unexcused
                                    </option>
                                </select>
                            </div>
                            <div class="buttons">
                                <button class="cancel" name="cancel">Clear</button>
                                <button class="submit" name="submit" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div class="rightbar">
                <div class="header">
                    <div class="picture">
                        <div class="inside">

                        </div>
                    </div>
                    <div class="user">
                        <div class="name">
                            Marc Edison
                        </div>
                        <div class="role">
                            <p>ADMINISTRATOR</p>
                        </div>
                    </div>
                    <div class="logout-button">
                        <a href="/dbfiles/ias/sisv2/main/php/logout.php">Logout</a>
                    </div>
                </div>
                <div class="box-active">
                    <div class="title">
                        <p>ACTIVE</p>
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="active-names">
                        <div class="picture">
                            <div class="inside">

                            </div>
                        </div>
                        <div class="name-role">
                            <div class="name">
                                Jose Rizal
                            </div>
                            <div class="role">
                                STAFF
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script type="text/javascript" src="/dbfiles/ias/sisv2/attendance/js/update.js"></script>
</body>

</html>

<?php

try {
    if ($user_role == 'Admin') {
        if (isset($_POST['submit'])) {
            if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
                header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
                ob_end_flush();
                exit();
            } else {
                $_SESSION['last_login_timestamp'] = time();

                $id = $_GET['id'];
                $date = $_POST['date'];
                $type = $_POST['type'];
                $reason = $_POST['reason'];
                $remarks = $_POST['remarks'];
                $conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

                $sql = "update dean SET date = '$date',
                type ='$type', reason = '$reason',
                remarks = '$remarks' where id_dsas_student_no = '$id_number'";
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
                $message = '[ADSAS] ' . $name . ' updated a student at ' . $currentTime;
                $stmt->bind_param('iss', $id, $message, $currentTime);
                $stmt->execute();
                $stmt->close();

                header("refresh:0; url=/dbfiles/ias/sisv2/attendance/php/update.php");
                ob_end_flush();
                exit();
            }
        } else if (isset($_POST['cancel'])) {
            if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
                header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
                ob_end_flush();
                exit();
            } else {
                $_SESSION['last_login_timestamp'] = time();

                header("refresh:0; url=/dbfiles/ias/sisv2/attendance/php/update.php");
                ob_end_flush();
                exit();
            }
        }
    } else if ($user_role == 'Adsas') {
        echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        if (isset($_POST['submit'])) {
            if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
                header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
                ob_end_flush();
                exit();
            } else {
                $_SESSION['last_login_timestamp'] = time();

                $id = $_GET['id'];
                $date = $_POST['date'];
                $type = $_POST['type'];
                $reason = $_POST['reason'];
                $remarks = $_POST['remarks'];
                $conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

                $sql = "update dean SET date = '$date',
            type ='$type', reason = '$reason',
            remarks = '$remarks' where id_dsas_student_no = '$id_number'";
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
                $message = '[ADSAS] ' . $name . ' updated a student at ' . $currentTime;
                $stmt->bind_param('iss', $id, $message, $currentTime);
                $stmt->execute();
                $stmt->close();

                header("refresh:0; url=/dbfiles/ias/sisv2/attendance/php/update.php");
                ob_end_flush();
                exit();
            }
        } else if (isset($_POST['cancel'])) {
            if ((time() - $_SESSION['last_login_timestamp']) > 100) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
                header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
                ob_end_flush();
                exit();
            } else {
                $_SESSION['last_login_timestamp'] = time();

                header("refresh:0; url=/dbfiles/ias/sisv2/attendance/php/update.php");
                ob_end_flush();
                exit();
            }
        }
    } else if ($user_role == 'Dean') {
        echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        header("location: /dbfiles/ias/sisv2/main/php/error.php");
        ob_end_flush();
        exit();
    }
} catch (Exception $e) {
    echo "<script>slert('Error Encountered!')</script>";
}
if (isset($_POST['submit'])) {
    mysqli_close($conn);
}

?>