<?php

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $email = $password = "";

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($connect, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            
            header("location: success.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }

        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($connect);
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="./css/stylee.css">
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        .error-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #ff3333;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
        }

        .input-error {
            border: 2px solid #ff3333 !important;
        }
    </style>
</head>

<body>

    <div class="error-message" id="error-message"></div>

    <!-- Signup Form -->
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Sign Up</span>

                <form id="signup-form" action="#" method="post">
                    <div class="input-field">
                        <input type="text" id="name" placeholder="Enter your name" name="name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" class="password" name="password"
                            placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="cpassword" class="password" name="cpassword"
                            placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <span class="text">Already a member?
                        <a href="login.php" class="text login-link">Login Now</a>
                    </span>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accept all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Signup">
                    </div>

                    <div class="input-field button">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/validation.js">

    </script>
</body>

</html>