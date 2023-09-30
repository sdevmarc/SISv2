<?php
ob_start();
date_default_timezone_set('Asia/Shanghai');
$time = time();
$currentTime = date('Y-m-d H:i:s', $time); // Format as 'YYYY-MM-DD HH:MM:SS'
$conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
    exit();
} else {
    if ((time() - $_SESSION['last_login_timestamp']) > 6) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
        header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
        ob_end_flush();
        exit();
    } else {
        $_SESSION['last_login_timestamp'] = time();

        $username = $_SESSION['username'];
        $sql = "select user_role from tbl_roles inner join tbl_users on tbl_roles.id_roles = tbl_users.id_role where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_role = $row['user_role'];

        if ($user_role == 'Adsas') {
            header("refresh:0; url=/dbfiles/ias/sisv2/main/php/error.php");
            ob_end_flush();
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | Dean</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/dean/css/search.css">
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
                            <a href="">SEARCH</a>
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
                        SEARCH
                    </div>
                </div>
                <div class="contents">
                    <div class="search-form">
                        <form action="" method="post">
                            <div class="search-box">
                                <div class="title">
                                    Search
                                </div>
                                <div class="box input-box">
                                    <input name="txtSearch" type="text" placeholder="Search" required>
                                </div>
                                <div class="buttons">
                                    <button name="btnSearch"><i class='bx bx-search-alt-2'></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="table-container">
                            <div class="table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Admission</th>
                                            <th>Date</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                            <th>Address</th>
                                            <th>Emgy. Co.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="" method="post">
                                            <?php
                                            try {
                                                $conn = mysqli_connect("localhost", "root", "", "db_sisv2");

                                                if (!$conn) {
                                                    echo "<script>alert('Database connection failed!')</script>";
                                                } else {
                                                    if (isset($_POST['btnSearch'])) {
                                                        if ((time() - $_SESSION['last_login_timestamp']) > 6) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
                                                            header('Location: /dbfiles/ias/sisv2/main/php/logout.php');
                                                            ob_end_flush();
                                                            exit();
                                                        } else {
                                                            $_SESSION['last_login_timestamp'] = time();

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
                                                            $message = '[DEAN] ' . $name . ' searched "' . $_POST['txtSearch'] . '" at ' . $currentTime;
                                                            $stmt->bind_param('iss', $id, $message, $currentTime);
                                                            $stmt->execute();
                                                            $stmt->close();

                                                            $search = $_POST['txtSearch'];
                                                            $sql = "select * from dean where lastname like '%$search%' or firstname like '%$search%' or id_number like '%$search%'";
                                                            $result = mysqli_query($conn, $sql);




                                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row['id_number'] ?></td>
                                                                    <td><?php echo $row['date_enrolled'] ?></td>
                                                                    <td><?php echo $row['lastname'] ?></td>
                                                                    <td><?php echo $row['firstname'] ?></td>
                                                                    <td><?php echo $row['middlename'] ?></td>
                                                                    <td><?php echo $row['gender'] ?></td>
                                                                    <td><?php echo $row['birthdate'] ?></td>
                                                                    <td><?php echo $row['address'] ?></td>
                                                                    <td><?php echo $row['emergency_contact'] ?></td>
                                                                    <td>
                                                                        <div class="buttons">
                                                                            <a href="update.php?id=<?php echo $row['id_number']; ?>" class='btn btnEdit' name='Edit'>Edit</a>
                                                                            <a href="delete.php?id=<?php echo $row['id_number']; ?>" class='btn btnDelete' name='Delete'>Delete</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            } catch (Exception $e) {
                                                echo "<script>alert('Error: Error Encountered!')</script>";
                                            } finally {
                                                mysqli_close($conn);
                                            }

                                            ?>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

</body>

</html>

<?php

if ($user_role == 'Admin') {
    // echo "<script>alert('Welcome Admin!')</script>";
} else if ($user_role == 'Adsas') {
    echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
    header("location: /dbfiles/ias/sisv2/main/php/error.php");
    ob_end_flush();
    exit();
} else if ($user_role == 'Dean') {
    echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
}


?>