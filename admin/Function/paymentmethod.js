$(document).ready(function()
{
    $('#method').click(function(){
        var payment = $('#paymentmethod').val();
        if(!payment)
        {
            swal("Warning!","Empty field","warning");
            return false;
        }
            else
        {
            $.ajax({
                method: 'post',
                url: 'server/DataHandler/servicesBulkHandler.php',
                data: {
                    payment_dashobard_action: 'paymentdashboardaction',
                    payment: payment
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