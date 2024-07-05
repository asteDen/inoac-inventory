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
    <title>INOAC | UPDATE</title>
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
                <a class="nav-link " href="./dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="./inventory_computer.php">Inventory</a>
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
            <h4>Add Laptop</h4>

        <?php 
            if(isset($_POST['updateLaptop'])){
                $updateLaptopId = $_POST['updateLaptopId'];
                $updateLaptopModel = $_POST['updateLaptopModel'];
                $updateLaptopOsVersion = $_POST['updateLaptopOsVersion'];
                $updateLaptopProcessor = $_POST['updateLaptopProcessor'];
                $updateLaptopDateAquired = $_POST['updateLaptopDateAquired'];
            }

        ?>
        </div>
        <div class="container">
        <form method="post" action="./laptop_update.php">
                <div class="form-row">
                    <div class="form-group col-lg-4 pt-3">
                        <h5>User id: <?php echo $updateLaptopId?></h5>
                    </div>

                    <div class="form-group col-lg-2 pt-3">
                        <label for="">Model:</label>
                        <input type="text" class="form-control" id="" placeholder="" name="toUpdateLaptopModel" value="<?php echo $updateLaptopModel?>" required>
                    </div>

                    <div class="form-group col-lg-2 pt-3">
                        <label for="">Os version: </label>
                        <select id="" class="form-control" name="toUpdatelaptopOsVersion">
                            <option selected><?php echo $updateLaptopOsVersion?></option>
                            <option >Windows 7 Pro</option>
                            <option>Windows 8 Home</option>
                            <option>Windows 10 Home</option>
                            <option>Windows 10 Pro</option>
                            <option>Windows 11 Home</option>
                            <option>Windows 11 Pro</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-2 pt-3">
                        <label for="">Processor: </label>
                        <select id="" class="form-control" name="toUpdateLaptopProcessor">
                            <option selected><?php echo $updateLaptopProcessor?></option>
                            <option >Intel Core i3</option>
                            <option>Intel Core i5</option>
                            <option>Intel Core i7</option>
                            <option>Ryzen 3</option>
                            <option>Ryzen 5</option>
                            <option>Ryzen 7</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-lg-2 pt-3">
                        <label for="">Date aquired:</label>
                        <input type="date" class="form-control" id="" placeholder="" name="toUpdateDateAquiredLaptop" value="<?php echo $updateLaptopDateAquired ?>" required>
                    </div>
                </div>
                

                
                <div class="container mt-3 p-3 mb-2 bg-light text-dark" style="padding-top:20px;">
                    <input type="hidden" name="updateLaptopId" value="<?php echo $updateLaptopId ?>">
                    <a class="btn btn-secondary" href="./inventory_laptop.php">Back</a>
                    <button type="submit" class="btn btn-primary" name="updateLaptop">Update</button>
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