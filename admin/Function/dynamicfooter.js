$(document).ready(function()
{
    $('#onsubmit').click(function(){
       var address = $('#txtaddress').val();
       var email = $('#txtemail').val();
       var telnum = $('#txttelnum').val();

       if(!address || !email || !telnum){
           swal('Oops!', 'Empty fields', 'error');
           return false;
       }else{
           $.ajax({
               method: 'post',
               url: 'server/DataHandler/getInTouchHandler.php',
               data: {
                   address: address,
                   email: email,
                   phone: telnum,
                   acc: 'getintouch'
               },
               cache: false,
               success: function(resp){
                   console.log(resp)
                   var generate = JSON.parse(resp);
                   if(generate.statusCode == 200){
                       swal("Good!", "Successfully Update Get In Touch!", "success");
                   }
               }
           })
       }
    })
    $('#btncompany').click(function(){
       var about = $('#txtabout').val();
       var privacy = $('#txtprivacy').val();
       var terms = $('#txtbterms').val();

       if(!terms || !privacy || !terms){
        swal('Oops!', 'Empty fields', 'error');
           return false;
       }else{
          $.ajax({
              method: 'post',
              url: 'server/DataHandler/companyInfoHandler.php',
              data: {
                  companyacc : 'updatecompanyinfo',
                  about: about,
                  privacy: privacy,
                  terms: terms
              },
              cache: false,
              success: function(response){
                  var generate = JSON.parse(response);
                  if(generate.statusCode == 200){
                      swal("Good!", "Successfully Update Company Info!", "success");

                  }
              }
          })
       }
    })
    $('#purchase').click(function(){
        var payment = $('#txtpayment').val();
        var shipping = $('#txtshipping').val();
        var policy = $('#txtreturn').val();
 
        if(!payment || !shipping || !policy){
            swal('Oops!', 'Empty fields', 'error');
            return false;
        }else{
           $.ajax({
               method: 'post',
               url: 'server/DataHandler/purchaseInfoHandler.php',
               data: {
                   purchaseacc: 'purchaseinfo',
                   payment: payment,
                   shipping: shipping,
                   policy: policy
               },
               cache: false,
               success: function(response){
                   console.log(response)
                   var generateResponse = JSON.parse(response);
                   if(generateResponse.statusCode == 200){
                       swal('Good!', 'Successfully Update Purchase Info!', 'success');
                   }
               }
           })
        }
    })
})