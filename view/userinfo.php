<?php

session_start();

use Web\Model\Database\Connection;
use Web\Model\User\User;
include '../Model/Database/Connection.php';
include '../Model/User/User.php';

$name = $_SESSION['name'];
$conn = new Connection();
$result = new User($conn);
$image = $result->loadImageByName($name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description"
          content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/title.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/homepage/jquery.js"></script>
    <script type="text/javascript" src="js/homepage/main.js"></script>
</head>
<body>

<header>
    <div class="title">
        <p>PROFILE</p>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="../index.php" class="selected">Home</a></li>
            <li><a href="userinfo.php">Profile</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="signin.php">Log out</a></li>
        </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
        <ul class="social clearfix">
            <li><a href="#" class="fb" data-title="Facebook"></a></li>
            <li><a href="#" class="google" data-title="Google +"></a></li>
            <!--<li><a href="#" class="behance" data-title="Behance"></a></li>
            <li><a href="#" class="twitter" data-title="Twitter"></a></li>
            <li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
            <li><a href="#" class="rss" data-title="RSS"></a></li>
        </ul><!-- end social -->

        <div class="rights">
            <p>Copyright © 2014 magnetic.</p>
            <p>Template by <a href="">Pixelhint.com</a></p>
        </div><!-- end rights -->
    </div><!-- end footer -->
</header><!-- end header -->

<section class="main clearfix">
    <div class="header">
        <?php echo "Trang cá nhân của " . $_SESSION['name']; ?>
    </div>

    <?php foreach ($image as $value): ?>
        <div class="work">
            <a href="imageinfo.php<?php echo"?name=".$value['name']?>">
                <img src="<?php echo $value['name'] ?>" class="media" alt=""/>
                <div class="caption">
                    <div class="work_title">
                        <h1>Chi tiết ảnh</h1>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>

</section><!-- end main -->

</body>
</html>
