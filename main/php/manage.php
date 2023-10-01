<?php
// include 'backup.php';
ob_start();
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
} else {
    if ((time() - $_SESSION['last_login_timestamp']) > 900) { // 900 = 15 (Minutes) * 60 (seconds) // // 6 = 0.1 * 60 // 
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
    <title>SIS | Dashboard</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/main/css/manage.css">
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
                        MANAGE USER
                    </div>
                </div>
                <div class="contents">
                    <div class="tabs">
                        <button class="btnTab active">Requests</button>
                        <button class="btnTab">Add User</button>
                        <button class="btnTab">Backup</button>
                        <button class="btnTab">Restore</button>
                    </div>
                    <div class="content-box">
                        <div class="content-tab active">
                            <div class="request-form">
                                <form action="" method="post">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            try {
                                                $conn = mysqli_connect("localhost", "root", "", "db_sisv2");

                                                if (!$conn) {
                                                    echo "<script>alert('Database connection failed!')</script>";
                                                } else {
                                                    $sql = "select id_user, username from tbl_online_request inner join tbl_users on tbl_online_request.id_user = tbl_users.id";
                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                        <tr>
                                                            <td><?php echo $row['id_user'] ?></td>
                                                            <td><?php echo $row['username'] ?></td>
                                                            <td>
                                                                <a href="/dbfiles/ias/sisv2/main/php/isactive.php?id=<?php echo $row['id_user'] ?>">Approve</a>
                                                                <a href="/dbfiles/ias/sisv2/main/php/decline.php?id=<?php echo $row['id_user'] ?>">Decline</a>
                                                            </td>
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
                        <div class="content-tab">
                            <div class="create-form">
                                <form action="" method="post">
                                    <div class="box input-box">
                                        <div class="title">
                                            Username*
                                        </div>
                                        <input name="username" placeholder="Username" type="text" required>
                                    </div>
                                    <div class="box input-box">
                                        <div class="title">
                                            Password*
                                        </div>
                                        <input name="password" placeholder="Password" type="text" required>
                                    </div>

                                    <div class="box combo-box">
                                        <div class="title">
                                            Role*
                                        </div>
                                        <select name="role" id="role">
                                            <option value="1">
                                                Admin
                                            </option>
                                            <option value="3">
                                                Adsas
                                            </option>
                                            <option value="2">
                                                Dean
                                            </option>
                                        </select>
                                    </div>
                                    <div class="buttons">
                                        <button class="cancel" name="create_cancel">Clear</button>
                                        <button class="submit" name="create_submit" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="content-tab">
                            <div class="backup-form">
                                <form action="" method="post">
                                    <div class="buttons">
                                        <button class="submit" name="bup_submit" type="submit">Backup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="content-tab">
                            <div class="restore-form">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="box input-box">
                                        <div class="title">
                                            Database Name*
                                        </div>
                                        <input name="dbName" placeholder="Database Name" type="text" required>
                                    </div>
                                    <div class="box input-box">
                                        <div class="title">
                                            File*
                                        </div>
                                        <input name="sql" placeholder="Choose a file" type="file" required>
                                    </div>
                                    <div class="buttons">
                                        <button class="cancel" name="bup_restore">Restore</button>
                                    </div>
                                </form>
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
    <script type="text/javascript" src="/dbfiles/ias/sisv2/main/js/dashboard.js"></script>
    <script type="text/javascript" src="/dbfiles/ias/sisv2/main/js/manage-user.js"></script>
</body>

</html>

<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "db_sisv2");
    if ($user_role == 'Admin') {
        if (!$conn) {
            echo "<script>alert('Database connection failed!')</script>";
        } else {
            if (isset($_POST['create_submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $encpass = md5($password);

                $isactive = 0;
                $role = $_POST['role'];
                $sql = "insert into tbl_users (username, password,isactive, id_role) values ('$username', '$encpass', '$isactive', '$role')";
                $result = mysqli_query($conn, $sql);
            } elseif (isset($_POST['bup_submit'])) {
                $backupDirectory = 'C:\Users\User\Desktop\IAS\Backup'; // Replace with your desired backup directory
                $dbName = 'db_sisv2'; // Replace with your database name
            
                // Generate a unique backup file name
                $backupFileName = $backupDirectory . '/backup_' . date('Ymd_His') . '.sql';
            
                // Execute the mysqldump command to backup all tables
                exec("mysqldump -u root -p  $dbName > $backupFileName");
            
                if (file_exists($backupFileName)) {
                    echo "<script>alert('Backup successful. File saved as $backupFileName');</script>";
                } else {
                    echo "<script>alert('Backup failed');</script>";
                }



                // backDb("localhost", "root", "", "db_sisv2");
                // exit();
            } elseif (isset($_POST['bup_restore'])) {
                $dbName = 'restore'; // Replace with your database name
                $restoreFileName = $_FILES['sql']['tmp_name']; // Temporary file path
            
                // Check if a file was uploaded
                if (empty($restoreFileName)) {
                    echo "<script>alert('Please choose a file to restore.');</script>";
                } else {
                    // Execute the mysql command to restore the database from the uploaded file
                    exec("mysql -u root -p your_mysql_password $dbName < $restoreFileName");
            
                    echo "<script>alert('Restore completed successfully.');</script>";
                }
            }
        }
    } else if ($user_role == 'Adsas') {
        echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
        echo "<script>document.querySelector('.dean-content').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
    } else if ($user_role == 'Dean') {
        echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
        echo "<script>document.querySelector('.attendance-content').style.display = 'none';</script>";
        echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Error Encountered')</script>";
} finally {
    mysqli_close($conn);
}

?>