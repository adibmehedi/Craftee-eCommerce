<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Commerce  :: Craftee </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="resource/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="resource/css/style.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            function displayCart() {
                var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("onCartItem").innerHTML = this.responseText;
                    }
                  };
                var url="cart.php?getTotal=true";
                  xhttp.open("GET", url, true);
                  xhttp.send(); 
            }
    </script>
    </head>
	
	<body onload="displayCart()">
	   <!-- Topbar Start -->
		<div class="topbar_wrapper container-fluid clear">
            <div class="topbar container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact pull-left">
                            <div class="phone pull-left">
                                <p>
                                    <img src="resource/img/phone_icon.png" alt="Phone">
                                    <span>+565 975 658</span>
                                </p>
                            </div>
                            <div class="email pull-left">
                                <p>
                                    <img src="resource/img/email_icon.png" alt="Email">
                                    <span>support@craftee.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top_menu pull-right">
                            <ul>
                                <?php 
                                    if(isset($_SESSION['userName'])){
                                        echo "
                                        <li><a href='home.php'>MY ACCOUNT</a></li>
                                        <li><a href='cart.php'>CHECKOUT</a></li>
                                        <li><a href='logout.php'>LOGOUT</a></li>
                                        ";
                                    }
                                    else{
                                        echo "
                                            <li><a href='cart.php'>CHECKOUT</a></li>
                                            <li><a href='login.php'>LOGIN</a></li>
                                            <li><a href='register.php'>SIGN UP</a></li>
                                            
                                            ";
                                        } ?>                        
    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Header Start -->
		 <div class="header_wrapper container-fluid clear">
            <div class="header container">
                <div class="col-md-4">
                    <div class="logo">
                        <div class="logo_icon pull-left">
                            <img src="resource/img/logo.png" alt="Logo">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="navigation pull-right">
                        <ul>   
                            <li><a href="index.php">HOME</a></li>
                            <li class="slash">/</li>
                            <li><a href="custom-order.php">CRAFT DESIGNER</a></li>
                            <li class="slash">/</li>
                            <li><a href="#">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
    				<div class="cart">
                        <div class="cart_text pull-left">
                            <p>Gift items</p>
                            <h5 id='onCartItem'></h5>
                        </div>
                        <div class="cart_icon pull-left">
                            <img src="resource/img/cart_icon.png" alt="Cart">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>