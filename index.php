<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="files/pro/css/pro.css">
    <link rel="stylesheet" href="layout/css/style.css">
    <?php
        require "init.php";

        $select_site_settings = getData('*', 'settings', 'WHERE', "id='1'");
        $site_settings = mysqli_fetch_array($select_site_settings)
        

    ?>
    <title><?php echo $site_settings['site_name'] ?></title>
</head>
<body>
    
    <?php
        include $tmbl . "header.php";
    ?>
    

    <div class="landing">
        <div class="left">
            <div class="left__info">
                <div class="info__title">
                    <h1 class="title">
                        <?php echo $site_settings['site_title'] ?>
                    </h1>
                </div>
                <div class="info__about">
                    <p class="about">
                        <?php echo $site_settings['site_about'] ?>
                    </p>
                </div>
            </div>
            <?php
            
                if(@empty($_SESSION['u_id'])){
            ?>
                <div class="left__btns">
                    <a href="signup" class="btn-signup">
                        Signup
                    </a>
                </div>
            <?php
                }

            ?>
            
        </div>
        <div class="right">
            <div class="landing__img">
                <img src="assets/imgs/land_page.svg" alt="" srcset="">
            </div>
        </div>
    </div>

    <script src="files/pro/js/pro.js"></script>
</body>
</html>