<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #68A57A; border-radius: 20px;"> <!-- navbar used as heading -->
        <div class="container-fluid">
         
           <a><img src="logo-svg.svg" alt="" sizes="" srcset="" style="width: 200px; height: 90px;"></a>
           <a href="">Home</a>
           <a href="">Map</a>
           <a href="">Sign Up</a>
            
        </div>
      </nav>
     
  <div class="box">
      <div class="container" id="signIn" >
          <h1 class="form-title">Sign In As Parker</h1>
          <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Username</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <p class="recover">
              <a href="#">Recover Password</a>
            </p>
           <input type="submit" class="btn" value="Sign In" name="signIn">
          </form>
          <p class="or">
            ----------or--------
          </p>
          <div class="icons">
            <i class="fab fa-google"></i>
            
          </div>
          <div class="links">
            <p style="font-size: small;">Don't have account yet ?</p>
            <button id="createAcButton" style="font-size: small;">Sign Up</button>
          </div>
        </div>
        
   
</div>





<div class="box2">

        <div class="container" id="signIn2" >
          <h1 class="form-title">Sign In As Parking Owner</h1>
          <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="email" name="email" id="email2" placeholder="Email" required>
                <label for="email">Username</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password2" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <p class="recover">
              <a href="#">Recover Password</a>
            </p>
           <input type="submit" class="btn" value="Sign In" name="signIn2">
          </form>
          <p class="or">
            ----------or--------
          </p>
          <div class="icons">
            <i class="fab fa-google"></i>
            
          </div>
          <div class="links">
            <p style="font-size: small;">Don't have account yet ?</p>
            <button id="signUpButton2" style="font-size: small;">Sign Up</button>
          </div>
        </div>
       
  </div>
    <script src="home.js"></script>
</body>
</html>