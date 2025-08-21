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
        body{
            font-family: 'Kollektif', sans-serif;
        }

        .login {
            background: #ffffff;
            margin: 50px auto;
            padding: 40px 80px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 50%;
            max-width: 600px;
        }

        .login h4{
            font-size: 18px;
        }

        .btnform {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
        }


        hr {
            border: 1px solid #ddd;
            margin: 10px 0;
        }

        .form-group {
            margin-bottom: 15px;
            display:flex;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        

        .form-group label {
            font-size: 16px;
            color: #333;
        }

        .submitbtn {
            width: 100%;
            background:rgb(49, 49, 49);
            color: #fff;
            border: none;
            padding: 10px 0;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-family: 'Kollektif', sans-serif;
        }

        .submitbtn:hover {
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

            .submitbtn {
                font-size: 14px;
                padding: 8px 0;
            }
        }
    </style>
</head>
    
<body>
    <div class="login">
        <h1>FORGOT PASSWORD</h1>
        <hr>
        <h4>Please enter your email address that you used when registration:</h4>
        <form action='forget-pswrd-proses.php' method= 'POST'> <!--connect login form to process -->
        <div class="form-group">
            <input type="email" name="email" placeholder="Email">
    </div>
        <br> 
        <button class="submitbtn" type="submit" name="verify">Submit</button>
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
