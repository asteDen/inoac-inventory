<?php
  require('./computer_inventory_read.php');
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
    <link rel="stylesheet" href="./css/inventory_computer.css">
    <script src="./js/inventory_dash.js"></script>
    <title>INOAC | INVENTORY</title>
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
                <a class="nav-link active" href="./inventory_computer.php">Inventory</a>
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


      

      <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="./users.php">
                        INVENTORY
                    </a>
                </li>
                <li>
                    <a class="" href="./users.php">Users</a>
                </li>
                <li>
                    <a class="active" href="./inventory_computer.php">Computer</a>
                </li>
                <li>
                    <a href="./inventory_laptop.php">Laptop</a>
                </li>
                <!-- <li>
                    <a href="#">License</a>
                </li> -->
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
      
        <div class="p-3 mb-2 bg-secondary text-white d-flex justify-content-center">
          <h3>Computer Inventory</h3>
        </div>

        <div id="page-content-wrapper">
        <div onclick="hideShow()" id="menu" class="d-flex justify-content-center" style="position: fixed; width:30px; height: 30px; background-color: #0000005b; font-size: 20px; color: white; border-radius:50%; z-index: 1000;"><i class="bi bi-list"></i></div>


        <div class="container-fluid pb-3 d-flex justify-content-end">
        <form method="GET" action="./search_computer.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="searchComputer">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
          </div>
        </form>
        </div>
        

            <div class="container-fluid">
            <div class="table-responsive-lg">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr class="table-secondary">
                    <th>COMPUTER ID</th>
                    <th>DEPARTMENT</th>
                    <th>END USER</th>
                    <th>OS VERSION</th>
                    <th>PROCESSOR</th>
                    <th>DATE AQUIRED</th>
                    <th>IP ADDRESS</th>
                    <th></th>
                  </tr>
                </thead>
                <?php while($results = mysqli_fetch_array($sqlComputers)) {?>
                <tbody>
                  <tr>
                    <td><?php echo $results['computer_id']?></td>
                    <td><?php echo $results['department']?></td>
                    <td><?php echo $results['firstname']. " " .$results['lastname']?></td>
                    <td><?php echo $results['os_version']?></td>
                    <td><?php echo $results['processor']?></td>
                    <td><?php echo $results['date_aquired']?></td>   
                    <td><?php echo $results['ip_address']?></td>

                    <td style="display: flex;">

                      <form class="p-1" action="./inventory_computer_update.php" method="post">
                        <input type="hidden" name="updateComputerId" value="<?php echo $results['computer_id']?>">
                        <input type="hidden" name="updateOsVersion" value="<?php echo $results['os_version']?>">
                        <input type="hidden" name="updateProcessor" value="<?php echo $results['processor']?>">
                        <input type="hidden" name="updateDateAquired" value="<?php echo $results['date_aquired']?>">
                        <input type="hidden" name="updateIpAddress" value="<?php echo $results['ip_address']?>">
                        <button type="submit" class="btn btn-outline-primary" name="updateComputer"><i class="bi bi-pencil"></i></button>
                      </form>

                      <form class="p-1" action="./delete_confirmation_computer.php" method="post">
                        <input type="hidden" name="deleteComputerId" value="<?php echo $results['computer_id']?>">

                        <input type="hidden" name="deleteDepartment" value="<?php echo $results['department']?>">
                        <input type="hidden" name="deleteFirstname" value="<?php echo $results['firstname']?>">
                        <input type="hidden" name="deleteLastname" value="<?php echo $results['lastname']?>">

                        <input type="hidden" name="deleteOsVersion" value="<?php echo $results['os_version']?>">
                        <input type="hidden" name="deleteProcessor" value="<?php echo $results['processor']?>">
                        <input type="hidden" name="deleteDateAquired" value="<?php echo $results['date_aquired']?>">
                        <input type="hidden" name="deleteIpAddress" value="<?php echo $results['ip_address']?>">
                        <button type="submit" class="btn btn-outline-danger" name="deleteComputer"><i class="bi bi-trash3"></i></button>
                      </form>

                    </td>

                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              
            </div>

            <a href="./inventory_computer_add.php" class="btn btn-primary">Add computer</a>

        </div>

        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="./js/inventory.js"></script>
      
</body>
</html>

<?php } else {
    header ("location: ./index.php");
    exit();
}


?>