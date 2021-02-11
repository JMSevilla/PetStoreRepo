
var email = document.getElementById("signinemail");
email.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsignin").click();
    }
})
var password = document.getElementById("signinpassword");
password.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsignin").click();
    }
})

$(document).ready(function(){
    $('#onsignin').click(function(){
        var email = $('#signinemail').val();
        var password = $('#signinpassword').val();
        if(!email)
        {
            swal("Oops!", "Please fill up email", "error");
            return false
        }
        else if(!password){
            swal("Oops!", "Please fill up password", "error");
            return false;
        }
        else{
        
            $.ajax({
                type: 'POST',
                url: 'api/signin.php',
                data: {
                    type: 2,
                    email : email,
                    password : password
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode ==200){
                        $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");
                    setTimeout(() => {
                        window.location.href = "http://localhost/ecommerce-html-template/admin/admin.php";
                    }, 3000)
                    }
                    else if(dataResult.statusCode == 204){
                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");
                        setTimeout(() => {
                            window.location.href = "http://localhost/ecommerce-html-template/admin/admin.php";
                        }, 3000)
                    }
                     else if(dataResult.statusCode == 201){
                        localStorage.setItem("email", email);
                        $("div.spanner").addClass("show");
                        $("div.overlay").addClass("show");
                        setTimeout(() => {
                            window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
                        }, 3000)
                    }
                    else if(dataResult.statusCode == 202){
                        swal("Oops!", "Account invalid", "error");
                    }
                    else if(dataResult.statusCode == 203){
                        swal("Oops!", "No account found with that email", "error");
                    }
                    
                },
                error : function(e){
                    console.log(e);
                }
            })
        }
    })
})
