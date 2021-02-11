

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

gettotal();

$('#onplaceorder').click(function(){
    var selectedcountry = $('#onselectcountry').val();
    var firstname = $('#fname').val();
    var lastname = $('#lname').val();
    var email = $('#email').val();
    var mobile = $('#mobileno').val();
    var address = $('#address').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var zipcode = $('#zipcode').val();
    var payment = $('#payment-5').val();
    if(!selectedcountry || !firstname || !lastname || !email || !mobile || !address || !city || !state || !zipcode){
        swal('Oops!', 'Check the fields if there is empty', 'error');
        return false;
    }
    else{
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
                    isplaceOrder(selectedcountry, firstname, lastname, email, mobile, address, city, state, zipcode, payment);
                }
            }
        })
    }

})

function isplaceOrder(selectedcountry, firstname, lastname, email, mobile, address, city, state, zipcode, payment){
    $.ajax({
        method: 'post',
        url: 'Handlers/placeorderHandler.php',
        data: {
            action: 'isplaceorder',
            selectedcountry: selectedcountry,
            firstname: firstname,
            lastname: lastname,
            email: email,
            mobile: mobile,
            address: address,
            city: city,
            state: state, 
            zipcode: zipcode, 
            payment: payment
        },
        cache: false,
        success: function(response){
            console.log(response);
            swal("Good!", "Successfully Checkout!", "success");
                $("div.spanner").addClass("show");
                $("div.overlay").addClass("show");
                setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
                }, 4000)
        }
    })  
}