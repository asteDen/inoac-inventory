<?php
  require('./users_read.php');
  require('./database.php');
  require('./includes/functions.inc.php');

  session_start();
  if(isset($_SESSION["username"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/delete.js"></script>
    <title>INOAC | Dashboard</title>
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
                <a class="nav-link active" href="./dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./users.php">Inventory</a>
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

      <div class="p-3 mb-2 bg-secondary text-white d-flex justify-content-center">
        <h3>Dashboard</h3>
      </div>

        <div class="container">
            <div class="container row">
                <div class="col-md-6 pt-2">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Count: <?php echo countItem($connection, "users", "id"); ?></p>
                        <a href="./users.php" class="btn btn-primary">View</a>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 pt-2">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Computers</h5>
                        <p class="card-text">Count: <?php echo countItem($connection, "computers", "computer_id"); ?></p>
                        <a href="./inventory_computer.php" class="btn btn-primary">View</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container row d-flex justify-content-center">
                <div class="col-md-6 pt-2">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laptops</h5>
                        <p class="card-text">Count: <?php echo countItem($connection, "laptops", "laptop_id");?></p>
                        <a href="./inventory_laptop.php" class="btn btn-primary">View</a>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>

    


</body>
</html>

<?php } else {
    header ("location: ./index.php");
    exit();
}


?>