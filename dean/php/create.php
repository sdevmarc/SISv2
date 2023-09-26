<?php ob_start();
$conn = mysqli_connect("localhost", "root", "", "db_sisv2");

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

    if ($user_role == 'adsas') {
        header("refresh:0; url=/dbfiles/ias/sisv2/main/php/error.php");
        ob_end_flush();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | Dean</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/dean/css/create.css">
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
                            <a href="">ADD ADMISSION</a>
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
                                <a href="/dbfiles/ias/sisv2/main/php/manage-user.php">MANAGE USER</a>
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
                        ADD ADMISSION
                    </div>
                </div>
                <div class="contents">
                    <div class="create-form">
                        <form action="" method="post">
                            <div class="box input-box">
                                <div class="title">
                                    Last Name*
                                </div>
                                <input name="lastname" placeholder="Lastname" type="text" required>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    First Name*
                                </div>
                                <input name="firstname" placeholder="Firstname" type="text" required>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Middle Name*
                                </div>
                                <input name="middlename" placeholder="Middlename" type="text" required>
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    Gender*
                                </div>
                                <select name="gender" id="gender">
                                    <option value="Male">
                                        Male
                                    </option>
                                    <option value="Female">
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="box birth-box">
                                <div class="title">
                                    Birthdate*
                                </div>
                                <input name="birthdate" type="date" required>
                            </div>
                            <div class="box address-box">
                                <div class="title">
                                    Address
                                </div>
                                <div class="address-input">
                                    <input name="street" placeholder="Street" type="text" required>
                                    <input name="town" placeholder="Town" type="text" required>
                                    <input name="city" placeholder="City" type="text" required>
                                </div>

                            </div>
                            <div class="box emergency-box">
                                <div class="title">
                                    Emergency Contact No.*
                                </div>
                                <input name="emergency" placeholder="Emergency" type="text" inputmode="numeric" required>
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
    <!-- <script type="text/javascript" src="/dbfiles/ias/sisv2/dean/js/create.js"></script> -->
</body>

</html>

<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "db_sisv2");
    date_default_timezone_set('Asia/Shanghai');
    $time = time();
    $currentTime = date('Y-m-d H:i:s', $time); // Format as 'YYYY-MM-DD HH:MM:SS'

    if ($user_role == 'Admin') {
        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $middlename = $_POST['middlename'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['street'] . ", " . $_POST['town'] . ", " . $_POST['city'];
            $emergency = $_POST['emergency'];

            $sql = "insert into dean (date_enrolled, lastname, firstname, middlename, gender, birthdate, address, emergency_contact) values (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('sssssssi', $currentTime, $lastname, $firstname, $middlename, $gender, $birthdate, $address, $emergency);
            $stmt->execute();
            $stmt->close();

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
            $message = '[DEAN] ' . $name . ' added a student at ' . $currentTime;
            $stmt->bind_param('iss', $id, $message, $currentTime);
            $stmt->execute();
            $stmt->close();

            header("location: /dbfiles/ias/sisv2/dean/php/search.php");
            ob_end_flush();
            exit();
        }
    } else if ($user_role == 'Adsas') {
        echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        header("refresh:0; url=/dbfiles/ias/sisv2/main/php/error.php");
        ob_end_flush();
        exit();
    } else if ($user_role == 'Dean') {
        echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $middlename = $_POST['middlename'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['street'] . ", " . $_POST['town'] . ", " . $_POST['city'];
            $emergency = $_POST['emergency'];

            $conn = mysqli_connect("localhost", "root", "", "db_sisv2");
            $sql = "insert into dean (date_enrolled, lastname, firstname, middlename, gender, birthdate, address, emergency_contact) values (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('sssssssi', $currentTime, $lastname, $firstname, $middlename, $gender, $birthdate, $address, $emergency);
            $stmt->execute();

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
            $message = $name . ' Added a student at ' . $currentTime;
            $stmt->bind_param('iss', $id, $message, $currentTime);
            $stmt->execute();
            $stmt->close();

            header("location: /dbfiles/ias/sisv2/dean/php/search.php");
            ob_end_flush();
            exit();
        }
    }
} catch (Exception $e) {
    echo "<script>alert('$e')</script>";
} finally {
    mysqli_close($conn);
}
?>