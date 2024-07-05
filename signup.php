<?php
  session_start();
  if(isset($_SESSION["username"])){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

      <nav class="navbar navbar-expand-md bg-body-tertiary sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./img/logo 2.png" style="width: 110px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="./dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./inventory_computer.php">Inventory</a>
              </li>
            </ul>
            <ul class="navbar-nav ">
              <li class="nav-item p-1">
                <a class="nav-link" href=""><?php echo $_SESSION["username"]; ?></a>
              </li>
              <!-- <li class="nav-item p-1">
                <a class="btn btn-outline-primary btn-sm" href="./signup.php">Signup</i></a>
              </li> -->
              <li class="nav-item p-1">
                <a class="btn btn-danger btn-sm" href="./includes/logout.inc.php">Logout</a>
              </li>
            </ul>   
          </div>
        </div>
      </nav>


      <div class="container pt-3">
        
        <div class="alert alert-primary" role="alert">
            <h4>Sign up account</h4>
        </div>

        <div class="container">
        <form action="./includes/signup.inc.php" method="post">
                <div class="form-row">
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Username:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter username" name="username" >
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Full name:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter full name" name="fullname" >
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Enter email" name="email" >
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" id="" placeholder="Enter password" name="pwd" >
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Re-password</label>
                        <input type="text" class="form-control" id="" placeholder="Confirm password" name="repwd" >
                    </div>

                    <?php 
                      if(isset($_GET["error"])){
                        if($_GET["error"] == "emty_input"){
                          echo '<p class="text-danger pt-2">Fill all the flieds!</p>';
                        } else if ($_GET["error"] == "invalid_userid"){
                          echo '<p class="text-danger pt-2">Invalid username!</p>';
                        } else if ($_GET["error"] == "invalid_email"){
                          echo '<p class="text-danger pt-2">Invalid email!</p>';
                        } else if ($_GET["error"] == "password_dont_match"){
                          echo '<p class="text-danger pt-2">Password dont match!</p>';
                        } else if ($_GET["error"] == "username_already_exist"){
                          echo '<p class="text-danger pt-2">Username already exist!</p>';
                        } else if ($_GET["error"] == "stmtFailed"){
                          echo '<p class="text-danger pt-2">Something went wrong!</p>';
                        } else if ($_GET["error"] == "none"){
                          echo '<p class="text-success pt-2">Account created!</p>';
                        }
                      }
                    ?>
                </div>
                
                <div class="container mt-3 p-3 mb-2 bg-light text-dark" style="padding-top:20px;">
                    <a class="btn btn-secondary" href="./users.php">back</a>
                    <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
                </div>
            </form>
            
        </div>
        
      </div>


</body>
</html>

<?php } else {
    header ("location: ./index.php");
    exit();
}


?>