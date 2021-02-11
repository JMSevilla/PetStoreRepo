$(document).ready(function(){
    $('#oncreate').click(function(){
        var category = $('#categoryname').val();
        if(!category){
            swal("Oops!", "Please fill category", "error");
            return false;
        }
        else{
            $.ajax({
                type: 'POST',
                url: 'server/s_categoryHandler.php',
                data: {
                    type: 'oncreate',
                    category: category
                },
                cache: false,
                success: function(response){
                   var RESTResponse = JSON.parse(response);
                   if(RESTResponse.statusCode == 'category success')
                   {
                       swal('Good!', 'Successfully Added', 'success');
                      setTimeout(() => {
                        window.location.href = "http://localhost/ecommerce-html-template/admin/categoryviews.php";
                      }, 3000)
                   }
                   else{
                    swal('Oops!', 'Server problem', 'error');
                   }
                },
                error: function(e){
                    console.log(e);
                }
            })
        }
    })
   
})
var cid = 0;
function onedit(id){
    cid = id;
    $('#exampleModal').modal('show');
    $.ajax({
        type: 'GET',
        url: 'server/s_categoryHandler.php',
        data: {
            handler: 'ongetter',
            id: id
        }, cache: false,
        success: function(response){
            var RESTResponse = JSON.parse(response);
            document.getElementById("categorynameupdate").value = RESTResponse.statusCode;
            console.log(RESTResponse.statusCode);
        },
        error : function(e){
            console.log(e);
        }
    })
}
function ondelete(id){
    $.ajax({
        type: 'POST',
        url: 'server/s_categoryHandler.php',
        data: {
            DeleteOAuth: 'remover',
            id: id
        },
        success: function(response){
            console.log(response);
            var ResponseGenerate = JSON.parse(response);
            if(ResponseGenerate.deleteStatus == 'OK'){
                swal('Good!', 'Successfully Deleted', 'success');
                setTimeout(()=> {
                    window.location.href= "http://localhost/ecommerce-html-template/admin/categoryviews.php";
                }, 2000)
            }
        }
    })
}
$('#onsaveupdate').click(function(){
    var category_id = cid;
    var categorychanged = $('#categorynameupdate').val();
    if(!categorychanged){
        swal('Oops!', 'Please provide data when updating', 'warning');
        return false;
    }else{
        $.ajax({
            type: 'post',
            url: 'server/s_categoryHandler.php',
            data: {
                OAuth: 'finalupdate',
                id: category_id,
                category_name: categorychanged
            },
            success : function(response){
                var GenerateResponse = JSON.parse(response);
                if(GenerateResponse.updateStatus == 'OK'){
                    swal('Good!', 'Successfully Updated', 'success');
                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");
                    setTimeout(() => {
                        window.location.href = "http://localhost/ecommerce-html-template/admin/categoryviews.php";
                      }, 2000)
                } else if(GenerateResponse.updateStatus == 'ERROR'){
                    swal('Oops!', 'Something went wrong', 'error');
                    return false;
                }
            }
        })
    }
})