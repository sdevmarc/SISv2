<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "db_sis");

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
                            <a href="/dbfiles/ias/sisv2/dean/php/audit.php">AUDIT LOG</a>
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
                            <a href="/dbfiles/ias/sisv2/attendance/php/audit.php">AUDIT LOG</a>
                        </div>
                    </div>
                    <div class="settings">
                        <div class="title">
                            SETTINGS
                        </div>
                        <div class="navSettings">
                            <a href="">AUDIT LOG</a>
                            <a href="">MANAGE USER</a>
                            <a href="">MANAGE UI</a>
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
                        $sql = "select * from dsas inner join enroll on dsas.id_dsas_student_no = enroll.id_number where id_dsas = '$id_number'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="" method="post">
                            <div class="box input-box">
                                <div class="title">
                                    ID NUMBER*
                                </div>
                                <input value="<?php echo $row['id_dsas_student_no'];  ?>" id="idnumber" name="idnumber" placeholder="Id Number" type="text">
                                <i id="editFirstname" class='bx bxs-edit'></i>
                            </div>
                            <div class="box birth-box">
                                <div class="title">
                                    DATE*
                                </div>
                                <input name="birthdate" type="date">
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Last Name*
                                </div>
                                <input value="<?php echo $row['lastname'];  ?>" id="lastname" name="lastname" placeholder="Lastname" type="text">
                                <i id="editLastname" class='bx bxs-edit'></i>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    First Name*
                                </div>
                                <input value="<?php echo $row['firstname'];  ?>" id="firstname" name="firstname" placeholder="Firstname" type="text">
                                <i id="editFirstname" class='bx bxs-edit'></i>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Middle Name*
                                </div>
                                <input value="<?php echo $row['middlename'];  ?>" id="middlename" name="middlename" placeholder="Middlename" type="text">
                                <i id="editMiddlename" class='bx bxs-edit'></i>
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
                                <i id="editMiddlename" class='bx bxs-edit'></i>
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    Remarks*
                                </div>
                                <select name="remarks" id="remarks">
                                    <option value="Late" <?php if ($row['remarks'] == 'Excused') echo 'selected'; ?>>
                                        Excused
                                    </option>
                                    <option value="Absent" <?php if ($row['remarks'] == 'Unexcused') echo 'selected'; ?>>
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