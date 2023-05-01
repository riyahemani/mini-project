<?php 
require_once "config.php";
session_start();

// $sql = "SELECT  FROM ngo";
// $all_ngo = $conn -> query($sql);

$sql = "SELECT * FROM ngo";
$all_ngo = $conn -> query($sql);

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
// {
//     header("location: login.php");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/836cf00832.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="donor-dashboard.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #4f0d5b; z-index:100;">
        <a class="navbar-brand" href="landing_page.php"><img class="logo" src="logo.png" alt="logo"></a>
        <a class="navbar-brand" href="landing_page.php">iMeds</a>
            
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto"></ul>
          <span class="navbar-text">
          <i class="fa fa-user" aria-hidden="true"></i> <?php echo "Welcome ". $_SESSION['username']?>
          </span>
        </div>
      </nav>

    <!-- MAIN PAGE -->

    <div class="container1">
        <div class="profile">
            <div class="welcome-user">
                <h1><?php echo "Hello, ". $_SESSION['username']?></h1>
            </div>
            <div class="yourscore">
                <p>
                <h2 style="color:white">U</h2>
                </p>
            </div>
            <div class="userDetails">
                <p><b>Address</b> : <?php echo $_SESSION["address"]?></p>
                <p><b>Contact</b> : <?php echo $_SESSION["phone"]?></p>
                <p><b>Email</b> : UserEmail</p>
            </div>

            <div class="LogOutButton">
                <button><a class="nav-link" href="logout.php">Log Out</a></button>
            </div>
        </div>
    </div>

    <div class="container">    
        <div class="cards-container">

            <?php
                while($row = mysqli_fetch_assoc($all_ngo)){
            ?>
            <div class="card">
                <img class="card-img-top" src="profile.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row["username"] ?></h4> <hr>
                    <!-- <p class="card-title"><small>NGO ID <?php echo $row["reg_id"] ?></small></p><hr> -->
                    <p class="card-title"><?php echo $row["address"] ?></p>
                    <h6 class="card-title">Contact: <?php echo $row["phone"] ?></h6>
                    <h6 class="card-title">Email: <?php echo $row["email"] ?></h6>
                    <button class="donate-btn"><a href="#">Donate</a></button>
                </div>
            </div>
            <?php
                }
            ?>
            
            

        </div>

    </div>

</body>

</html>