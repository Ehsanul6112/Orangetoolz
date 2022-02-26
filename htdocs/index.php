<!DOCTYPE html>

<html>
  <head>
      <title>Log In</title>
      <?php include_once("style/style.php"); //Importing bootstar?>


  </head>

  <body>
    <div class="container">
      
      <form action="module/validate.php" method="post">
        <div class="row">
        <div class="col-lg-4 text-center">
          <h2>Sign in</h2><br>
          <label class="sr-only" for="username">Username:</label>
          <input class="form-control" placeholder="Username" type="text" id="username" name="username" autofocus>
          <label class="sr-only" for="password">Password:</label>
          <input class="form-control" placeholder="Password" type="password" id="password" name="password"><br><br>          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
          </div>  
        </div>
      </form>
      
    </div>
  </body>
</html>