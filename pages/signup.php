<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>

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
                    #868EB2 55%,
                    #FFFFFF 100%);

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-container {
            width: 100%;
            max-width: 700px;
            padding: 40px;
        }

        .signup-title {
            text-align: center;
            font-size: 72px;
            color: white;
            font-weight: 700;
        }

        .signup-subtitle {
            text-align: center;
            color: white;
            font-size: 20px;
            margin-bottom: 40px;
        }

        .form-label {
            color: white;
            font-weight: 600;
        }

        .form-control {
            height: 55px;
            border: none;
            border-radius: 8px;
        }

        .signup-btn {

            width: 100%;
            height: 55px;

            border: none;
            border-radius: 30px;

            background: #3D4A85;

            color: white;
            font-size: 20px;
            font-weight: 600;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        .login-link a {
            color: #214BFF;
            font-weight: 700;
            text-decoration: none;
        }

        @media(max-width:768px) {

            .signup-title {
                font-size: 48px;
            }

            .signup-container {
                padding: 25px;
            }

        }
    </style>

</head>

<body>

    <div class="signup-container">

        <h1 class="signup-title">
            Sign Up
        </h1>

        <p class="signup-subtitle">
            Create your account
        </p>

        <form>

            <div class="mb-3">
                <label class="form-label">
                    Full Name
                </label>

                <input type="text" class="form-control" placeholder="Type here">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Email
                </label>

                <input type="email" class="form-control" placeholder="Type here">
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Password
                </label>

                <input type="password" class="form-control" placeholder="Type here">
            </div>

            <button type="submit" class="signup-btn">
                Sign Up
            </button>

        </form>

        <div class="login-link">

            Already have an account?

            <a href="login.php">
                Log In
            </a>

        </div>

    </div>

</body>

</html>