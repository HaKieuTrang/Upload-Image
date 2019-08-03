<?php


namespace Web\controller\user;


class logout
{

}
session_start();
unset($_SESSION['name']);
session_destroy();
header("Location: /btl/index.php");
exit;
