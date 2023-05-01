<?php 
require_once "config.php";
session_start();

// $sql = "SELECT  FROM ngo";
// $all_ngo = $conn -> query($sql);

// $sql = "SELECT * FROM ngo";
// $all_ngo = $conn -> query($sql);

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
    <!-- Header
    <header>
        <div class="navContainer flex">
            <div class="navlogo">
                <a href="#"><img class="logoimg" src="img/Better.png" alt="logo"></a>
            </div>
            <div class="navlinks">
                <ul class="navItems flex">
                    <li><a class="link" href="Home.html">Home</a></li>
                    <li><a class="link" href="Explore.html">Explore</a></li>
                    <li><a class="link" href="Connect.html">Connect</a></li>
                    <li><a class="link" href="Help.html">Help</a></li>
                    <li><a class="link" href="AboutUs.html">About us</a></li>
                </ul>
            </div>
            <div class="navlogin">
                <button class="loginButton"><a class="links" href="#">LOGIN</a></button>
            </div>
        </div>
    </header>  -->

    <!-- MAIN PAGE -->

    <div class="container">
        <div class="profile">
            <div class="welcome-user">
                <h1>Hello, NGO!</h1>
            </div>
            <div class="yourscore">
                <p>
                <h2 style="color:white">N</h2>
                </p>
            </div>
            <form class="userDetails">
                <p><b>Name of NGO</b> : NGOName</p>
                <p><b>Address</b> : NGOAddress</p>
                <p><b>Contact Details</b> : NGOContact</p>
                <p><b>Email</b> : NGOEmail</p>
                <p><b>NGO ID</b> : NGOId</p>

            </form>
            <div class="LogOutButton">
                <button><a href="#">Log Out</a></button>
            </div>
        </div>

        <div class="ngo-cards-container">
            <div class="ngo-card">
                <h3>Donor Details: </h3>
                <div class="user-info">
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Contact: </p>
                    <p>Email: </p>
                    <hr>
                </div>
                <h3>Medicines Donated Details: </h3>
                <p>Name of medicine: </p>
                <p>Type of medicine: </p>
                <p>Expiry Date: </p>
                <p>Quantity: </p>
                <p>Manufacturer: </p>
                <button class="contact-btn"><a href="#">Contact Donor</a></button>
            </div>

            <div class="ngo-card">
                <h3>Donor Details: </h3>
                <div class="user-info">
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Contact: </p>
                    <p>Email: </p>
                    <hr>
                </div>
                <h3>Medicines Donated Details: </h3>
                <p>Name of medicine: </p>
                <p>Type of medicine: </p>
                <p>Expiry Date: </p>
                <p>Quantity: </p>
                <p>Manufacturer: </p>
                <button class="contact-btn"><a href="#">Contact Donor</a></button>
            </div>

            <div class="ngo-card">
                <h3>Donor Details: </h3>
                <div class="user-info">
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Contact: </p>
                    <p>Email: </p>
                    <hr>
                </div>
                <h3>Medicines Donated Details: </h3>
                <p>Name of medicine: </p>
                <p>Type of medicine: </p>
                <p>Expiry Date: </p>
                <p>Quantity: </p>
                <p>Manufacturer: </p>
                <button class="contact-btn"><a href="#">Contact Donor</a></button>
            </div>

            <div class="ngo-card">
                <h3>Donor Details: </h3>
                <div class="user-info">
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Contact: </p>
                    <p>Email: </p>
                    <hr>
                </div>
                <h3>Medicines Donated Details: </h3>
                <p>Name of medicine: </p>
                <p>Type of medicine: </p>
                <p>Expiry Date: </p>
                <p>Quantity: </p>
                <p>Manufacturer: </p>
                <button class="contact-btn"><a href="#">Contact Donor</a></button>
            </div>

            <div class="ngo-card">
                <h3>Donor Details: </h3>
                <div class="user-info">
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Contact: </p>
                    <p>Email: </p>
                    <hr>
                </div>
                <h3>Medicines Donated Details: </h3>
                <p>Name of medicine: </p>
                <p>Type of medicine: </p>
                <p>Expiry Date: </p>
                <p>Quantity: </p>
                <p>Manufacturer: </p>
                <button class="contact-btn"><a href="#">Contact Donor</a></button>
            </div>

        </div>

    </div>

</body>

</html>