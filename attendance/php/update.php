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
                            <a href="">UPDATE ADMISSION</a>
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
                        UPDATE ADMISSION
                    </div>
                </div>
                <div class="contents">
                <div class="update-form">
                        <form action="" method="post">
                            <div class="box input-box">
                                <div class="title">
                                    Last Name*
                                </div>
                                <input id="lastname" name="lastname" placeholder="Lastname" type="text" disabled>
                                <i id="editLastname" class='bx bxs-edit'></i>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    First Name*
                                </div>
                                <input id="firstname" name="firstname" placeholder="Firstname" type="text" disabled>
                                <i id="editFirstname" class='bx bxs-edit'></i>
                            </div>
                            <div class="box input-box">
                                <div class="title">
                                    Middle Name*
                                </div>
                                <input id="middlename" name="middlename" placeholder="Middlename" type="text" disabled>
                                <i id="editMiddlename" class='bx bxs-edit'></i>
                            </div>
                            <div class="box combo-box">
                                <div class="title">
                                    Gender*
                                </div>
                                <select id="gender" name="gender" disabled>
                                    <option value="Male">
                                        Male
                                    </option>
                                    <option value="Female">
                                        Female
                                    </option>
                                </select>
                                <i id="editGender" class='bx bxs-edit'></i>
                            </div>
                            <div class="box birth-box">
                                <div class="title">
                                    Birthdate*
                                </div>
                                <input id="birthdate" name="birthdate" type="date" disabled>
                                <i id="editBirthdate" class='bx bxs-edit'></i>
                            </div>
                            <div class="box address-box">
                                <div class="title">
                                    Address
                                </div>
                                <div class="address-input">
                                    <input id="street" name="street" placeholder="Street" type="text" disabled>
                                    <input id="town" name="town" placeholder="Town" type="text" disabled>
                                    <input id="city" name="city" placeholder="City" type="text" disabled><i id="editAddress" class='bx bxs-edit'></i>
                                </div>

                            </div>
                            <div class="box emergency-box">
                                <div class="title">
                                    Emergency Contact No.*
                                </div>
                                <input id="emergency" name="emergency" placeholder="Emergency" type="text" inputmode="numeric" disabled>
                                <i id="editEmergency" class='bx bxs-edit'></i>
                            </div>
                            <div class="buttons">
                                <button class="submit" name="submit" type="submit" disabled>Save Changes</button>
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
    <script type="text/javascript" src="/dbfiles/ias/sisv2/attendance/js/update.js"></script>
</body>

</html>