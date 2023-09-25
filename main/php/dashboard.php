<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

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
    <title>SIS | Dashboard</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/main/css/dashboard.css">
</head>

<body>
    <section>
        <div class="wrapper">
            <div class="leftbar">
                <div class="leftbar-content">
                    <div class="dashboard">
                        <a href="">DASHBOARD</a>
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
                            <a href="/dbfiles/ias/sisv2/main/php/audit.php">AUDIT LOG</a>
                            <div class="subSettings">
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
                        OVERVIEW
                    </div>
                </div>
                <div class="contents">
                    <div class="attendance-content">
                        <div class="analysis">
                            <div class="title">
                                <h1>DAILY STUDENT ATTENDANCE ANALYSIS</h1>
                            </div>

                            <div class="analysis-content">
                                <div class="analysis-title">
                                    <h1>ADMISSIONS</h1>
                                </div>
                                <div class="analysis-progress">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number">
                                                119
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#222222" />
                                                <stop offset="100%" stop-color="#222222" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="other-analysis">
                            <div class="late">
                                <div class="title">
                                    <h1>LATE ADMISSIONS</h1>
                                </div>
                                <div class="progress">
                                    test
                                </div>
                            </div>
                            <div class="absent">
                                <div class="title">
                                    <h1>ABSENT ADMISSIONS</h1>
                                </div>
                                <div class="progress">
                                    test
                                </div>
                            </div>
                            <div class="excused">
                                <div class="title">
                                    <h1>EXCUSED ADMISSIONS</h1>
                                </div>
                                <div class="progress">
                                    test
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dean-content">
                        <div class="analysis">
                            <div class="title">
                                <h1>YEARLY STUDENT ENROLLED ANALYTICS</h1>
                            </div>

                            <div class="analysis-content">
                                <div class="analysis-title">
                                    <h1>ADMISSIONS</h1>
                                </div>
                                <div class="analysis-progress">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number">
                                                119
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#222222" />
                                                <stop offset="100%" stop-color="#222222" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="other-analysis">
                            <div class="late">
                                <div class="title">
                                    <h1>REGULAR STUDENTS</h1>
                                </div>
                                <div class="progress">
                                    test
                                </div>
                            </div>
                            <div class="absent">
                                <div class="title">
                                    <h1>IRREGULAR STUDENTS</h1>
                                </div>
                                <div class="progress">
                                    test
                                </div>
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
</body>

</html>

<?php
if ($user_role == 'admin') {
    // echo "<script>alert('Welcome Admin!')</script>";
} else if ($user_role == 'adsas') {
    echo "<script>document.querySelector('.dean').style.display = 'none';</script>";
    echo "<script>document.querySelector('.dean-content').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
} else if ($user_role == 'enroll') {
    echo "<script>document.querySelector('.attendance').style.display = 'none';</script>";
    echo "<script>document.querySelector('.attendance-content').style.display = 'none';</script>";
    echo "<script>document.querySelector('.subSettings').style.display = 'none';</script>";
}
?>