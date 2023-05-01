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

        <!-- <form action="#" method="POST" id="add_form"> -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username *</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Enter Username" required="true">
            </div>
        </div>

        <hr>

        <form action="" method="post" class="insert-form" id="insert-form">
            <div class="input-field">
                <table class="table table-bordered" id="table_field">
                    <tr>
                        <th>Name of Medicine</th>
                        <th>Type of Medicine</th>
                        <th>Expiry Date</th>
                        <th>Quantity</th>
                        <th>Manufacturer</th>
                        <th>Add/Remove</th>
                    </tr>

                    <?php
                        session_start();
                        require_once "login-register\config.php";

                        if (isset($_POST['save']))
                        {
                            $medname = $_POST['medname'];
                            $type = $_POST['type'];
                            $exp_date = $_POST['exp_date'];
                            $quan = $_POST['quan'];
                            $manufact = $_POST['manufact'];

                            foreach ($medname as $key => $value)
                            {
                                $save = "INSERT INTO donations(medname, type, exp_date, quan, manufact) VALUES('".$value."','".$type[$key]."','".$exp_date[$key]."','".$quan[$key]."','".$manufact[$key]."')";
                                $query = mysqli_query($conn, $save);
                            }
                            header("location: well.php");
                        }

                        ?>

                    <tr>
                        <td><input type="text" class="form-control" name="medname[]" placeholder="Name" required="true"></td>
                        <td><select id="type" class="form-control" name="type[]" Required="true">
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
                        </td>
                        <td><input type="date" class="form-control" name="exp_date[]" required="true"></td>
                        <td><input type="text" class="form-control" name="quan[]" placeholder="Quantity" required="true">
                            <small class="form-text text-muted">*Mention if in gms/ml</small>
                        </td>
                        <td><input type="text" class="form-control" name="manufact[]" placeholder="Manufacturer" required="true"></td>
                        <td><input type="button" class="btn btn-warning ml-4" name="add" id="add" value="Add"></td>
                    </tr>
                </table>
                <div class="text-center"><input type="submit" class="btn btn-success" name="save" id="save" value="Save Data"></div>
            </div>
        </form>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="donate_form.js"></script> -->
    <script>
        $(document).ready(function(){
            var html = `<tr>
                        <td><input type="text" class="form-control" name="medname[]" placeholder="Name" required="true"></td>
                        <td><select id="type" class="form-control" name="type[]" Required="true">\
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
                        </td>
                        <td><input type="date" class="form-control" name="exp_date[]" required="true"></td>
                        <td><input type="text" class="form-control" id="inputPassword3" name="quan[]" placeholder="Quantity" required="true">
                            <small class="form-text text-muted">*Mention if in gms/ml</small>
                        </td>
                        <td><input type="text" class="form-control" name="manufact[]" placeholder="Manufacturer" required="true"></td>
                        <td><input type="button" class="btn btn-danger ml-2" name="remove" id="remove" value="Remove"></td>
                    </tr>`;

                var max = 5;
                var x = 1;
                $("#add").click(function(){
                    if (x <= max){
                        $("#table_field").append(html);
                        x++;
                    }
                });
                $("#table_field").on('click','#remove',function(){
                    $(this).closest('tr').remove();
                    x--;
                });

        });
    </script>
</body>
</html>
