<?php

use Web\Model\Database\Connection;
use Web\Model\User\User;
include '../Model/Database/Connection.php';
include '../Model/User/User.php';

$name = $_GET['name'];
$conn = new Connection();
$result = new User($conn);
$image = $result->loadImageByName($name);
echo $name;

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

        <?php include 'header.php' ?>
    </header><!-- end header -->

    <section class="main clearfix">
        <div class="header">
            <?php echo "Trang cá nhân của " . $_GET['name']; ?>
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

