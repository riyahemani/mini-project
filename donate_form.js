$(document).ready(function(){
    $(".add_row").click(function(e){
        e.preventDefault();
        $("#show_item").prepend(`    <div class="form-group row">
    <div class="col-sm-3">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Name" required="true">
    </div>
    <div class="col-sm-2">
        <select id="type" class="form-control" name="type" Required="true">
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
        <input type="date" class="form-control" id="inputPassword3" required="true">
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Quantity" required="true">
        <small id="passwordHelpBlock" class="form-text text-muted">*Mention if in gms/ml</small>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Manufacturer" required="true">
    </div>
    <div class="">
        <button type="submit" class="remove_row btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
    </div>
    </div>`)
    });

    $(document).on('click','.remove_row', function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
    });
    
    // ajax idk kya hota hai but eh
    // $("#add_form").submit(function(e){
    //     e.preventDefault();
    //     $("#donate").val('Adding...');
    //     $.ajax({
    //         url: 'donate_form.php',
    //         method: 'post',
    //         data: $(this).serialize(),
    //         success: function(response){
    //             console.log(response);
    //         }
    //     })
    // })

});