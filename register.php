<?php
require 'models/userClass.php';

$user=new UserClass();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']))
	{
		if($_POST['name']!='' && $_POST['email']!='' && $_POST['phone']!='' && $_POST['password']!='')
		{
		$name=htmlspecialchars($_POST['name']);
		$email=htmlspecialchars($_POST['email']);
		$contact=htmlspecialchars($_POST['phone']);
		$password=htmlspecialchars($_POST['password']);
		$address=htmlspecialchars($_POST['address']);

		$user->registerUser($name,$email,$contact,$password,$address);

		echo "Registration Success";
		header("Location: login.php");
		}else
		{
			require 'views/register.view.php';
		}


	}
}else{
	require 'views/register.view.php';
}
