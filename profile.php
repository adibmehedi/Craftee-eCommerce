<?php
session_start();
require 'models/userClass.php';
$userObj=new UserClass();

if(!isset($_SESSION['userName'])){
	header('Location:login.php');
	die(1);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];

	//Make a funciton updateUser to inset into DB
	$userObj->updateUser($_SESSION['userID'],$name,$email,$address,$phone,$password);
}

$user=$userObj->getUserDetail($_SESSION['userID']);
//var_dump($user);
require 'views/profile.view.php';