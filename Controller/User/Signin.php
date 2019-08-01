<?php

namespace Web\Controller\User;
use Web\Model\Database\Connection;
use Web\Model\User\User;
include '../Model/Database/Connection.php';
include '../Model/User/User.php';
class Signin
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function execute()
    {
        session_start();
        $data = $_POST;
        $result = $this->signIn($data);
        if($result) {
            return header("location:../../index.php");
        } else {
            return header("location: ../../view/signup.php");
        }
    }
    public function signIn($postData)
    {
        $user = $this->getUser($postData);
        if(empty($user)){
            return false;
        }
        if(md5($postData['pass']) == $user['pass']){
            return true;
        }
        return false;

    }
    public function getUser($data)
    {
        $name = $data['name'];
        return $this->user->loadByUserName($name);
    }
}
$connetion = new Connection();
$user = new User($connetion);
$signIn = new SignIn($user);
$signIn->execute();