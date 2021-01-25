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
        include $tmbl . "header.php";
    ?>

    <div class="container root">
        <div class="row">
            <div class="col-2">
                <div class="left-side">
                    <div class="header">
                        <div class="header__img">
                            <div class="img">
                                <img src="./assets/uploads/profiles/<?php echo $fetch_user['user_avatar'] ?>" alt="" srcset="">
                            </div>
                        </div>
                        <div class="header__name">
                            <div class="name">
                                <?php echo $fetch_user['f_name']. ' ' .$fetch_user['l_name'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content__user-bio">
                            <div class="bio__title">
                                <div class="title">
                                    About :
                                </div>
                            </div>
                            <div class="bio">
                                <?php echo $fetch_user['user_bio'] ?>
                            </div>
                        </div>
                        <div class="content__user-links">
                            <div class="user-links">
                                <!-- Check Facebook Link -->
                                <?php
                                    if(!empty($fetch_user['user_facebook'])){
                                ?>
                                    <a href="<?php echo $fetch_user['user_facebook'] ?>" class="user-link" target="_blank">
                                        <span><i class="fa fa-facebook"></i></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <!-- Check Twitter Link -->
                                <?php
                                    if(!empty($fetch_user['user_twitter'])){
                                ?>
                                    <a href="<?php echo $fetch_user['user_twitter'] ?>" class="user-link" target="_blank">
                                        <span><i class="fa fa-twitter"></i></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <!-- Check Instagram Link -->
                                <?php
                                    if(!empty($fetch_user['user_instagram'])){
                                ?>
                                    <a href="<?php echo $fetch_user['user_instagram'] ?>" class="user-link" target="_blank">
                                        <span><i class="fa fa-instagram"></i></span>
                                    </a>
                                <?php
                                    }
                                ?>

                                <!-- Check LinkedIn Link -->
                                <?php
                                    if(!empty($fetch_user['user_linkedin'])){
                                ?>
                                    <a href="<?php echo $fetch_user['user_linkedin'] ?>" class="user-link" target="_blank">
                                        <span><i class="fa fa-linkedin"></i></span>
                                    </a>
                                <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="right-side">
                    <div class="content">
                        <div class="content__header">
                            <div class="header__title">
                                <div class="title">
                                    Projects
                                </div>
                            </div>
                        </div>
                        <div class="content__show">
                            <?php
                                $select_projects = getData('*', 'projects', 'WHERE', "user_id='$u_id'");
                                $count_projects  = mysqli_num_rows($select_projects);

                                if($count_projects > 0){
                            ?>
                                    <div class="row">
                                        <?php

                                                while($fetch_projects = mysqli_fetch_array($select_projects)){
                                        ?>

                                                <!-- Project Card -->
                                                <div class="col-3">
                                                    <div class="project-card">
                                                        <div class="project__img">
                                                            <div class="img">
                                                                <img src="./assets/uploads/projects/<?php echo $fetch_projects['project_cover'] ?>" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="project__info">
                                                            <div class="info__project-name">
                                                                <a href="project?project_id=<?php echo $fetch_projects['project_id'] ?>">
                                                                    <?php echo $fetch_projects['project_name'] ?>
                                                                </a>
                                                            </div>
                                                            <span class="info__project-date"><?php echo $fetch_projects['project_date'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                                }
                                        ?>
                                    
                                    </div>

                            <?php
                                }else{
                            ?>
                            
                                    <div class="empty-projects">
                                        <img src="./assets/imgs/empty.svg" alt="" srcset="">
                                    </div>
                            
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="files/pro/js/pro.js"></script>
</body>
</html>