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
    echo $id=htmlspecialchars($_POST['id']);
	$name=htmlspecialchars($_POST['name']);
	$descp=htmlspecialchars($_POST['desc']);
	$price=htmlspecialchars($_POST['price']);
	$unit=htmlspecialchars($_POST['unit']);

    if(!empty($_FILES['fileToUpload']['name'])) //checking if image is selected to upload
    {
    	$target_dir = "resource/upload/";
        $fname = $_FILES["fileToUpload"]["name"];
        $ext = end((explode(".", $fname)));
        echo $target_file = $target_dir .$id.'.jpg';//.$ext; //save image as the name of the ID
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))  //CopyImage to parmanet dir from temp.
        {
            echo "File Upload Success";
           
        } 
        else{
            echo "Sorry, there was an error uploading your file.";
        } 
    }
     $proObj->updateProductDetail($id,$name,$descp,$price,$unit);

    header("Location:edit-product.php?id=$id&action=edit");

}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action']) && $_GET['action']=='edit'){
        $id=$_GET['id'];
        $product=$proObj->getProductDetail($id);
        require 'views/admin_edit-product.view.php';
    }
    if(isset($_GET['action']) && $_GET['action']=='delete'){
        $id=$_GET['id'];
        $proObj->deleteProduct($id);
        header('Location: product.php');
    }
}




?>