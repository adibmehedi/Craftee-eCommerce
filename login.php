<?php

require 'models/userClass.php';
session_start();

$user=new UserClass();
//$p=new ProductClass();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email=htmlspecialchars($_POST['email']);
		$pass=htmlspecialchars($_POST['password']);

		if($user->userIsvalid($email,$pass)){
			$_SESSION['userName']=$email;
			$userID=$user->getUserId($email);
			$_SESSION['userID']=$userID;
			$_SESSION['userCat']=$user->getUsercategory($userID);

			//echo $_SESSION['userCat'];
			//echo "login success";
			header("Location: home.php");
		}else{
			//echo "pass not valid";
			header("Location: login.php");
			die(1);
		}
	}
}
 //var_dump($user->userIsvalid('bing@mail.com','123'));	

 //$user->registerUser("Admin","bing@mail.com","09876","123");

 //$user->getUsercategory(1)

require 'views/login.view.php';