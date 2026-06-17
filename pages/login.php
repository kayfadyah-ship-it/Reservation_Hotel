<?php
session_start();
include '../includes/config.php';

$error = "";

if (isset($_POST['login'])) {

    $username = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admin
     WHERE username_admin='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data) {

        if ($password == $data['password']) {

            $_SESSION['login'] = true;
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['nama_admin'] = $data['nama_admin'];

            header("Location: home.php");
            exit();

        } else {

            $error = "Password salah!";

        }

    } else {

        $error = "Username tidak ditemukan!";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;

            background: linear-gradient(180deg,
                    #3D4A85 0%,
                    #868EB2 50%,
                    #FFFFFF 100%);

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 700px;
        }

        .login-card {
            width: 100%;
            padding: 40px;
            text-align: center;
        }

        .login-title {
            font-size: 72px;
            font-weight: 700;
            color: white;
        }

        .login-subtitle {
            color: white;
            font-size: 20px;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-label {
            color: white;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            height: 55px;
            border: none;
            border-radius: 6px;
            background: white;
        }

        .form-control::placeholder {
            color: #bdbdbd;
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid #3D4A85;
        }

        .option-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            color: white;
        }

        .option-row a {
            color: white;
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            height: 55px;

            border: none;
            border-radius: 40px;

            background: #3D4A85;
            color: white;

            font-size: 18px;
            font-weight: 600;

            transition: .3s;
        }

        .login-btn:hover {
            background: #2d3768;
        }

        .signup-text {
            margin-top: 20px;
            color: white;
            font-size: 18px;
        }

        .signup-text a {
            text-decoration: none;
            color: #214BFF;
            font-weight: 700;
        }


        @media(max-width:992px) {

            .login-container {
                max-width: 600px;
            }

            .login-title {
                font-size: 60px;
            }

        }


        @media(max-width:576px) {

            .login-card {
                padding: 20px;
            }

            .login-title {
                font-size: 42px;
            }

            .login-subtitle {
                font-size: 15px;
                margin-bottom: 25px;
            }

            .form-control {
                height: 50px;
            }

            .option-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                font-size: 14px;
            }

            .login-btn {
                height: 50px;
                font-size: 16px;
            }

            .signup-text {
                font-size: 15px;
            }

        }


        @media(max-width:375px) {

            .login-title {
                font-size: 36px;
            }

            .form-control {
                height: 45px;
            }

            .login-btn {
                height: 45px;
            }

        }
    </style>

</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <h1 class="login-title">Log In</h1>

            <p class="login-subtitle">
                Hi, Welcome back!
            </p>

            <?php if ($error != "") { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>

            <form method="POST">

                <div class="form-group">

                    <label class="form-label">
                        Username
                    </label>

                    <input type="text" name="email" class="form-control" placeholder="Masukkan username" required>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        Password
                    </label>

                    <input type="password" name="password" class="form-control" placeholder="Type here" required>

                </div>

                <div class="option-row">

                    <div>
                        <input type="checkbox">
                        Remember me
                    </div>

                    <a href="forgot password.php">
                        Forgot password?
                    </a>

                </div>

                <button type="submit" name="login" class="login-btn">

                    Log In

                </button>

            </form>

            <div class="signup-text">
                Don't have an account?
                <a href="signup.php">Sign Up</a>
            </div>

        </div>

    </div>

</body>

</html>