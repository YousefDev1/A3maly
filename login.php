<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="files/pro/css/pro.css">
    <link rel="stylesheet" href="layout/css/login.css">
    <?php
        require "init.php";

    ?>
    <title>Login</title>
</head>
<body>
    
<?php

    session_start();
    if(@$_SESSION['u_id']){
        header('location: index');
    }else{
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $errors = array();

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if(empty($email) || empty($password)){
                $errors[] = "Fields can't be empty";
            }

            $select_users = getData('*', 'users', 'WHERE', "email='$email'");
            $count_users  = mysqli_num_rows($select_users);
            if($count_users == 0){
                $errors[] = "There isn't user with this email";
            }

            $fetch_users = mysqli_fetch_array($select_users);

            $hashed_password = sha1($password);
            if($fetch_users['password'] != $hashed_password){
                $errors[] = "Wrong password";
            }

            if(empty($errors)){
                $_SESSION['u_id'] = $fetch_users['u_id'];
                header('location: profile?u_id='. $_SESSION['u_id'] .'');

                exit();
            }
        }
    
        

    ?>

    <div class="root">
        <div class="login-container">
            <div class="left">
                <div class="left__img">
                    <img src="./assets/imgs/signup_page.svg" alt="" srcset="">
                </div>
            </div>
            <form method="POST" class="form login">
                <h3>Login</h3>
                <div class="form-row">
                    <input type="text" name="email" id="" class="form-box" placeholder="Email" required>
                </div>
                <div class="form-row">
                    <input type="password" name="password" id="" class="form-box" placeholder="Password" required>
                </div>
                <div class="btn-row">
                    <button type="submit" name="login" class="btn-login">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="errors">
        <?php
            if(!empty($errors)){
                foreach($errors as $error){

                
        ?>
                <div class="alert alert-danger">
                    <span class="alert-close" id="alert-close">&times;</span>
                    <?php echo $error ?>
                </div>
        <?php
                }
            }
        ?>
        <!--  -->
    </div>
    

    <script src="files/pro/js/pro.js"></script>

    <?php
    }
    ?>
</body>
</html>