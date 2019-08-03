<?php session_start(); ?>
<header>
    <div class="title">
        <p>HOME PAGE</p>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="/btl/index.php" class="selected">Home</a></li>
            <?php if(isset($_SESSION['name'])){?>
            <li><a href="/Web/view/userinfo.php">Profile</a></li>
            <li><a href="/Web/view/upload.php">Upload</a></li>
            <li><a href="/Web/Controller/User/Logout.php">Log out</a></li>
            <?php }else { ?>
                <li><a href="/Web/view/signin.php">Log in</a></li>
                <li><a href="/Web/view/signup.php">Sign up</a></li>
            <?php } ?>

        </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
        <ul class="social clearfix">
            <li><a href="#" class="fb" data-title="Facebook"></a></li>
            <li><a href="#" class="google" data-title="Google +"></a></li>
            <li><a href="#" class="rss" data-title="RSS"></a></li>
        </ul><!-- end social -->

        <div class="rights">
            <p>Copyright © 2014 magnetic.</p>
            <p>Template by <a href="">Pixelhint.com</a></p>
        </div><!-- end rights -->
    </div><!-- end footer -->
</header><!-- end header -->
