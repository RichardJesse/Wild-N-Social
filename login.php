<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve login credentials
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE password = ?";
    if ($stmt = mysqli_prepare($connect, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                header("location: success.php");
                exit();
            } else {
                echo "Invalid email or password. Please try again.";
            }
        } else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/stylee.css">
         
    <title>Login</title> 
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
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form  id="signup-form" action="#" method="post">
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="signup.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            
    </div>

     <script src="script.js"></script> 
     <script src="./js/validation.js"></script>
</body>
</html>