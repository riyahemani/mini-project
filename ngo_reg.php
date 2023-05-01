<?php
require_once "config.php";

$username = $password = $confirm_password = $reg_id = $phone = $a_phone = $website = $email = $address = $area = $pin = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM ngo WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

  // mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// reg_id
$reg_id = trim($_POST['reg_id']);

// phone no
$phone = trim($_POST['phone']);
$a_phone = trim($_POST['a_phone']);

// email
$email = trim($_POST['email']);

// website
$website = trim($_POST['website']);

// address
$address = trim($_POST['address']);

// area
if(isset($_POST["area"])){

  $area = $_POST['area'];

  echo $area;
}

// pin
$pin = trim($_POST['pin']);

// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO ngo (username, password, reg_id, phone, a_phone, website, email, address, area, pin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_password, $reg_id, $phone, $a_phone, $website, $email, $address, $area, $pin);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: ngo_login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}



?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="login-register\register.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  <body>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
</nav> -->

<div class="container mt-5">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username *</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Enter Name of your Organization" Required="true">
    </div>
    <div class="form-group col-md-6">
    <label for="inputRegid">Registration ID *</label>
    <input type="text" class="form-control" name ="reg_ig" id="reg_id" placeholder="Enter Registration ID of your Organization" Required="true">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail">Email *</label>
        <input type="email" class="form-control" name ="email" id="inputEmail" placeholder="Enter Email" Required="true">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Contact No. *</label>
      <input type="tel" minlength="10" maxlength="10" class="form-control" name="phone" id="inputPhone" placeholder="Enter Contact no." Required="true">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Alternate Contact No.</label>
      <input type="tel" minlength="10" maxlength="10" class="form-control" name="a_phone" id="inputPhone" placeholder="Enter Contact no.">
    </div>
    </div>
  <div class="form-group">
        <label for="inputURL">Website *</label>
        <input type="url" class="form-control" name ="website" id="inputUrl" placeholder="Enter Website URL" Required="true">
    </div> 
    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputPassword4">Password *</label>
    <input type="password" minlength="8" class="form-control" name ="password" id="inputPassword4" placeholder="Enter Password" Required="true">
  </div>
  <div class="form-group col-md-6">
    <label for="inputPassword4">Confirm Password *</label>
    <input type="password" minlength="8" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" Required="true">
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address *</label>
    <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Enter Address" Required="true">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="area" Required="true">Area *</label>
      <select id="area" class="form-control" name="area" Required="true">
        <!-- <option selected></option> -->
        <option>Mumbai Suburban</option>
        <option>Mumbai Western</option>
        <option>Mumbai Eastern</option>
        <option>South Mumbai</option>
        <option>District Thane</option>
        <option>Navi Mumbai</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Pin Code *</label>
      <input type="tel" minlength="6" maxlength="6" class="form-control" name="pin" id="pin" Required="true">
    </div>
  </div>
  <button type="submit">Register</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
