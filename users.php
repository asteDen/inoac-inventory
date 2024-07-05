<?php
  require('./users_read.php');
  session_start();
  if(isset($_SESSION["username"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/inventory_computer.css">
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
                <a class="nav-link" href="./dashboard.php">Dashboard</a>
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
                    <a class="active" href="./users.php">Users</a>
                </li>
                <li>
                    <a class="" href="./inventory_computer.php">Computer</a>
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
          <h3>Users</h3>
        </div>

  <div id="page-content-wrapper">
  <div onclick="hideShow()" id="menu" class="menu d-flex justify-content-center"><i class="bi bi-list"></i></div>

    
      <div class="d-flex justify-content-end">
        <form method="GET" action="./search_users.php">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="searchUser">
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
              <th>USER ID</th>
              <th>FRISTNAME</th>
              <th>LASTNAME</th>
              <th>GENDER</th>
              <th>DEPARTMENT</th>
              <th>COMPUTER ID</th>
              <th>LAPTOP ID</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php while($results = mysqli_fetch_array($sqlUsers)) {?>

            <tr>
              <td><?php echo $results['id']?></td>
              <td><?php echo $results['firstname']?></td>
              <td><?php echo $results['lastname']?></td>
              <td><?php echo $results['gender']?></td>
              <td><?php echo $results['department']?></td>
              <td><?php echo $results['computer_id']?></td>
              <td><?php echo $results['laptop_id']?></td>

              <td style="display: flex;">
                <form action="./update_users.php" method="post" class="p-1">
                  <input type="hidden" name="toUpdateId" value="<?php echo $results['id']?>">
                  <input type="hidden" name="toUpdateFirstname" value="<?php echo $results['firstname']?>">
                  <input type="hidden" name="toUpdateLastname" value="<?php echo $results['lastname']?>">
                  <input type="hidden" name="toUpdateGender" value="<?php echo $results['gender']?>">
                  <input type="hidden" name="toUpdateDepartment" value="<?php echo $results['department']?>">
                  <input type="hidden" name="toUpdateComputerId" value="<?php echo $results['computer_id']?>">
                  <input type="hidden" name="toUpdateLaptopId" value="<?php echo $results['laptop_id']?>">
                  <button type="submit" class="btn btn-outline-primary" name="toUpdate"><i class="bi bi-pencil"></i></button>
                </form>
                
                <form action="./delete_confirmation.php" method="post" class="p-1">
                  <input type="hidden" name="toDeleteId" value="<?php echo $results['id']?>">
                  <input type="hidden" name="toDeleteFirstname" value="<?php echo $results['firstname']?>">
                  <input type="hidden" name="toDeleteLastname" value="<?php echo $results['lastname']?>">
                  <input type="hidden" name="toDeleteGender" value="<?php echo $results['gender']?>">
                  <input type="hidden" name="toDeleteDepartment" value="<?php echo $results['department']?>">
                  <input type="hidden" name="toDeleteComputereId" value="<?php echo $results['computer_id']?>">
                  <input type="hidden" name="toDeleteLaptopId" value="<?php echo $results['laptop_id']?>">
                  <button type="submit" class="btn btn-outline-danger" name="toDelete"><i class="bi bi-trash3"></i></button>
                </form>
              </td>
            </tr>

            <?php } ?>
          </tbody>
        </table>
        
        </div>
        
        <a href="./add_users.php" class="btn btn-primary">Add users</a>
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