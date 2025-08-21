<?php

session_start();
include ('connection.php');
include ('header.php');

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .login {
            background: #ffffff;
            margin: 50px auto;
            padding: 40px 80px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50%;
            max-width: 600px;
        }

        .btnform {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
        }

        .adminbtn {
            flex: 1;
            background:rgb(0, 0, 0);
            color: #fff;
            border: none;
            padding: 20px 30px;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-family: 'Kollektif', sans-serif;
            font-weight:bold;
        }
        .signupbtn, .loginbtn{
            flex: 1;
            background-color:rgb(93, 93, 93);
            color: #fff;
            border: none;
            padding: 20px 30px;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-family: 'Kollektif', sans-serif;
            font-weight:bold;
        }

        .signupbtn:hover, .loginbtn:hover {
            background:rgb(54, 54, 54);
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .form-group {
            margin-bottom: 15px;
            display:flex;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-group input[type="checkbox"] {
            margin: 0;
            width: 18px;
            height: 18px; /* Consistent size for the checkbox */
            margin-right: 5px;
        }

        .form-group label {
            font-size: 16px;
            color: #333;
        }

        .loginb {
            width: 100%;
            background:rgb(49, 49, 49);
            color: #fff;
            border: none;
            padding: 15px 0;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-family: 'Kollektif', sans-serif;
            font-weight:bold;
        }

        .loginb:hover {
            background:rgb(0, 0, 0);
        }

        .forgetpswrd {
            text-align:center;
            margin-top:5px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .btnform {
                flex-direction: column;
            }

            .btnform button {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 480px) {
            .login {
                padding: 20px;
            }

            .form-group input {
                padding: 8px;
                font-size: 14px;
            }

            .loginb {
                font-size: 14px;
                padding: 8px 0;
            }
        }
    </style>
</head>
    
<body>
    <div class="login">

        <div class="btnform">
            <button type="button" class="loginbtn" onclick="window.location.href='login-page.php'">LOGIN</button> <!--switch to login page-->
            <button type="button" class="signupbtn" onclick="window.location.href='signup-page.php'">SIGNUP</button> <!--switch to signup page-->
            <button type="button" class="adminbtn" onclick="window.location.href='admin-login-page.php'">ADMIN LOGIN</button> <!--switch to admin-login page-->
        </div>
        
        <hr>
        <form action='admin-login-proses.php' method= 'POST'> <!--connect login form to process -->
        <div class="form-group">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
                <input type="checkbox" id="show-password" onchange="togglePassword()">
                <label for="show-password">Show Password</label>
        </div>
        <br>
        <button class="loginb" type="submit" name="login">Login</button>
        <div class="forgetpswrd"><a href="forget-pswrd.php">Forgot Password?</a></div>

    </div>

<script>
    function togglePassword() {
    var passwordField = document.getElementById('password');
    var checkbox = document.getElementById('show-password');
    
    if (checkbox.checked) {
        // Show password
        passwordField.type = 'text';
    } else {
        // Hide password
        passwordField.type = 'password';
    }
}
</script>

</body>
</html>

<?php include('footer.php') ?>
