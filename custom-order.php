<?php
require 'models/orderClass.php';
$orderObj=new OrderClass();

if(isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['design']))
{
	$name=htmlspecialchars($_GET['name']);
	$phone=htmlspecialchars($_GET['phone']);
	$design=$_GET['design'];

	$orderObj->addCustomOrder($name,$phone,$design);

	echo "Thank you for your query. We will get back to you soon ! visit <a href='index.php'>Craftee</a> for more shopping.";
	die(1);
}
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$orderObj->deleteCustomOrder($id);
	header('Location: home.php');
	die(1);
}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="resource/css/craft-style.css">
	<script type="text/javascript" src="resource/canvas.js"></script>
</head>
<body onload="draw();">
	<div class="designer-wrapper" >
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-6">
					<div class="logo">
						<img src="resource/craft-img/logo.png">
					</div>
					<div class="logo-title">
					
					</div>
				</div>
				<div class="col-md-6 back">
					<span> Back to <a href="index.php">Craftee Shopping !</a></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 sidebar">
					<div class="row">
						<div class="col-md-4 col-sm-2">
							<div class="element">
								<img src="resource/craft-img/1.png" onclick="initialImage(this)">
							</div>
						</div>
						<div class="col-md-4 col-sm-2">
							<div class="element">
								<img src="resource/craft-img/2.png" onclick="initialImage(this)">
							</div>
						</div>
						<div class="col-md-4 col-sm-2">
							<div class="element">
								<img src="resource/craft-img/3.png" onclick="initialImage(this)">
							</div>
						</div>
						<div class="col-md-4 col-sm-2">
							<div class="element">
								<img src="resource/craft-img/4.png" onclick="initialImage(this)">
							</div>
						</div>
						<div class="col-md-4 col-sm-2">
							<div class="element">
								<img src="resource/craft-img/5.png" onclick="initialImage(this)">
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-8 div-canvas">
					<canvas id="craft-canvas" width="800" height="500"></canvas>
				</div>
				<div class="col-md-2 sidebar">
					<button class="btn btn-danger" onclick="clearItems();">Clear Screen</button>
					<br><br>
					<div class="form-group">
					  <input type="text" class="form-control" required  placeholder="Name" id="name">
					</div>
					<div class="form-group">
					  <input type="text" class="form-control" required  placeholder="Contact No" id="phone">
					</div>
					<button class='btn btn-success' style="width:100%" onclick="confirm();">Ask for Price !</button>
				</div>
			</div>
			<div class="row footer">
				<div class="col-md-12 footer-text">
					<p> Copyright (C) Craftee, 2016<p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>