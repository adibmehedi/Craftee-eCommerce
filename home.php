<?php
session_start();
require 'models/orderClass.php';
require 'models/productClass.php';

$orderObj=new OrderClass();
$proObj=new ProductClass();

if(!isset($_SESSION['userName'])){
	header('Location:login.php');
	die(1);
}

if($_SESSION['userCat']==0)// User
{
	
	$orders=$orderObj->getUserOrders($_SESSION['userID']);
	$updatedOrders=array();

	foreach ($orders as $order) {
		//get addedItems for THAT order
		$items=$orderObj->getOrderedProducts($order['id']);
		//merge items to a string with unit
		$temp="";
		$calc=0;
		foreach ($items as $item) {
			$temp.=$item['name']."(".$item['unit'].") ";
			$calc+=$item['price'];
		}
		//set back to order Array new entities
		$order['items']=$temp;
		$order['price']=$calc;

		$updatedOrders[]=$order;
	}

	//var_dump($updatedOrders);

	require 'views/user_home.view.php';
}

if($_SESSION['userCat']==1)//Admin
{
	
	$orders=$orderObj->getNotDeliveredOrders();
	$updatedOrders=array();

	foreach ($orders as $order) {
		//get addedItems for THAT order
		$items=$orderObj->getOrderedProducts($order['id']);
		//merge items to a string with unit
		$temp="";
		$calc=0;
		foreach ($items as $item) {
			$temp.=$item['name']."(".$item['unit'].") ";
			$calc+=$item['price'];
		}
		//set back to order Array new entities
		$order['items']=$temp;
		$order['price']=$calc;

		$updatedOrders[]=$order;
	}

	//var_dump($updatedOrders);
	$customOrders=$orderObj->getAllCustomOrder();

	require 'views/admin_home.view.php';
}