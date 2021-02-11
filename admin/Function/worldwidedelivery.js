$(document).ready(function(){
    $('#worldwide').click(function(){
        var delivery = $('#worldwidedelivery').val();
        if(!delivery){
            swal("Oops!", "Empty description", "error");
            return false;
        }else{
            $.ajax({
                method: 'post',
                url: 'server/DataHandler/servicesBulkHandler.php',
                data: {
                    world_action: 'world_action_delivery',
                    world: delivery
                },
                cache: false, 
                success: function(response){
                    console.log(response);
                    var generate = JSON.parse(response)
                    if(generate.statusCode == 200){
                        swal("Good!", "Sucessfully update world delivery", "success");
                    }
                }
            })
        }     
    })
})