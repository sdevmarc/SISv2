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
                            <a href="">ADD ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/update.php">UPDATE ADMISSION</a>
                            <a href="/dbfiles/ias/sisv2/attendance/php/delete.php">DELETE ADMISSION</a>
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

</body>

</html>