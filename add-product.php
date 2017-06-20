<?php
session_start();

require 'models/productClass.php';
$proObj=new ProductClass(); 

if(!isset($_SESSION['userName']) && !($_SESSION['userCat']==1))
{
	header('Location:login.php');
	die(1);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name=htmlspecialchars($_POST['name']);
	$desc=htmlspecialchars($_POST['desc']);
	$price=htmlspecialchars($_POST['price']);
	$unit=htmlspecialchars($_POST['unit']);

	$target_dir = "resource/upload/";
    $fname = $_FILES["fileToUpload"]["name"];
    $ext = end((explode(".", $fname)));

    $target_file = $target_dir .($proObj->getLastProductId()+1).'.jpg';//.$ext; //save all image to jpg

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))  //CopyImage to parmanet dir from temp.
    {
        $proObj->addProduct($name,$desc,$price,$unit); //add new product
        header('Location:product.php');
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    } 
	
}

require 'views/admin_add-product.view.php';


?>