<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="files/pro/css/pro.css">
    <link rel="stylesheet" href="layout/css/profile.css">
    <?php
        require "init.php";

        if(isset($_GET['project_id']) && !empty($_GET['project_id'])){
            @$project_id = $_GET['project_id'];
        }else{
            header('location: index');
        }

        $select_project = getData('*', 'projects', 'WHERE', "project_id='$project_id'");
        $fetch_project  = mysqli_fetch_array($select_project);

        $user_id = $fetch_project['user_id'];
        $select_user = getData('*', 'users', 'WHERE', "u_id='$user_id'");
        $fetch_user  = mysqli_fetch_array($select_user);
    ?>
    <title><?php echo $fetch_project['project_name'] . ' | ' . $fetch_user['f_name'] . ' ' . $fetch_user['l_name'] ?></title>
</head>
<body>

    <?php
        include $tmbl . "header.php";
    ?>

    <div class="container root">

    </div>

    <script src="files/pro/js/pro.js"></script>
</body>
</html>