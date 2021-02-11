var quantitycart = "";
function gettotal(){
    var user = localStorage.getItem('email');
    $.ajax({
        method: 'post',
        url: 'Handlers/cartsummaryHandler.php',
        data: {
            action: 'onsum',
            isaccount: user
        },
        cache: false,
        success: function(response){
            var generate = JSON.parse(response);
            quantitycart = generate.statusCode.isquantitycart;
            console.log(quantitycart);
            console.log(generate.statusCode.pricing);
            var x = generate.statusCode.pricing;
            if(x == null){
                document.getElementById("cartlistprice").innerHTML = "&#8369;" + 0;
            } else{
                document.getElementById("cartlistprice").innerHTML = "&#8369;" + generate.statusCode.pricing;
            document.getElementById("totalcart").innerHTML = "&#8369;" + x;
            }
            
        }
    })
}

function oncheckout(){
    console.log(quantitycart);
    
        $.ajax({
        method: 'post',
        url: 'Handlers/isOrderHandler.php',
        data: {
            action: 'isorder',
            isaccount: localStorage.getItem('email')
        },
        cache: false,
        success : function(response){
            var generate = JSON.parse(response);
            if(generate.statusCode == 'OK'){
                swal('Good!', 'Successfully Checkout', 'success');
                setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/cart.php";
                }, 3000)
            }
        }
    })
    
    
}

gettotal();