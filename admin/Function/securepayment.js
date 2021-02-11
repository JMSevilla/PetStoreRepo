$(document).ready(function(){
    $('#secure').click(function(){
        var payment = $('#securepaymentdescription').val();
        if(!payment){
            swal("Oops!", "Empty description", "error");
            return false;
        }else{
            $.ajax({
                method: 'post',
                url: 'server/DataHandler/servicesBulkHandler.php',
                data: {
                    services_payment_action: 'payment_action',
                    payment: payment
                },
                cache: false, 
                success: function(response){
                    console.log(response);
                    var generate = JSON.parse(response)
                    if(generate.statusCode == 200){
                        swal("Good!", "Sucessfully update secure payment", "success");
                    }
                }
            })
        }     
    })
})