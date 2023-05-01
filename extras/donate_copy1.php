<?php
session_start();
require_once "login-register\config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $medname = $_POST['medname'];
    $type = $_POST['type'];
    $exp_date = $_POST['exp_date'];
    $quan = $_POST['quan'];
    $manufact = $_POST['manufact'];
    $username = $_POST['username'];

    // foreach($_POST['medname'] as $key => $value)
    // {
    //     // echo $mednames. " - ".$type[$index]." - ".$exp_date[$index];
    //     // $s_medname = $mednames;
    //     // $s_type = $type[$index];
    //     // $s_exp_date = $exp_date[$index];
    //     // $s_quan = $quan[$index];
    //     // $s_manufact = $manufact[$index];

    //     $s_medname = $value;
    //     $s_type = $_POST['type'][$key];
    //     $s_exp_date = $_POST['exp_date'][$key];
    //     $s_quan = $_POST['quan'][$key];
    //     $s_manufact = $_POST['manufact'][$key];

    for($i=0; $i<count($_POST['medname']); $i++)
    {
        $medname = $_POST['medname'][$i];
        $type = $_POST['type'][$i];
        $exp_date = $_POST['exp_date'][$i];
        $quan = $_POST['quan'][$i];
        $manufact = $_POST['manufact'][$i];

        $sql = "INSERT INTO donations (medname, type, exp_date, quan, manufact) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
    

        if($stmt)
        {
            // mysqli_stmt_bind_param($stmt, "sssss", $s_medname, $s_type, $s_exp_date, $s_quan, $s_manufact);
            mysqli_stmt_bind_param($stmt, "sssss", $medname, $type, $exp_date, $quan, $manufact);
        }
    
    if (mysqli_stmt_execute($stmt))
    {
        header("location: well.php");
    }
    else{
        echo "Something went wrong... cannot redirect!";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="register.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>PHP login system!</title>
  </head>
  <body>

    <div class="container mt-5">
    <h3>Enter Details:</h3>
    <hr>

    <form action="#" method="POST" id="add_form">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username *</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="inputEmail3" name="username[]" placeholder="Enter Username" required="true">
        </div>
    </div>

    <hr>

    <div class="form-group row">
        <!-- <label for="inputEmail3" class=" col-form-label text-center">No.</label>   -->
        
        <label for="inputEmail3" class="col-md-3 col-form-label text-center">Name of Medicine</label>
        <label for="inputEmail3" class="col-md-2 col-form-label text-center">Type of Medicine</label>  
        <label for="inputEmail3" class="col-md-2 col-form-label text-center">Expiry Date</label>  
        <label for="inputEmail3" class="col-md-2 col-form-label text-center">Quantity</label>
        <label for="inputEmail3" class="col-md-2 col-form-label text-center">Manufacturer</label>  

    </div>
    <div id="show_item">
        <div class="form-group row">
            <!-- <label for="inputPassword3" class="col-form-label">1 *</label> -->
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputPassword3" name="medname[]" placeholder="Name" required="true">
            </div>
            <div class="col-sm-2">
                <select id="type" class="form-control" name="type[]" Required="true">
                    <!-- <option selected></option> -->
                    <option>Tablets</option>
                    <option>Syrup/Liquid</option>
                    <option>Capsules</option>
                    <option>Ointment/Cream</option>
                    <option>Drops</option>
                    <option>Powder</option>
                    <option>Inhalers</option>
                    <option>Patches</option>
                    <option>Syringes</option>
                </select>       
            </div>
            <div class="col-sm-2">
                <input type="date" class="form-control" id="inputPassword3" name="exp_date[]" required="true">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="inputPassword3" name="quan[]" placeholder="Quantity" required="true">
                <small id="passwordHelpBlock" class="form-text text-muted">*Mention if in gms/ml</small>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="inputPassword3" name="manufact[]" placeholder="Manufacturer" required="true">
            </div>
            <div class="" role="group">
                <button type="submit" class="add_row btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" value="add" class="btn btn-primary" name="donate" id="donate">Donate</button>
        </div>
    </div>
    </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="donate_form.js"></script>
</body>
</html>
