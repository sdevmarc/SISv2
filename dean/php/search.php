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
                            <a href="/dbfiles/ias/sisv2/dean/php/delete.php">DELETE ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/dean/php/audit.php">AUDIT LOG</a>
                        </div>
                    </div>
                    <div class="attendance">
                        <div class="title">
                            ATTENDANCE
                        </div>
                        <div class="navAttendance">
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">SEARCH</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">ADD ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">UPDATE ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">DELETE ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/search.php">AUDIT LOG</a>
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
                                    <input type="text" placeholder="Search" required>
                                </div>
                                <div class="buttons">
                                    <button name="search"><i class='bx bx-search-alt-2'></i></button>
                                </div>
                            </div>
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
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "db_sis");

                                        if (!$conn) {
                                            echo "<script>alert('Database connection failed!')</script>";
                                        } else {
                                            $sql = "select * from enroll";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "
                                                        <tr>
                                                            <td>$row[id_number]</td>
                                                            <td>$row[date_enrolled]</td>
                                                            <td>$row[lastname]</td>
                                                            <td>$row[firstname]</td>
                                                            <td>$row[middlename]</td>
                                                            <td>$row[gender]</td>
                                                            <td>$row[birthdate]</td>
                                                            <td>$row[address]</td>
                                                            <td>$row[emergency_contact]</td>
                                                            <td>
                                                                <button class='btn btnEdit' name='Edit'>Edit</button>
                                                            </td>
                                                        </tr>

                                                            ";
                                                        }
                                                    }
                                                    ?>
<!-- 

                                        <tr>
                                            <td>This</td>
                                            <td>is</td>
                                            <td>A</td>
                                            <td>Test</td>
                                            <td>Data</td>
                                            <td>Table</td>
                                            <td>Ok</td>
                                            <td>Test</td>
                                            <td>This</td>
                                            <td>
                                                <button name="Edit">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>This</td>
                                            <td>is</td>
                                            <td>A</td>
                                            <td>Test</td>
                                            <td>Data</td>
                                            <td>Table</td>
                                            <td>Ok</td>
                                            <td>Test</td>
                                            <td>This</td>
                                            <td>
                                                <button name="Edit">Edit</button>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
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