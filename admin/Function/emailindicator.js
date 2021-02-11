$(document).ready(function(){
    $('#onupdate').click(function(){
       var email = $('#emailindicator').val();
       if(!email){
           alert("empty");
           return false;
       }
       else{
           //ajax
           $.ajax({
               method: 'POST',
               url: 'server/emailIndicatorController.php',
               data: {
                   action: 'onupdateindicator',
                   email: email
               },
                cache: false,
                success: function(response){
                    var generate = JSON.parse(response);
                    if(generate.statusCode == 200){
                        alert("successfully updated");
                    }
                }
           })
       }
    })
})