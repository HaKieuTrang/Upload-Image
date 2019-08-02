<?php


namespace Web\controller\user;


class logout
{

}
session_start();
return header("Location:../../index.php");
session_destroy();

