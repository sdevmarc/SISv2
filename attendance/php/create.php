<?php ob_start();
$conn = mysqli_connect("localhost", "root", "", "db_sis"); 

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | ADSAS</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/attendance/css/create.css">
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
                            <a href="">ADD ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/update.php">UPDATE ADMISSION</a>
                        </div>
                    </div>
                    <div class="settings">
                        <div class="title">
                            SETTINGS
                        </div>
                        <div class="navSettings">
                            <a href="">AUDIT LOG</a>
                            <div class="subSettings">
                                <a href="">MANAGE USER</a>
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
                                    ID NUMBER*
                                </div>
                                <input id="idnumber" name="idnumber" placeholder="Id Number" type="text">
                                <i id="editId" class='bx bxs-edit'></i>
                            </div>
                            <div class="box birth-box">
                                <div class="title">
                                    DATE*
                                </div>
                                <input name="date" type="date">
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    TYPE*
                                </div>
                                <select name="type" id="type">
                                    <option value="Late">
                                        Late
                                    </option>
                                    <option value="Absent">
                                        Absent
                                    </option>
                                </select>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Reason
                                </div>
                                <input id="reason" name="reason" placeholder="Reason" type="text">
                                <i id="editMiddlename" class='bx bxs-edit'></i>
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    Remarks*
                                </div>
                                <select name="remarks" id="remarks">
                                    <option value="Late">
                                        Excused
                                    </option>
                                    <option value="Absent">
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

</body>

</html>

<?php
try {
    date_default_timezone_set('Asia/Shanghai');
    $time = time();
    $currentTime = date('Y-m-d H:i:s', $time); // Format as 'YYYY-MM-DD HH:MM:SS'

    if ($user_role == 'admin') {
        // echo "<script>alert('Welcome Admin!')</script>";
    } else if ($user_role == 'adsas') {
        echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        if (isset($_POST['submit'])) {
            $idnumber = $_POST['idnumber'];
            $type = $_POST['type'];
            $reason = $_POST['reason'];
            $remarks = $_POST['remarks'];
            $date = $_POST['date'];
            $dateToday = $currentTime;
    
            $conn = mysqli_connect("localhost", "root", "", "db_sis");
            $sql = "insert into dsas (id_dsas_student_no, date_admission, date,  type, reason, remarks) values (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('isssss', $idnumber,$dateToday, $date, $type, $reason, $remarks);
            $stmt->execute();
    
            $stmt->close();
            $conn->close();
            header("refresh:0; url=search.php");
            ob_end_flush();
            exit();
    } else if ($user_role == 'enroll') {
        echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
    }
    
    
    }
} catch (Exception $e) {
    echo "<script>alert('Error Encountered!')</script>";
} finally {
    mysqli_close($conn);
}
?>