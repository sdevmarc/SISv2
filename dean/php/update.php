<?php
ob_start();
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_sis");

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $sql = "select user_role from tbl_users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_role = $row['user_role'];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "<script>alert('Please search first!')</script>";
            header("Location: /dbfiles/ias/sisv2/dean/php/search.php"); // You can create an error.php page
            exit();
        } else {
            $id_number = $_GET['id'];
            $sql = "select * from enroll where id_number = '$id_number'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/dean/css/update.css">
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
                            <a href="">UPDATE ADMISSION</a>
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
                        UPDATE ADMISSION
                    </div>
                </div>
                <div class="contents">
                    <div class="update-form">
                        <?php
                        $id_number = $_GET['id'];
                        $sql = "select * from enroll where id_number = '$id_number'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="" method="post">
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
                                    Gender*
                                </div>
                                <select id="gender" name="gender">
                                    <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>
                                        Male
                                    </option>
                                    <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>
                                        Female
                                    </option>
                                </select>
                                <i id="editGender" class='bx bxs-edit'></i>
                            </div>

                            <div class="box birth-box">
                                <div class="title">
                                    Birthdate*
                                </div>
                                <input value="<?php echo $row['birthdate'];  ?>" id="birthdate" name="birthdate" type="date">
                                <i id="editBirthdate" class='bx bxs-edit'></i>
                            </div>
                            <div class="box address-box">
                                <div class="title">
                                    Address
                                </div>
                                <div class="address-input">
                                    <input id="street" name="street" placeholder="Street" type="text">
                                    <input id="town" name="town" placeholder="Town" type="text">
                                    <input id="city" name="city" placeholder="City" type="text"><i id="editAddress" class='bx bxs-edit'></i>
                                </div>

                            </div>
                            <div class="box emergency-box">
                                <div class="title">
                                    Emergency Contact No.*
                                </div>
                                <input value="<?php echo $row['emergency_contact'];  ?>" id="emergency" name="emergency" placeholder="Emergency" type="text" inputmode="numeric">
                                <i id="editEmergency" class='bx bxs-edit'></i>
                            </div>
                            <div class="buttons">
                                <button class="cancel" name="cancel">Cancel</button>
                                <button class="submit" name="submit" type="submit">Save Changes</button>
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
    <script type="text/javascript" src="/dbfiles/ias/sisv2/dean/js/update.js"></script>
</body>

</html>

<?php

try {
    if ($user_role == 'admin') {
        // echo "<script>alert('Welcome Admin!')</script>";
    } else if ($user_role == 'adsas') {
        echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        header("location: /dbfiles/ias/sisv2/main/php/error.php");
        ob_end_flush();
        exit();
    } else if ($user_role == 'enroll') {
        echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
        if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $middlename = $_POST['middlename'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['street'] . ", " . $_POST['town'] . ", " . $_POST['city'];
            $emergency = $_POST['emergency'];
            $conn = mysqli_connect('localhost', 'root', '', 'db_sis');

            $sql = "update enroll SET lastname = '$lastname',
            firstname ='$firstname', middlename = '$middlename',
            gender = '$gender', birthdate ='$birthdate',
            address = '$address', emergency_contact = '$emergency' where id_number = '$id_number'";

            $result = mysqli_query($conn, $sql);

            header("refresh:0; url=/dbfiles/ias/sisv2/dean/php/update.php");
            ob_end_flush();
            exit();
        } else if (isset($_POST['cancel'])) {
            header("refresh:0; url=/dbfiles/ias/sisv2/dean/php/update.php");
            ob_end_flush();
            exit();
        }
    }
} catch (Exception $e) {
    echo "<script>slert('Error Encountered!')</script>";
}
if (isset($_POST['submit'])) {
    mysqli_close($conn);
}

?>