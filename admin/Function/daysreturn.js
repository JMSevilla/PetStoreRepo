$(document).ready(function(){
    $('#onreturnclick').click(function(){
        var dayreturn = $('#daysreturn').val();
        if(!dayreturn){
            swal("Oops!", "Empty description", "error");
            return false;
        }else{
            $.ajax({
                method: 'post',
                url: 'server/DataHandler/servicesBulkHandler.php',
                data: {
                    days_action: 'daysaction',
                    daysreturn: dayreturn
                },
                cache: false, 
                success: function(response){
                    console.log(response);
                    var generate = JSON.parse(response)
                    if(generate.statusCode == 200){
                        swal("Good!", "Sucessfully update days return", "success");
                    }
                }
            })
        }     
    })
})