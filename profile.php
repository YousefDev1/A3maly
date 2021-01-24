<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="files/pro/css/pro.css">
    <link rel="stylesheet" href="layout/css/profile.css">
    <?php
        require "init.php";

        if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
            @$u_id = $_GET['u_id'];
        }else{
            header('location: index');
        }

        $select_user = getData('*', 'users', 'WHERE', "u_id='$u_id'");
        $fetch_user  = mysqli_fetch_array($select_user);
    ?>
    <title><?php echo $fetch_user['f_name'] . ' ' . $fetch_user['l_name'] ?></title>
</head>
<body>
    
    <?php
        session_start();

    ?>

    <div class="container root">
        Test
    </div>

    <script src="files/pro/js/pro.js"></script>
</body>
</html>