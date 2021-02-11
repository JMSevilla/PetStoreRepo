$(document).ready(function(){
    $('#support').click(function(){
        var support = $('#dayssupport').val();
        if(!support){
            swal("Oops!", "Empty description", "error");
            return false;
        }else{
            $.ajax({
                method: 'post',
                url: 'server/DataHandler/servicesBulkHandler.php',
                data: {
                    support_action: 'supportaction',
                    support: support
                },
                cache: false, 
                success: function(response){
                    console.log(response);
                    var generate = JSON.parse(response)
                    if(generate.statusCode == 200){
                        swal("Good!", "Sucessfully update support", "success");
                    }
                }
            })
        }     
    })
})