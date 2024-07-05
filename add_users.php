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
    <title>INOAC | ADD USERS</title>
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
            <h4>Add user</h4>
        </div>

        <div class="container">
        <form action="./add.php" method="post">
                <div class="form-row">
                    <div class="form-group col-lg-2 pt-3">
                        <label for="">User id:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="userid" required>
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Firstname:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="firstname" required>
                    </div>
                    <div class="form-group col-lg-4 pt-3">
                        <label for="">Lastname:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="lastname" required>
                    </div>
                </div>
                <div class="form-group col-lg-2 pt-3">
                    <label for="">Gender: </label>
                    <select id="" class="form-control" name="gender">
                        <option selected>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="form-group col-lg-2 pt-3">
                    <label for="">Department: </label>
                    <select id="" class="form-control" name="department">
                        <option selected>Accounting</option>
                        <option>Admin</option>
                        <option>Purchasing</option>
                        <option>Product Development</option>
                        <option>MIS</option>
                    </select>
                </div>
                <div class="container mt-3 p-3 mb-2 bg-light text-dark" style="padding-top:20px;">
                    <a class="btn btn-secondary" href="./users.php">back</a>
                    <button type="submit" class="btn btn-primary" name="add-user-button">Add</button>
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