<?php require 'statics/header.view.php'; ?>

<div class="portfolio_two_wrapper container-fluid clear">
    <div class="portfolio_two container">
        <div class="heading_white">
            <h1>Login</h1>
        </div>
   </div>
</div>

<script>
    function validate(){
        if( (document.getElementById('email').value=='') || (document.getElementById('password').value=='')   )
        {
            document.getElementById('error_msg').innerHTML="Input informations correctly";
            return false;
        }else{
          return true;
        }

    }
</script>
    
<div class="container"> 
      <form action="login.php" onsubmit="return validate()" method="POST">

        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      
        <input type="submit" value="Save">
         <span id="error_msg"></span>
      </form>
      <p><h3>Or <a href="register.php">Register</a></h3></p>
  </div>     

<?php require 'statics/footer.view.php'; ?>	