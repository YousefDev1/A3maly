<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="files/pro/css/pro.css">
    <link rel="stylesheet" href="layout/css/signup.css">
    <?php
        require "init.php";

    ?>
    <title>Signup</title>
</head>
<body>
    
    <?php
    session_start();
    if(@$_SESSION['u_id']){
        header('location: index');
    }else{

    

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $errors = array();

            $f_name = filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
            $l_name = filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];

            if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($confirm_password)){
                $errors[] = "Fields can't be empty";
            }

            if(strlen($password) < 8){
                $errors[] = "Password must be more than 8 characters";
            }

            if($password != $confirm_password){
                $errors[] = "Passwords don't match";
            }

            $select_users = getData('*', 'users', 'WHERE', "email='$email'");
            $count_users  = mysqli_num_rows($select_users);
            if($count_users > 0){
                $errors[] = "This email has been used before";
            }

            if(empty($errors)){
                $hashed_password = sha1($password);
                mysqli_query($db_conn, "INSERT INTO users(`f_name`, `l_name`, `email`, `password`) VALUES('$f_name', '$l_name', '$email', '$hashed_password')");

                header('location: index');

                exit();

                

            }
        }
        

    ?>

    <div class="root">
        <div class="signup-container">
            <div class="left">
                <div class="left__img">
                    <img src="./assets/imgs/signup_page.svg" alt="" srcset="">
                </div>
            </div>
            <form method="POST" class="form signup">
                <h3>Signup</h3>
                <div class="form-row">
                    <input type="text" name="f_name" id="" class="form-box" placeholder="First Name" required>
                    <input type="text" name="l_name" id="" class="form-box" placeholder="Last Name" required>
                </div>
                <div class="form-row">
                    <input type="text" name="email" id="" class="form-box" placeholder="Email" required>
                </div>
                <div class="form-row">
                    <input type="password" name="password" id="" class="form-box" placeholder="Password" required>
                    <input type="password" name="confirm-password" id="" class="form-box" placeholder="Confirm Password" required>
                </div>
                <div class="btn-row">
                    <button type="submit" name="signup" class="btn-signup">
                        Signup
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