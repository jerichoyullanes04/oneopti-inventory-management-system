<?php 
include '../includes/functions.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>One Opti Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="../img/OneOpti.png">
        <script src="..\js\script.js"></script> 
    
        <style>
        body {
            background-image: url('../img/OneOpti.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position-x: 700px;
            color: black;
        }
        </style>
    
    </head>

    <body>
        

        <div class="form-container">
            <div class="header">
                <h2>Welcome to One Opti <br>Inventory Management System!</h2>
            </div>
            <form method="post" action="login.php">

                <?php echo display_error(); ?>

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" autocomplete="current-password" required="" id="id_password" placeholder="Enter Password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
                </div>

                <script>
                        const togglePassword = document.querySelector('#togglePassword');
                        const password = document.querySelector('#id_password');

                        togglePassword.addEventListener('click', function (e) {
                            // toggle the type attribute
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                        });
                </script>
                
                <!--
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember Me</label>
                    -->

                <div class="input-group">
                    <button type="submit" class="btn" name="login_btn">Login</button>
                </div>
                <p>
                    Not yet a member? <a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
                 
                <?php
                include '../includes/footer.php';
                ?> 

    </body>
</html>

