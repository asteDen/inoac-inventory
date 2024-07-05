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
    <title>INOAC | DELETE</title>
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
        <?php
            if(isset($_POST['deleteComputer'])){
                $deleteComputerId = $_POST['deleteComputerId'];

                $deleteDepartment = $_POST['deleteDepartment'];
                $deleteFirstname = $_POST['deleteFirstname'];
                $deleteLastname = $_POST['deleteLastname'];

                $deleteOsVersion = $_POST['deleteOsVersion'];
                $deleteProcessor = $_POST['deleteProcessor'];
                $deleteDateAquired = $_POST['deleteDateAquired'];
                $deleteIpAddress = $_POST['deleteIpAddress'];

                echo '<div class="alert alert-danger" role="alert">
                        <h5>Are you sure you want to delete?</h5>
                      </div>';
            }
        ?>

<div class="table-responsive-lg pt-3">         
        <table class="table table-bordered ">
          <thead>
                <tr>
                    <th>COMPUTER ID</th>
                    <th>DEPARTMENT</th>
                    <th>END USER</th>
                    <th>OS VERSION</th>
                    <th>PROCESSOR</th>
                    <th>DATE AQUIRED</th>
                    <th>IP ADDRESS</th>
                </tr>
          </thead>
          <tbody>

            <tr>
              <td><?php echo $deleteComputerId?></td>

              <td><?php echo $deleteDepartment?></td>
              <td><?php echo $deleteFirstname ." ". $deleteLastname?></td>

              <td><?php echo $deleteOsVersion?></td>
              <td><?php echo $deleteProcessor?></td>
              <td><?php echo $deleteDateAquired?></td>
              <td><?php echo $deleteIpAddress?></td>

          </tbody>
        </table>
        </div>

            <form action="./delete_computer.php" method="post">
                <div class="p-3 mb-2 bg-light text-dark">
                    <input type="hidden" name="toDeleteComputerId" value="<?php echo $deleteComputerId?>">
                    <a href="./inventory_computer.php" class="btn btn-secondary" name="deleteComputerNO">No</a>
                    <button type="submit" class="btn btn-danger" name="deleteComputerYes">Yes</button>
                </div>
            </form>
      </div>



</body>
</html>

<?php } else {
    header ("location: ./index.php");
    exit();
}


?>