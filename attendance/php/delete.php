<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | Dean</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/attendance/css/delete.css">
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
                            <a href="/dbfiles/ias/sisv2/attendance/php/create.php">ADD ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/create.php">UPDATE ADMISSION</a>
                            <a href="">DELETE ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/create.php">AUDIT LOG</a>
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
                        DELETE ADMISSION
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
                                            <button name="delete">Delete</button>
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
                                                <button name="delete">Delete</button>
                                            </td>
                                        </tr>
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

                    </div>
                    <div class="user">
                        <div class="name">
                            Marc Edison
                        </div>
                        <div class="role">
                            <p>ADMINISTRATOR</p>
                        </div>
                    </div>
                </div>
                <div class="box-active">
                    <div class="title">
                        <p>ACTIVE</p>
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="active-names">
                        <div class="picture">

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