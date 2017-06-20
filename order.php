<?php
session_start();
require 'models/orderCLass.php';
$orderObj=new OrderClass();

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if(isset($_GET['changeStatus'])){
		$orderId=$_GET['orderId'];
		$status=$_GET['changeStatus'];
		$orderObj->changeOrderStatus($orderId,$status);

		header('Location: home.php');
	}
}