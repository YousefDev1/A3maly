<?php
    

    $select_site_settings = getData('*', 'settings', 'WHERE', "id='1'");
    $site_settings = mysqli_fetch_array($select_site_settings)
    

?>

<!-- <style>
    .navbar-link{
        position: relative;
    }

    .navbar-link::before{
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: red;
    }
</style> -->

<div class="navbar">
    <a href="index" class="navbar-logo">
        <?php echo $site_settings['site_title'] ?>
    </a>
    <div class="toggle-list" id="toggle-list__btn">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="navbar-links" id="navbar-links">
        <li class="navbar-link">
            <a href="index" class="link">Home</a>
        </li>
        <li class="navbar-link">
            <a href="#" class="link">ُExplore</a>
        </li>
        <?php
            if(@$_SESSION['u_id'] = ''){
        ?>
                <li class="navbar-link">
                    <a href="login" class="link">
                        Login
                    </a>
                </li>
                <li class="navbar-link">
                    <a href="signup" class="link">
                        Signup
                    </a>
                </li>
        <?php
            }
        ?>
       
    </ul>
</div>