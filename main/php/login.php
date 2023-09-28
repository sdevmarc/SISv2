<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIS | Login</title>
    <link rel="stylesheet" href="/dbfiles/ias/sisv2/main/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <div class="first">
                Saint Mary's University
            </div>
            <div class="second">
                Bayombong, Nueva Vizcaya
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="login-form">

                <form action="" method="post">
                    <div class="details">
                        <p>Unlock Your World,<br>One Login at a Time.</p>
                        <p>Welcome back, <br>Please login to your account</p>
                    </div>
                    <div class="invalid-input">
                        <i class='bx bxs-x-square'></i>
                        <p>Invalid username or password</p>
                    </div>
                    <div class="inputs">
                        <div class="box input-box">
                            <input name="username" placeholder="Username" type="text" required>
                        </div>
                        <div class="box input-box pass">
                            <div class="inp-pas">
                                <input name="password" id="password" placeholder="Password" type="password" required>
                            </div>
                            <div class="show-pas">
                                <i class='bx bx-show'></i>
                                <i class='bx bx-hide'></i>
                            </div>

                        </div>
                        <div class="buttons">
                            <button id="login" name="login">
                                Login
                            </button>
                        </div>
                        <div class="capsState">
                            <p>CapsLock is On</p>
                        </div>
                    </div>

                </form>
            </div>
            <div class="container-logo">
                <div class="details">
                    <p>Nurturing <br> Minds, <br>
                    </p>
                    <p> Shaping <br> Futures.
                    </p>
                </div>
                <!-- <img src="https://pbs.twimg.com/media/FteWD0saAAMIVVZ.jpg" alt=""> -->
            </div>
        </div>
    </section>
    <script type="text/javascript" src="/dbfiles/ias/sisv2/main/js/login.js"></script>
</body>

</html>
<?php
try {
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'db_sisv2');

    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 0;
    }

    if (isset($_POST['login'])) {
        if (!$conn) {
            echo "<script>alert('Cannot connect to database!')</script>";
        } else {


            $username = strtolower($_POST['username']);
            $password = $_POST['password'];
            $sql = "select * from tbl_users where username = '$username' and password = '$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sql = "select isactive from tbl_users where username = '$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $isactive = $row['isactive'];
                if ($isactive == 0) {
                    $sql = "select id from tbl_users where username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $id_user = $row['id'];

                    $sql = "select user_role from tbl_users inner join tbl_roles on tbl_users.id_role = tbl_roles.id_roles where username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $user_role = $row['user_role'];
                    if ($user_role == 'Admin') {
                    } else {
                        $sql = "select * from tbl_online_request where id_user = '$id_user'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            header('location: /dbfiles/ias/sisv2/main/php/pending.php');
                            exit();
                        } else {
                            $sql = "select id from tbl_users where username = '$username'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['id'];

                            $sql = "insert into tbl_online_request (id_user) values ($id)";
                            $result = mysqli_query($conn, $sql);

                            header('location: /dbfiles/ias/sisv2/main/php/pending.php');
                            exit();
                        }
                    }
                } elseif ($isactive == 1) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['last_login_timestamp'] = time();

                    $sql = "select id from tbl_users where username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];

                    header('location: /dbfiles/ias/sisv2/main/php/dashboard.php');
                    ob_end_flush();
                    exit();
                }
            } else {
                echo "<script>document.querySelector('.invalid-input').style.visibility = 'visible';</script>";
                $_SESSION['attempts']++;
                $i = $_SESSION['attempts'];
                if ($i >= 3) {
                    echo "<script>alert('Unauthorized access detected!')</script>";
                }
            }
        }
    }
} catch (Exception $e) {
    echo "Error Encountered: " . $e->getMessage() . "<br>";
} finally {
    mysqli_close($conn);
}


?>