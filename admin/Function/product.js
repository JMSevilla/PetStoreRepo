$(document).ready(function(){
    $('#oncreateproduct').click(function(){
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split(".").pop().toLowerCase();
        var image_size = property.size;
        var productname = $('#prodname').val();
        var productprice = $('#prodprice').val();
        var productQuantity = $('#prodquantity').val();
        var productDescription = $('#proddescription').val();
        var categorySelected = document.getElementById("selectedcategory").value;
        if(!productname || !productprice || !productQuantity || !productDescription)
        {
            swal('Oops!', 'Please fill up all the fields', 'error');
            return false;
        }
        else if(!categorySelected){
            swal('Oops!', 'Please choose category', 'error');
            return false;
        }
        else if(jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
            swal('Oops!', 'Invalid Image File', 'error');
            return false;
        }
        else if(image_size > 2000000){
            swal('Oops!', 'Image file is too big!');
            return false;
        }
        else{
            //fixing

           
                var form_data = new FormData();
                form_data.append("file", property);
                form_data.append("prodname", productname);
                form_data.append("prodprice", productprice);
                form_data.append("prodquantity", productQuantity);
                form_data.append("proddescription", productDescription);
                form_data.append("category_selected", categorySelected);
                form_data.append("prodtype", "create");
                $.ajax({
                    type: 'post',
                    url: 'server/productHandler.php',
                    data : form_data,
                    contentType:false,
                    processData: false,
                    cache: false,
                    success : function(data){
                    console.log(data);
                    var GenerateResponse = JSON.parse(data);
                    if(GenerateResponse.statusCode == 200){
                        swal('Good!', 'Successfully Created!', 'success');
                        setTimeout(() => {
                            window.location.href = "http://localhost/ecommerce-html-template/admin/productviews.php";
                        }, 2000)
                        
                    }else if(GenerateResponse.statusCode == 201){
                        swal('Oops!', 'Something went wrong. please try again', 'error');
                    }
                    },
                    error : function(e){
                        console.log(e);
                    }
                })
        }
    })
})
var pid = 0;
var previousimagename = "";
function productEdit(id){
   
    pid = id;
    $('#exampleModal').modal('show');
    $.ajax({
        type: 'POST',
        url: 'server/ProductEditRequestHandler.php',
        data: {
            pdhandler: 'productdataget',
            id: pid
        }, cache: false,
        success: function(response){
            console.log(response);
           var generateResponse = JSON.parse(response);
           
           document.getElementById("editprodname").value = generateResponse.productname;
           document.getElementById("editprodprice").value = generateResponse.productprice;
           document.getElementById("editprodquantity").value = generateResponse.productquantity;
           document.getElementById("editproddescription").value = generateResponse.productdescription;
           document.getElementById('editcategory').value = generateResponse.productcategory;
            
           
        },
        error : function(e){
            console.log(e);
        }
    })
}
function productDelete(id){
    $.ajax({
        method: 'post',
        url : 'server/DataHandler/productDeleteHandler.php',
        data: {
            deleteaction: 'delete',
            id: id
        },
        cache: false,
        success: function(response){
            console.log(response)
            var generateResponse = JSON.parse(response);
            if(generateResponse.deleteStatus == 200){
                swal("Good!", "Successfully Destroy!", "success");
                setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/admin/productviews.php";
                }, 2000)
            }
        }
    })
}

$('#editonsaveupdate').click(function(){
    //DEPRECATED IMAGE UPDATE

    // var propertyUpdate = document.getElementById("filefile").files[0] ? null : previousimagename;
    // console.log(propertyUpdate);
    // var image_name = propertyUpdate.name;
    // var image_extension = image_name.split(".").pop().toLowerCase();
    // var image_size = propertyUpdate.size;
    var editpname = $('#editprodname').val();
    var editpprice = $('#editprodprice').val();
    var editpquantity = $('#editprodquantity').val();
    var editpdescription = $('#editproddescription').val();
    var editcategory = $('#editcategory').val();
        //validate.. /include validation of image
        
            var form_data = new FormData();
            // form_data.append("filefile", propertyUpdate);
            form_data.append("pname", editpname);
            form_data.append("pprice", editpprice);
            form_data.append("pquantity", editpquantity);
            form_data.append("pdesc", editpdescription);
            form_data.append("pid", pid);
            form_data.append("actionedittype", "editing");
            form_data.append("category", editcategory);
        $.ajax({
            method: 'post',
            url: 'server/DataHandler/producteditHandler.php',
            data: form_data,
            contentType:false,
            processData: false,
            cache: false,
            success: function(response){
               var generateResponse = JSON.parse(response);
               if(generateResponse.statusCode == 'OK'){
                   swal("Good!", "Successfully Update", "success");
                   $('#exampleModal').modal('hide');
                   setTimeout(() => {window.location.href = "http://localhost/ecommerce-html-template/admin/productviews.php";}, 2000)
               }
            }
        })
        
        
})

