 <?php 
    if($_SESSION['userCat']==1){
        echo "
        <nav>
		  <ul>
		    <li><a href='home.php'>HOME</a></li>
			<br>
			<br>
		    <li><a href='report.php'>REPORT</a></li>
			<br>
			<br>
			<li><a href='product.php'>PRODUCTS</li>
			<br>
			<br>
			<li><a href='profile.php'>PROFILE</li>
			<br>
			<br>
		    <li><a href='logout.php'>LOGOUT</a></li>
			<br>
			<br>
		  </ul>
		</nav>
        ";
    }
    else{
        echo "
            <nav>
			  <ul>
			    <li><a href='home.php'>HOME</a></li>
				<br>
			    <li><a href='profile.php'>PROFILE</a></li>
				<br>
			    <li><a href='logout.php'>LOGOUT</a></li>
				<br>
			  </ul>
			</nav>
            
            ";
        } 
?> 



