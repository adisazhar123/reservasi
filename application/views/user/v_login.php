<!DOCTYPE html>
<body>
  <div class="login-page">
  <div class="form">
    
    <form class="register-form" method="post" action="<?php echo site_url('Login/register');?>">
      <?php echo validation_errors();?>    
      <input name ="nrp" type="text" placeholder="nrp"/>
      <input name="username" type="text" placeholder="name"/>
      <input name="password" type="password" placeholder="password"/>
   
      <button type="submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>


    <form class="login-form" method="post" action="<?php echo site_url('verifylogin');?>">
    <?php echo validation_errors();?>
      <input name ="username" type="text" placeholder="username"/>
      <input name = "password" type="password" placeholder="password"/>
      <button type="submit"login value="Login">Login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
    <?php echo $msg;?>
  </div>
</div>
<br>

</body>
</html>
