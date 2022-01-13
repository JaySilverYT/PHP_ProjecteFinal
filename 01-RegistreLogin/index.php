<?php session_start()?>
<?php include "verificar-login.php" ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<!------ Include the above in your HEAD tag ---------->
<div class="mainContainer">    
    <div class="container">
      <div class="middle">
  
        <div id="login">

              <?php 
                $registroOK = isset($_GET['registroOK']) ? $_GET['registroOK'] : false;

                if(isset($registroOK) && $registroOK == true){
                      echo '<p class="error"><strong>Registro completado correctamente</strong></p>';
                  }

              ?>

          <form action="verificar-login.php" method="POST">

              <p ><span class="fa fa-user"></span><input type="text" name="username" Placeholder="Username" required></p>
              <p><span class="fa fa-lock"></span><input type="password" name="password" Placeholder="Password" required></p>
              
              <?php 
              $error = isset($_GET['error']) ? $_GET['error'] : false;

              if(isset($error) && $error == true){
                    echo '<p class="error"><strong>Por favor, revisa tus credenciales</strong></p>';
                }

              ?>

              <div>
                  <span style="width:25%; display: inline-block;"><a href="../01-RegistreLogin/register.php"><input type="button" value="Sign Up" ></a></span>
                  <span style="width:25%; display: inline-block; margin-left: 10%;"><input type="submit" value="Sign In"></span>
              </div>

            
              <div class="clearfix"></div>
          </form>

        </div> <!-- end login -->

        <div class="logo">
            <img src="assets/img/logoGran.png" alt="">
            <div class="clearfix"></div>
        </div>
      
      </div>

    </div>

</div>