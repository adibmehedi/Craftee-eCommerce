<?php require 'statics/header.view.php'; ?>

<?php require 'statics/sidebar.view.php'; ?>
    
<article>   
    <div class="container"> 
          <form action="profile.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="fname" name="name" value='<?=$user['name'] ?>'>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value='<?=$user['email'] ?>'>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value='<?=$user['address'] ?>'>
        	
        	<label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value='<?=$user['contact'] ?>'>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value='<?=$user['password'] ?>'>
          
            <input type="submit" value="Save">
          </form>
      </div>
</article>     

<?php require 'statics/footer.view.php'; ?>
	