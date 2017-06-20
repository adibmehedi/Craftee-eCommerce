<?php
session_start();
require 'models/userClass.php';
require 'models/productClass.php';

$userObj=new UserClass();
$proObj=new ProductClass();
$products=$proObj->getAllProduct();

require 'views/index.view.php';