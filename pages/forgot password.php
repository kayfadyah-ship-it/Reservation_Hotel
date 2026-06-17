<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password</title>

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

        .forgot-container {
            width: 100%;
            max-width: 700px;
            padding: 40px;
        }

        .forgot-title {
            text-align: center;
            color: white;
            font-size: 60px;
            font-weight: 700;
        }

        .forgot-subtitle {
            text-align: center;
            color: white;
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

        .reset-btn {

            width: 100%;
            height: 55px;

            border: none;
            border-radius: 30px;

            background: #3D4A85;

            color: white;
            font-size: 18px;
            font-weight: 600;
        }

        .back-link {

            text-align: center;
            margin-top: 20px;
        }

        .back-link a {

            color: white;
            text-decoration: none;
        }

        @media(max-width:768px) {

            .forgot-title {
                font-size: 42px;
            }

            .forgot-container {
                padding: 25px;
            }

        }
    </style>

</head>

<body>

    <div class="forgot-container">

        <h1 class="forgot-title">
            Forgot Password
        </h1>

        <p class="forgot-subtitle">
            Enter your email to reset password
        </p>

        <form>

            <div class="mb-4">

                <label class="form-label">
                    Email
                </label>

                <input type="email" class="form-control" placeholder="Type your email">

            </div>

            <button type="submit" class="reset-btn">

                Send Reset Link

            </button>

        </form>

        <div class="back-link">

            <a href="login.php">
                ← Back to Login
            </a>

        </div>

    </div>

</body>

</html>