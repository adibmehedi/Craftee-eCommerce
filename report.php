<?php
session_start();

require 'models/orderClass.php';
$orderObj=new OrderClass(); 

if(!isset($_SESSION['userName']) && !($_SESSION['userCat']==1))
{
	header('Location:login.php');
	die(1);
}

if(isset($_GET['from']) && isset($_GET['to'])){
	$from=$_GET['from'];
	$to=$_GET['to'];
	$reports=$orderObj->gerOrderDetails($to,$from);
	//var_dump($reports);
	//die(1);
}

require 'views/report.view.php';