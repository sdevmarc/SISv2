<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    if ((time() - $_SESSION['last_login_timestamp']) > 200) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
        header('Location: logout.php');
        ob_end_flush();
        exit();
    } else {
        $_SESSION['last_login_timestamp'] = time();

        $username = $_SESSION['username'];
        $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_role = $row['user_role'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | Audit</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/main/css/audit.css">
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
                            <a href="/dbfiles/ias/sisv2/attendance/php/update.php">UPDATE ADMISSION</a>
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
                        AUDIT LOG
                    </div>
                </div>
                <div class="contents">
                    <div class="audit-contents">
                        <form action="" method="post">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Audit Log</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $conn = mysqli_connect("localhost", "root", "", "db_sisv2");

                                        if (!$conn) {
                                            echo "<script>alert('Database connection failed!')</script>";
                                        } else {
                                            $sql = "select * from tbl_users inner join tbl_audit_log on tbl_users.id = tbl_audit_log.id_audit_user order by date ASC";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                                <tr>
                                                    <td><?php echo $row['id_audit_user'] ?></td>
                                                    <td><?php echo $row['message'] ?></td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    } catch (Exception $e) {
                                        echo "<script>alert('Error: Error Encountered!')</script>";
                                    } finally {
                                        mysqli_close($conn);
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <script type="text/javascript" src="/dbfiles/ias/sisv2/main/js/dashboard.js"></script>
</body>

</html>

<?php
if ($user_role == 'Admin') {
    // echo "<script>alert('Welcome Admin!')</script>";
} else if ($user_role == 'Adsas') {
    echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
    echo "<script>document.querySelector('.dean-content').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
} else if ($user_role == 'Dean') {
    echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
    echo "<script>document.querySelector('.attendance-content').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
}
?>