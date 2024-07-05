<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/delete.js"></script>
    <title>INOAC</title>
</head>
<body>
    <div class="main-container container">
        <div class="main-section">
        <div class="logo">
            <img src="./img/logo 2.png" alt="">
        </div>
        <p>MIS INVENTORY</p>
        <form method="POST" action="includes/login.inc.php">
            <p class="pt-2">Username:</p>
            <input type="text" placeholder="Username" name="username">
            <p class="pt-2">Password:</p>
            <input type="password" placeholder="Password" name="userPassword"><br><br>
            <button class="sub-btn" type="submit" name="login">Log in</button><br><br>
            <?php 
                      if(isset($_GET["error"])){
                        if($_GET["error"] == "emty_input"){
                          echo '<p class="text-danger pt-2">Fill all the flieds!</p>';
                        } else if ($_GET["error"] == "wrong_credentials"){
                          echo '<p class="text-danger pt-2">Incorrect Credentials!</p>';
                        }
                    }
                    ?>
        </form>

        </div>
    </div>
    
</body>
</html>