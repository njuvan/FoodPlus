<html>
<style>
    .form_style #contentText {
     border: 1px solid #CCCCCC;
     border-radius: 5px;
    }
    
    .btn {
     display: block;
     background: #6C93AD;
     border: 1px solid #4B6170;
     color: #FFFFFF;
     margin-top: 5px;
     padding: 6px 9px 6px 9px;
     border-radius: 5px;
    }
    
    #productList{
     margin: 0px;
     padding: 0px;
     list-style: none;
    }
    
    #productList li {
     list-style: none;
     padding: 15px;
     background: rgb(221, 240, 255);
     margin-bottom: 5px;
     border-radius: 5px;
     max-width: 400px;
     font-family: Georgia, "Times New Roman", Times, serif;
     font-size: 13px;
    }
    
    #productList li.sel {
     background: rgb(255, 221, 221);
    }
    
    .del_wrapper{float:right;}
    .content_wrapper {
     max-width: 525px;
     margin-right: auto;
     margin-left: auto;
    }
    
    img {
        height: 20px;
        width: 20px;
    }
    
    input {
        width: 100%;
        padding: 8px 10px;
        margin: 6px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>
    
<head>
    <title>FoodPlus | products</title>
</head>
    
<div class="content_wrapper">
<h1>FOODPLUS</h1>
    <div class="form_style">
       
        <label>Name: </label><input type="text" name="product_name" id="productName"><br>
        <label>Description: </label><input type="text" name="product_description" id="productDescription"><br>
        <label>Production date: </label><input type="date" name="production_date" id="productionDate"><br>
        <label>Expiry date: </label><input type="date" name="expiry_date" id="expiryDate"><br>
        <label>Price: </label><input type="number" name="product_price" id="productPrice"><br>
        <label>Currency: </label><input type="text" name="price_currency" id="priceCurrency"><br>
        <label>EAN code: </label><input type="text" name="ean_code" id="eanCode"><br>
        <label>Weight: </label><input type="number" name="product_weight" id="productWeight"><br>
        <label>Weight unit: </label><input type="text" name="weight_unit" id="weightUnit"><br>
        
        <button id="FormSubmit" class="btn btn-large btn-primary">Submit</button>
        <img src="<?php echo base_url('public/img/loading.gif') ?>" id="LoadingImage" style="display:none" />
    </div>
    
    <hr>
    
    <button id="refreshPage" class="btn btn-large btn-primary" type="button" onclick="location.reload();">Refresh list</button><br>
    <ul id="productList">
        <?php foreach($query as $row): ?>  
        <li id="item_<?php echo $row->id;?>">
            <div class="del_wrapper">
                <a href="#" class="del_button" id="del-<?php echo $row->id;?>"><img id="delete_img" src="<?php echo base_url('public/img/delete.png') ?>" alt="delete-icon" /></a>
            </div>
            <span><?php echo $row->product_name; ?></span>
        </li>
        <?php endforeach;?>                        
    </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#FormSubmit").click(function (e) {
        e.preventDefault();
        
        // Input check
        if($("#productName").val() ==='')
        {
            alert("Vnos v polje \"Name\" je obvezen.");
            return false;
        }
        
        $("#FormSubmit").hide(); //hide submit button
        $("#LoadingImage").show(); //show loading image 
        
        var productData = {
            "product_name": $("#productName").val(),
            "product_description": $("#productDescription").val(),
            "production_date": $("#productionDate").val(),
            "expiry_date": $("#expiryDate").val(),
            "product_price": $("#productPrice").val(),
            "price_currency": $("#priceCurrency").val(),
            "ean_code": $("#eanCode").val(),
            "product_weight": $("#productWeight").val(),
            "weight_unit": $("#weightUnit").val()
        };
        
        jQuery.ajax({
            traditional: true,
            type: "POST",
            url: "product_controller/add",
            dataType: "text",
            data: productData,
            success: function(response){
                $("#productList").append(response)
                $("#productName").val('');
                $("#productDescription").val('');
                $("#productionDate").val('');
                $("#expiryDate").val('');
                $("#productPrice").val('');
                $("#priceCurrency").val('');
                $("#eanCode").val('');
                $("#productWeight").val('');
                $("#weightUnit").val('');
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert("Error failed to connect");
            }
        });
    });

    $(".content_wrapper").on("click", "#productList .del_button", function(e) {
        e.preventDefault();
        var clickedID = this.id.split('-'); //split ID string
        var DbNumberID = clickedID[1]; //get number from array
        var myData = 'recordToDelete='+ DbNumberID; //build a post data structure

        $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
        $(this).hide(); //hide currently clicked delete button

        jQuery.ajax({
            type: "POST",
            url: "product_controller/delete/" + DbNumberID,
            dataType: "text",
            data: myData,
            success: function(response){
                //on success, hide  element user wants to delete.
                $('#item_'+DbNumberID).fadeOut();
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });
});
</script>
</html>