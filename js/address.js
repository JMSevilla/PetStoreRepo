$(document).ready(function()
{ 
    $('#onsave').click(function(){
       var payment = $('#paymentaddress').val();
       var shipping = $('#shippingaddress').val();
       

       if(!paymentaddress || !shippingaddress){
           swal('Oops!', 'Empty fields', 'warning');
           return false;
       }else{
           $.ajax({
               method: 'post',
               url: 'Handlers/addressHandler.php',
               data: {
                   action: 'create',
                   paymentaddress: payment,
                   shippingaddress: shipping
               },
               cache: false,
               success: function(response){
                   console.log(response);
               }
           })
       }
    })
    }) 