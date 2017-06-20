<?php
session_start();

require 'models/productClass.php';
$proObj=new ProductClass(); 

if(!isset($_SESSION['userName']) && !($_SESSION['userCat']==1))
{
	header('Location:login.php');
	die(1);
}


$products=$proObj->getAllProduct();
require 'views/admin_product.view.php';
